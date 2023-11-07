#include <ArduinoJson.h>
#include <SoftwareSerial.h>

#define GSM_RX_PIN 2    // GSM module RX pin
#define GSM_TX_PIN 3    // GSM module TX pin#define SmokeMQ2pin (1)
#define smokeSensorPin (1) 
#define gasSensorPin A0
#define waterSensorPin A2
#define gLed_pin A3
#define rLed_pin A4

// GSM SIM900A RX TX PINS
SoftwareSerial gsmSerial(10, 11);

int smokeSensorData; 
int gasSensorData;

// Water Sensor Variables 
int lowerThreshold = 420;
int upperThreshold = 520;
int water_val = 0;  // Value for storing water level

// SMS Alert Time Interval Variables
unsigned long previousMillis = 0;
const unsigned long interval = 60000;
// For receiveMsg()
unsigned long lastSmsCheckTime = 0;
unsigned long lastLoopTime = 0;
unsigned long loopInterval = 15000; // 15-second interval for the main loop
unsigned long smsCheckInterval = 2000;

//Variables for receiving geoUrl, address & contact no. data from ESP8266
String userNum = "09490496928";
String bfpNum = "09490496928";
String contact = "";
String geourl;
String address;

//Variables for SMS Function
String msgBFP;
String smsMsg;
String senVal;
String message = "";
bool recSMS = false; 
bool waterSen = false;

//==========================================================VOID SETUP()===============================================================================================================
void setup() {
  Serial.begin(19200);
  gsmSerial.begin(19200);

// Clear the serial buffer
  Serial.flush();
  gsmSerial.flush();

// Setup LEDs
  pinMode(gLed_pin, OUTPUT);
  pinMode(rLed_pin, OUTPUT);

// Wait for ESP to connect to WiFi
  standbyESP();
  delay(4000);

// Receive URL, Addr, Contact from ESP8266
  fetchContact();
  fetchAddr();
  fetchURL();

// Prepare SMS Message Structure for BFP
  msgBFP = smsMsg; 

//AT Command for msg receiving
  gsmSerial.println("AT+CNMI=2,2,0,0,0");
  delay(6000);
}

//===========================================================VOID LOOP================================================================================================================
void loop() { 
  unsigned long currentMillis = millis();
  unsigned long currentTime = millis();

 if (currentTime - lastSmsCheckTime >= smsCheckInterval) {
  if (recSMS) { 
    receiveMsg(); // Check for SMS messages
      }
      lastSmsCheckTime = currentTime; // Update the last SMS check time
  } 

// SENSOR READINGS // =================================================================================================================================================================
  if (currentTime - lastLoopTime >= loopInterval) {
  
  // GAS SENSOR READING
  gasSensorData = analogRead(gasSensorPin); 
    if(gasSensorData >= 70){  
      if (currentMillis - previousMillis >= interval) {
        senVal = String(gasSensorData);
        delay(100);
        smsMsg = "ALERT! GAS Detected!";
        delay(100);
        userSMS(contact, "ALERT! GAS DETECTED");
        delay(3000);
        recSMS = true; // Enable receiveMsg()
        previousMillis = currentMillis;  // Reset the timer
      }
    }

  // SMOKE SENSOR READING
  smokeSensorData = analogRead(smokeSensorPin);
  if(smokeSensorData >= 500){    
    if (currentMillis - previousMillis >= interval) {
      senVal = String(smokeSensorData);
      delay(100);
      smsMsg = "ALERT! SMOKE Detected!";
      delay(100);
      userSMS(contact, "ALERT! SMOKE DETECTED");
      delay(3000);
      recSMS = true; // Enable receiveMsg()
      previousMillis = currentMillis;  // Reset the timer
      }    
  }

  // Create a JSON object
  StaticJsonDocument<200> jsonDoc; 
  // Add sensor readings to the JSON object
  jsonDoc["Gas Sensor"] = gasSensorData;
  jsonDoc["Smoke Sensor"] = smokeSensorData;

  // WATER LEVEL READING
  int waterLevel = readSensor();

  if (waterLevel == 0) {
    jsonDoc["Water Level"] = "Empty";

  } else if (waterLevel > 0 && waterLevel <= lowerThreshold) {
    jsonDoc["Water Level"] = "Low";

  } else if (waterLevel > lowerThreshold && waterLevel <= upperThreshold) {
    jsonDoc["Water Level"] = "Medium";
      if (currentMillis - previousMillis >= interval) {    
        waterSen = true;
        delay(100);
        smsMsg = "ALERT! WATER Level Detected! (MED)"; 
        userSMS(contact, "ALERT! WATER DETECTED");
        recSMS = true; // Enable receiveMsg()
        previousMillis = currentMillis;  // Reset the timer
      }

  } else if (waterLevel > upperThreshold) {
    jsonDoc["Water Level"] = "High";
    if (currentMillis - previousMillis >= interval) { 
      waterSen = true;
      delay(100); 
      smsMsg = "ALERT! WATER Level Detected! (HIGH)"; 
      userSMS(contact, "ALERT! WATER DETECTED");
      recSMS = true; // Enable receiveMsg()
    }
  }

  // Serialize the JSON object to a string
  String jsonString;
  serializeJson(jsonDoc, jsonString);
  // Print the JSON string to the Serial monitor
  Serial.println(jsonString);

  lastLoopTime = currentTime;
  }
}
// END VOID LOOP & SENSOR READINGS // ================================================================================================================================================

