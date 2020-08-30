<?php session_start();
spl_autoload_register(function($class){
    require_once "Library/{$class}.php";
});
require 'Library/RandomString.php';
if (isset($_SESSION['user'])) //If already loggedin than send back to home
     header('Location:Home.php');
     if (!isset($_SESSION['msg']))
         $msg="";
         else
         {
             $msg = $_SESSION['msg'];
             unset($_SESSION['msg']);
         }


           // Checking Log In Credentials
           if(!empty($_POST))
           {
              $email = $_POST['email'];
              $password = $_POST['psw'];

              //Checking Login Details
                      try{
                          $user= FetchData::fetchWhere("name,password,email,id,paid_user","email",$email,"users");
                              for ($i=0;$i<count($user);$i++)
                              {
                                  if (($user[$i]['email'] == $email)&&(password_verify($password, $user[$i]['password']) ))
                                        {
                                            $name = $user[$i]['name'];
                                            if (strlen($name)>10){
                                                $show_name = substr($name,0,9); // if name length greater than 10 take 9 chars to show
                                                setcookie("name",$show_name,time()+(86400 * 30));
                                            }else {
                                              setcookie("name",$name,time()+(86400 * 30));
                                            }
                                            $id = $user[$i]['id'];
                                            $_SESSION['user']=$user[$i];



                                            $ref = random_string(63);   // the real one
                                            $refral_irati = random_string(63);//fake one
                                            $refral = random_string(63); // fake one
                                            $ref_id =  random_string(11);
                                            AddData::insertData($ref.",".$ref_id.",".$id, "refrence,ref_id,id", "online");
                                            $_SESSION['user']['refrence']=$ref;
                                            $_SESSION['user']['ref_id']=$ref_id;
                                            $_SESSION['user']['password']="";
                                             // creating cookie so user can access after browser is closed
                                            setcookie('ref',$ref,time()+(86400 * 30));
                                            setcookie('refral_irati',$refral_irati,time()+(86400 * 30));
                                            setcookie('refral',$refral,time()+(86400 * 30));
                                            header('Location:Home.php');
                                            break;

                                          }

                              }// if not matched show msg
                               $msg="<br/><span style='color:red'>Invalid Password or Email Address</span>";


                      } catch(PDOException $e)
                      {
                          $msg = "There has been an unexpected error. Please try again.";
                      }
              $conn = null;



           }

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Log In || Itari-Music</title>
<meta name="Description" content="Create an account and save all the songs that you watched">
<link rel="icon" href="Images/Favicon.png">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="CSS/SignUp.css">
<link rel="stylesheet" href="CSS/Header.css">
<script src="JS/SignIn.js"></script>
<script src="JS/UpdateExploredSongs.js"></script>
</head>
<body>
<div class="menu_bar">
<div class="menu_bar1">
<span class="name_of_website"><a href="Home.php" style="text-decoration: none;">Itari Music</a></span>
</div>
</div>


<div class="sign_up">
<a href="SignUp.php"><span>Sign Up</span></a>
<span>Itari Music</span>
<p>Log In</p>
<p>-----------------</p>
<form action="LogIn.php" method="post" >

<input type="email" placeholder="Your Email Address"   name="email" required >
<input type="password" placeholder="Enter Password"  name="psw" required >

<?php echo $msg;?>
<div style="color:red" id="error"></div><br>
<div align="center">
<button type="submit" onclick="return checkSignIn()">Log In</button>

</div>
</form>



</div>
</body>
</html>
