//Close and Open of Log in/Sign Up

function openLogIn()
{
	document.getElementById('log_in_div').style.display='block';
	document.getElementsByClassName("explored_btn_span")[0].style.display='none';
	
	}
function openSignUp()
{
	document.getElementById('sign_up_div').style.display='block';
	document.getElementsByClassName("explored_btn_span")[0].style.display='none';
	document.getElementById("error").innerHTML="";
}
function closeLogIn()
{
	document.getElementById('log_in_div').style.display='none';
	document.getElementsByName("eml")[0].value="";
	document.getElementsByName("psw")[0].value="";
	document.getElementsByClassName("explored_btn_span")[0].style.display='block';
	
}
function closeSignUp()
{	document.getElementById("error").innerHTML="";
	document.getElementById('sign_up_div').style.display='none';
	document.getElementsByName('email')[0].value="";
	document.getElementsByName('name')[0].value="";
	document.getElementsByName('psw')[1].value="";
	document.getElementsByName('con_psw')[0].value="";
	document.getElementsByClassName("explored_btn_span")[0].style.display='block';

}
function goToLogIn()
{
	document.getElementById('sign_up_div').style.display='none';
	document.getElementById('log_in_div').style.display='block';
	document.getElementById("error").innerHTML="";
	}

function goToSignUp()
{
	document.getElementById('sign_up_div').style.display='block';
	document.getElementById('log_in_div').style.display='none';
	document.getElementById("error").innerHTML="";
		}


//Toogle Between show password/hide password 

function toggleEye(){	
	var tog = document.getElementById("log_in_pas");
    if (tog.type == "password") {
    	tog.type = "text";
    	document.getElementsByClassName('eye')[0].classList.add("eyeslash");
    	tog.style.width="50%";
    } else {
    	document.getElementsByClassName('eye')[0].classList.remove("eyeslash");
       	tog.type = "password";
    } 
	
		}
window.onkeyup=function(){
	document.getElementById("error").innerHTML="";
};
