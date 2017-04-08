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
		$orderid= ($result["OrderID"])-1;
	}
	$sql= "INSERT INTO AllOrders (OrderID, Name, CardNumber, PhoneNumber) VALUES ('$orderid', '$name', '$cardnumber', '$phonenumber')";

	if(mysqli_query($con, $sql)) {
		echo "Record inserted Successfully.";
	}
	# unfinished code!!!
	$sql= "CREATE TABLE"...
