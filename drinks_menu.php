<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<title>Mario's Drink Menu</title>
	<link rel="stylesheet" type="text/css" href="pizza.css">
</head>

<body>

<p id=logo><img src="Marios_Logo.jpg" alt="pizza_logo"/></p>

<?php
    session_start();
    
    if(!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        echo "Your shopping cart is empty.";
    } else {
        $cart = $_SESSION['cart'];
        echo "Your shopping cart has " . count($cart) . " items in it. <a href='checkout.php'>Checkout</a>";
    }
?>

<form id="salad_form" name="salad_form" method="post" action="add_pizza_to_cart.php">
	
	<h1 class="red_h">Choose Your Drink!</h1>
	<input type="radio" id="water" name="type" value="type">Water
	<input type="radio" id="pepsi" name="type" value="type">Pepsi
	<input type="radio" id="diet_pepsi" name="type" value="type">Diet Pepsi
	<input type="radio" id="mountain_dew" name="type" value="type">Mountain Dew
	<input type="radio" id="diet_mountain_dew" name="type" value="type">Diet Mountain Dew
	<input type="radio" id="dr_pepper" name="type" value="type"> Dr.Pepper
	<input type="radio" id="diet_dr_pepper" name="type" value="type">Diet Dr.Pepper
	<input type="radio" id="root_beer" name="type" value="type">Root Beer
	<input type="radio" id="sprite" name="type" value="type">Sprite
	

<br><br>
<input id=submit type="submit" value="Add Drink to cart"/>

<script type="text/javascript" src="salad_submit.js"></script>

</form>

<h2></h2>

<ul>
  <li><a href="pizza_menu.php">Pizza Menu</a></li>
  <li><a href="salad_menu.php">Salad Menu</a></li>
  <li><a href="calzone_menu.php">Calzone Menu</a></li>
  <li><a href="drinks_menu.php">Drinks Menu</a></li>
  <li><a href="checkout.php">Cart</a></li>
</ul>

		
</body>
</html>
