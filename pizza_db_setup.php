<?php
    function sql_query($con, $sql) {
        if(!mysqli_query($con, $sql)) {
            echo "Error with query '" . $sql . "'.<br/>";
        }
    }


    $servername = "dbserv.cs.siu.edu";
    $username = "cleidner";
    $password = "yNQ8M2uh";
    $dbname = "cleidner";
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
            item_descriptors SET('0','1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','32')
            )";
    sql_query($con, $sql);
    
    $sql = "CREATE TABLE pizza_toppings (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, Topping VARCHAR(30)
            )";
    sql_query($con, $sql);
    $sql = "INSERT INTO pizza_toppings (Topping) VALUES (
            'small'), ('medium'), ('large'), ('tomato_sauce'), ('dressing'), ('garlic_butter'), 
            ('hummus'), ('olive_oil'), ('bbq'), ('ricotta'), ('blue'), ('feta'), ('sausage'), ('pepperoni'), 
            ('beef'), ('ham'), ('bacon'), ('chicken'), ('pineapple'), ('onions'), ('red_onions'), ('tomatos'), 
            ('black_olives'), ('green_olives'), ('kalamata_olives'), ('mushrooms'), ('spinach'), ('banana_peppers'),
            ('bell_peppers'), ('oregano'), ('broccoli'), ('garlic')";
     sql_query($con, $sql);
    
    mysqli_close($con);
?>
