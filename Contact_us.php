<?php session_start();
spl_autoload_register(function ($class){
    require_once "Library/{$class}.php";
});
    //error msg
    if (!isset($_SESSION['msg']))
        $msg="";
        else
        {
            $msg = $_SESSION['msg'];
            unset($_SESSION['msg']);
        }


if(isset($_SESSION['user']))
{
    $alreadymember = "";
    $show_input = "";
    $_POST["email"] = $_SESSION['user']['email'];
    $_POST["name"] = $_SESSION['user']['name'];
}
else
{  $show_input=
    "Name:
    <input type='text' id='nametext' name='name' placeholder='Your Name' required/>
    Email:
    <input type='text' id='nametext' name='email' placeholder='Your Email ID' required/>
    <br/><br/>";
    $alreadymember = "<span style='font-size:15px; color:blue; cursor:pointer;'onclick='openLogIn()'>Already a Member</span>";
}
if($_SERVER["REQUEST_METHOD"] == "POST")
{  //verifing all details
    $name_pattern = "/^[a-zA-Z ]*$/";
    $name = $_POST["name"];
    $email = $_POST["email"];
    $problem = $_POST["problem"];
    $reason = $_POST["reason"];
    if (($name=="")||($email=="")||($problem==""))
        $msg = "<span style='color:red;text-decoration:none'>Fill Complete Form</span><br>";
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            $msg = "<span style='color:red;text-decoration:none'>Please enter a correct email address</span><br>";
            else if (!preg_match($name_pattern,$name))
                $msg =  "<span style='color:red;text-decoration:none'>Name can only contain only letters and white space</span><br>";
                else if (($reason!="Transaction Query")&&($reason!="Enquiry")&&($reason!="FeedBack")&&($reason!="Subscription Query")&&($reason!="Log In Query")&&($reason!="Not Mention above"))
                    $msg = "<span style='color:red;text-decoration:none'>Select a reason query</span><br>";
                    else{
                        $complain = FetchData::fetchOther("complain_id FROM complain ORDER BY complain_id DESC LIMIT 1");
                        $complain = $complain[0]['complain_id'];
                        $complain = $complain+1;
                        //sending mail to ITARI-MUSIC CUSTOMER SERVICE
                        Mail::sendSupport($email,$name,$reason,$complain,$problem);
                        // adding new complain number to database
                        AddData::insertData("$complain,$email", "complain_id,email", "complain");
                    }
}
    ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Contact Us:Itari-Music</title>
<link rel="icon" href="Images/Favicon.png">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="CSS/Form Styling.css">
<link rel="stylesheet" href="CSS/Footer.css">
<link rel="stylesheet" href="CSS/Header.css">
<link rel="stylesheet" href="CSS/Contact_us.css">
<script src="JS/Contact_us.js"></script>
<script src='JS/Same Code for every page.js'></script>
<script src="JS/UpdateExploredSongs.js"></script>
</head>
<body>

<!-- SAME UPTO HERE FOR EVERY PAGE -->
<div class="background">
</div>
<div align="center" >
<form class="contact_us_form" action="Contact_us.php" method="post">
<p id="contactus_section">
Please Check our <a href="FAQs.php" style="text-decoration:underline">FAQs</a> Before Submiting your Query<br/> <br/>
<select name="reason">
<option class="optionmail">Select your Query </option>
<option class="optionmail">Transaction Query</option>
<option class="optionmail">Enquiry</option>
<option class="optionmail">FeedBack</option>
<option class="optionmail">Subscription Query</option>
<option class="optionmail">Log In Query</option>
<option class="optionmail">Not Mention above</option>
</select>

<br/>
<?php echo $show_input?>
How can we help:<br/><textarea name ="problem" required placeholder="Please don't provide any sensitive information like bank Pin Code.."id="nametextarea"cols="60" rows="5" style="resize: none;">
</textarea><br/>
<input type="submit" onclick="return checkContactUs()" />
<input type="reset" />
<?php echo $alreadymember?>
<br/><?php echo $msg?>
Contact Our Sonic Speeeed Customer Services <span style="color:blue">supportcare@protonmail.com</span><br/>
For Artist Support Contact Us at <span style="color:blue">supportartist@protonmail.com</span><br/>
<br/>
<span style="font-size:95%;">Your Feedback is very Important to Us</span>
</p>


</form>
</div>
<!-- SAME FROM HERE -->
<hr/>
<?php require 'Resources/Footer.php';?>
<?php require 'Header.php';?>
</body>
</html>
