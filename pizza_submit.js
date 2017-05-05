function calculate_pizza_string() {
    //let submit_string = document.getElementById("count").value + " pizza";
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
    console.log(submit_string);
    // Place string in hidden "item" field for submission
    document.getElementById("item").value = submit_string;
};

function recalculate_pizza_price() {
    var price = 0.0;
    calculate_pizza_string();
    var price_request = new XMLHttpRequest();
    price_request.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            let price =  parseFloat(this.responseText);
            let count = document.getElementById("count").value;
            price_display = document.getElementById("price_display");
            price = price * count;
            price_display.value = "$" + price.toFixed(2);
        }
    }
    price_request.open("GET", "ajax_item_price.php?item=" + document.getElementById("item").value, true);
    price_request.send();
}

// Change border of clicked image,
// and change state of associated form input
function click_color(target, checkbox_id){
	if (target.style.border == "5px solid green")
		target.style.border = "5px solid white";
	else
		target.style.border = "5px solid green";
    
    let checkbox = document.getElementById(checkbox_id);
    checkbox.checked = !checkbox.checked;
    recalculate_pizza_price();
}

window.onload = function() {
    let elements = document.pizza_form.getElementsByTagName("input");
    for(var i = 0; i < elements.length; ++i) {
        elements[i].onchange = recalculate_pizza_price;
    }
    // Display the price of the default pizza when the page loads
    recalculate_pizza_price();
    
    // Ensure the count input is never empty
    document.getElementById("count").onblur = function() {
        if(this.value == "") {
            this.value = 1;
            recalculate_pizza_price();
        } else if(this.value > 20) {
            this.value = 20;
            recalculate_pizza_price();
        }
    }
    
    // Calculate the pizza before submitting
    document.getElementById("pizza_form").onsubmit = calculate_pizza_string;
};
