<?php
require 'Resources/UpdateExploredSongs.php';
if(!isset($_SESSION['user'])){
$_SESSION['msg'] = "<span style='color:red'><br>PLease Log In before continuing</span>";
header('Location:LogIn.php');
die('Please Log In');
}

spl_autoload_register(function($class){
    require_once "Library/{$class}.php";
});
$table_name = 100;
while(true)
{
    if ($table_name>=$_SESSION['user']['id'])
        break;
    else
        $table_name = $table_name+100;

}
$array = FetchData::fetchOther('`'.$_SESSION['user']['id'].'` FROM `'.$table_name.'`');
$num = count($array);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Your Songs List || Itari </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="Images/Favicon.png">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="CSS/Form Styling.css">
<link rel="stylesheet" href="CSS/Footer.css">
<link rel="stylesheet" href="CSS/Header.css">
<link rel="stylesheet" href="CSS/ExploredSongs.css">
<script src="JS/Same Code for every page.js"></script>
<script src="JS/UpdateExploredSongs.js"></script>
</head>
<body>
<?php require 'Header.php'?>
<!-- SAME UPTO HERE FOR EVERY PAGE -->
<div align="center">
<?php

for($i = 0; $i<$num;$i++){
  if (!empty($array[$i][$_SESSION['user']['id']]))
  echo '<iframe width="40%" height="320" src="https://www.youtube.com/embed/'.$array[$i][$_SESSION['user']['id']].'?iv_load_policy=3;showinfo=0;rel=0&amp;" frameborder="0" allowfullscreen></iframe><br/>';
}
?>
</div>


</body>
</html>
