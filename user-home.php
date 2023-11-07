 <?php 
// include "config.php";
// session_start();

// $_SESSION['username'];
// $_SESSION['password'];
// if (!isset($_SESSION['username'])) {
// 	header("location: login.php");
// } 

// $id = $_SESSION['id'];
//echo $id;
?> 

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=League+Spartan:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/user-home.css" rel="stylesheet">

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Include Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/5.5.3/css/ionicons.min.css">
    <style>
  #gas{
    width: 700px; 
    height: 400px;
    padding: 20px 30px 55px 30px;
    background-color:  #F1EDEE;
    border-radius: 13px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    float:left;
    margin-left:170px;
    
  }
 #gas .btn{
  box-shadow: none;
    width: 60px;
    height: 40px;
    background-color: #C04C43;
    color: #fff;
    border-radius: 15px;
    float: left;
 }
 #smoke{
  width: 700px; 
    height: 400px;
    padding: 20px 30px 55px 30px;
    background-color:  #F1EDEE;
    border-radius: 13px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    float:left;
    margin-left:170px;
    
 }
 #smoke .btn{
  box-shadow: none;
  width: 60px;
    height: 40px;
    background-color: #454545;
    color: #fff;
    border-radius: 15px;
    float: left;
 }
 #water{
  width: 700px; 
    height: 400px;
    padding: 20px 30px 55px 30px;
    background-color:  #F1EDEE;
    border-radius: 13px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    float:left;
    margin-left:170px;
 }
 #water .btn{
  box-shadow: none;
  width: 60px;
    height: 40px;
    background-color: #12355B;
    color: #fff;
    border-radius: 15px;
    float: left;

 }
    </style>
</head>
<?php
  require_once 'header.php';
  ?> 

<body>

  <!-- ======= Hero Section with Carousel ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-right" style="height: auto;">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
    <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#heroCarousel" data-bs-slide-to="1"></li>
        <li data-bs-target="#heroCarousel" data-bs-slide-to="2"></li>
        <li data-bs-target="#heroCarousel" data-bs-slide-to="3"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="assets/img/first.png" class="d-block w-100" alt="Image 1" style="opacity:83%;">
          <div class="carousel-caption">
            <h1 style="float:left;">Let's be safe together!</h1>
            <h2 style="float:left;">SafeHome, your best home buddy.</h2>  
            <a href="user-read-more.php" class="btn-read-more scrollto" style="margin-right:910px; margin-bottom:60px;">READ MORE</a>
          </div>
        </div>
        <div class="carousel-item">
          <img src="assets/img/second.png" class="d-block w-100" alt="Image 2">
          <div class="carousel-caption">
           
          </div>
        </div>
        <div class="carousel-item">
          <img src="assets/img/third.png" class="d-block w-100" alt="Image 3">
          <div class="carousel-caption">
            <!-- <h1>Another Slide</h1>
            <p>More content for the carousel...</p> -->
          </div>
        </div>
        <div class="carousel-item">
          <img src="assets/img/fourth.png" class="d-block w-100" alt="Image 4">
          <div class="carousel-caption">
      
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </a>
      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </a>
    </div>
  </section><!-- End Hero with Carousel -->

    <!-- Custom element definition for Ionicons -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/ionicons/5.5.3/ionicons.js"></script>


<div class="row">
  <div class="col-lg-12" style="text-align: center;">
      <div class="precautionary-box mx-auto" style="padding:15px; height: 1500px; width: 1420px; position: relative; z-index: 1; overflow: hidden; top: 0; margin-top:10px; padding-top: 50px;">
        <div class="row">

        <div class="col-lg-2 col-md-2">
        <div class="precautionary-box mx-auto" style="height: 400px; width: 290px; padding: 20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin: 15px 0; position: relative; z-index: 1; border-radius: 13px; overflow: hidden; top: 0; background: #F1EDEE;">
    </div>
    </div>

          <div class="col-lg-8 col-md-4">
          <div id="gas" style="position: absolute; top:35px; left: 190px; z-index: 2;">
            <canvas id="gasChart"></canvas>
            <button onclick="fetchDataAndUpdateChart('Gas Sensor', <?php $id ?>)" class="btn">
                <i class="bi bi-arrow-clockwise"></i>
            </button>
        </div>
              <div class="precautionary-box mx-auto" style="height: 400px; width: 750px; padding: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin: 15px 0; position: relative; z-index: 1; border-radius: 13px; overflow: hidden; top: 0; background: #C04C43;">
              </div>
          </div>

          <div class="col-lg-2 col-md-2">
       
    </div>
