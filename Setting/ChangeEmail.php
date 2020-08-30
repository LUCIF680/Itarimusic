<?php
session_start();
spl_autoload_register(function($class){
    require_once "../Library/{$class}.php";
});
    
$stop = false;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//setting msg for error occurence
if (!isset($_SESSION['massage']))
$msg = "";
else 
{
    $msg = $_SESSION['massage'];
    unset($_SESSION['massage']);
}


if (!empty($_POST))
{   $_SESSION["online_time"] = time()+300;//For letting user use signUp for limited time
    $email = $_POST['newemail'];
    $_SESSION['email'] = $email;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) //verify email address
       $msg = "<br><span style='color:red'>Enter an valid email address</span>";
    else if (filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            // Fetching data from database to check if email address already exists
            try {
                $conn = new PDO("mysql:host=localhost;dbname=itarimusic","itarimusic" , "googleSucks");
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query = $conn->prepare("SELECT email FROM users WHERE email = '".$email."'");
                $query->execute();
                $col = $query->fetchColumn();
                
            }catch(PDOException $e)
            {
                echo "There was an unexpected error please try again..";
            }
            $conn = null;
            
            
            if($col != "")
            {
                
                $msg = "<br><span style='color:red'>Email already exists</span>";
                $stop = true; // stoping php from sending mail if email already exists
            }
            //sending mail
           if ($stop == false){
           require '../vendor/autoload.php';
            $mail = new PHPMailer(true);
            try {
                $mail->IsSMTP();
                $mail->Host = 'n3plcpnl0050.prod.ams3.secureserver.net';
                $mail->SMTPSecure = 'ssl';
                $mail->Username = 'help@itarimusic.com';
                $mail->Password = 'ProtonMail.com@157';
                $mail->Port = 465;
                $mail->SMTPAuth = true;

                $mail->setFrom('help@itarimusic.com', 'Itari-Music');
                $mail->addAddress($email);
                $realotp=mt_rand(100000,999999);
                $_SESSION['realotp']=$realotp;     //Will be used next page for otp verification
                
                
                
                $mail->isHTML(true);
                $mail->Subject = 'Authorize log-in';
                $mail->Body    = '<span style="background:rgb(66,64,61);color:white;font-size:150%;padding:4%">Your Verification code is: '.$realotp.'</span>';
                $mail->AltBody = 'Your Verification code is: '.$realotp;
                
                $mail->send();
                header('Location:checkOTP.php');
            }catch (Exception $e) { //if any error occur go back to SignUp.php
                $e->getMessage();
                header('Location:../Account.php');
            }

       }
     

        
    }else if($email==""){
        $msg = "<br><span style='color:red'>Type your email</span>";
    }
            
    
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Account Setting </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="../Images/Favicon.png">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../CSS/Form Styling.css">
<link rel="stylesheet" href="../CSS/Header.css">
<link rel="stylesheet" href="../CSS/SignUp.css">
<link rel="stylesheet" href="../CSS/ChangeName.css">
<script src="../JS/Same Code for every page.js"></script>
<script src="../JS/AccountSetting.js"></script>
</head>
<body>
<div class="menu_bar">
<div class="menu_bar1">
<span class="name_of_website"><a href="../Home.php" style="text-decoration: none;">itari music</a></span>
</div>
</div>


<div class="sign_up">
Change Your Email Address
<form action="ChangeEmail.php" method="post">
<input type="email" id="email" name="newemail" placeholder="Enter a new email">
<?php echo $msg;?><br>
<div style="color:red" id="error"></div><br>
<div align="center">
<input id="submit" type="submit" value="Change" onclick="return checkemail()">
</div>
</form>
</div>
</body>
</html>
