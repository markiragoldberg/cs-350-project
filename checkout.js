var empty_cart = "Your shopping cart is empty.";

function checkPhone() {
    var field = document.getElementById("phone");
    let phone = field.value;
    // If field contains a phone number
    if(phone.search(/^\s*\(?\d{3}\)?\s*-?\s*\d{3}\s*-?\s*\d{4}\s*$/) != -1) {
        //remove all instances of whitespace, parens, hyphens from phone
        phone = phone.replace(/\s*/g, "");
        phone = phone.replace(/-/g, "");
        phone = phone.replace(/\(/g, "");
        phone = phone.replace(/\)/g, "");
        //add hyphens to phone after 3 and 6 digits
        phone = phone.replace(/(\d{3})(\d{3})(\d{4})/, "$1-$2-$3");
        //set field value to the fruits of our labor
        field.value = phone;
    } else {
        // Clear non-phone data from phone field
        field.value = "";
    }
};

function checkCard() {
    var field = document.getElementById("card");
    let card = field.value;
    // If field contains a credit card number
    if(card.search(/^(?:\d{4}\s*-?\s*){3}\d{4}$/) != -1) {
        //Remove all whitespace, hyphens
        card = card.replace(/\s*/g, "");
        card = card.replace(/-/g, "");
        //add hyphens to CC after each 4 digits, except last group
        card = card.replace(/(\d{4})(\d{4})(\d{4})(\d{4})/, "$1-$2-$3-$4");
        field.value = card;
    } else {
        // Clear non-CC data from the field
        field.value = "";
    }
};

function checkCardSecurityCode() {
    var field = document.getElementById("ccSec");
    let ccSec = field.value;
    // Clear the field if it isn't a three digit number
    if(ccSec.search(/^\d{3}$/) == -1) {
        field.value = "";
    }
};

// Update time to make order and price of order
function get_cart_costs() {
    // Time to make
    var timecost_request = new XMLHttpRequest();
    timecost_request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Update estimated time cost field
            document.getElementById("timecost_value").innerHTML = this.responseText;
            // Remove entire timecost display if timecost becomes 0
            if(this.responseText == "0") {
                document.getElementById("timecost_display").innerHTML = "";
            }
        }
    };
    timecost_request.open("GET", "ajax_timecost.php", true);
    timecost_request.send();
    // Cost of cart
    var cartprice_request = new XMLHttpRequest();
    cartprice_request.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            if(this.responseText) {
                let prices = this.responseText.split(", ");
                let i = 0;
                if(prices[prices.length - 1] > 0) {
                    let element = document.getElementById("cart_price_" + i);
                    // Update the price of every item in the cart
                    while(element && i < prices.length - 1) {
                        element.innerHTML = parseFloat(prices[i]).toFixed(2);
                        ++i;
                        element = document.getElementById("cart_price_" + i);
                    }
                    // Update the total price with the last value
                    document.getElementById("cartprice_value").innerHTML = parseFloat(prices[i]).toFixed(2);
                } else {
                    // Indicate cart is empty
                    document.getElementById("shopping_cart").innerHTML = empty_cart;
                    document.getElementById("confirm_order").disabled = true;
                }
            } else {
                document.getElementById("cartprice_display").innerHTML = "";
            }
        }
    };
    cartprice_request.open("GET", "ajax_cart_price.php", true);
    cartprice_request.send();
};

function delete_cart_item(caller) {
    //shoot AJAX order to delete item from DB
    //upon return: delete contents of span with that item index
    let index = caller.id.substr(caller.id.lastIndexOf("_") + 1);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Delete span of cart item that was deleted!
            document.getElementById("cart_button_" + this.responseText).parentElement.innerHTML = "";
            get_cart_costs();
            
            // Update id of elements that have higher indexes, so additional deletions work
            let i = parseInt(this.responseText) + 1;
            let later_element = document.getElementById("cart_button_" + i);
            let price_element = document.getElementById("cart_price_" + i);
            while(later_element) {  // there should always be one price element for each button
                later_element.id = "cart_button_" + (i-1);
                price_element.id = "cart_price_" + (i-1);
                ++i;
                later_element = document.getElementById("cart_button_" + i);
                price_element = document.getElementById("cart_price_" + i);
            }
        }
    };
    xmlhttp.open("GET", "delete_cart_item.php?item=" + index, true);
    xmlhttp.send();
};

window.onload = function() {
//    document.getElementById("name").onblur = checkName;
    document.getElementById("phone").onchange = checkPhone;
    document.getElementById("card").onblur = checkCard;
    document.getElementById("ccSec").onblur = checkCardSecurityCode;
    
    // If the cart is empty, disable the confirm order button
    if(document.getElementById("shopping_cart").innerHTML === empty_cart) {
        document.getElementById("confirm_order").disabled = true;
    } else {
        get_cart_costs();
    }
};