</div>

<br><br><br>
<div class="row">

<div class="col-lg-2 col-md-2">
<div class="precautionary-box mx-auto" style="height: 400px; width: 290px; padding: 20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin: 15px 0; position: relative; z-index: 1; border-radius: 13px; overflow: hidden; top: 0; background: #F1EDEE;">
    </div>
    </div>
          <div class="col-lg-8 col-md-4">
          <div id="smoke" style="position: absolute; top:535px; left: 190px; z-index: 2;">
            <canvas id="smokeChart"></canvas>
            <button onclick="fetchDataAndUpdateChart('Smoke Sensor', <?php $id ?>)" class="btn">
                <i class="bi bi-arrow-clockwise"></i>
            </button>
        </div>
              <div class="precautionary-box mx-auto" style="height: 400px; width: 750px; padding: 20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin: 15px 0; position: relative; z-index: 1; border-radius: 13px; overflow: hidden; top: 0; background: #454545;">
              </div>
          </div>

          <div class="col-lg-2 col-md-2">
        
    </div>
</div>

<br><br><br>
<div class="row">

<div class="col-lg-2 col-md-2">
        <div class="precautionary-box mx-auto" style="height: 400px; width: 290px; padding: 20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin: 15px 0; position: relative; z-index: 1; border-radius: 13px; overflow: hidden; top: 0; background: #F1EDEE;">
    </div>
</div>
          <div class="col-lg-8 col-md-4">
          <div id="water" style="position: absolute; top:1040px; left: 190px; z-index: 2;">
            <canvas id="waterChart"></canvas>
            <button onclick="fetchDataAndUpdateChart('Water Sensor', <?php $id ?>)" class="btn">
                <i class="bi bi-arrow-clockwise"></i>
            </button>
        </div>
              <div class="precautionary-box mx-auto" style="height: 400px; width: 750px; padding: 20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin: 15px 0; position: relative; z-index: 1; border-radius: 13px; overflow: hidden; top: 0; background: #12355B;">
              </div>
          </div>
          
          <div class="col-lg-2 col-md-2">
        
    </div>

</div>
        </div>
      </div>
    </div>
</div>

