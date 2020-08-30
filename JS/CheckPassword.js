function checkPass(){
	if ((old_pass.value=="")||(pass.value=="")||(con_pass.value==""))
		{
		error.innerHTML = "Fill the form";
		return false;
		}
	else if (pass.value!=con_pass.value)
	{
		error.innerHTML = "Confirm password and new password didn't match";
		return false;
	}
	
	return true;
}
	
	
	