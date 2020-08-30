 <?php
 session_start();
 if (isset($_SESSION['user']))
 {
     $email=$_SESSION['user']['email'];
     $name=$_COOKIE['name'];
     $password='**********';
 }
 else
    header("Location:Home.php");
    ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Account Setting </title>
<link rel="icon" href="Images/Favicon.png">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="CSS/Form Styling.css">
<link rel="stylesheet" href="CSS/Header.css">
<link rel="stylesheet" href="CSS/AccountSetting.css">
<script src="JS/Same Code for every page.js"></script>
<script src="JS/AccountSetting.js"></script>
<script src="JS/UpdateExploredSongs.js"></script>
</head>
<body>
<!-- Main Containt -->
<div class="main_content">
<p>Name : <?php echo $name ?><a href="Setting/ChangeName.php" class="edit"></a></p>
<p>Email : <?php echo $email ?><a href="Setting/ChangeEmail.php" class="edit" ></a></p>
<p>Password : <?php echo $password ?><a href="Setting/ChangePassword.php" class="edit" ></a></p>
</div>

<!-- Sidebar -->
<div class="sidebar">
<div>
<a href="Account.php">Account Settings</a>
</div>
<!--<div>
<a href="security.php">Security Settings</a>
</div>-->
<div>
<a href="Upgrade.php">Upgrade</a>
</div>
<div>
<a href="Contact_us.php">Contact Us</a>
</div>
</div>
<?php require 'Header.php';?>
</body>
</html>
