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
    sql_query($con, "DROP TABLE pizza_descriptors;");
    sql_query($con, "DROP TABLE calzone_descriptors;");
    sql_query($con, "DROP TABLE salad_descriptors;");
    sql_query($con, "DROP TABLE drink_descriptors;");
    

    # Recreate tables to latest standards
    $sql = "CREATE TABLE pizza_customers (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50),
            phone VARCHAR(14),
            credit_card VARCHAR(24)
            )";
    sql_query($con, $sql);
    
    $sql = "CREATE TABLE pizza_items (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            customer_id INT(6) UNSIGNED,
            item_type TINYINT,
            item_descriptors SET('0','1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','32')
            )";
    sql_query($con, $sql);
    
    $sql = "CREATE TABLE pizza_descriptors (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(30)
            )";
    sql_query($con, $sql);
    $sql = "INSERT INTO pizza_descriptors (name) VALUES (
            'small'), ('medium'), ('large'), ('tomato_sauce'), ('dressing'), ('garlic_butter'), 
            ('hummus'), ('olive_oil'), ('ricotta'), ('blue'), ('feta'), ('sausage'), ('pepperoni'), 
            ('beef'), ('ham'), ('bacon'), ('chicken'), ('pineapple'), ('onions'), ('red_onions'), ('tomatoes'), 
            ('black_olives'), ('green_olives'), ('kalamata_olives'), ('mushrooms'), ('spinach'), ('banana_peppers'),
            ('bell_peppers'), ('oregano'), ('broccoli'), ('garlic')";
     sql_query($con, $sql);
    $sql = "CREATE TABLE calzone_descriptors (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(30)
            )";
    sql_query($con, $sql);
    $sql = "INSERT INTO calzone_descriptors (name) VALUES (
            'tomato_sauce'), ('dressing'), ('ricotta'), ('blue'), ('feta'), ('sausage'), ('pepperoni'), 
            ('beef'), ('ham'), ('bacon'), ('chicken'), ('pineapple'), ('onions'), ('red_onions'), ('tomatos'), 
            ('black_olives'), ('green_olives'), ('kalamata_olives'), ('mushrooms'), ('spinach'), ('banana_peppers'),
            ('bell_peppers'), ('oregano'), ('broccoli'), ('garlic')";
     sql_query($con, $sql);
  /*  $sql = "CREATE TABLE appetizers (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, appetizer VARCHAR(30)
            )";
    sql_query($con, $sql);
    $sql = "INSERT INTO appetizers (appetizer) VALUES (
            'breadstix'), ('cheesestix'), ('pepperonistix'), ('meatstix'), ('veggiestix'), ('garlicbread')";
     sql_query($con, $sql);*/
    $sql = "CREATE TABLE salad_descriptors (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(30)
            )";
    sql_query($con, $sql);
    $sql = "INSERT INTO salad_descriptors (name) VALUES 
            ('house'), ('combo'), ('mediterranean'), ('blt')";
     sql_query($con, $sql);
  /*  $sql = "CREATE TABLE subs (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, sub VARCHAR(30)
            )";
    sql_query($con, $sql);
    $sql = "INSERT INTO subs (sub) VALUES (
            'italiansub'), ('pizzasub')";
     sql_query($con, $sql);
   */ $sql = "CREATE TABLE drink_descriptors (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(30)
            )";
    sql_query($con, $sql);
    $sql = "INSERT INTO drink_descriptors (name) VALUES 
            ('pepsi'), ('diet_pepsi'), ('mountain_dew'), ('tropicana_pink_lemonade'), ('dr_pepper'), ('7_up'), ('sweet_tea'), 
            ('tea'), ('ski'), ('rummy'), ('orange'), ('ginger_ale'), ('ibc_root_beer'), ('san_pellegrino'), ('decaf_coffee'), 
            ('coffee'), ('hot_tea')";
     sql_query($con, $sql);
    
    mysqli_close($con);
?>