/////////////////////////// FUNCTIONS ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

int readSensor() { // For Water Level Sensor
	//digitalWrite(waterSensorPower, HIGH); 
	delay(10);
	water_val = analogRead(waterSensorPin);
	//digitalWrite(waterSensorPower, LOW);
	return water_val;
}

// Wait for ESP8266 to connect to WiFi Network 
void standbyESP() { 
    while (!Serial.available()) {
    delay(4000);
    Serial.print(".");
  }
  delay(1000);

  // Read signal from ESP
  String signal = Serial.readStringUntil('\n');
  message = signal;

  if (message.indexOf("SignalToArduino:Connected") != -1) {
    Serial.println("ESP8266 is connected to Wi-Fi");
    digitalWrite(gLed_pin, HIGH);
  } else {
    Serial.println("Wrong");
    digitalWrite(rLed_pin, HIGH);
    
    while (true) {
      // Infinite loop; program will not proceed 
    }
  }
}

void fetchContact() { // CONTACT NO. Fetching //
    if (Serial.available() > 0) { 
    contact = Serial.readStringUntil('\n');
    delay(100); 
    //userContact = contact.substring(1);
    Serial.println(contact);
    delay(5000);
  } else {
    Serial.println("No Contact No.");
    digitalWrite(rLed_pin, HIGH);
    delay(2500);
  }
}

void fetchAddr() { // ADDRESS Fetching //
    if (Serial.available() > 0) { 
    address = Serial.readStringUntil('\n');
    delay(100);
    Serial.println(address);
    delay(5600);
  } else {
    Serial.println("No Address");
    digitalWrite(rLed_pin, HIGH);
    delay(2500);
  }
}

void fetchURL() { // GEO URL Fetching //
    if (Serial.available() > 0) { 
    geourl = Serial.readStringUntil('\n');
    Serial.println(geourl);
    delay(4000);
  } else {
    Serial.println("No LatLng URL");
    digitalWrite(rLed_pin, HIGH);
    delay(2500);
  }
}

// Check for incoming SMS messages (For "SOS")
void receiveMsg() {
    //gsmSerial.flush();
  if (gsmSerial.available()>0) {
    String inchar = gsmSerial.readStringUntil('\n');
    message = inchar;
    //Serial.print(inchar);  // Print received character for debugging

    // Check if the message contains "SOS"
    if (message.indexOf("SOS") != -1 || message.indexOf("sos") != -1) { 
      //Serial.println("SOS Confirmed"); // For troubleshooting purposes
      if(waterSen) {
        sendMsgBFP1(msgBFP);
        delay(7000);
        waterSen = false;
      } else {
        sendMsgBFP(msgBFP);
        delay(7000);
      }
      recSMS = false;
      smsMsg = "";
      message = "";  // Clear the message variable
      }
    }
}

void userSMS(String phoneNumber, String message) {

  gsmSerial.println("AT+CMGF=1"); // Set SMS text mode
  delay(1000);
  gsmSerial.println("AT+CMGS=\"" + contactNum + "\"\r"); 
  delay(300);
  gsmSerial.println(message); 
  gsmSerial.println("Send \"SOS\" to alert local BFP "); 
  delay(1000);
  gsmSerial.write(26);
  delay(500);
  //gsmSerial.println();
  Serial.println("SMS sent!");
}

void sendMsgBFP(String message) { // For GAS and SMOKE alerts
  String url1 = String("google.com/maps?f=q&q="); 

  gsmSerial.println("AT+CMGF=1"); // Set SMS text mode
  delay(1000);
  gsmSerial.println("AT+CMGS=\"" + bfpNum + "\"\r"); 
  delay(500);
 
  gsmSerial.println(smsMsg); 
  delay(100);
  gsmSerial.print("Sensor Reading: "); 
  delay(100);
  gsmSerial.print(senVal); 
  delay(100);
  gsmSerial.println("ppm"); 
  delay(100);

  gsmSerial.println();
  gsmSerial.println(address); 
  delay(2000);
  gsmSerial.print(url1);
  delay(1500); 
  gsmSerial.print(geourl);
  delay(1500); 

  gsmSerial.write(26);
  delay(500);
  gsmSerial.println();
  Serial.println("BFP message sent!");
}

void sendMsgBFP1(String message) { // For WATER alerts
  String url1 = String("google.com/maps?f=q&q="); 

  gsmSerial.println("AT+CMGF=1"); // Set SMS text mode
  delay(1000);
  gsmSerial.println("AT+CMGS=\"" + bfpNum + "\"\r"); 
  delay(500);
 
  gsmSerial.println(smsMsg); 
  delay(100);
  gsmSerial.println();
  gsmSerial.println(address); 
  delay(2000);
  gsmSerial.print(url1);
  delay(1500); 
  gsmSerial.print(geourl);
  delay(1500); 

  gsmSerial.write(26);
  delay(500);
  gsmSerial.println();
  Serial.println("BFP message sent!");
}