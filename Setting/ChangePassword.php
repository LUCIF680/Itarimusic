<?php
session_start();
spl_autoload_register(function($class){
    require_once "../Library/{$class}.php";
});
// if no msg than msg=""
if (!isset($_SESSION['massage']))
$msg = "";
else
{
    $msg = $_SESSION['massage'];
}
if (isset($_SESSION["online_time"])){
  if ($_SESSION["online_time"] < time())
  {
      $error = 'Time Out, Please verify your email within 5 mins';

  }
  unset($_SESSION['redirect']);
  unset($_SESSION['email']);
  unset($_SESSION["online_time"]);
  unset($_SESSION['realotp']);
}else{
if ((!empty($_POST))&&(!isset($_SESSION['forget_pass'])))
    {
      $old_password = $_POST['old_pass'];
        $new_password = $_POST['pass'];
        //checking user's input is in correct format
        $check = ValidUser::checkPassword($new_password,$_POST['con_pass'],$old_password);
        //hashing user password
        $new_password = password_hash($new_password, PASSWORD_BCRYPT);
        //fetching data
        $user = FetchData::fetch("password","users");
        // checking user info
        for ($i=0;$i<count($user);$i++)
        {
            if (password_verify($old_password, $user[$i]['password']))
            {
                //updating user new password to database
                UpdateData::update("password",$new_password,$_SESSION['user']['id'],"users");
                $msg ="<span style='color:red'><br>Password is Changed<span>";
                break;
            }else
                $msg = "<br/>Invalid Password, Enter Correct Password to change it";
        }
        // it is for user who has forget their password
    }else if ((!empty($_POST))&&(isset($_SESSION['forget_pass']))){
      $new_password = $_POST['pass'];
      $check = ValidUser::checkPassword($new_password,$_POST['con_pass']," ");
      $new_password = $_POST['pass'];
      //checking user's input is in correct format
      $check = ValidUser::checkPassword($new_password,$_POST['con_pass']," ");
      //hashing user password
      $new_password = password_hash($new_password, PASSWORD_BCRYPT);
      //fetching data
      $user = FetchData::fetch("password","users");

              //updating user new password to database
              UpdateData::update("password",$new_password,$_SESSION['id'],"users");
              unset($_SESSION['id']);
              $_SESSION['msg'] = "<span style='color:red'><br>Password is Changed<span>";
              header('Location:../LogIn.php');

    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Change Your Password </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="Images/Favicon.png">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../CSS/Form Styling.css">
<link rel="stylesheet" href="../CSS/Header.css">
<link rel="stylesheet" href="../CSS/SignUp.css">
<link rel="stylesheet" href="../CSS/ChangeName.css">
<script src="../JS/Same Code for every page.js"></script>
<script src="../JS/ChangePassword.js"></script>


</head>
<body>
<div class="menu_bar">
<div class="menu_bar1">
<span class="name_of_website"><a href="../Home.php" style="text-decoration: none;">itari music</a></span>
</div>
</div>

<div class="sign_up">
Change Password<br/><br/>
<form action="ChangePassword.php" method="post">
  <?php
    if(!isset($_SESSION['forget_pass']))
    echo '<input type="password" id="old_pass" name="old_pass" placeholder="Enter Old Password"/>';
  ?>

<input type="password" id="pass" name="pass" placeholder="Enter New Password"/>
<input type="password" id="con_pass" name="con_pass" placeholder="Confirm Password"/>
<?php echo $msg;?><br>
<div style="color:red" id="error"></div><br>
<div align="center">
<input id="submit" type="submit" value="Change" onclick="return checkPass()">
</div>
</form>
</div>
</body>
</html>
