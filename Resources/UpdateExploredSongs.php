<?php
session_start();
      if ((isset($_SESSION['user']))&&(isset($_COOKIE['id']))){
      $v_id = $_COOKIE['id'];
      $user_id = $_SESSION['user']['id'];
      // counting how many video id's are their
      $num = count(explode(",",$v_id));
      //converting string to array
      $v_id = explode(",",$v_id);
      // getting the table name from user's_id
      $table_name = 100;
      while(true)
      {
          if ($table_name>=$user_id)
              break;
          else
              $table_name = $table_name+100;

      }
      $servername = "localhost";
      $username_database = "itarimusic";
      $password_database = "googleSucks";
      $dbname = "itarimusic";

      try {
          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username_database, $password_database);
          // set the PDO error mode to exception
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            foreach ($v_id as $key=>$new_vid){
            // prepare sql and bind parameters
            $stmt = $conn->prepare("INSERT INTO `100` (`$user_id`)
            VALUES (:$user_id)");
            $stmt->bindParam(':'.$user_id, $new_vid);
            echo $new_vid;
            $stmt->execute();
            $stmt = $conn->prepare("DELETE FROM  `$table_name` WHERE $new_vid LIMIT 1");
            $stmt->execute();
            }
        }
      catch(PDOException $e)
        {
        echo "Error: " . $e->getMessage();
        }
        $conn = null;
        setcookie("id","",time()-100,'/');
      }else
      // incase user is not logged in, will be used with ajax
      echo "";

?>
