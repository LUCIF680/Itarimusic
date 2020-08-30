function checkSignIn(){
	var temp=document.getElementsByName('psw')[0].value;
	var temptwo=document.getElementsByName('email')[0].value;


	if ((temp=="")||(temptwo==""))
	{
		document.getElementById("error").innerHTML="Fill the form";
		return false;
	}
		if(temptwo.length<8)
	{
		document.getElementById("error").innerHTML="Password must be greater than 8 charecters";
		return false;
	}else if(temptwo.length>63){
	  document.getElementById("error").innerHTML="<br>Password must be less than 63 charecters";
	  return false;
	  }

	return true;
	}
