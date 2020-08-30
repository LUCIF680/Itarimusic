<?php
class ValidUser
{
    public static function checkSignUp($name,$email,$password,$con_password,$check_email)
    {   $name_pattern = "/^[a-zA-Z ]*$/";
        if (($name=="")||($email=="")||($password=="")||($con_password==""))
            $_SESSION['msg'] = "<span style='color:red'>Fill the form</span>";
            else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
                $_SESSION['msg'] = "<span style='color:red'>Enter Valid Email Address</span>";
                else if (!preg_match($name_pattern,$name))
                    $_SESSION['msg'] = "<span style='color:red'>Name should only contain whitespace and charecters</span>";
                    else if(strlen($password)<8)
                        $_SESSION['msg'] = "<span style='color:red'>Password Should be greater than 8 charecters</span>";
                        else if (strlen($password)>63)
                            $_SESSION['msg'] = "<span style='color:red'>Password Should be less than 63 charecters</span>";
                        else if($password!=$con_password)
                            $_SESSION['msg'] = "<span style='color:red'>Password didn't matched</span>";
                            else if ($check_email)
                                $_SESSION['msg'] = "<span style='color:red'>Email already exists</span>";
                            else {
                                return true;
                            }
    }
  public static  function checkPassword($password,$con_password,$old_password)
    {   
    if (($old_password=="")||($password=="")||($con_password==""))
        $_SESSION['msg'] = "<span style='color:red'>Fill the form</span>";
                else if(strlen($password)<8)
                    $_SESSION['msg'] = "<span style='color:red'>Password Should be greater than 8 charecters</span>";
                    else if (strlen($password)>63)
                        $_SESSION['msg'] = "<span style='color:red'>Password Should be less than 63 charecters</span>";
                        else if($password!=$con_password)
                            $_SESSION['msg'] = "<span style='color:red'>Password didn't matched</span>";
                                else {
                                    return true;
                                }
    }
}
?>