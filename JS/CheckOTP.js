function check()
{	var temp = document.getElementById('otp').value;
	var pattern =  /^[0-9]*$/;
	if (temp=="")
	{
	document.getElementById("error").innerHTML="<span style='color:red'>Enter an OTP</span>";
	return false;
	}else if (!temp.match(pattern))
	{
		document.getElementById("error").innerHTML="<span style='color:red'>Please enter a valid OTP</span>";
		return false;
		}
	
	return true;

}