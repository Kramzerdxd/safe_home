#include <WiFiManager.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>
#include <ESP8266WiFi.h>
#include <ArduinoJson.h>
//#include <EEPROM.h>

#define ledPin A0
//#define EEPROM_SIZE 10 // Adjust this based on your "user_id" size

String serverIP = "192.168.5.227"; 

String geourl_raw = "";
String geourl = "";
String address = "";
String contact = "";
//String id = ""; 
String userID = "";
//String user_Id = "";

void saveConfigCallback() {
  // This function will be called when you save the configuration via WiFiManager.
  // You can put code here to handle the saved parameters and store them in EEPROM.
  // In this case, we'll store the "user_id" parameter in EEPROM.
  //EEPROM.put(0, user_Id); // Store the "user_id" value in EEPROM
  //EEPROM.commit(); // Commit the changes to EEPROM
}

//================================================================VOID SETUP()==========================================================================================================
void setup() {

  // put your setup code here, to run once:
  Serial.begin(19200);
  Serial.flush(); // Clear the serial buffer
  pinMode(ledPin, OUTPUT);
  
//---------------ESP Captive Portal Function----------------------------------------------------------------------------------------------------------------------------------------
  // // Initialize the EEPROM----------------------------------------------------------------------------------
  // EEPROM.begin(EEPROM_SIZE); (EEPROM FUNCTIONS)

  // // Retrieve the stored "user_id" value from EEPROM-----------------------------------------------------------
  // String user_Id;
  // EEPROM.get(0, user_Id); (EEPROM FUNCTIONS)
   
    WiFiManager wifiManager;
    
    wifiManager.setDebugOutput(false);
    // For resetting esp every run
    wifiManager.resetSettings();

    // Set the saveConfigCallback function as the callback for saving configuration (EEPROM FUNCTIONS)
    //wifiManager.setSaveConfigCallback(saveConfigCallback);

    //Add Custom Text Box
    WiFiManagerParameter userID_field("user_id", "Enter User ID", "", 5);
    // Add text box
    wifiManager.addParameter(&userID_field);
    
    // Connect to WiFi using WiFiManager
    if (!wifiManager.autoConnect("SafeHome_ESP/AP")) {
        Serial.println("Failed to connect and hit timeout. Restarting...");
        delay(3000);
        ESP.restart();
    }
    delay(2000);
    Serial.println("SignalToArduino:Connected");
    userID = userID_field.getValue();

    delay(3000);

//---------- Call function to fetch geoUrl, address & contact no. from geoserver.php---------------------------------------------------------------------------------------------------
  fetchDataFromGeoserver();
    
  int equalSignIndex = geourl_raw.indexOf('=', geourl_raw.indexOf('=') + 1);
  // Extract the substring after the second equal sign
  String geourl = geourl_raw.substring(equalSignIndex + 1);

  Serial.println("" + contact + "");
    delay(7000);
  Serial.println("" + address + "");
    delay(6000);
  Serial.println("" + geourl + "");
    delay(2000);
  //Serial.println("" + id + "");
//---------------------END-------------------------------------------------------------------------------------------------------------------------------------------------------------------

  delay(12000); // solid principles, oop, cake php, json
}

void loop() {

  if(Serial.available()>0) { // Check if Sensor Data is available from Arduino Uno
    String jsonString = Serial.readStringUntil('\n');
    delay(100);
    Serial.print("Received JSON: ");
    Serial.println(jsonString);

    // Process received JSON data using ArduinoJson library
    StaticJsonDocument<200> jsonDoc; // Adjust the buffer size as needed
    DeserializationError err = deserializeJson(jsonDoc, jsonString);

    if (err == DeserializationError::Ok) {
      // Extract the sensor data from the JSON object
      int gasSensorValue = jsonDoc["Gas Sensor"];
      int smokeSensorValue = jsonDoc["Smoke Sensor"];
      String waterLevel = jsonDoc["Water Level"];

      // Create a JSON object to hold the sensor data
      StaticJsonDocument<200> sensorDataJson;
      sensorDataJson["Gas Sensor"] = gasSensorValue;
      sensorDataJson["Smoke Sensor"] = smokeSensorValue;
      sensorDataJson["Water Level"] = waterLevel;
      sensorDataJson["Id"] = userID;

      // Create a JSON object to hold the sensor data for SQL DB
      StaticJsonDocument<200> sqlDataJson;

      sqlDataJson["Gas Sensor"] = gasSensorValue;
      sqlDataJson["Smoke Sensor"] = smokeSensorValue;
      sqlDataJson["Water Level"] = waterLevel;
      sqlDataJson["Id"] = userID;
      
      // Serialize the JSON object into a string
      String sensorDataJsonStr; // For data.json
      delay(1000);
      serializeJson(sensorDataJson, sensorDataJsonStr);

      String sqlDataJsonStr; // For SQL DB
      delay(1000);
      serializeJson(sqlDataJson, sqlDataJsonStr);

      // Send the sensor data JSON to the server using sendDataToServer Function
      sendDataToServer(sensorDataJsonStr);
      sendDataToMySQL(sqlDataJsonStr);
    } else {
      Serial.println("JSON parsing failed.");
    }

  }
  delay(10000);
}

