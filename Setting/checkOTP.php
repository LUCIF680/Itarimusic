<?php session_start();
//if time excede 5 min limit than show error, error echo in line 168
if ($_SESSION["online_time"] < time())
{   unset($_SESSION["online_time"]);
    $_SESSION['massage'] = 'Time Out, Please verify your email within 5 mins';
 }
if (!isset($_SESSION['email']))
header('Location:../Account.php');
    if (!isset($_SESSION['massage']))
        $msg = "";
        else
            $msg = $_SESSION['massage'];
if (!empty($_POST))
{
    $email = $_SESSION['email'];
    unset($_SESSION['email']);
    $otp = $_POST['otp'];
    if ($_SESSION['realotp']!=$otp)
        $msg = "<br/>Enter a valid OTP";
        else{
                try{
                    //updating email in database
                    unset($_SESSION['realtop']);
                    unset($_SESSION['email']);
                    $conn = new PDO("mysql:host=localhost;dbname=itarimusic","itarimusic","googleSucks");
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "UPDATE users SET email='".$email."' WHERE id=".$_SESSION['user']['id']."";
                    $query = $conn->prepare($sql);
                    $query->execute();
                    setcookie('email',$email,time()+ (86400 * 30),"/itarimusic/");
                    $_SESSION['user']['email'] = $email;
                    header('Location:../Account.php');
                }catch(PDOException $e)
                {
                    echo "There has been an unexpected error. Please try again.";
                }
                $conn = null;
                }
            }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Change Email Address || Itari-Music</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="../Images/Favicon.png">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../CSS/VerifyYourEmail.css">
<link rel="stylesheet" href="../CSS/header.css">
<script src="../JS/CheckOTP.js"></script>



</head>
<body>

<div class="sign_up">

<a href="../Account.php"><span>Back</span></a>
<p>Please Verify your Email</p>
<form action="checkOTP.php" method="post">
<input type="text" placeholder="ENTER OTP" id="otp" name="otp" >
<?php echo "<span style='color:red;font-size:80%'>".$msg."<br/>Verification Code has been send to ".$_SESSION['email']."<br/>Please Check your SPAM folder also</span>";?>
<div style="color:blue" id="error"></div>
<div align="center">
<br/>
<input type="submit" value="Continue" onclick="return check()"/>
</div>
</form>
</div>
</body>
</html>
