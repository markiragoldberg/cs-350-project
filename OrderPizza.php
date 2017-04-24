<?php
    function sql_query($con, $sql) {
        $result = mysqli_query($con, $sql);
        if(!$result) {
            return "Error with query '" . $sql . "'.<br/>";
        } else {
            return $result;
        }
    }
    //insert the name used
    $item = $_POST["item"];
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $card = $_POST["card"];
    $servername = "dbserv.cs.siu.edu";
    $username = "mgoldberg";
    $password = "Eu7BugDf";
    $dbname = "mgoldberg";
    $con = mysqli_connect($servername, $username, $password, $dbname);
    if(!$con)
    {
        die("Unable to connect to the database");
    }
    echo "item = " . $item . "<br/>";
    echo "name = " . $name . "<br/>";
    echo "phone = " . $phone . "<br/>";
    echo "card = " . $card . "<br/>";

    // Get existing customer's id
    $sql = "SELECT id from pizza_customers where phone='$phone'";
    $customerid = mysqli_fetch_array(sql_query($con, $sql))[0];
    // If customer is not in DB already, insert it and get it
    if(!$customerid) {
        $sql = "INSERT INTO pizza_customers (name, phone, credit_card) VALUES ('$name', '$phone', '$card')";
        $result = (sql_query($con, $sql));
        $sql = "SELECT id from pizza_customers where phone='$phone'";
        $customerid = mysqli_fetch_array(sql_query($con, $sql))[0];
    }
    
	
    $toppings = explode(', ', $item);
    
    // switch on item type, the first entry in toppings
    switch ($toppings[0]) {
        case 'pizza':
            //section for inserting toppings into table
            $size = count($toppings);
            $set = '';
            //skip item type (0)
            for ($j=1; $j < $size; $j++) {
                $sql = "SELECT id from pizza_toppings where Topping = '$toppings[$j]'";
                $nextTopping = sql_query($con, $sql);
                $nextTopping = mysqli_fetch_array($nextTopping);
                if($j != 1) {
                    $set = $set . ',';
                }
                $set = $set . $nextTopping[0];
                echo $set . "<br/>";
            }
            $itemtype = 0;
            break;
        case 'calzone':
            $itemtype = 1;
            break;
        case 'salad':
            $itemtype = 2;
            break;
        case 'breadsticks':
            $itemtype = 3;
            break;
        case 'drink':
            $itemtype = 4;
            break;
        default:
            echo 'error: unrecognized item <br/>';
    }
    
    echo "customer_id is " . $customerid . "<br/>";
    echo "item_type is " . $itemtype . "<br/>";
    echo "item_descriptors is " . $set . "<br/>";
    
    $sql = "INSERT INTO pizza_items (customer_id, item_type, item_descriptors) VALUES ('$customerid', '$itemtype', '$set')";

    if($result=(sql_query($con, $sql))){
        echo "success";
    } else {
    	echo "failure";
    }
    mysqli_close($con);
?>
