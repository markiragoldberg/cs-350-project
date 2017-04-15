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
    
    #Drop old tables if they exist
    sql_query($con, "DROP TABLE pizza_customers;");
    sql_query($con, "DROP TABLE pizza_items;");
    sql_query($con, "DROP TABLE pizza_toppings;");
    

    # Recreate tables to latest standards
    $sql = "CREATE TABLE pizza_customers (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50),
            phone VARCHAR(11),
            credit_card VARCHAR(19)
            )";
    sql_query($con, $sql);
    
    $sql = "CREATE TABLE pizza_items (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            customer_id INT(6) UNSIGNED,
            item_type TINYINT,
            item_descriptors SET(".for($i=0;$i<30;$i++){echo "'$i',";}."'30')
            )";
    sql_query($con, $sql);
    
    $sql = "CREATE TABLE pizza_toppings (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, Topping VARCHAR(30)
            )";
    sql_query($con, $sql);
    $sql = "INSERT INTO pizza_toppings (Topping) VALUES (
            'small') ('medium') ('large') ('tomato_sauce') ('dressing') ('garlic_butter') 
            ('hummus') ('olive_oil') ('bbq') ('ricotta') ('blue') ('feta') ('sausage') ('pepperoni') 
            ('beef') ('ham') ('bacon') ('chicken') ('pineapple') ('onions') ";
    
    mysqli_close($con);
?>
