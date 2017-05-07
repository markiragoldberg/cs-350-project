function calculate_calzone_string() {
    let submit_string = "calzone";
    
    let elements = document.calzone_form.getElementsByTagName("input");
    
    for(var i = 0; i < elements.length; ++i) {
        if(elements[i].checked) {
            submit_string += ", " + elements[i].id;
        }
    }
    
    console.log(submit_string);
    // Place string in hidden "item" field for submission
    document.getElementById("item").value = submit_string;
};

function recalculate_calzone_price() {
    var price = 0.0;
    calculate_calzone_string();
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
    recalculate_calzone_price();
}

window.onload = function() {
    let elements = document.calzone_form.getElementsByTagName("input");
    for(var i = 0; i < elements.length; ++i) {
        elements[i].onchange = recalculate_calzone_price;
    }
    // Display the price of the default calzone when the page loads
    //recalculate_calzone_price();
    
    // Ensure the count input is never empty
    document.getElementById("count").onblur = function() {
        if(this.value == "") {
            this.value = 1;
            recalculate_calzone_price();
        } else if(this.value > 20) {
            this.value = 20;
            recalculate_calzone_price();
        }
    }
    
    // Calculate the calzone before submitting
    document.getElementById("calzone_form").onsubmit = calculate_calzone_string;
    // Login (in track.js)
    login();
};
