<?php
spl_autoload_register(function($class){
    require_once "Library/{$class}.php";
});
if ((isset($_COOKIE['ref']))&&(!isset($_SESSION['user'])))
//if user has already visited other page than no need to connect to database
{
    $id_refid = FetchData::fetchWhere("id,ref_id","refrence",$_COOKIE['ref'],"online");
    $user = FetchData::fetchWhere("*","id",$id_refid[0]['id'],"users");
    $_SESSION['user'] = $user[0];
    $_SESSION['user']['refrence'] = $_COOKIE['ref'];
    $_SESSION['user']['ref_id'] = $id_refid[0]['ref_id'];

}
?>
<div>
<div class="menu_bar">
<div class="menu_bar1">
<a href="Home.php" style="text-decoration: none;"><span class="name_of_website">Itari Music</span></a>

        <div class="menu_div" style="margin-right:5%;	margin-top:0.7%;" >
                  <span >More</span>
                          <div class="menu_div-content">
                            <a href="Contact_us.php">Contact</a>
                            <a href="Service_Policy.php">Service Policy</a>
                            <a href="FAQs.php">FAQs</a>
                          </div>
        </div>

<?php
if (isset($_COOKIE['ref'])&&(isset($_SESSION['user'])))
{   $user = $_SESSION['user'];
    if (($_COOKIE['ref']==$_SESSION['user']['refrence']))
                    {
                        echo '
                        <div class="menu_div" style="margin-right:5%;	margin-top:0.7%;" >
                          <span >'.$_COOKIE["name"].'</span>
                          <div class="menu_div-content">
                            <a href="ExploredSongs.php">Explored Songs</a>
                            <a href="Songs.php">Listen Songs</a>
                            <a href="Account.php">Account Setting</a>
                            <a href="Logout.php">Log Out</a>
                          </div>
                        </div>';

                    }
}else{
    echo '<span class="menu_div" style="margin-right:1.2%;	margin-top:0.7%;"onclick="openSignUp()">Sign Up</span><span class="menu_div" style="margin-right:1.2%;	margin-top:0.7%;"onclick="openLogIn()">Log In</span>';
        }
?>
<a href="Home.php#about"><div class="menu_div" style="margin-right:1.2%;	margin-top:0.7%;" >About</div></a>
<a href="mission.php#pricing"><div class="menu_div" style="margin-right:1.2%;	margin-top:0.7%;" >Donate</div></a>
<a href="mission.php"><div class="menu_div" style="margin-right:1.2%;	margin-top:0.7%;" >Our Mission</div></a>

<!--<span style="float:right;margin-right:5%;margin-top:0.9%;cursor: pointer;"><a href="Upload.php"><i class="fa fa-cloud-upload" style="font-size:32px;color:white"></i></a></span>-->

</div>
</div>

						<!-- LOG IN DIV -->
						<div id="log_in_div" class="modal">


						  <!-- Modal Content -->

						  <form class="modal-content animate" action="LogIn.php" method="post">
						    <span onclick="closeLogIn()" class="close" title="Close LogIn">&times;</span>
						    <div class="imgcontainer">
						      <p>Log In</p>
						      <p>-----------------</p>
						    </div>

						    <div class="container" align="center">
						      <input type="email" placeholder="Enter Email"  name="email" required>
							  <br/>


							 <span>
							 <input id="log_in_pas" type="password" placeholder="Enter Password" name="psw" required> <span class="eye" onclick="toggleEye()"></span>
							</span>

							<div style="color:red" id="error"></div><br>
							  <div align="center">
						      <button type="submit" onclick="return checkSignIn()">Login</button>
						      </div>


						    </div>

						    <div class="container" style="background-color:#f1f1f1">
						      <button type="button" onclick="document.getElementById('log_in_div').style.display='none'" class="lowerbtn"style="background-color: #f44336;">Cancel</button>
						      <button type="button" onclick="goToSignUp()" class="lowerbtn" style="background-color: grey;">Sign Up</button>
						      <span class="psw"><a href="NeedHelp.php">Need Help?</a></span>
						    </div>
						  </form>
						</div>



						<!--SIGN UP DIV -->



						<div id="sign_up_div" class="modal">
										<form action="SignUp.php" class="modal-content animate" method="post">
										<span onclick="closeSignUp()" class="close" title="Close Sign Up">&times;</span>
										<div class="imgcontainer">
									      <p>Register With us</p>
									      <p>-----------------</p>
									    </div>
									   <div class="container" align="center">
						      <input type="text" placeholder="Your Name"  name="name" required>
						      <input type="email" placeholder="Your Email Address"  name="email" required>

						     <input type="password" placeholder="Enter Password" name="psw" required>

							  <input  type="password" placeholder="Confirm Password" name="con_psw" required>

								<div id="errors" style="color:red"></div>
								<p>By Clicking Sign Up you Agree our Term's and Conditions..<a href="Service_Policy.php" style="color:blue">Read More</a></p>
								<br/><br/><div align="center">
						      <button type="submit" onclick="return checkTheSignUp()" >Sign Up</button>
								<script>
                                        	function checkTheSignUp(){
                                        	var temp=document.getElementsByName('psw')[1].value;
                                        	var temptwo=document.getElementsByName('con_psw')[0].value;

                                        	if ((temp=="")||(temptwo==""))
                                        	{
                                        		document.getElementById("errors").innerHTML="Fill the form";
                                        		return false;
                                        	}
                                        		if(temp.length<8)
                                        	{
                                        		document.getElementById("errors").innerHTML="Password must be greater than 8 charecters";
                                        		return false;
                                        	}
                                        		if (temp!=temptwo)
                                        		{
                                        			document.getElementById("errors").innerHTML="Password didn't match";
                                        			return false;
                                        		}

                                        	return true;
                                        	}</script>
                                        						      </div>
							    </div>

						    <div class="container" style="background-color:#f1f1f1">
						      <button type="button" onclick="document.getElementById('sign_up_div').style.display='none'" class="lowerbtn" style="background-color: #f44336;">Cancel</button>
						      <button type="button" onclick="goToLogIn()" class="lowerbtn" style="background-color: grey;">Log In</button>
						    </div>
										</form>
										</div>
