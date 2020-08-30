<?php
session_start();
$array = $_SESSION['songs'];
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
    echo $send;
    ?>