<br><br>
<div class="row">
  <div class="col-lg-12" style="text-align: center;">
    <div class="wrapper mx-auto justify-content-center align-items-center" style="width: 100%; height: auto; max-width: 1500px; padding: 20px;">
      <div class="precautionary-box mx-auto" style="height: 500px; width: 1420px; padding: 40px; box-shadow: 0 0 30px rgba(31, 45, 61, 0.125); margin: 15px 0; position: relative; z-index: 1; border-radius: 10px; overflow: hidden; top: 0; background: #e8e3e3; margin-top:-40px; margin-left:170px; float:left;">
        <div class="row">
          <div class="col-md-3">
              <br><br><br><br><br><br><br>
              <h2>Quick Start for Precautionaries!</h2>
          </div>
          <div class="col-md-3">
            <br><br>
            <div class="icon" style=" width: 80px; height: 80px; position: absolute; top: 57px; left: 500px; z-index: 2;" >
              <img src="assets/img/fire-icon.png" alt="" class="img-fluid">
            </div>
            <div class="precautionary-box-1" style="position: relative; background: #f3f3f3; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">
              <br>
              <h5>Fire Emergency</h5>
              <p>What are the best practices to mitigate the cause of fire emergency situations? What should you consider doing amidst the emergency? What should you do to elevate safetiness inside your household?</p>
              <button type="button" style="float: center;" class="learn-more" data-bs-toggle="modal" data-bs-target="#smokeModal1">Learn More</button>
            </div>
          </div>
          <div class="col-md-3">
              <br><br>
              <div class="icon" style=" width: 80px; height: 80px; position: absolute; top: 57px; left: 840px; z-index: 2;" >
                <img src="assets/img/gas-icon.png" alt="" class="img-fluid">
              </div>
            <div class="precautionary-box-1" style="position: relative; background: #f3f3f3; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">
              <br>
              <h5>Gas Leakage Emergency</h5>
              <p>What are the best practices to mitigate the cause of gas leakage emergency situations? What should you consider doing amidst the emergency? What should you do to elevate safetiness inside your household?</p>
              <button type="button" class="learn-more" data-bs-toggle="modal" data-bs-target="#smokeModal2">Learn More</button>
            </div>
          </div>
          <div class="col-md-3">
              <div class="icon" style=" width: 80px; height: 80px; position: absolute; top: 57px; left: 1185px; z-index: 2;" >
                <img src="assets/img/flood-icon.png" alt="" class="img-fluid">
              </div>
            <br><br>
            <div class="precautionary-box-1" style="position: relative; background: #f3f3f3; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">
              <br>
              <h5>Flood Emergency</h5>
              <p>What are the best practices to be prepared when flooding occurs? What should you consider doing amidst the emergency? <br>What should you do to elevate safetiness inside your <br>household?</p>
              <button type="button" class="learn-more" data-bs-toggle="modal" data-bs-target="#smokeModal3">Learn More</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


                      <!-- modal for fire emergency -->
                      <div class="modal fade" id="smokeModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-4 mods-title" id="exampleModalLabel">Fire Precautions</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <div class="container-main" style="width:100%;">
                                  <div class="container-body">
                                    <form>
                                    <div class="row gx-3 mb-3 div1">
                                    
                                    <div class="col-md-5">
                                      <br><br><br>
                                      <img src="assets/img/before-fire.png" alt=""  class="img-fluid">
                                    </div>
                                    
                                    <div class="col-md-7">
                                     <br><h6 style="text-align:center; color:#EA1135">Before Fire Emergency</h6>
                                     <ul class="before-infos">
                                      <li>Be sure to be prepared and to have a emergency plan ahead. </li>
                                      <li>Know your evacuation routes, transportation and a place to stay outside of the evacuation zone.</li>
                                      <li>If living in a highrise, use stairs instead of elevator and know how to evacuate out of the building.</li>
                                      <li>Store emergency supplies that you can grab quickly. It should contain goods that will be good for atleast three days.</li>
                                      <li>Install your SafeHome device at most prone place/s and always check the status of the house for monitoring.</li>
                                      <li>Store your important documents and any personal important items in a safe and easily accessible place.</li>
                                      <li>Make sure to store flammable or combustible materials away from children and in a safe place.</li>
                                     </ul>
                                    </div>

                                  </div>
                                  <div class="row gx-3 mb-3 div2">
                                    
                                    <div class="col-md-7">
                                    <br><h6 style="text-align:center; color:#F1EDEE">During Fire Emergency</h6>
                                    <ul class="during-infos">
                                      <li>Do not panic. Go out and stay out. Stay alert and aware, follow you escape plan and don't stop.</li>
                                      <li>If closed doors and handles are warm, user an alternative exit.</li>
                                      <li>If you encounter an approaching fire or trapped, make sure to dial 911 and call for help.</li>
                                      <li>To signal for help, look for an open window and wave a brightly colored cloth or use a flashlight.</li>
                                      <li>Crawl under low smoke. When smoke is aggresively disturbing, use wet towel and cover your mouth and nose.</li>
                                      <li>Wear facemasks for double protection from harmful particles.</li>
                                      <li>Perform 'Stop, Drop, and Roll' if ever your cloth get caught by fire and prevent it from escalating further damage.</li>
                                      <li>Always stay with your family and keep your disaster safety kit on hand.</li>
                                      <li>Once you get outside, make sure to remain calm and evacuate. Communicate with your family and check on one another.</li>
                                    </ul>
                                    </div>
                                    
                                    <div class="col-md-5">
                                      <br><br><br><br>
                                      <img src="assets/img/during-fire.png" alt=""  class="img-fluid">
                                    </div>

                                  </div>
                                  <div class="row gx-3 mb-3 div3">
                                    
                                    <div class="col-md-5">
                                      <br><br><br><br>
                                      <img src="assets/img/after-fire.png" alt=""  class="img-fluid">
                                    </div>
                                    
                                    <div class="col-md-7">
                                    <br><h6 style="text-align:center; color:#F1EDEE">After Fire Emergency</h6>
                                    <ul class="after-infos">
                                      <li>Always be informed and check for latest news and updates for information about the fire.</li>
                                      <li>You can enter your house if the autorithies give permission to do so.</li>
                                      <li>Contact your families and friends and let them know about the situation.</li>
                                      <li>With public health guidelines, check on someone who may require special assistance and get them treated by medical professionals.</li>
                                      <li>Get a hold to your local goverment authorities for temporary shelter in case you cannot stay at your house due to the damages.</li>
                                      <li>Be cautious and take precautions when cleaning your property. Wear protective gear like mask, gloves, safety glasses and boots.</li>
                                      <li>Take a photograph and inventory for ruined furnitures, appliances, books, etc. and contact insurance company if necessary.</li>
                                      <li>Ensure that water and food are safe and not contaminated in any possible way.</li>
                                    </ul> 
                                    </div>

                                  </div>
                                    </form>

                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

          
                      <!-- modal for gas leakage emergency -->
                      <div class="modal fade" id="smokeModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-4 mods-title" id="exampleModalLabel">Gas Leakage Precautions</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                              <div class="container-main" style="width:100%;">
                                  <div class="container-body">
                                    <form>
                                    <div class="row gx-3 mb-3 div1">
                                    
                                    <div class="col-md-5">
                                      <br><br><br>
                                      <img src="assets/img/before-gas.png" alt=""  class="img-fluid">
                                    </div>
                                    
                                    <div class="col-md-7">
                                     <br><h6 style="text-align:center; color:#EA1135">Before Gas Leakage Emergency</h6>
                                     <ul class="before-infos">
                                      <li>Make sure how to turn off the valve of the LPG and locate it in a proper area.</li>
                                      <li>Store all the cylinders may it be full or empty in an upright position in extremely ventillated area.</li>
                                      <li>Do not smoke near the LPG and keep all combustible materials or flammable items away from it.</li>
                                      <li>Keep children away from the gas stove and gas connection.</li>
                                      <li>If possible, provide a fire fighting equipment like extinguishers and dry powder. Make it easilly accessible.</li>
                                      <li>Always close your gas tap before you go to bed at night.</li>
                                      <li>Always close the main control valve if you are not going to be home for a day or more.</li>
                                      <li>Always ensure the rubber tube fits correctly and regularly check it for any cuts/damages.</li> 
                                     </ul>
                                    </div>

                                  </div>
                                  <div class="row gx-3 mb-3 div2">
                                    
                                    <div class="col-md-7">
                                    <br><h6 style="text-align:center; color:#F1EDEE">During Gas Leakage Emergency</h6>
                                    <ul class="during-infos">
                                      <li>Do not panic. For a suspected leakage, do not switch on any lights, open all doors, windows, and close any open flames.</li>
                                      <li>Do not allow any naked flame, spark or smoking near the leakage point.</li>
                                      <li>Stop cooking immediately if you smell a gas leakage.</li>
                                      <li>Do not tamper with any component of the gas connection.</li>
                                      <li>Isolate the electrical supply from the outside source.</li>
                                      <li>Try to isolate the cylinder to an open space and cover it with a wet cloth.</li>
                                      <li>Contact the local gas company to rectify the leak.</li>
                                      <li>If the smell of gas continues, evacuate the building and call the police.</li>
                                      <li>If the leak cannot be stopped or a significant leak has occurred, evacuate the premises.</li> 
                                    </ul>
                                    </div>
                                    
                                    <div class="col-md-5">
                                      <br><br>
                                      <img src="assets/img/during-gas.png" alt=""  class="img-fluid">
                                    </div>

                                  </div>
                                  <div class="row gx-3 mb-3 div3">
                                    
                                    <div class="col-md-5">
                                      <img src="assets/img/after-gas.png" alt=""  class="img-fluid">
                                    </div>
                                    
                                    <div class="col-md-7">
                                    <br><h6 style="text-align:center; color:#F1EDEE">After Gas Leakage Emergency</h6>
                                    <ul class="after-infos">
                                      <li>If someone inhaled the gas and have difficulty breathing, immediately take them outside for fresh air.</li>
                                      <li>For any skin contact and burns, cover them with a clean cloth and rinse with cold water.</li>
                                      <li>In case someone needed a special assistance, take them to a medical professional to be treated accordingly.</li>
                                      <li>Do not disposed the cylinder just yet, return it to your local dealer and let them handle it.</li>
                                    </ul>
                                    </div>

                                  </div>
                                    </form>

                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
            
                      <!-- modal for flood emergency -->
                      <div class="modal fade" id="smokeModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-4 mods-title" id="exampleModalLabel">Flood Precautions</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                              <div class="container-main" style="width:100%;">
                                  <div class="container-body">
                                    <form>
                                    <div class="row gx-3 mb-3 div1">
                                    
                                    <div class="col-md-5">
                                      <br><br><br><br>
                                      <img src="assets/img/before-flood.png" alt=""  class="img-fluid">
                                    </div>
                                    
                                    <div class="col-md-7">
                                     <br><h6 style="text-align:center; color:#EA1135">Before Flood Emergency</h6>
                                     <ul class="before-infos">
                                      <li>Always be prepare and make sure to have an emergency plan.</li>
                                      <li>Practice drills and talk with your family about what should you do during a flood.</li>
                                      <li>Know and practice the best route for evacuation areas.</li>
                                      <li>Monitor local weather alert and follow instructions if told to evacuate.</li>
                                      <li>Have a handy emergency kit that will be good for atleast three days.</li>
                                      <li>Make sure to obtain home insurance that covers flood emergency.</li>
                                      <li>Protect your valuables in a container. For large appliances, raise them and place above potential water level.</li>
                                      <li>Put sealant on areas where water can possibly leak and enter the house.</li>
                                      <li>Check all the water drainage and ensure that nothing is covering it.</li>
                                     </ul>
                                    </div>

                                  </div>
                                  <div class="row gx-3 mb-3 div2">
                                    
                                    <div class="col-md-7">
                                    <br><h6 style="text-align:center; color:#F1EDEE">During Flood Emergency</h6>
                                    <ul class="during-infos">
                                      <li>Be alert and always make sure that your family are updated about the current situation and possible flood warning reports.</li>
                                      <li>Be prepared to evacuate whenever given a notice by the local authority.</li>
                                      <li>In case that a flood or flash flood is stated within your area, head for a higher place and stay there.</li>
                                      <li>Avoid walking and driving though flooded water, they could be deeper that you think.</li>
                                      <li>Keep children and pets away from flood water.</li>
                                      <li>Be cautious especially at night as it is harder to recognize flood danger.</li>
                                      <li>Be aware or streams, drainage channels, canyons, and other areas known to flood suddenly.</li>
                                      <li>Turn off utilities and main switches or valves. </li>
                                      <li>Disconnect electrical appliances and do not touch any electrical equipment if you are wet or standing in water.</li>
                                    </ul>
                                    </div>
                                    
                                    <div class="col-md-5">
                                      <br><br><br>
                                      <img src="assets/img/during-flood.png" alt=""  class="img-fluid">
                                    </div>

                                  </div>
                                  <div class="row gx-3 mb-3 div3">
                                    
                                    <div class="col-md-5">
                                      <br><br><br>
                                      <img src="assets/img/after-flood.png" alt=""  class="img-fluid">
                                    </div>
                                    
                                    <div class="col-md-7">
                                    <br><h6 style="text-align:center; color:#F1EDEE">After Flood Emergency</h6>
                                    <ul class="after-infos">
                                      <li>Always be informed for further instructions from the community officials. Listen to current emergency reports to your radio and local news channels.</li>
                                      <li>As long as authorities hasn't told you to return home, better stay at the evacuation center as it is safer.</li>
                                      <li>Contact your insurance company and talk about the damages done by the flood.</li>
                                      <li>Be extra cautious when entering buildings, there may be a hidden damage to its foundation.</li>
                                      <li>Maintain good hygiene while doing flood cleanup. Wear protective clothing like rubber boots, safety glasses, hard hat, rubber gloves, and a dust mask.</li>
                                      <li>Make sure to do not use water that could be possibly contaminated.</li>
                                      <li>Discard any food which have been in contact with flood water.</li>
                                      <li>Do not use appliances just yet until all electrical components are dry.</li>
                                      <li>Dispose your damaged items properly.</li> 
                                    </ul>    
                                    </div>

                                  </div>
                                    </form>

                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

