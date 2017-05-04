document.getElementById("pizza_form").onsubmit = function() {
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
    /*
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if(xhr.readystate == 4 && xhr.status == 200) {
            alert(xhr.responseText);
        }
    }
    xhr.open("POST", "order_pizza.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("pizza=" + submit_string);
    */
};

function recalculate_pizza_price() {
    let form = document.getElementById("pizza_form");
    let elements = form.getElementsByTagName("input");
    let count = document.getElementById("count").value;
    var price = 0.0;
    for(var i = 0; i < elements.length; ++i) {
        if(elements[i].checked) {
            switch(elements[i].getAttribute("name"))
            {
                case "size":
                    switch(elements[i].getAttribute("id"))
                    {
                        case "small":
                            price += 7.00;
                            break;
                        case "medium":
                            price += 10.50;
                            break;
                        case "large":
                        default:
                            price += 14.00;
                            break;
                    }
                    break;
                case "sauce":
                    // sauce is free
                    break;
                default:
                    // all toppings are $0.75
                    price += 0.75;
            }
        }
    }
    price_display = document.getElementById("price_display");
    price = price * count;
    price_display.value = "$" + price.toFixed(2);
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
};
