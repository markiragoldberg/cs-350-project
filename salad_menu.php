<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<title>Mario's Salad Menu</title>
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
	
	<h1 class="red_h">Choose Your Salad!</h1>
	<input type="radio" id="house" name="type" value="house" required>House
	<input type="radio" id="combo" name="type" value="combo">Combo
	<input type="radio" id="mediterranean" name="type" value="mediterranean">Mediterranean
	<input type="radio" id="blt" name="type" value="blt">BLT

	<h1 class="green_h">Add Extra Toppings!</h1>
	<input type="checkbox" id="mozzarella" name="mozzarella" value="mozzarella">Mozzarella Cheese
	<input type="checkbox" id="feta" name="feta" value="feta">Feta Cheese
	<input type="checkbox" id="pepperoni" name="pepperoni" value="pepperoni">Pepperoni
	<input type="checkbox" id="ham" name="ham" value="ham">Ham
	<input type="checkbox" id="bacon" name="bacon" value="bacon">Smoked Bacon
	<input type="checkbox" id="onions" name="onions" value="onions">Onions
	<input type="checkbox" id="red_onions" name="red_onions" value="red_onions">Red Onions
	<input type="checkbox" id="tomatoes" name="tomatoes" value="tomatoes">Tomatoes
	<input type="checkbox" id="black_olives" name="black_olives" value="black_olives">Black Olives
	<input type="checkbox" id="green_olives" name="green_olives" value="green_olives">Green Olives
	<input type="checkbox" id="kalamata_olives" name="kalamata_olives" value="kalamata_olives">Kalamata Olives
	<input type="checkbox" id="bell_peppers" name="bell_peppers" value="bell_peppers">Bell Peppers
	<input type="checkbox" id="croutons" name="croutons" value="croutons">Croutons
	
<h3 class="red_h"> All Salads Are Served With Our House Dressing!</h3>
    <br/>

<br><br>
<input id=submit type="submit" value="Add Salad to cart"/>

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
