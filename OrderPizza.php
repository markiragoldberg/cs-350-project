<?php
    function sql_query($con, $sql) {
        if(!mysqli_query($con, $sql)) {
            echo "Error with query '" . $sql . "'.<br/>";
        }
    }
    //insert the name used
    $item = $_POST["item"];
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $card = $_POST["card"];
    $servername = "dbserv.cs.siu.edu";
    $username = "cleidner";
    $password = "yNQ8M2uh";
    $dbname = "cleidner";
    $con = mysqli_connect($servername, $username, $password, $dbname);
    if(!$con)
    {
        die("Unable to connect to the database");
    }
    echo "working";

    $sql = "INSERT INTO pizza_customers (name, phone, credit_card) VALUES ('$name', '$phone', '$card')";
    $result = (sql_query($con, $sql));
    
    
    $sql = "SELECT id from pizza_customers where phone='$phone'";
    $customerid = (sql_query($con, $sql));
	
    $toppings = explode(', ', $item);
	echo $toppings[0];
$i=1;
      switch ($i){
         
         case 1:
/*
    //section for inserting toppings into table

    $size = count($toppings);
   $set;
    for ($i=1; i < $size; i++){
    $sql = "SELECT id from pizza_toppings where Topping = '$toppings[$i]'";
    $nextTopping = (sql_query($con, $sql));
    $set->add($nextTopping);
    }
    $itemtype = 0; echo ("working");
*/           echo $item;
         break;
         case   'calzone':
         
         $itemtype = 1;
         break;
         
         case   'salad':
         
         $itemtype = 2;
         break;
         
         case   'breadsticks':
         
         $itemtype = 3;
         break;
         
         case   'drink':
         
         $itemtype = 4;
         break;
         
         case default:
	echo 'error';
         
}   
        
         
    $sql = "INSERT INTO pizza_items (customer_id, item_type, item_descriptors) VALUES ('$customerid', '$itemtype', '$set')";
    if($result=(sql_query($con, $sql))){
        
    } else {
    
    }
    mysqli_close($con);
    ?>
