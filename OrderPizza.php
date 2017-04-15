<?php
    function sql_query($con, $sql) {
        if(!mysqli_query($con, $sql)) {
            echo "Error with query '" . $sql . "'.<br/>";
        }
    }
    //insert the name used
    $pizza = $_POST[" "]
    $servername = "dbserv.cs.siu.edu";
    $username = "mgoldberg";
    $password = "Eu7BugDf";
    $dbname = "mgoldberg";
    $con = mysqli_connect($servername, $username, $password, $dbname);
    if(!$con)
    {
        die("Unable to connect to the database");
    }
    
    $toppings = split (", ", $pizza);
    $size = count($toppings);
    $set;
    for ($i=0; i < $size; i++){
    $sql = "SELECT id from pizza_toppings where Topping = '$toppings[$i]'";
    $nextTopping = (sql_query($con, $sql));
    $set->add($nextTopping);
    }
    
    $sql = "INSERT INTO pizza_items (item_descriptors) VALUES ($set) WHERE customer_id ='$customerid'";
    
    
    
    
    
    ?>