<!--------------------------------------------------------------------JAVASCRIPT FOR CHART.JS-------------------------------------------------------------------------->
<script>

// Global variable to store the chart instances
let gasChartInstance;
let smokeChartInstance;
let waterChartInstance;

let gasDataIndex = 0;
let smokeDataIndex = 0;
let waterDataIndex = 0; 

let sensorData = [];

let gasData = [];
let gasDataFetched = 0;
let smokeDataFetched = 0;
let waterDataFetched = 0;

let userID = <?php echo $id; ?>;

let wValue;

  // Function to fetch JSON data
  function fetchData() {
      return fetch('jsonLogs.json')
          .then(response => response.json());

          console.log(response);
  }

// Function to update the chart for a specific sensor //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function updateChart(sensorLabel, idToDisplay) {
// Get data for the specific sensor
const sensorDataPoints = sensorData.filter(entry => entry.label === sensorLabel && entry.id == userID);

// Get the 5 latest data points
const latestData = sensorDataPoints.slice(-5);

const labels = latestData.map(entry => formatTimestamp(entry.timestamp)); 
const values = latestData.map(entry => entry.value);

// Separate 'Values' variable for WATER SENSOR CHART
const wValues = latestData.map(entry => getValueFromLabel(entry.value));

// Get the appropriate chart instance based on the sensor label
let chartInstance;
if (sensorLabel === 'Gas Sensor') {
  chartInstance = gasChartInstance;
} else if (sensorLabel === 'Smoke Sensor') {
  chartInstance = smokeChartInstance;
} else if (sensorLabel === 'Water Sensor') {
  chartInstance = waterChartInstance;
}

