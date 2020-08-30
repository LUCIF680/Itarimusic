<?php
class UpdateData extends DataBase
{
    public static function update($element,$element_value,$where_id_value,$table_name)
    {
        $servername = AddData::$servername;
        $dbname = AddData::$dbname;
        $password_database = AddData::$password_database;
        $username_database = AddData::$username_database;
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username_database  , $password_database);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE `".$table_name."` SET ".$element." ='".$element_value."' WHERE id= ".$where_id_value."";
            $query =$conn->prepare($sql);
            $query->execute();
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
        $conn = null;
    }
    public static function altColumn($string)
    {
        $servername = AddData::$servername;
        $dbname = AddData::$dbname;
        $password_database = AddData::$password_database;
        $username_database = AddData::$username_database;
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username_database  , $password_database);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "ALTER TABLE ".$string;
            $query =$conn->prepare($sql);
            $query->execute();
        }
        catch(PDOException $e)
        {
            echo "There has been an unexpected error. Please try again.";
        }
        $conn = null;
    }
    public static function delete($where,$where_value,$table_name)
    {
        $servername = AddData::$servername;
        $dbname = AddData::$dbname;
        $password_database = AddData::$password_database;
        $username_database = AddData::$username_database;
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username_database  , $password_database);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "DELETE FROM `".$table_name."` WHERE `".$where."` = '".$where_value."'";
            $query =$conn->prepare($sql);
            $query->execute();
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
        $conn = null;
    }
}
?>