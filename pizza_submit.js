document.getElementById("pizza_form").onsubmit = function() {
    let submit_string = "pizza";
    
    let elements = document.pizza_form.getElementsByTagName("input");
    let size = 0;
    let sauce = 0;
    
    
    for(var i = 0; i < elements.length; ++i) {
        if(elements[i].checked) {
            submit_string += ", " + elements[i].id;
            let name = elements[i].getAttribute("name");
            if(name === "size") {
                ++size;
            } else if(name === "sauce") {
                ++sauce;
            }
        }
    }
    
    // Do not submit pizza with nonsensical size / crust options
    if(size != 1 || sauce != 1) {
        return;
    }
    
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if(xhr.readystate == 4 && xhr.status == 200) {
            alert(xhr.responseText);
        }
    }
    xhr.open("POST", "order_pizza.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("pizza=" + submit_string);
};

function click_color(id){
	var target = document.getElementById(id);
	if (target.style.border == "1px solid black")
		target.style.border = "1px solid red";
	else
		target.style.border = "1px solid black";
}
