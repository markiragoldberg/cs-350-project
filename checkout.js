// Modified from assignment 3
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

window.onload = function() {
//    document.getElementById("name").onblur = checkName;
    document.getElementById("phone").onchange = checkPhone;
    document.getElementById("card").onblur = checkCard;
    document.getElementById("ccSec").onblur = checkCardSecurityCode;
};
