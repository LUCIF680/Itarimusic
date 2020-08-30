function setCookie(name, value, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = name + "=" + value + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

var cookie_time = getCookie('time');
if (cookie_time == ""){
// update user explored list in every hour
var d = new Date();
var current_time = d.getTime();
setCookie('time',current_time,(30*24*60*60*1000));
			if (current_time > (current_time+(1*60*60*1000))){
				var ajax = new XMLHttpReques();
				ajax.onreadystatechange = function(){
					if (this.readystate == 4 && this.status == 200){
							console.log(this.responseText);
					}
				};
				ajax.open("GET","Resources/UpdateExploredSongs.php",true);
				ajax.send();
			}
}else{
	if (cookie_time > (cookie_time+(1*60*60*1000))){
		var ajax = new XMLHttpReques();
		ajax.onreadystatechange = function(){
			if (this.readystate == 4 && this.status == 200){
					console.log(this.responseText);
			}
		};
		ajax.open("GET","Resources/UpdateExploredSongs.php",true);
		ajax.send();
	}
}
