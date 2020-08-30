<?php session_start();
spl_autoload_register(function($class){
    require_once "Library/{$class}.php";
});
?>
<!DOCTYPE html>
<html>
<head>

<?php if (isset($_SESSION['user'])) //Checking Wether user is already logged In?
    header('Location:Home.php');
$_SESSION['redirect'] = 'Location:RegistrationDone.php';
    //For letting user use signUp for limited time
    $_SESSION["online_time"] = time()+300;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
$name = $_POST["name"];
if (strlen($_SESSION['name'])>10){
            $show_name = substr($name,0,9); // if name length greater than 10 take 9 chars to show
            setcookie("name",$show_name,time()+(86400 * 30));
        }else {
          setcookie("name",$name,time()+(86400 * 30));
        }
$email = $_POST["email"];
$password = $_POST["psw"];
$con_password = $_POST["con_psw"];
$check_email = false;
        // Fetching data from database to check if email address already exists
            try {
                $conn = new PDO("mysql:host=localhost;dbname=itarimusic","itarimusic" , "googleSucks");
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query = $conn->prepare("SELECT email FROM users WHERE email = '".$email."'");
                $query->execute();
                $col = $query->fetchColumn();

            }catch(PDOException $e)
            {
                echo $e->getMessage();
            }
            $conn = null;


        if($col != "")
        {

            $check_email = true;
        }

        //Validating user's info before processing
        $data = new ValidUser;
        $user_info = $data->checkSignUp($name,$email,$password,$con_password,$check_email);
        if ($user_info)
        {
            $_SESSION['temp'] = true; //For letting user use VerifyYourEmail page
            $_SESSION["email"] = $email;
            $_SESSION['name']=$name;
            $_SESSION['password']=$password;
            header("Location:VerifyYourEmail.php");
         }
}
if (!isset($_SESSION['msg']))
    $msg="";
    else
    {
        $msg = $_SESSION['msg'];
        unset($_SESSION['msg']);
    }


?>


<meta charset="ISO-8859-1">
<title>Sign Up || Itari-Music</title>
<meta name="Description" content="Create an account and save all the songs that you watched">
<link rel="icon" href="Images/Favicon.png">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="CSS/SignUp.css">
<link rel="stylesheet" href="CSS/Header.css">
<script src="JS/SignUp_php.js"></script>
</head>
<body>
<div class="menu_bar">
<div class="menu_bar1">
<span class="name_of_website"><a href="Home.php" style="text-decoration: none;">Itari Music</a></span>
</div>
</div>

<div class="sign_up">

<a href="LogIn.php"><span>Sign In</span></a>
<span>Itari Music</span>
<p>Register With us</p>
<p>-----------------</p>
<form action="SignUp.php" method="post" >
<input type="text" placeholder="Your Name"  name="name" required>
<input type="email" placeholder="Your Email Address"  name="email" required >
<input type="password" placeholder="Enter Password" name="psw" required>
<input  type="password" placeholder="Confirm Password" name="con_psw" required>
<br/>
 <div style="color:red" id="error">
</div>
<p>By Clicking Sign Up you Agree our Term's and Conditions..<a href="Service_Policy.php" style="color:blue">Read More</a></p>
 <?php echo $msg?>


<div align="center">
<button type="submit" onclick="return checkSignUp()">Sign Up</button>

</div>
</form>



</div>
</body>
</html>
