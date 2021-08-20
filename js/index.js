//Set image hover event
//var x = document.getElementsByTagName("IMG");
x = document.getElementsByClassName("gallery");
//console.log(x.length);
for(var h = 0 ; h < x.length ; h++){
	x[h].addEventListener("mouseover", hoverfunction , false);
	x[h].addEventListener("mouseout", nothoverfunction, false );
	x[h].addEventListener("click", nothoverfunction, false );
}
//image hover function
function hoverfunction(){
	var thisclass = this.getAttribute('class');
	var classindex = $('.' + thisclass).index(this);
	//console.log(classindex);

	var y = $(".gallery > img").not($(".gallery > img")[classindex]);
	for(var i=0; i<y.length; i++){
		y[i].style.filter = "grayscale(100%)";
		//document.getElementsByTagName("IMG")[selectedimg].style.borderRadius = "50px";
	}
	document.getElementsByClassName("gallery")[classindex].children[0].style.borderRadius = "50px";
	document.body.style.backgroundColor = "#cac4bf";
}
//image un-hover function
function nothoverfunction(){
	var thisclass = this.getAttribute('class');
	var classindex = $('.' + thisclass).index(this);

	var y = $(".gallery > img").not($(".gallery > img")[classindex]);
	for(var i=0; i<y.length; i++){
		y[i].style.filter = "grayscale(0%)";
		//document.getElementsByTagName("IMG")[selectedimg].style.borderRadius = "10px";
	}
	document.getElementsByClassName("gallery")[classindex].children[0].style.borderRadius = "10px";
	document.body.style.backgroundColor = "initial";
}

$( document ).ready(function() {
		changeimage(false,false);
});

var imageslide = 0;
var numberofimages = 3; //Change for number of images at a time on screen

function changeimage(isnext,isprev){		//changing image function
	var y = $(".gallery");
	var innerhtml;

if(isnext == true){imageslide++;}
else if(isprev == true){imageslide--;}
if(imageslide == 4 ){imageslide = 0;} if(imageslide == -1){imageslide = 3;}
console.log(imageslide);

	for(var i=0; i<y.length; i++){		//fade image away
		//y[i].style.transform = "translateX(-100px)";
		y[i].style.opacity = "0"
	}

	setTimeout(function(){

		for(var i=0;i<y.length;i++){
			$(".gallery > img")[i].style.display = "none";
			$("a.gallery")[i].style.display = "none";
		}
		for(var i=0;i<numberofimages;i++){
			$(".gallery > img")[i + (imageslide*numberofimages)].style.display = "block";
			$("a.gallery")[i + (imageslide*numberofimages)].style.display = "block";
		}

		//console.log(imageslide);

		for(var i=0; i<y.length; i++){
			//y[i].style.transform = "translateX(0px)";
			y[i].style.opacity = "1"
		}
	},500);
}

var screenHeight = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
lightbox.option({
	'resizeDuration': 200,
	'wrapAround': true,
	'fitImagesInViewport': true,
	'disableScrolling': false,
	'maxHeight': screenHeight - (screenHeight*0.2)
})
//setInterval(changeimage,10000);
setInterval(function(){
	screenHeight = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
	//console.log(screenHeight - (screenHeight*0.2));
	lightbox.option({'maxHeight': screenHeight - (screenHeight*0.2)})
},5000);
