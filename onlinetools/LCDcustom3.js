var buttonclicked = new Array(500*200);
var widthofdisplay = 128;
var heightofdisplay = 64;

for(var i=0;i<buttonclicked.length;i++){
	buttonclicked[i] = false;
	//console.log(buttonclicked[i]);
}
function buttonclick(e,thisis){
	//if (e.buttons == 1) {
	var selectedbutton = thisis.getAttribute('id');
	console.log("id="+selectedbutton);
	//https://codereview.stackexchange.com/questions/115885/extract-numbers-from-a-string-javascript
	var x = selectedbutton.match(/\d+/g).map(Number)[0];
	var y = selectedbutton.match(/\d+/g).map(Number)[1];
	console.log("x="+x); console.log("y="+y);
	if(buttonclicked[x + (y*widthofdisplay)] == false){document.getElementById(selectedbutton).style.backgroundColor = "eaf3ff"; buttonclicked[x + (y*widthofdisplay)] = true;}
	else if(buttonclicked[x + (y*widthofdisplay)] == true){document.getElementById(selectedbutton).style.backgroundColor = "#4292f4"; buttonclicked[x + (y*widthofdisplay)] = false;}

	updatebinary(x,y);
	//}
}
function cleardisplay(){
	for(y=0;y<heightofdisplay;y++){
		for(x=0;x<widthofdisplay;x++){
			document.getElementsByClassName("displaybutton")[x+(y*widthofdisplay)].style.backgroundColor = "#4292f4"; buttonclicked[x + (y*widthofdisplay)] = false;
		}
	}

	for(var i=0;i<(widthofdisplay*heightofdisplay)/8;i++){
		document.getElementById("binary"+i).innerHTML = "0x00";
		//alltext += "<span id=\"binary"+i+"\">0x00</span>";
	}

}
function updatebinary(x,y){
	var idnumber = Math.floor(  x + (Math.floor(y/8)*(widthofdisplay)) );
	console.log(idnumber);
	var idoftext = document.getElementById("binary"+idnumber);
	console.log((Math.floor(y/8))*widthofdisplay*8); console.log(idnumber);
	var hexnumber = 0;
	for(var k=0;k<8;k++){
		//console.log((idnumber + (96*k) + ((Math.floor(y/8))*96*8)));
		if(buttonclicked[ (idnumber%widthofdisplay) + (widthofdisplay*k) + ((Math.floor(y/8))*widthofdisplay*8)] == true){hexnumber += 0b1<<k; }
	}
	//console.log(hexnumber);
	idoftext.innerHTML = "0x" + hexnumber.toString(16).padStart(2,"0");
}
function loadfunction(){
	var x = document.getElementsByClassName("displaybutton");
	for(var h = 0 ; h < x.length ; h++){
		x[h].addEventListener("mouseover", function(event){	buttonclick(event,this);	}	);
		x[h].addEventListener("mousedown", function(event){	buttonclick(event,this);	}	);
		x[h].addEventListener("touchmove", function(event){	buttonclick(event,this);	}	);
	}
}
function changedisplaysize(){
	if((document.getElementById("displayheight").value % 8) != 0){
		alert("The height must be divisible by 8");
		document.getElementById("displayheight").value = heightofdisplay;
	}
	widthofdisplay = document.getElementById("displaywidth").value;
	heightofdisplay = document.getElementById("displayheight").value;
	resetdisplay();
}
function resetdisplay(){
	var alltext = "";
	for(var y=0;y<heightofdisplay;y++){
		alltext += "<div class=\"row\">";
		for(var x=0;x<widthofdisplay;x++){
			alltext += "<button type=\"button\" id=\"x"+x+"y"+y+"\"></button>";
		}
		alltext += "</div>";
	}
	wrapperbutton.innerHTML = alltext;

	alltext = "";
	alltext += "<div class=\"insidecode\"> <p>";
	alltext += "name[] = {";
	for(var i=0;i<(widthofdisplay*heightofdisplay)/8;i++){

		alltext += "<span id=\"binary"+i+"\">0x00</span>";
		if(i != ((widthofdisplay*heightofdisplay)/8)-1){alltext += "<span>, </span>";}
	}
	alltext += "};";
	alltext += "</p></div>";
	code.innerHTML = alltext;

	loadfunction();
	for (var i = 0; i < buttonclicked.length; ++i) { buttonclicked[i] = false;}
}
