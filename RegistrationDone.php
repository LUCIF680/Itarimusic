<?php session_start();
require 'Library/RandomString.php';
spl_autoload_register(function($class){
    require_once "Library/{$class}.php";
});

$error = "";
$show_name = "";
if(isset($_SESSION['user'])){
    header('Location:Home.php');
        die("Your are already logged in.");
  }


   //if time excede 5 min limit than show error, error echo near end of the page
    if ($_SESSION["online_time"] < time())
    {
        $error = 'Time Out, Please verify your email within 5 mins';

    }else            //For letting user use signUp for 5 mins
    {

        $ref = random_string(63);// the real one
        $refral_irati = random_string(63);//fake one
        $refral = random_string(63); // fake one
        $ref_id =  random_string(11);

        // creating cookie
        setcookie('ref',$ref,time()+(86400 * 30));
        setcookie('refral_irati',$refral_irati,time()+(86400 * 30));
        setcookie('refral',$refral,time()+(86400 * 30));


        $enc_pass = password_hash($_SESSION['password'], PASSWORD_BCRYPT);

        //adding data to database
        AddData::insertData("".$_SESSION['name'].",".$_SESSION['email'].",".$enc_pass.",none","name,email,password,paid_user","users");
        //fetching user from database
        $user = FetchData::fetchWhere("*","email",$_SESSION['email'],"users");
        $_SESSION['user'] = $user[0];

        // creating table for user 1-100 gets table_name=100 101-200 gets 200 and so on
        $table_name = AddData::userTable($_SESSION['user']['id']);
        // if table exists than next step will not work
        // column is added in userTable();
        AddData::insertData($_SESSION['user']['id'], 'id', $table_name);

        //adding refrence to "online" table
        AddData::insertData($_SESSION['user']['id'].",$ref,$ref_id","id,refrence,ref_id","online");
        $_SESSION['user']['refrence'] = $ref;
        $_SESSION['user']['ref_id']=$ref_id;
        $_SESSION['user']['paid_user'] = false;
        unset($_SESSION['email']);
        unset($_SESSION['password']);

             }



?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Sign Up || Itari-Music</title>
<link rel="icon" href="Images/Favicon.png">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="CSS/VerifyYourEmail.css">
<link rel="stylesheet" href="CSS/Header.css">
<link rel="stylesheet" href="CSS/Upgrade.css">
<link rel="stylesheet" href="CSS/Form Styling.css">
<script src="JS/Same Code for every page.js"></script>
</head>
<body>
<div>
<div class="menu_bar">
<div class="menu_bar1">
<span class="name_of_website"><a href="Home.php" style="text-decoration: none;">Itari Music</a></span>
 <?php
