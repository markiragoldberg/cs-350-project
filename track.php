<?php
    session_start();
    
    // Make sure cart isn't obviously broken
    if(!isset($_SESSION['phone']) || empty($_SESSION['phone'])) {
        exit("Error: shopping cart does not exist or is empty<br/>");
    }
    
    $servername = "dbserv.cs.siu.edu";
    $username = "mgoldberg";
    $password = "Eu7BugDf";
    $dbname = "mgoldberg";
    $con = mysqli_connect($servername, $username, $password, $dbname);
    if(!$con)
    {
        die("Unable to connect to the database");
    }
    
    $phone = $_SESSION["phone"];
    
    
    $getId = $con->prepare("SELECT id FROM `pizza_customers` WHERE phone = ?");
    $getId->bind_param("s", $phone);
    $getId->execute();
    $getId->bind_result($id);
    $foundCustomer = $getId->fetch();
    $getId->close();
    
    // Output -1 if no customer exists with that phone,
    // 0 if no items are found,
    // # of items if any are found
    if(!$foundCustomer) {
        print -1;
    } else {
        $items_left;
        $getItems = $con->prepare("SELECT count(*) FROM `pizza_items` WHERE customer_id = ?");
        if(!$getItems) { // assuming $mysqli is the connection
            $error = $con->errno . ' ' . $con->error;
            echo $error; // 1054 Unknown column 'foo' in 'field list'
        }
        $getItems->bind_param("i", $id);
        $getItems->execute();
        $getItems->bind_result($items_left);
        $getItems->fetch();
        $getItems->close();
        print $items_left;
    }
?>
