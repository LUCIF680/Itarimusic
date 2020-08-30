<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
<title>Our Mission - Your Support</title>
<meta name="Description" content="">
<meta charset="UTF-8">
<link rel="icon" href="Images/Favicon.png">
<link rel="stylesheet" href="CSS/mission.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="CSS/Header.css">
<link rel="stylesheet" href="CSS/Footer.css">
<link rel="stylesheet" href="CSS/Form Styling.css">
<script src="JS/Same Code for every page.js"></script>
<script src="JS/UpdateExploredSongs.js"></script>
<script src="JS/AllBackGroundTaskHomePage.js"></script>
</head>

<!-- SAME UPTO HERE FOR EVERY PAGE -->
<?php require 'Header.php';?>
<img src="Images/mission.jpg">
<div class="image_text_div">
<h3><b>Assisting Artist and Viewer</b><br/></h3>
<span>Providing Random and new songs so, you get both new and <br/>interesting songs which you probably heard of.<br/>And Artist get the exploring audience..</span>
</div>

<!-- About Section -->
<div class="w3-container" style="padding:128px 16px" id="about">
  <h3 class="w3-center">OUR TARGET</h3>
  <p class="w3-center w3-large">500 paid Subscriber</p>
  <div class="w3-row-padding w3-center" style="margin-top:64px">
    <div class="w3-quarter">
      <i style="margin-right:11%" class="fa fa-desktop w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">More Developer</p>
      <p>More developer means better designing and a lot better security.</p>
    </div>
    <div class="w3-quarter">
      <i style="margin-right:11%" class="fa fa-heart w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">Passion</p>
      <p>More passionate to provide best service for you.</p>
    </div>
    <div class="w3-quarter">
      <i style="margin-right:11%" class="fa fa-microphone w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">More Singers</p>
      <p>As we are using youtube services we are restricted to what youtube provides. As the platform grows so does the singers. Help us become youtube free.</p>
    </div>
    <div class="w3-quarter">
      <i style="margin-right:11%" class="fa fa-cog w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">Better Support</p>
      <p>As our community grows so does our support. Support will be faster and better. For that we need your passion and help. </p>
    </div>
  </div>
</div>

<!-- Donation Section -->
<div class="w3-container w3-center w3-dark-grey" style="padding:128px 16px" id="pricing">
  <span style="float:right">*Donation is not currently available in India at this moment.</span><br><br>
<div align="center" >
  <div style="width:50%">
  <ul class="w3-ul w3-white w3-hover-shadow">
    <li class="w3-black w3-xlarge w3-padding-32">Donation</li>
    <li class="w3-padding-16"><b style="color:black">Get a chance to win big in upcoming feature</b></li>
    <li class="w3-padding-16"><b style="color:black">Help us run this service</b></li>
    <li class="w3-padding-16"><b style="color:black">More Singers and Songs</b></li>
    <li class="w3-padding-16"><b style="color:black">Itari-Music stays Ad-Free</b></li>
    <li class="w3-padding-16">
      <h2 class="w3-wide"> </h2>
      <span class="w3-opacity"><br>  <br><br></span>
    </li>
      <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
      <input type="hidden" name="cmd" value="_s-xclick">
      <input type="hidden" name="hosted_button_id" value="G5524P2DQPX5E">
      <li class="w3-light-grey w3-padding-24">
      <button onchange="submit()" class="w3-button w3-black w3-padding-large">Donate</button>
      </li>
      </form>
  </ul>
</div>
</div>
</div>
</div>
<br><br>
<!-- Subscriber section -->
<div class="w3-container w3-light-grey w3-padding-64">
  <div class="w3-row-padding">
    <div class="w3-col m6">
      <h3>Total Subscriber.</h3>
      <p>Your support is essential to keeping Itari-Music running.<br>
      Donate to stay ad-free and faster access.<br>
      Just $1 can make all the difference...</p>
    </div>
    <div class="w3-col m6">
      <p class="w3-wide"><i class="fa fa-user-plus w3-margin-right"></i>Total Subscriber</p>
      <div class="w3-grey">
        <div class="w3-container w3-dark-grey w3-center" style="width:5%">10+</div>
      </div>
      <p class="w3-wide"><i class="fa fa-dollar w3-margin-right"></i>Monthly Donation</p>
      <div class="w3-grey">
        <div class="w3-container w3-dark-grey w3-center" style="width:5%">$10+</div>
      </div>

    </div>
  </div>
</div>



<!-- SAME FROM HERE -->
<?php require 'Resources/Footer.php';?>
<?php require 'Header.php';?>

</body>
</html>
