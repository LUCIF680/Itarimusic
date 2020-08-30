<?php
session_start();
require 'Library/RandomString.php';
spl_autoload_register(function($class){
    require_once "Library/{$class}.php";
});
// if user is log in than go home
if(isset($_SESSION['user']))
header('Location:Home.php');
$msg="";

// for making ChangePassword.php dynamic
$_SESSION['forget_pass'] = true;

if(!empty($_POST)){
  // validating email
    if ($_POST['email']=="")
        $msg = "<span style='color:red'>Fill the form<br></span>";
        else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
            $msg = "<span style='color:red'>Enter Valid Email Address<br></span>";
    $user = FetchData::fetchWhere("*","email",$_POST['email'],"users");
    if(empty($user))
    $msg = "<span style='color:red'>Invalid Email<br></span>";
    else{
      $_SESSION["online_time"] = time()+300;//For letting user use signUp for limited time
      $_SESSION['email'] = $_POST['email'];
      $_SESSION['id'] = $user[0]['id'];
      $_SESSION['redirect'] = 'Location:Setting\ChangePassword.php';

      header('Location:VerifyYourEmail.php');
    }
}


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Reset || Itari-Music</title>
<link rel="icon" href="Images/Favicon.png">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="CSS/Need_help.css">
<link rel="stylesheet" href="CSS/Header.css">
<script src="JS/Same Code for every page.js"></script>
<script src="JS/UpdateExploredSongs.js"></script>

</head>
<body>

<div class="menu_bar">
<div class="menu_bar1">
<span class="name_of_website"><a href="Home.php" style="text-decoration: none;">Itari Music</a></span>
</div>
</div>

<div class="need_help">
<a href="<?php
if (empty($_SERVER['HTTP_REFERER']))
    echo "Home.php";
else
echo htmlspecialchars($_SERVER['HTTP_REFERER']);
?>" ><span>Back</span></a>
<span>Itari Music</span>
<p>Let's get you into your account</p>
<p>Tell us Sign-in email address to get started:</p>
<form action="NeedHelp.php" method="post">
<input type="email" required name="email" placeholder="Your Email" /><br/><br/>
<?php echo $msg?>
<span id="error"></span>
<input type="submit" value="Continue" onclick="return check()"/>

</form>

</div>



</body>
</html>
