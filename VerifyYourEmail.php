<?php session_start();
spl_autoload_register(function($class){
    require_once "Library/{$class}.php";
});
?>
<!DOCTYPE html>
<html>
<head>
<?php
    //Checking Wether user is already logged In?
    if (isset($_SESSION['user']))
    header('Location:Home.php');

    if (isset($_SESSION['msg'])){
    $msg = $_SESSION['msg'];
    }else
    $msg = "";


        $email=$_SESSION['email'];
            if (!empty($_POST))
            {
                    if ($_POST['otp']==$_SESSION['realotp'])
                    {   unset($_SESSION['realotp']);
                            header($_SESSION['redirect']);
                        }else
                            $msg = "<br/>Wrong OTP";

                 }else
            {
                $msg = "";
                //sending otp
                $mail = new Mail;
                $_SESSION['realotp'] = $mail->sendOTP($email);
            }
?>
<meta charset="ISO-8859-1">
<title>Sign Up || Itari-Music</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="Images/Favicon.png">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="CSS/VerifyYourEmail.css">
<link rel="stylesheet" href="CSS/Header.css">
<script src="JS/CheckOTP.js"></script>


</head>
<body>
 <div class="menu_bar">
 <div class="menu_bar1">
<span class="name_of_website"><a href="Home.php" style="text-decoration: none;">Itari Music</a></span>
 </div>
 </div>

<div class="sign_up">

<a href="SignUp.php"><span>Back</span></a>
<p>Please Verify your Email</p>
<form action="VerifyYourEmail.php" method="post">
<input type="text" id="otp" placeholder="ENTER OTP" name="otp" >
<?php echo "<span style='color:red;font-size:80%'>".$msg."<br/>Verification Code has been send to ".$email."<br/>Please Check your SPAM folder also</span>"?>
<div id="error"></div>
<div align="center">
<br/>
<input type="submit" value="Continue" onclick="return check()"/>
</div>
</form>
</div>
</body>
</html>
