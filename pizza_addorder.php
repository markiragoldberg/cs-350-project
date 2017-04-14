<?php
    session_start();
    
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
    
    $name = "Tester";
    $phone = "1-555-333-4444";
    $credit_card = "1111222233334444333";
    
    $item_type = 1; # pizza
    $item_descriptors = 'a,d'; # gotta talk to Kirk about this more
    
    # Insert customer data, then items' data
    sql_query($con, "INSERT INTO pizza_customers (name, phone, credit_card) VALUES ('$name', '$phone', '$credit_card')");
    
    # ... get autoincremented ID of customer we just inserted!
    $customer_id = mysql_insert_id();
    
    sql_query($con,"INSERT INTO pizza_items (customer_id, item_type, item_descriptors) VALUES ('$customer_id', '$item_type', '$item_descriptors')");
    
    mysqli_close($con);
?>
