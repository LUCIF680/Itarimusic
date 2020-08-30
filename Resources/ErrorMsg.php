<?php
$msg = "";
if(!empty($_GET))
{   
    $error = $_GET["msg"];
    if($error=="fillform")
        $msg = "<span style='color:red;text-decoration:none'>Fill Complete Form</span><br>";
        else if($error=="email")
            $msg = "<span style='color:red;text-decoration:none'>Please enter a correct email address</span><br>";
       else if($error=="name")
           $msg =  "<span style='color:red;text-decoration:none'>Name can only contain only letters and white space</span><br>";
       else if($error=="reason")
           $msg = "<span style='color:red;text-decoration:none'>Select a reason query</span><br>";
                    
}
?>