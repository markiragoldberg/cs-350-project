<?php
    $servername = "dbserv.cs.siu.edu";
    $username = "mgoldberg";
    $password = "Eu7BugDf";
    $dbname = "mgoldberg";
    $con = mysqli_connect($servername, $username, $password, $dbname);
    if(!$con)
    {
        die("Unable to connect to the database");
    }
    
    /*
     * Tables
     * 
     * orders
     * customers
     * items
     * pizzas, pizzatoppingsets, pizzatoppings, crusts, sauces, sizes
     * drinks, drinktypes
     */
    
    $sql = "CREATE TABLE orders (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            customer_id INT(6) UNSIGNED
            )";
    if(!mysqli_query($con, $sql)) {
        echo "Error creating orders table.<br/>";
    }
    
    $sql = "CREATE TABLE customers (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50),
            phone int(11),
            credit_card int (19)
            )";
    if(!mysqli_query($con, $sql)) {
        echo "Error creating customers table.<br/>";
    }
    
    $sql = "CREATE TABLE items (
            id INT(6) UNSIGNED,
            item_type TINYINT,
            order_id INT(6) UNSIGNED
            )";
    if(!mysqli_query($con, $sql)) {
        echo "Error creating items table.<br/>";
    }
    
    
    $sql = "CREATE TABLE pizzas (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            pizzatopping_id INT(6) UNSIGNED,
            item_count SMALLINT,
            pizzasize_type TINYINT UNSIGNED,
            crust_type TINYINT UNSIGNED,
            sauce_type TINYINT UNSIGNED
            )";
    if(!mysqli_query($con, $sql)) {
        echo "Error creating pizzas table.<br/>";
    }
    
    $sql = "CREATE TABLE pizzatoppings (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            topping_type TINYINT UNSIGNED
            )";
    if(!mysqli_query($con, $sql)) {
        echo "Error creating pizzatoppings table.<br/>";
    }
    
    $sql = "CREATE TABLE pizzatopping_types (
            id TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name varchar(20)
            )";
    if(!mysqli_query($con, $sql)) {
        echo "Error creating pizzatopping_types table.<br/>";
    }
    
    $sql = "CREATE TABLE pizzasize_types (
            id TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name varchar(20),
            price INT(4) UNSIGNED
            )";
    if(!mysqli_query($con, $sql)) {
        echo "Error creating pizzasize_types table.<br/>";
    }
    
    $sql = "CREATE TABLE pizzasauce_types (
            id TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name varchar(20)
            )";
    if(!mysqli_query($con, $sql)) {
        echo "Error creating pizzasauce_types table.<br/>";
    }
    
    $sql = "CREATE TABLE pizzacrust_types (
            id TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name varchar(20),
            price INT(4) UNSIGNED
            )";
    if(!mysqli_query($con, $sql)) {
        echo "Error creating pizzacrust_types table.<br/>";
    }
    
    $sql = "CREATE TABLE drinks (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            drink_type TINYINT UNSIGNED
            )";
    if(!mysqli_query($con, $sql)) {
        echo "Error creating drinks table.<br/>";
    }
    
    $sql = "CREATE TABLE drink_types (
            id TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name varchar(50)
            )";
    if(!mysqli_query($con, $sql)) {
        echo "Error creating drink_types table.<br/>";
    }
    
    mysqli_close($con);
?>
