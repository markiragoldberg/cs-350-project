<!DOCTYPE html >
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<title>Pizza Example</title>
	<link rel="stylesheet" type="text/css" href="Pizza_example.css">
</head>

<body>

<p id=logo><img src="Marios_Logo.jpg" alt="pizza_logo" /></p>

<?php
    session_start();
    
    if(!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        echo "Your shopping cart is empty.";
    } else {
        echo "Your cart has the following items in it:<br/>";
        foreach ($_SESSION['cart'] as $item) {
            echo $item . "<br/>";
        }
    }
?>
<br/>
<form method='post' action='OrderPizza.php'>
    <table>
        <tr>
            <td>Name:</td>
            <td><input type="text" id="name" name="name"/></td>
        </tr>
        <tr>
            <td>Phone:</td>
            <td><input type="text" id="phone" name="phone"/></td>
        </tr>
        <tr>
            <td>Credit Card:</td>
            <td><input type="text" id="card" name="card"/></td>
        </tr>
    </table>
    <input type="text" id="item" name="item"/><br/>
    <input type="submit" value="Confirm Order"/>
    <input type="button" onclick="location.href='clear_cart.php';" value="Clear Your Cart"/>
</form>

</body>
</html>