if ($error=="")
{
    echo '
<div class="menu_div" style="margin-right:5%;	margin-top:0.7%;" >
  <span >'.$_COOKIE["name"].'</span>
  <div class="menu_div-content">
    <a href="ExploredSongs.php">Explored Songs List</a>
    <a href="Channel">Channel</a>
    <a href="Account.php">Account Setting</a>
    <a href="Logout.php">Log Out</a>
  </div>
</div>';
}
?>
<a href="Support_us.php" style="text-decoration:none"><span class="menu_div" style="margin-right:0.5%;margin-top:0.7%;">Support Us</span></a>
<span style="float:right;margin-right:5%;margin-top:0.9%;cursor: pointer;"><a href="Upload.php"><i class="fa fa-cloud-upload" style="font-size:32px;color:white"></i></a></span>
</div>
</div>

						<!-- LOG IN DIV -->
						<div id="log_in_div" class="modal">


						  <!-- Modal Content -->

						  <form class="modal-content animate" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
						    <span onclick="closeLogIn()" class="close" title="Close LogIn">&times;</span>
						    <div class="imgcontainer">
						      <p>Log In</p>
						      <p>-----------------</p>
						    </div>

						    <div class="container" align="center">
						      <input type="email" placeholder="Enter Email"  name="eml" required>
							  <br/>


							 <div>
							 <input id="log_in_pas" type="password" placeholder="Enter Password" name="psw" required> <span class="eye" onclick="toggleEye()"></span>
							</div>

								<br/><br/>

							  <div align="center">
						      <button type="submit">Login</button>
						      </div>

						      <label>
						        <input type="checkbox" name="Don't Stay Logged In"> Don't Stay Logged In
						      </label>
						    </div>

						    <div class="container" style="background-color:#f1f1f1">
						      <button type="button" onclick="document.getElementById('log_in_div').style.display='none'" class="lowerbtn"style="background-color: #f44336;">Cancel</button>
						      <button type="button" onclick="goToSignUp()" class="lowerbtn" style="background-color: grey;">Sign Up</button>
						      <span class="psw"><a href="NeedHelp.php">Need Help?</a></span>
						    </div>
						  </form>
						</div>



						<!--SIGN UP DIV -->



						<div id="sign_up_div" class="modal">
										<form action="Resources/Registration/SignUpVer.php" class="modal-content animate" method="post">
										<span onclick="closeSignUp()" class="close" title="Close Sign Up">&times;</span>
										<div class="imgcontainer">
									      <p>Register With us</p>
									      <p>-----------------</p>
									    </div>
									   <div class="container" align="center">
						      <input type="text" placeholder="Your Name"  name="name" required>
						      <input type="email" placeholder="Your Email Address"  name="email" required>

						     <input type="password" placeholder="Enter Password" name="psw" required>

							  <input  type="password" placeholder="Confirm Password" name="con_psw" required>

								<div id="error"></div>
								<p>By Clicking Sign Up you Agree our Term's and Conditions..<a href="Service_Policy.php" style="color:blue">Read More</a></p>
								<br/><br/><div align="center">
						      <button type="submit" onclick="return checkSignUp()" >Sign Up</button>
						      </div>
							    </div>

						    <div class="container" style="background-color:#f1f1f1">
						      <button type="button" onclick="document.getElementById('sign_up_div').style.display='none'" class="lowerbtn" style="background-color: #f44336;">Cancel</button>
						      <button type="button" onclick="goToLogIn()" class="lowerbtn" style="background-color: grey;">Log In</button>
						    </div>
										</form>
										</div>

</div>
<div>
 <?php
if ($error=="")
{
    echo "<span style='position:absolute;left:40%;top:15%;'>
           Welcome! ".$_SESSION['name']." to Itari-Music";
    echo '</span>';
    unset ($_SESSION['name']);
    echo " Coming Soon.........
    <div class='table_body'>
<table>
       <tr>
          <th>
     		FREE
          </th>
               <th>
     		ANNUAL PLUS
          </th>
            <th>
     		PLUS
          </th>
          <th>
     		ABSOLUTE PLUS
          </th>

       </tr>
       <tr>
       		<td>
       		-Get list of all songs that you heard<br>
       		</td>
       		<td>
       		-Upload Unlimited Videos<br>
       		-Get list of all songs that you heard<br>
       		-Help Us run Itari Services<br>
       		-Remove Ads from website<br>
       		</td>
       		<td>
       		-Upload Unlimited Videos<br>
       		-Get list of all songs that you heard<br>
            -Get Non-Stop Music for One year<br>
       		-Help Us run Itari Services<br>
       		-Remove Ads from website<br>
       		</td>
       		<td>
       		-Upload Unlimited Videos<br>
       		-Get list of all songs that you heard<br>
            -Get Non-Stop Music for One year<br>
       		-Get Itari-Music ANNUAL Plus Supporter Batch<br>
       		-Help Us run Itari Services<br>
            -Help Us bring more singers in our website.<br>
       		-Remove Ads from website<br>
       		</td>
       </tr>

       <tr>
       		<td class='button'>
       		<button>FREE</button>
       		</td>
       		<td class='button'>
       		<button>0.03 USD /mo </button>
       		</td>
       		<td class='button'>
       		<button>0.02 USD /mo</button>
       		</td>
       		<td class='button'>
       		<button>10 USD /mo</button>
       		</td>
       </tr>
</table>
";

}else
    echo $error."<a href='SignUp.php'><span style='color:blue'>Try again</span></a>"; //if time excede 5 min limit than show error
?>
</div>
</body>
</html>
