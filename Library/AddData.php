<?php

class AddData extends DataBase
{   public static function insertData($input,$table_coloum,$table_name)
    {
        $servername = AddData::$servername;
        $dbname = AddData::$dbname;
        $password_database = AddData::$password_database;
        $username_database = AddData::$username_database;
        $input = explode(",",$input);
        //converting "ram,shyam,raghu" to ":ram,:shyam,:raghu"
        $parameter_value = explode(",",$table_coloum);
        $table_coloum_value = "";
        $position=1;
        $i = 0;
        while($position)
        {
            $table_coloum_value .= ":".$parameter_value[$i].",";
            $i++;
            $position++;
            $position= stripos($table_coloum,",",$position);
            if ($position==false)
                break;

        }
        // for removing that last ',' from string
        $table_coloum_value =  substr($table_coloum_value, 0, strlen($table_coloum_value) - 1);
        $parameter =  explode(",",$table_coloum_value);
        //Uploading DATA TO DATABASE
            try {

                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username_database, $password_database);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO `".$table_name."` ($table_coloum)
                                VALUES ($table_coloum_value)"; //will be written in  ":ram,:shyam,:raghu"
                $query =$conn->prepare($sql);

                for($i=0;$i<count($parameter_value);$i++)
                    $query->bindParam($parameter[$i], $input[$i]);

                $query->execute();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
            $conn = null;

    }


    public static function createTable($table_coloum,$table_name)
    {
            //creating table
        $servername = AddData::$servername;
        $dbname = AddData::$dbname;
        $password_database = AddData::$password_database;
        $username_database = AddData::$username_database;
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username_database  , $password_database);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "CREATE TABLE IF NOT EXISTS`".$table_name."` ( ".$table_coloum." )";
            $conn->exec($sql);
            }
        catch(PDOException $e)
        {
           echo $e->getMessage();
        }

        $conn = null;
    }
    public static function userTable($user_id)
    {
        $servername = AddData::$servername;
        $dbname = AddData::$dbname;
        $password_database = AddData::$password_database;
        $username_database = AddData::$username_database;

        $table_name = 100;
        while(true)
        {
            if ($table_name>=$user_id)
                break;
            else
                $table_name = $table_name+100;

        }
        //creating table
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username_database, $password_database);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "CREATE TABLE `".$table_name."` ( `".$user_id."` VARCHAR(11) NULL )";
            $conn->exec($sql);
            return $table_name;
            }
        catch(PDOException $e)
        {
            $user_minus_one = $user_id-1;
            $table_exists = $e->getMessage();
            $string = "SQLSTATE[42S01]: Base table or view already exists: 1050 Table '".$table_name."' already exists";
            // if table exists than add column to it
            if ($table_exists == $string)
            {

                try {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username_database, $password_database);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "ALTER TABLE `$table_name` ADD `$user_id` VARCHAR(11) NULL after `".$user_minus_one."`";
                    $query =$conn->prepare($sql);
                    $query->execute();
                }
                catch(PDOException $e)
                {
                    echo $e->getMessage();
                }
                $conn = null;
            }else
                echo $e->getMessage();
        }

        $conn = null;
    }






}
?>
