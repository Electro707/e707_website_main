// Initial run code (Find all elements "LI" and give them a click listener)
x = document.getElementsByClassName("library_function");    // Find all elements with class "library_function"
for(var h = 0 ; h < x.length ; h++){        // For all elemets
    if(x[h].tagName == 'LI'){               // If an elements is "LI" for it's type
        x[h].addEventListener("click", clickedFunction, false );    // Give it a click listener
    }
}

// Function that is called when a function LI is clicked on
function clickedFunction(){
    var selected_p = null;          // Store the 'p' element that has the same id as the clicked 
    var selected_li = this;         // Store the 'li' element that was clicked

    var id_numb = this.id;          // Get the ID of the clicked li
    // Find the 'p' element with the same class and ID as the clicked on LI
    x = document.getElementsByClassName("library_function");
    for(var h = 0 ; h < x.length ; h++){
        if(x[h].tagName == 'P' && x[h].id == id_numb){
            var selected_p = x[h];
            break;
        }
    }

    // Change the 'li' and the 'p' element depending on the previous state
    if(selected_p.style.display == 'none'){
        selected_p.style.display = 'initial';
        selected_li.innerHTML = selected_li.innerHTML.replace("⯈", "⯆");
    }
    else{
        selected_p.style.display = 'none';
        selected_li.innerHTML = selected_li.innerHTML.replace("⯆", "⯈");
    }
}