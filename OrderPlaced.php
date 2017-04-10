<!DOCTYPE>
<html>
<body>
<?php
	$name = $_POST["name"];
	$cardnumber = $_POST["cardnumber"];
	$orderid = $_POST["orderid"];
	$phonenumber = $_POST["phonenumber"];
	$cgpa = $_POST["cgpa"];
	$level = $_POST["level"];
	$servername = "dbserv.cs.siu.edu";
	$username= "cleidner";
	$password="";
	$dbname="cleidner";

	$con=mysqli_connect($servername, $username, $password, $dbname);
	if(!$con)
	{
		die (" unable to connect to the database");
	}
	$sql= "SELECT * FROM ALLOrders ORDER BY OrderID DESC LIMIT 1";
	$result=mysqli_query($con, $sql);
	if ($result==0)
	{
		$orderid=1;
	}
	else{
		$orderid= ($result["OrderID"])+1;
	}
	
	
	$Large = $_POST["large"];
	$Medium = $_POST["medium"];
	$Small = $_POST["small"];
	$Tomato_Sauce = $_POST["tomato_sauce"];
	$Dressing = $_POST["dressing"];
	$Pepperoni = $_POST["pepperoni"];
	$Sausage = $_POST["sausage"];
	$Black_Olives = $_POST["black_olives"];
	$Green_Olives = $_POST["green_olives"];
	$Onions = $_POST["onions"];
	$Beef = $_POST["beef"];
	$Tomato = $_POST["tomato"];
	$Ham = $_POST["ham"];
	$Pineapple = $_POST["pineapple"];
	$Bacon = $_POST["bacon"];
	$Mushroom = $_POST["mushroom"];
	$Banana_Peppers = $_POST["banana_peppers"];
	$Bell_Peppers = $_POST["bell_peppers"];
	$Broccoli = $_POST["broccoli"];
	$Blue_Cheese = $_POST["blue_cheese"];
	$Garlic = $_POST["garlic"];
	$Feta_Cheese = $_POST["feta_cheese"];
	$Chicken = $_POST["chicken"];
	$Spinach = $_POST["Spinach"];
	
	
	
	
	$sql= "INSERT INTO AllOrders (OrderID, Name, CardNumber, PhoneNumber) VALUES ('$orderid', '$name', '$cardnumber', '$phonenumber')";

	if(mysqli_query($con, $sql)) {
		echo "Record inserted Successfully.";
	}
	# unfinished code!!!
	$sql= "Insert into Pizza (OrderID, Large, Medium, Small, Tomato_Sauce, Dressing, Pepperoni, Sausage, Black_Olives, Green_Olives, Onions, Beef, Tomato, Ham, Pineapple, Bacon, Mushroom, Banana_Peppers, Bell_Peppers, Broccoli, Blue_Cheese, Garlic, Feta_Cheese, Chicken, Spinach) values ";
	$sql= $sql."('$orderid', '$Large', '$Medium', '$Small', '$Tomato_Sauce', '$Dressing', '$Pepperoni', '$Sausage', '$Black_Olives', '$Green_Olives', '$Onions', '$Beef', '$Tomato', '$Ham', '$Pineapple', '$Bacon', '$Mushroom', '$Banana_Peppers', '$Bell_Peppers', '$Broccoli', '$Blue_Cheese', '$Garlic', '$Feta_Cheese', '$Chicken', '$Spinach')";
	if(mysqli_query($con, $sql)) {
		echo "Record inserted Successfully.";
	}
