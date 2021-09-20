var buttonclicked = new Array(8*5*16*2);
for(var i=0;i<buttonclicked.length;i++){
	buttonclicked[i] = false;
	//console.log(buttonclicked[i]);
}

function buttonclick(){
	var selectedbutton = this.getAttribute('class');
	var selectedbuttonindex = $('.' + selectedbutton).index(this);
	console.log(selectedbutton);
	console.log(selectedbuttonindex);
	
	var buttonwraperlocation = $('.' + selectedbutton).eq(selectedbuttonindex).parent().parent();
	buttonwraperlocation = buttonwraperlocation.attr('id');
	console.log(buttonwraperlocation);
	
	var x = selectedbutton.charAt(1); x = Number(x);
	var y = selectedbutton.charAt(3); y = Number(y);
	var index = buttonwraperlocation.match(/\d/g);	//https://stackoverflow.com/questions/10003683/javascript-get-number-from-string
	index = index.join("");
	console.log(index);
	//console.log(selectedbutton);	console.log("x:" + x);	console.log("y:" +y); console.log((x + (y*5))); console.log(buttonclicked[ (x + (y*5)) ] );
	if(buttonclicked[x + (y*5) + (index*5*8)] == false){document.getElementsByClassName(selectedbutton)[index].style.backgroundColor = "eaf3ff"; buttonclicked[x + (y*5) + (index*5*8)] = true;}
	else if(buttonclicked[x + (y*5) + (index*5*8)] == true){document.getElementsByClassName(selectedbutton)[index].style.backgroundColor = "#4292f4"; buttonclicked[x + (y*5) + (index*5*8)] = false;}
	
	updatebinary(index);
}
function updatebinary(index){
	for(var y=0;y<8;y++){
	var spanid = document.getElementById(index + "binary" + y);
	console.log("id of code is:"+spanid);
	var text1total = 0;
	for(var i=0;i<5;i++){ 
		if(buttonclicked[i + (y*5) + (index*5*8)] == true){
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
function checkboxchange(){
	var ischecked = document.getElementById("segmentcheckbox").checked;
	console.log(ischecked);
	
	var text = document.getElementsByClassName("segmenttext");
	console.log(text.length);
	for(var i=0;i<text.length;i++){
		if(ischecked == true){ text[i].style.display = "block";}
		else{ text[i].style.display = "none";}
	}
}
function loadfunction(){
	var x = $(".row > button");
	for(var h = 0 ; h < x.length ; h++){
		x[h].addEventListener("click", buttonclick);
	}
}