// Previous Chart Instance need to be destroyed before replaced(updated) with new one
if (chartInstance) {
  chartInstance.destroy();
}

if(sensorLabel == 'Gas Sensor') { // GAS SENSOR CHART CREATION //////////////////////////////////////////////////////////////////////////////////////////////////////
        gasChartInstance = new Chart(document.getElementById('gasChart').getContext('2d'), {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: sensorLabel,
            data: values,
            borderColor: 'rgba(192, 76, 67, 1)', // Red color with fading effect
            backgroundColor: 'rgba(192, 76, 67, 0.5)', // Lighter version for the fading effect
            borderWidth: 2, // Set the width of the line
            fill: true, // Fill the area under the line
        }]
    },
    options: {
        plugins: {
            legend: {
                labels: {
                    font: {
                        family: 'League Spartan, sans-serif',
                        size: 20, // Set the font size
                        weight: 'bold',
                    }
                }
            },
            title: {
                font: {
                    family: 'League Spartan, sans-serif',
                    size: 18, // Set the font size
                }
            }
        },
        scales: {
            y: {
                suggestedMin: 0,
                suggestedMax: 100,
                ticks: {
                    stepSize: 10,
                    font: {
                        family: 'League Spartan, sans-serif',
                        size: 15, // Set the font size
                        
        
                    }
                }
            }
        }
    }
});
    } else if(sensorLabel == 'Smoke Sensor') { // SMOKE SENSOR CHART CREATION ///////////////////////////////////////////////////////////////////////////////////////////
    smokeChartInstance = new Chart(document.getElementById('smokeChart').getContext('2d'), {
        type: 'line',
        data: {
            labels: labels, // 'labels' variable from LINE 64
            datasets: [{
                label: sensorLabel,
                data: values, // 'values' variable from LINE 65
                borderColor: 'rgba(69, 69, 69, 1)', // Green color with fading effect
            backgroundColor: 'rgba(69, 69, 69, 0.5)', // Lighter version for the fading effect
            borderWidth: 2, // Set the width of the line
            fill: true, // Fill the area under the line
            }]
        },
        options: {
            plugins: {
            legend: {
                labels: {
                    font: {
                        family: 'League Spartan, sans-serif',
                        size: 20, // Set the font size
                        weight: 'bold',
                    }
                }
            },
            title: {
                font: {
                    family: 'League Spartan, sans-serif',
                    size: 18, // Set the font size
                    
                }
            }
        },
            scales: {
                y: {
                    suggestedMin: 0, // y-axis Min label
                    suggestedMax: 500, // y-axis Max label
                    ticks: {
                        stepSize: 25, // Set the interval between y-axis ticks
                        font: {
                        family: 'League Spartan, sans-serif',
                        size: 15, // Set the font size
                     
                    }
                    }
                }
                
            }
        }
    });
    } else if(sensorLabel == 'Water Sensor') { // WATER SENSOR CHART CREATION //////////////////////////////////////////////////////////////////////////////////////////
    waterChartInstance = new Chart(document.getElementById('waterChart').getContext('2d'), {
        type: 'line',
        data: {
            labels: labels, // 'labels' variable from LINE 64
            datasets: [{
                label: sensorLabel,
                data: wValues, // 'values' variable from LINE 68
                borderColor: 'rgba(18, 53, 91, 1)', 
            backgroundColor: 'rgba(18, 53, 91, 0.5)', 
            borderWidth: 2,
            fill: true,
            }]
        },
        options: {
            plugins: {
            legend: {
                labels: {
                    font: {
                        family: 'League Spartan, sans-serif',
                        size: 20, // Set the font size
                        weight: 'bold',
                    }
                }
            },
            title: {
                font: {
                    family: 'League Spartan, sans-serif',
                    size: 18, // Set the font size
                    
                }
            }
        },
            scales: {
                y: {
                    suggestedMin: 100, // y-axis Min label
                    suggestedMax:300, // y-axis Max label
                    ticks: {
                        stepSize: 100, // Set the interval between y-axis ticks
                        font: {
                        family: 'League Spartan, sans-serif',
                        size: 16, // Set the font size
                        weight: 'bold',

                    },
                        callback: function (value, index, values) {
                            if (value === 100) return 'Low';
                            if (value === 200) return 'Medium';
                            if (value === 300) return 'High';
                            return value;
                        }
                        
                    }
                }
            }
        }
    });
  }
}

