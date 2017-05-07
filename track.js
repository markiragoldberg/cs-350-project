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

var tracking_update = function() {
    var tracking_request = new XMLHttpRequest();
    tracking_request.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            let outstanding_items = this.responseText;
            console.log(outstanding_items);
            document.getElementById("login_form").style.display = "none";
            document.getElementById("track_display").style.display = "block";
            if(outstanding_items == -1) {
                document.getElementById("track_text").innerHTML = "We don't recognize your phone number.";
            } else if(outstanding_items == 0) {
                document.getElementById("track_text").innerHTML = "All of your orders are finished!";
            } else {
                document.getElementById("track_text").innerHTML = "We are still processing " + outstanding_items + " of your orders.";
            }
        }
    };
    tracking_request.open("GET", "track.php", true);
    tracking_request.send();
}

function login() {
    let phone = document.getElementById("phone").value;
        
    var login_request = new XMLHttpRequest();
    login_request.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            if(this.responseText != 0) {
                tracking_update();
                window.setInterval(tracking_update, 1000 * 10);
            }
        }
    };
    login_request.open("GET", "track_login.php?phone=" + phone, true);
    login_request.send();
}

function logout() {
    var logout_request = new XMLHttpRequest();
    logout_request.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            document.getElementById("login_form").style.display = "block";
            document.getElementById("track_display").style.display = "none";
            window.clearInterval(tracking_update);
        }
    };
    logout_request.open("GET", "track_logout.php", true);
    logout_request.send();
}
