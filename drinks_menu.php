<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<title>Mario's Pizza</title>
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

<form id="drinks_form" name="drinks_form" method="post" action="add_drinks_to_cart.php">
	
	<h1 class="red_h">Choose Your Drink!</h1>
	<input type="radio" id="water" name="type" value="water">Water
	<input type="radio" id="pepsi" name="type" value="pepsi" checked>Pepsi
	<input type="radio" id="diet_pepsi" name="type" value="diet_pepsi">Diet Pepsi
	<input type="radio" id="mountain_dew" name="type" value="mountain_dew">Mountain Dew
	<input type="radio" id="diet_mountain_dew" name="type" value="diet_mountain_dew">Diet Mountain Dew
	<input type="radio" id="dr_pepper" name="type" value="dr_pepper"> Dr.Pepper
	<input type="radio" id="diet_dr_pepper" name="type" value="diet_dr_pepper">Diet Dr.Pepper
	<input type="radio" id="root_beer" name="type" value="root_beer">Root Beer
	<input type="radio" id="sprite" name="type" value="sprite">Sprite
	

<br><br>
<input type="text" id="item" name="item"/><br/>
Number of drinks: <input type="number" id="count" name="count" value="1" min="1" max="20"/>
<input type="text" id="price_display" disabled /><input id=submit type="submit" value="Add drink to cart"/>

<script type="text/javascript" src="drinks_submit.js"></script>

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
