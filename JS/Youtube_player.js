// function to cookie
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

function checkCookie(search,video_id) {
    var user=getCookie(search);
		if (user == "") {
			// if first time than create new cookie
        setCookie('id',video_id,30);
    } else {
			// other time append existing cookie
       if (user != "" && user != null) {
				 user = user+","+video_id;
				 setCookie("id", user, 30);
       }
    }
}


// loading YT player

video_id = document.getElementsByTagName('iframe')[0];
var tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
var player;
function onYouTubeIframeAPIReady() {
		player = new YT.Player(video_id.id, {
    	  events: {
						'onReady': onPlayerReady,
	          'onStateChange': function(e){
							if (e.data == 0) {
								//first checking cookie than create cookie which can be used for explored videos
								checkCookie('id',video_id.id);
								// after video is finished than autoplay the next video
									var xhttp = new XMLHttpRequest();
									xhttp.onreadystatechange = function() {
											if (this.readyState == 4 && this.status == 200) {
											let new_id =  this.responseText
											document.getElementById(video_id.id).setAttribute("id",new_id);
											document.getElementById(video_id.id).src = "https://www.youtube.com/embed/"+new_id+"?autoplay=1;iv_load_policy=3;enablejsapi=1;showinfo=0;rel=0&amp;";
											onYouTubeIframeAPIReady();
											}
									};
									xhttp.open("GET", "Resources/get_songs.php", true);
									xhttp.send();
								}
						}
	        }
      });
  }
	function onPlayerReady(event) {
					event.target.playVideo();
	      }
