<?php
    $itemid = $_GET["pizza"];
    
    $servername = "dbserv.cs.siu.edu";
    $username = "mgoldberg";
    $password = "Eu7BugDf";
    $dbname = "mgoldberg";
    $con = mysqli_connect($servername, $username, $password, $dbname);
    if(!$con)
    {
        die("Unable to connect to the database");
    }
    
    $getItem = $con->prepare("SELECT * FROM pizza_items WHERE id >= ? Order By id    LIMIT 1");
    $getItem->bind_param("i", $itemid);
    $getItem->execute();
    $order = mysqli_fetch_assoc(mysqli_stmt_get_result($getItem));
	
    $id = $order["id"];
    
    $type = $order["item_type"];
    switch ($type) {
        case 0:
            $inputType="pizza_descriptors";
            $itemType="Pizza: ";
            break;

        case 1:
            $inputType="calzone_descriptors";
            $itemType="Calzone: ";
            break;

        case 2:
            $inputType="salad_descriptors";
            $itemType="Salad: ";
            break;

        case 3:
            $inputType="drink_descriptors";
            $itemType="Drink: ";
            break;
    }

    $pizza = $order["item_descriptors"];

    $pizza=explode(',', $pizza);
    $capacity = sizeof($pizza);
    $toppingid = $pizza[0];

    // TODO replace with PDO
    $sql = "SELECT name from $inputType where id = ?";
    $getName = $con->prepare($sql);
    $getName->bind_param("i", $toppingid);
    $getName->execute();
    $topping = mysqli_fetch_array(mysqli_stmt_get_result($getName))[0];

    for($i = 1; $i < $capacity; $i++) {
        $toppingid = $pizza[$i];
        $getName->execute();
        $nextTopping = mysqli_fetch_array(mysqli_stmt_get_result($getName))[0];
        $topping = $topping . ", ";
        $topping = $topping . $nextTopping;
    }
    
    // Bad things happen on the client if the topping string is empty
    if(!$topping) {
        $topping = "plain";
    }
    
    // Get phone # to id the overall order
    $getPhone = $con->prepare("SELECT phone FROM pizza_customers WHERE id    = ?");
    $customerid = $order["customer_id"];
    $getPhone->bind_param("i", $customerid);
    if($customerid) {
        $getPhone->execute();
        $phone = mysqli_fetch_array(mysqli_stmt_get_result($getPhone))[0];
    } else {
        $phone = "";
    }
    
    $result = $topping. "." .$order["customer_id"]. "." .$itemType . "." . $id . "." . $phone;
    
    $getItem->close();
    $getName->close();
    $getPhone->close();
	print $result;
?>
