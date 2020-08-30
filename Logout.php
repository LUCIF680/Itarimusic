<?php
session_start();
spl_autoload_register(function($class){
    require_once "Library/{$class}.php";
});
if ($_SESSION["user"])
{
    UpdateData::delete("ref_id", $_SESSION['user']['ref_id'], "online");
    
session_destroy() ;
setcookie("name",$_COOKIE["name"],time()-100);
setcookie("ref","",time()-100);
setcookie("refral_irati","",time()-100);
setcookie("refral","",time()-100);

header('Location:Home.php');
}
else 
  header('Location:Home.php');

?>