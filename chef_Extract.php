<?php
		$itemid = $_GET["pizza"];
    function sql_query($con, $sql) {
        $result = mysqli_query($con, $sql);
        if(!$result) {
            return "Error with query '" . $sql . "'.<br/>";
        } else {
            return $result;
        }
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
        $sql = "SELECT * FROM pizza_items WHERE id > '$itemid' Order By id LIMIT 1";
    $result = (sql_query($con, $sql));
    $order = (mysqli_fetch_assoc($result));
	
    $type= $order["item_type"];
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

    $sql = "SELECT name from $inputType where id = '$toppingid'";
    $temp = mysqli_fetch_array(sql_query($con, $sql));
    $topping = $temp[0];

    
    
    for($i = 1; $i < $capacity; $i++){
      $sql = "SELECT name from $inputType where id = '$pizza[$i]'";
      $nextTopping= mysqli_fetch_array(sql_query($con, $sql));
      $topping = $topping.", ";
      $topping = $topping.($nextTopping[0]);
    }

    $topping = $topping.".".$order["customer_id"].".".$itemType;
	print $topping;
?>
