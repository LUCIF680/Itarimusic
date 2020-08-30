<?php
session_start();
$msg = "";
if (!empty($_POST))
{
   $name_pattern = "/^[a-zA-Z ]*$/";
   $name = $_POST['Name'];
   if (!preg_match($name_pattern,$name))
   {
      $msg = "<br><span style='color:red'>Name should only contain whitespace and charecters</span>";
   }else if($name=="")
   {
       $msg = "<br><span style='color:red'>Type your name</span>";
   }else
   {
       try{
           //updating name in database
             $conn = new PDO("mysql:host=localhost;dbname=itarimusic","itarimusic","googleSucks");
             $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             $sql = "UPDATE users SET name='".$name."' WHERE id=".$_SESSION['user']['id']."";
             $query = $conn->prepare($sql);
             $query->execute();
             if (strlen($name)>10){
                 $show_name = substr($name,0,9); // if name length greater than 10 take 9 chars to show
                 setcookie("name",$show_name,time()+(86400 * 30),'/');
             }else {
               setcookie("name",$name,time()+(86400 * 30),'/');
             }
             $_SESSION['user']['name'] = $name;
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
<title>Account Setting </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="Images/Favicon.png">
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

<div class="sign_up">
Change Name
<form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
<input type="text" id="name" name="Name" placeholder="Enter a new name">
<?php echo $msg;?><br>
<div style="color:red" id="error"></div><br>
<div align="center">
<input id="submit" type="submit" value="Change" onclick="return checkName()">
</div>
</form>
</div>
</body>
</html>