//-----------------------------------FUNCTIONS-----------------------------------------------------------------------------------------------------------------------------------------

void sendDataToServer(const String& jsonStr) { //Function to Send data to data.json file
  HTTPClient http;
  WiFiClient client;
//(client, "http://192.168.30.4/safehome_0901/server2.php")
  if (http.begin(client, "http://" + serverIP + "/safehome_1030/json_server.php")) {
    http.addHeader("Content-Type", "application/json");
    int httpResponseCode = http.POST(jsonStr);
    String payload = http.getString();
      Serial.println(payload);

    if (httpResponseCode == HTTP_CODE_OK) {
      Serial.println("Data sent successfully");

      digitalWrite(ledPin, HIGH);
      delay(150); // LED on for 500 ms
      digitalWrite(ledPin, LOW);
      delay(150); // LED off for 500 ms
    } else {
      String payload = http.getString();
      Serial.println(payload);
      Serial.print("HTTP POST failed, error code: ");
      Serial.println(httpResponseCode);
    }
    http.end();
  } else {
    Serial.println("Unable to connect to the server");
  }
}

void sendDataToMySQL(const String& jsonStr) {
  HTTPClient http;
  WiFiClient client;

  if (http.begin(client, "http://" + serverIP + "/safehome_1030/sqlserver.php")) { // Replace with the URL to your server.php
    http.addHeader("Content-Type", "application/json");
    int httpResponseCode = http.POST(jsonStr);
    String payload = http.getString();
    Serial.println(payload);

    if (httpResponseCode == HTTP_CODE_OK) {
      Serial.println("Data sent to MySQL successfully");
    } else {
      Serial.print("HTTP POST failed, error code: ");
      Serial.println(httpResponseCode);
    }
    http.end();
  } else {
    Serial.println("Unable to connect to the server");
  }
}


void fetchDataFromGeoserver() { //Function to Retrieve data from Webpage Database
  HTTPClient http;
  WiFiClient client;
//(http.begin(client, "http://192.168.30.4/safehome_0901/geoserver.php?action=fetchData")
  if (http.begin(client, "http://" + serverIP + "/safehome_1030/geoserver.php?action=fetchData&id=" + String(userID))) {
    int httpResponseCode = http.GET();
    if (httpResponseCode == HTTP_CODE_OK) {
      String payload = http.getString();
      //Serial.print("Received JSON from geoserver: ");
      //Serial.println(payload);

      // Process the received JSON data using ArduinoJson library
      StaticJsonDocument<512> jsonDoc; // Adjust the buffer size as needed
      DeserializationError err = deserializeJson(jsonDoc, payload);

      if (err == DeserializationError::Ok) {
        JsonObject firstElement = jsonDoc[0];

  // Check if the "geo_url" field exists in the first element
  if (firstElement.containsKey("geo_url")) {

    // Get the value of the "geo_url" field
    geourl_raw = firstElement["geo_url"].as<String>();
    //Serial.println("Geo URL: " + geourl);
  } else {
    Serial.println("Geo URL field not found in the JSON response.");
  }

  // Check if the "address" field exists in the first element
  if (firstElement.containsKey("address")) {
    // Get the value of the "address" field
    address = firstElement["address"].as<String>();
    //Serial.println("Address: " + address);
  } else {
    Serial.println("Address field not found in the JSON response.");
  }

  // Check if the "contact" field exists in the first element
  if (firstElement.containsKey("contact")) {
    // Get the value of the "contact" field
    contact = firstElement["contact"].as<String>();
    //Serial.println("Contact: " + contact);
  } else {
    Serial.println("Contact field not found in the JSON response.");
  }

  // // Check if the "id" field exists in the first element
  // if (firstElement.containsKey("id")) {
  //   // Get the value of the "contact" field
  //   id = firstElement["id"].as<String>();
  //   //Serial.println("Contact: " + contact);
  // } else {
  //   Serial.println("Contact field not found in the JSON response.");
  // }

      } else {
        Serial.println("JSON parsing failed (geoserver)");
        Serial.print("JSON deserialization failed: ");
        Serial.println(err.c_str());

      }
    } else {
      Serial.print("HTTP GET failed, error code: ");
      Serial.println(httpResponseCode);
    }
    http.end();
  } else {
    Serial.println("Unable to connect to geoserver.");
  }
}
