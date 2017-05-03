<?php
    session_start();
    
    function sql_query($con, $sql) {
        $result = mysqli_query($con, $sql);
        if(!$result) {
            return "Error with query '" . $sql . "'.<br/>";
        } else {
            return $result;
        }
    }
    
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

    // Get existing customer's id
    $sql = "SELECT id from pizza_customers where credit_card='$card'";
    $customerid = mysqli_fetch_array(sql_query($con, $sql))[0];
    // If customer is not in DB already, insert it and get it
    if(!$customerid) {
        $sql = "INSERT INTO pizza_customers (name, phone, credit_card) VALUES ('$name', '$phone', '$card')";
        $result = (sql_query($con, $sql));
        $sql = "SELECT id from pizza_customers where phone='$phone'";
        $customerid = mysqli_fetch_array(sql_query($con, $sql))[0];
    }
    echo "customer_id is " . $customerid . "<br/>";
    
    // Insert each item that's in the session into the pizza db
    foreach($_SESSION['cart'] as $item) {
        $toppings = explode(', ', $item);
        $size = count($toppings);
        $set = '';
        //toppings[0] is itemtype; use it to form sql, skip it as a descriptor (j=1)
        $basesql = "SELECT id FROM " . $toppings[0] . "_descriptors WHERE name = ";
        for ($j=1; $j < $size; $j++) {
            $sql = $basesql . "'$toppings[$j]'";
            echo $sql . "<br/>";
            $nextTopping = sql_query($con, $sql);
            $nextTopping = mysqli_fetch_array($nextTopping);
            if($j != 1) {
                $set = $set . ',';
            }
            $set = $set . $nextTopping[0];
            echo $set . "<br/>";
        }
        
        $itemtype = 0;
        switch($toppings[0]) {
            case 'pizza':
                $itemtype = 0;
                break;
            case 'calzone':
                $itemtype = 1;
                break;
            case 'salad':
                $itemtype = 2;
                break;
            case 'drink':
                $itemtype = 3;
                break;
            default:
                $itemtype = 0;
        }
        
        echo "item_type is " . $itemtype . "<br/>";
        echo "item_descriptors is " . $set . "<br/>";
        
        $sql = "INSERT INTO pizza_items (customer_id, item_type, item_descriptors) VALUES ('$customerid', '$itemtype', '$set')";

        if($result=(sql_query($con, $sql))){
            echo "success<br/>";
            // Clear cart so an order isn't bought 2+ times by accident
            $_SESSION['cart'] = array();
        } else {
            echo "failure<br/>";
        }
    }
    
    echo '<br/><input type="button" onclick="location.href=\'pizza_menu.php\';" value="Back to the menu"/>';
    
    mysqli_close($con);
?>
