function checkName(){
	var name = document.getElementById('name').value;
	var pattern = /^[a-zA-Z ]*$/;
	
		if(name=="")
		{
			document.getElementById('error').innerHTML="Name cannot be empty";
			return false;
		}else if (!name.match(pattern))
		{
			document.getElementById('error').innerHTML="Name should contain whitespace and charecters only";
			return false;
		}
	
		
	
	return true;
}
