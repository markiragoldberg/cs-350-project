<?php
	$itemid = $_GET["pizza"];
	$itemtype = $_GET["item"];
	$operator = $_GET["direction"];

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
    if ($operator=="<"){
	$scention= "DESC";
	} else {
	$scention= "";
	}

    $sql = "SELECT * FROM pizza_items WHERE id $operator '$itemid' && item_type = '$itemtype' Order By id $scention LIMIT 1";
    $result = (sql_query($con, $sql));
    if (mysqli_num_rows($result) <1){
	$sql = "SELECT * FROM pizza_items WHERE id = '$itemid'";
	$result = (sql_query($con, $sql));
	}
    $order = (mysqli_fetch_assoc($result));
	
    $type= $order["item_type"];
    switch ($type) {
    case 0:
    	$inputType="pizza_descriptors";
    break;

    case 1:
    	$inputType="calzone_descriptors";
    break;

    case 2:
    	$inputType="salad_descriptors";
    break;

    case 3:
    	$inputType="drink_descriptors";
    break;

    }

    $pizza = $order["item_descriptors"];

    $pizza=explode(',', $pizza);
    $capacity = sizeof($pizza);
    $toppingid = $pizza[0];

    $sql = "SELECT Topping from $inputType where id = '$toppingid'";
    $temp = mysqli_fetch_array(sql_query($con, $sql));
    $topping = $temp[0];

    
    
    for($i = 1; $i < $capacity; $i++){
      $sql = "SELECT Topping from $inputType where id = '$pizza[$i]'";
      $nextTopping= mysqli_fetch_array(sql_query($con, $sql));
      $topping = $topping.", ";
      $topping = $topping.($nextTopping[0]);
    }
	$topping = $topping.".".$order["id"];
    print $topping;
?>