// Function to fetch JSON data and update the chart for a specific sensor //////////////////////////////////////////////////////////////////////////////////////////////
function fetchDataAndUpdateChart(sensorLabel, idToDisplay) {
const sensorDataPoints = sensorData.filter(entry => entry.label === sensorLabel && entry.id == idToDisplay);

fetchData().then(data => {
  // Update the global sensorData variable with the latest data
  sensorData = data;


  //Check if there are at least 5 data points available for the specific sensor
  if (getSensorDataIndex(sensorLabel) > sensorDataPoints?.length) {
      console.log(`There are less than 5 available data points for the ${sensorLabel}.`);
  } else {
      // Update the chart for the specific sensor
      updateChart(sensorLabel, idToDisplay);
  }
});
}

// TIMESTAMP FORMATTING (00:00:00) /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function formatTimestamp(timestamp) {
const date = new Date(timestamp);
return date.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', second: '2-digit' });
}

// WATER LVL VALUE CONVERTION // Called in LINE 68///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function getValueFromLabel(label) {
if (label === 'Low') {
  return 100;
} else if (label === 'Medium') {
  return 200;
} else if (label === 'High') {
  return 300;
}
}

// Helper functions to manage data indices for different sensors////////////////////////////////////////////////////////////////////////////////////////////////////////
function getSensorDataIndex(sensorLabel) {
if (sensorLabel === 'Gas Sensor') {
  return gasDataIndex;
} else if (sensorLabel === 'Smoke Sensor') {
  return smokeDataIndex;
} else if (sensorLabel === 'Water Sensor') {
  return waterDataIndex;
}
}

// Call the function to initialize the gas chart on page load //////////////////////////////////////////////////////////////////////////////////////////////////////////
updateChart('Gas Sensor', userID);
updateChart('Smoke Sensor', userID);
updateChart('Water Sensor', userID);

// Kapag 'updateChart()'' ang tinawag, empty graph ang ididisplay. Kapag yung 'fetchDataAndUpdateChart()' ang tinawag, chart na may laman from data.json, so kapag walang
// laman ang json file, walang madidisplay, kahit empty graph wala.

</script>
  <?php
  require_once 'footer.php';
  ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
  
  <!-- Include the Bootstrap JS and your custom script -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Initialize the carousel when the page loads
    document.addEventListener("DOMContentLoaded", function () {
      var carousel = new bootstrap.Carousel(document.getElementById("heroCarousel"), {
        interval: 5000, // Set the time delay in milliseconds (e.g., 5000 ms = 5 seconds)
        pause: "hover", // Pause the carousel on hover
      });
    });
  </script>

</body>

</html>