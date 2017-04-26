document.getElementById("salad_form").onsubmit = function() {
    let submit_string = "salad";
    
    let elements = document.salad_form.getElementsByTagName("input");
    let type = 0;
    
    
    for(var i = 0; i < elements.length; ++i) {
        if(elements[i].checked) {
            submit_string += ", " + elements[i].id;
            let name = elements[i].getAttribute("name");
            if(name === "type") {
                ++type;
            }
        }
    }
    
    // Salads must have one type
    if(type != 1) {
        return;
    }
    console.log(submit_string);
    document.getElementById("item").value = submit_string;
};

function click_color(target){
	if (target.style.border == "3px solid red")
		target.style.border = "3px solid black";
	else
		target.style.border = "3px solid red";
}
