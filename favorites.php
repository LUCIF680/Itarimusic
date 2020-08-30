<?php
session_start();

// redirecting to upgrade if the user is not paid Subscriber
/*if (!isset($_SESSION['user'])){
    $_SESSION['msg'] = "<h2>Please log in if you are already a member</h2>";
    header('Location:upgrade.php');
    die('upgrade');
}else{
    if ($_SESSION['user']['paid_user']==='none'){
      $_SESSION['msg'] = "<h2>Please Upgrade your plan to continue</h2>";
      header('Location:upgrade.php');
      die('upgrade');
    }
}*/
?>
