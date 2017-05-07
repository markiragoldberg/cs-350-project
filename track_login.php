<?php
    session_start();
    
    // Login in with phone # if provided
    // Else check if already logged in
    // Return 1 if ultimately logged in, else 0
    
    if($_GET["phone"]) {
        $_SESSION["phone"] = $_GET["phone"];
    }
    if(!empty($_SESSION["phone"])) {
        print "1";
    } else {
        print "0";
    }
?>
    
