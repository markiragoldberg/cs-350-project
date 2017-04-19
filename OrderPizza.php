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


    $sql = "INSERT INTO pizza_customers (name, phone, credit_card) VALUES ('$name', '$phone', '$card')";
    $result = (mysqli_query($con, $sql));
    
    
    $sql = "SELECT id from pizza_customers where phone='$phone'";
    $customerid = (mysqli_query($con, $sql));
    $toppings = explode(', ', $item);
	echo $toppings[0];

      switch ($toppings[0]){
         
         case "pizza":

    		//section for inserting toppings into table

    		$size = count($toppings);
   		echo $size;
		$sql = "SELECT * from pizza_toppings where Topping = '$toppings[1]'";
		$nextTopping = mysqli_fetch_assoc(mysqli_query($con, $sql));
		$set = "('".$nextTopping["id"]."'";
    		for ($i=2; $i < $size; $i++){
    			$sql = "SELECT * from pizza_toppings where Topping = '$toppings[$i]'";
			//echo $sql;
    			$nextTopping = mysqli_fetch_assoc(mysqli_query($con, $sql));
			$set.=",'".$nextTopping["id"]."'";
    			//$set->add($nextTopping);
			 
		echo" ".$nextTopping["id"]." ";
    		}
		$set.=")";
		echo$set;
    		$itemtype = 0;
           
         	break;
         case   "calzone":
         
         	$itemtype = 1;
         	break;
         
         case   "salad":
         
         	$itemtype = 2;
         	break;
         
         case   "breadsticks":
         
         	$itemtype = 3;
         	break;
         
         case   "drink":
         
         	$itemtype = 4;
         	break;
         
         default:
		echo "error";
         
}   
        
         
    $sql = "INSERT INTO pizza_items (customer_id, item_type) VALUES ('$customerid', '$itemtype')";
    if($result=(mysqli_query($con, $sql))){
        echo "success";
    } else {
    	echo "failure";
    }
    mysqli_close($con);
    ?>
