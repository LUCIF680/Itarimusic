<?php
session_start();
// if already listen to one song than play again
if (!isset($_SESSION['songs'])){
// getting new video id
spl_autoload_register(function($class){
    require_once "Library/{$class}.php";
});

    $array = FetchData::fetch('video_id', 'yt_videos');
    $_SESSION['songs'] = $array;
    $length = count($array);
    $real_array = "";
    $send = "";
    foreach ($array as $key=>$value)
        $real_array .= $value['video_id'].",";
        $real_array =  substr($real_array, 0, strlen($real_array) - 1);
        //suffling songs
        $v_id = mt_rand(0,$length-1);
        $send .= $array[$v_id]['video_id'].",";;
        $send =  substr($send, 0, strlen($send) - 1);

}else {
  $array = $_SESSION['songs'];
  $length = count($array);
  $real_array = "";
  $send = "";
  foreach ($array as $key=>$value)
      $real_array .= $value['video_id'].",";
      $real_array =  substr($real_array, 0, strlen($real_array) - 1);
      //suffling songs
      $v_id = shuffle($array);
      $send .= $array[$v_id]['video_id'].",";;
      $send =  substr($send, 0, strlen($send) - 1);

}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Listen Songs || Itari-Music</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="Images/Favicon.png">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="CSS/Header.css">
<link rel="stylesheet" href="CSS/Form Styling.css">
<link rel="stylesheet" href="CSS/ListenSongs.css">
<script src="JS/UpdateExploredSongs.js"></script>
</head>
<body>
  <a href="Songs.php"><button class="next_video">Next Video</button></a>

  <?php require 'Header.php'?>

  <div class="video_container" align="center">
  <iframe id="<?php echo $send?>" width="60%" height="480" src="https://www.youtube.com/embed/<?php echo $send?>?autoplay=1;iv_load_policy=3;enablejsapi=1;showinfo=0;rel=0&amp;" frameborder="0" allow=autoplay allowfullscreen scrolling="no"></iframe>
</div>
<a href="Songs.php"><button style="float: right; background: rgb(147, 151, 205) none repeat scroll 0% 0%; width: 15%; margin-right: 2%;">Report Broken Video</button></a>
<script src="JS/Youtube_player.js"></script>
<!---->
</body>
</html>
