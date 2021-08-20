var x = $(".row > button");
for(var h = 0 ; h < x.length ; h++){
			x[h].addEventListener("click", buttonclick);
}

var buttonclicked = new Array(8*5);
for(var i=0;i<buttonclicked.length;i++){
	buttonclicked[i] = false;
	//console.log(buttonclicked[i]);
}

function buttonclick(){
	var selectedbutton = this.id;
	var x = selectedbutton.charAt(1); x = Number(x);
	var y = selectedbutton.charAt(3); y = Number(y);
	//console.log(selectedbutton);	console.log("x:" + x);	console.log("y:" +y); console.log((x + (y*5))); console.log(buttonclicked[ (x + (y*5)) ] );
	if(buttonclicked[x + (y*5)] == false){document.getElementById(selectedbutton).style.backgroundColor = "eaf3ff"; buttonclicked[x + (y*5)] = true;}
	else if(buttonclicked[x + (y*5)] == true){document.getElementById(selectedbutton).style.backgroundColor = "#4292f4"; buttonclicked[x + (y*5)] = false;}
	
	updatebinary();
}
function updatebinary(){
	for(var y=0;y<8;y++){
	var spanid = document.getElementById("binary" + y);
	
	var text1total = 0;
	for(var i=0;i<5;i++){ 
		if(buttonclicked[i + (y*5)] == true){
			text1total |= ((1<<4)>>i);
		}
		else{ text1total &= ~((1<<4)>>i);}
	}
	var thestring;
	thestring = text1total.toString(2);
	thestring = thestring.padStart(5,"0");
	if(y != 7){thestring = "0b" + thestring + " ,";}
	else{thestring = "0b" + thestring;}
	spanid.innerHTML = thestring;
	}
}