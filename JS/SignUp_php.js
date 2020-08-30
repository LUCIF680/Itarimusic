function checkSignUp(){	

	var temp=document.getElementsByName('psw')[0].value;
	var temptwo=document.getElementsByName('con_psw')[0].value;
	var name=document.getElementsByName('name')[0].value;
	var pattern = /^[a-zA-Z ]*$/;
	 	if(!name.match(pattern))
		{
		 document.getElementById("error").innerHTML="Name can only contain white spaces and charecters";
			return false;
		}
	 	if ((temp=="")||(temptwo==""))
		{
		document.getElementById("error").innerHTML="Fill the form";
		return false;
		}	
		if(temp.length<8)
		{
		document.getElementById("error").innerHTML="Password must be greater than 8 charecters";
		return false;
		}
		if(temp.length>63)
		{
			document.getElementById("error").innerHTML="Password cannot be greater than 63";
			return false;
		}
		if (temp!=temptwo)
		{
			document.getElementById("error").innerHTML="Password didn't match";
			return false;
		}
			
	return true;
	}