<?php
    function sql_query($con, $sql) {
        if(!mysqli_query($con, $sql)) {
            echo "Error with query '" . $sql . "'.<br/>";
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
    
    $sql = "SELECT item_descriptors from pizza_items where customer_id = '$customerid'";
    $result = (sql_query($con, $sql));
    $order = mysqli_fetch_assoc($result);
    $pizza = $order["item_descriptors"]
    
    $capacity = sizeof($pizza);
    $toppingid = $pizza[0];
    
    $sql = "SELECT Topping from pizza_toppings where id = '$toppingid'";
    $topping = sql_query($con, $sql);
    
    for($i = 1; $i < $capacity; $i++){
      $sql = "SELECT Topping from pizza_toppings where id = '$pizza[$i]'";
      $nextTopping=sql_query($con, $sql);
      $topping = $topping.", ";
      $topping = $topping.($nextTopping);
    }
     
    
    
    
    
    
