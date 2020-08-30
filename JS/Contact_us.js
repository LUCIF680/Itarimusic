window.onscroll=function() {  //On SCROLL THE MENU BAR WILL LOSE OPACITY
	var position =document.getElementsByClassName('menu_bar')[0].offsetTop;
	if(window.pageYOffset > position ){
		document.getElementsByClassName('menu_bar')[0].style.backgroundColor='rgba(66,64,61,1)';
	}else{
		var opacity = 1;
		var decrement = 0.01;
		var id = setInterval(frame, 10);
		function frame(){
				if (opacity <= 0)
				{
					 clearInterval(id);
				}
				else
				{
					opacity = opacity-decrement;
					document.getElementsByClassName('menu_bar')[0].style.backgroundColor='rgba(66,64,61,'+opacity+')';
					
				}
		}

		
	}
};


window.onload=function(){
	document.getElementsByClassName('menu_bar')[0].style.backgroundColor='rgba(66,64,61,0)';
};