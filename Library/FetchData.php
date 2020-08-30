<?php

class FetchData extends DataBase
{   
   public static function fetch($select_element,$table_name)
    {
        $servername = AddData::$servername;
        $dbname = AddData::$dbname;
        $password_database = AddData::$password_database;
        $username_database = AddData::$username_database;
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username_database  , $password_database);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = $conn->prepare("SELECT ".$select_element." FROM `".$table_name."`");
            $query->execute();
            $result = $query->setFetchMode(PDO::FETCH_ASSOC);
            $result = $query->fetchAll();
            return $result;
        }catch(PDOException $e)
        {
            return false;
        }
        $conn = null;
        
    }
    public static function fetchWhere($select_element,$where,$where_value,$table_name)
    {
        $servername = AddData::$servername;
        $dbname = AddData::$dbname;
        $password_database = AddData::$password_database;
        $username_database = AddData::$username_database;
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username_database  , $password_database);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = $conn->prepare("SELECT ".$select_element." FROM `".$table_name."` WHERE ".$where."='".$where_value."'");
            $query->execute();
            $result = $query->setFetchMode(PDO::FETCH_ASSOC);
            $result = $query->fetchAll();
            return $result;
        }catch(PDOException $e)
        {
           echo $e->getMessage();
        }
        $conn = null;
        
    }
    public static function fetchOther($string)
    {
        $servername = AddData::$servername;
        $dbname = AddData::$dbname;
        $password_database = AddData::$password_database;
        $username_database = AddData::$username_database;
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username_database  , $password_database);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = $conn->prepare("SELECT ".$string);
            $query->execute();
            $result = $query->setFetchMode(PDO::FETCH_ASSOC);
            $result = $query->fetchAll();
            return $result;
        }catch(PDOException $e)
        {
            return false;
        }
        $conn = null;
        
    }
    
}