var count=0;
var images = new Array ("Images/Slide 1.jpg","Images/Slide 3.jpg","Images/Slide 4.jpg");
var main_image= document.getElementsByClassName("slider");
function allBackGroundTask(){
	hideLoadingScreen();
	showSlider();
}

// Hiding the loading screen
function hideLoadingScreen(){
document.getElementById('ftco-loader').style.display='none';
}

//slideshow
function showSlider(){
if(count<3)
	{
		main_image[0].src=images[count];
		count++;
	}
else
	count=0;
}
setInterval("showSlider()",5000);



window.onscroll=function() {
	opacity();
//	expbutton(); //Switching Explored Songs button to top when scrolling
};
//On SCROLL THE MENU BAR WILL LOSE OPACITY
function opacity()
{
	var position =document.getElementsByClassName('menu_bar')[0].offsetTop;
	if(window.pageYOffset > position ){
		document.getElementsByClassName('menu_bar')[0].style.backgroundColor='rgba(66,64,61,1)';
	}else{
		var opacity = 1;
		var decrement = 0.01;
		var id = setInterval(frame, 10);
		function frame(){
				if (opacity <= 0.4)
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

}
/*
function expbutton()
{
	var expbutton_position = document.getElementsByClassName('explored_btn')[0];
	if(window.pageYOffset > expbutton_position.offsetTop )
	{
		expbutton_position.classList.add('explored_btn_onscroll');
		document.getElementsByClassName('explored_btn_span')[0].style.backgroundColor='rgba(66,64,61,0)';
		document.getElementsByClassName('explored_btn_span')[0].style.color='white';
	}
}
*/
