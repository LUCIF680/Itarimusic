function submit_form(){
	//checking file size
	if (typeof upload_file_id !== "undefined") 
	var file_size = upload_file_id.files[0].size;
	if (file_size > 524288000)
        alert("Uploading Failed, File size should be less than 500 MB");
	else{
	document.getElementById('loading').style.display = "block";
	document.getElementsByTagName('form')[2].style.display = "none";
	document.getElementsByClassName('info_about_upload')[0].style.display = "none";
	document.getElementsByTagName('form')[2].submit();
	}
}