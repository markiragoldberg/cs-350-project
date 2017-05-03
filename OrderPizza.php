<?php
    session_start();
    
    // Make sure cart isn't obviously broken
    if(!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        exit("Error: shopping cart does not exist or is empty<br/>");
    }
    
    //Get customer info
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $card = hash('md5', $_POST["card"] . $_POST["ccSec"]);
    
    $servername = "dbserv.cs.siu.edu";
    $username = "mgoldberg";
    $password = "Eu7BugDf";
    $dbname = "mgoldberg";
    $con = mysqli_connect($servername, $username, $password, $dbname);
    if(!$con)
    {
        die("Unable to connect to the database");
    }
    
    echo "name = " . $name . "<br/>";
    echo "phone = " . $phone . "<br/>";
    echo "card = " . $card . "<br/>";

    // Get existing customer's id based on the phone number
    $getCustomerId = $con->prepare("SELECT id from pizza_customers where phone=?");
    $getCustomerId->bind_param("s", $phone);
    $getCustomerId->execute();
    $customerid = mysqli_fetch_array(mysqli_stmt_get_result($getCustomerId))[0];
    print $customerid . "<br/>";
    
    // If the customer isn't already in the DB
    if(!$customerid) {
        // Insert customer
        print "inserting customer<br/>";
        $insertCustomerId = $con->prepare("INSERT INTO pizza_customers (name, phone, credit_card) VALUES (?, ?, ?)");
        $insertCustomerId->bind_param("sss", $name, $phone, $card);
        $insertCustomerId->execute();
        // Retrieve inserted customer's id
        $getCustomerId->bind_param("s", $phone);
        $getCustomerId->execute();
        $customerid = mysqli_fetch_array(mysqli_stmt_get_result($getCustomerId))[0];
    }
    echo "customer_id is " . $customerid . "<br/>";
    
    
    // Insert each item that's in the session into the pizza db
    foreach($_SESSION['cart'] as $item) {
        $toppings = explode(', ', $item);
        $size = count($toppings);
        $set = '';
        // Determine table id
        // tablename needs to be chosen here to prevent possible sql injection
        // (can't use prepared statement to parameterize table names)
        $itemtype = 0;
        switch($toppings[0]) {
            case 'pizza':
                $itemtype = 0;
                $tablename = "pizza_descriptors";
                break;
            case 'calzone':
                $itemtype = 1;
                $tablename = "calzone_descriptors";
                break;
            case 'salad':
                $itemtype = 2;
                $tablename = "salad_descriptors";
                break;
            case 'drink':
                $itemtype = 3;
                $tablename = "drink_descriptors";
                break;
            default:
                die("Unknown item type: " . $toppings[0]);
        }
        
        // Must convert each descriptor string into a numeric id before inserting into DB
        // Skip j=0 because that is the item type, not a food descriptor
        for ($j=1; $j < $size; $j++) {
            // Cannot access array elements when binding parameters (according to Kirk)
            $toppingValue = $toppings[$j];
            // Prepare statement for getting numeric ID of a food descriptor
            // e.g. "pepperoni" or "large" for pizza, "diet coke" for drinks, ...
            // $tablename is assigned in a set of predefined values, above
            $getFoodDescriptorId = $con->prepare("SELECT id FROM " . $tablename . " WHERE name = ?");
            if(!$getFoodDescriptorId) {
                print "Error num: " . $con->errno . ": " . $con->error . "<br/>";
            }
            $getFoodDescriptorId->bind_param("s", $toppingValue);
            $getFoodDescriptorId->execute();
            $nextTopping = mysqli_fetch_array(mysqli_stmt_get_result($getFoodDescriptorId));
            $getFoodDescriptorId->close();
            if($j != 1) {
                $set = $set . ',';
            }
            $set = $set . $nextTopping[0];
            echo $set . "<br/>";
        }
        
        echo "item_type is " . $itemtype . "<br/>";
        echo "item_descriptors is " . $set . "<br/>";
        
        // Prepare statement for inserting a formatted food item into the DB
        $insertFoodItem = $con->prepare("INSERT INTO pizza_items (customer_id, item_type, item_descriptors) VALUES (?, ?, ?)");
        if(!$insertFoodItem) {
            print "Error num: " . $con->errno . ": " . $con->error . "<br/>";
        }
        $insertFoodItem->bind_param("iis", $customerid, $itemtype, $set);
        $result = $insertFoodItem->execute();
        $insertFoodItem->close();
        if($result){
            echo "success<br/>";
            // Clear cart so an order isn't bought 2+ times by accident
            $_SESSION['cart'] = array();
        } else {
            echo "failure<br/>";
        }
    }
    
    echo '<br/><input type="button" onclick="location.href=\'pizza_menu.php\';" value="Back to the menu"/>';
    
    $getCustomerId->close();
    mysqli_close($con);
?>
