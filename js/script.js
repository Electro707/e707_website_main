

	//Set Navbar hover event
	/*
var x = $("li.navbar");
for(var h = 0 ; h < x.length ; h++){
	x[h].addEventListener("mouseover", hoverfunction2.bind(this, h) , false);
	x[h].addEventListener("mouseout", nothoverfunction2.bind(this, h), false );
}

//navBar hover function
function hoverfunction2(selectedimg){
	$("li.navbar > a")[selectedimg].style.color = "#3e83f2";
	$("li.navbar > a")[selectedimg].style.backgroundColor = "white";
	$("li.navbar")[selectedimg].style.backgroundColor = "white";
}
//navBar un-hover function
function nothoverfunction2(selectedimg){
	$("li.navbar > a")[selectedimg].style.color = "white";
	$("li.navbar > a")[selectedimg].style.backgroundColor = "#3e83f2";
	$("li.navbar")[selectedimg].style.backgroundColor = "#3e83f2";
} */
//Click on navbar option function
function navbarlink(whereto){
// 	document.body.style.transition = "0.7";
// 	document.body.style.opacity = "0";
	console.log(window.location.hostname);
// 	setTimeout(function(){
		if(whereto == 0){window.location.href ="/";}
		if(whereto == 1){window.location.href ="/projects";}
		if(whereto == 2){window.location.href ="/about";}
		if(whereto == 3){window.location.href ="/tools";}
		if(whereto == 4){window.location.href ="https://blogs.electro707.com";}
        if(whereto == 5){window.location.href ="https://kits.electro707.com";}
// 	},700);
}
