<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Frequently Asked Question:Itari </title>
<link rel="icon" href="Images/Favicon.png">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="CSS/Form Styling.css">
<link rel="stylesheet" href="CSS/Footer.css">
<link rel="stylesheet" href="CSS/FAQs.css">
<link rel="stylesheet" href="CSS/Header.css">
<script src="JS/Same Code for every page.js"></script>
<script src="JS/UpdateExploredSongs.js"></script>
<script src="JS/FAQs.js"></script>
</head>
<body>

<!-- SAME UPTO HERE FOR EVERY PAGE -->
<div class="heading" align="center">
<span>Frequently Asked Question</span>
</div>
<div class="card" onclick="showAnswer(document.getElementsByClassName('answer')[0])">
<span>Why take premium account?</span>
</div>
<div class="answer">
<span>
There are many reason to take premium account..<br/>
*More Songs and singers<br/>
*Better Supports<br/>
*Help us stay Ad-Free<br/>
*Become a Itari Supporter<br/>Go Premium
<span style="color:blue"><a href="mission.php#pricing">NOW</a></span><br/>
</span>
</div>

<div class="card" onclick="showAnswer(document.getElementsByClassName('answer')[1])">
<span>Why Absolute Plus?</span>
</div>
<div class="answer">
Our main objective is to provide songs which is easily neglected. To do that we need funding, by joining 'ABSOLUTE PLUS' we assure that we will bring more singers in our website.
</div>


<div class="card" onclick="showAnswer(document.getElementsByClassName('answer')[2])">
<span>Drawback of premium service</span>
</div>
<div class="answer">
We cannot remove ads from youtube videos.<br>
To remove youtube ads in near future help us by joining 'ABSOLUTE PLUS'. As we are using youtube services we are restricted to what youtube provides. As the platform grows so does the singers. Help us become youtube free.
</div>


<div class="card" onclick="showAnswer(document.getElementsByClassName('answer')[3])">
<span>Can you cancel the premium account?</span>
</div>
<div class="answer">
<span>
Yes.You can cancel Premium services anytime.
</span>
<br/><span>For more information feel free to <a href="Contact_us.php" style="color:blue">contact us</a></span>
</div>

<div class="card" onclick="showAnswer(document.getElementsByClassName('answer')[4])">
<span>How do I cancel the Premium Subscription</span>
</div>
<div class="answer">
<span>
  At the time being, the only way to cancel the Subscription is to go Paypal account and manually  cancel it.
  For help visit <a style="color:blue" href="https://orbitingweb.com/blog/check-active-subscriptions/">https://orbitingweb.com/blog/check-active-subscriptions/</a>
</span>
</div>



<!-- SAME FROM HERE -->
<hr/>
<?php require 'Resources/Footer.php';?>
<?php require 'Header.php';?>
</body>
</html>
