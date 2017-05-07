<!DOCTYPE html >
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<title>Mario's Pizza</title>
	<link rel="stylesheet" type="text/css" href="pizza.css">
</head>

<body>

<p id=logo><img src="Marios_Logo.jpg" alt="pizza_logo" /></p>

<?php
    session_start();
    
    if(!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        echo "Your shopping cart is empty.";
    } else {
        $cart = $_SESSION['cart'];
        echo "Your shopping cart has " . count($cart) . " items in it. <a href='checkout.php'>Checkout</a>";
    }
?>

<div id="login_form">
    Phone #:<input type="text" id="phone" name="phone" onBlur="checkPhone()"/>
    <button onclick="login()">Track Your Order</button>
</div>
<div id="track_display" style="display:none">
    <span id="track_text"></span>
    <button onclick="logout()">Logout</button>
</div>

<form id="calzone_form" name="calzone_form" method="post" action="add_calzone_to_cart.php">

<h1 class="green_h">What is a Calzone?</h1>
<h2> A calzone is a baked turnover made with pizza dough. Our calzones are stuffed with mozzarella, house made garlic butter, choice of toppings and a side of Mario's classic red sauce! </h2>

	<h1 class="red_h">Cheeses</h1>
	<table>
		<tr>
            <!-- This is how it's done -->
            <td>
            <input type="checkbox"  id="ricotta" value="ricotta">Ricotta Cheese</td>
            <td>
            <input type="checkbox"  id="blue" value="blue">Blue Cheese</td>
            <td>
            <input type="checkbox"  id="feta" value="feta">Feta Cheese</td>
		</tr>
	</table>
	
	<h1 class="green_h">Meats</h1>
	<table>
		<tr>
            <td>
            <input type="checkbox"  id="sausage" value="sausage">Sausage</td>
            <td>
            <input type="checkbox"  id="pepperoni" value="pepperoni">Pepperoni</td>
            <td>
            <input type="checkbox"  id="beef" value="beef">Beef</td>
            <td>
            <input type="checkbox"  id="ham" value="ham">Ham</td>
            <td>
            <input type="checkbox"  id="bacon" value="bacon">Bacon</td>
            <td>
            <input type="checkbox"  id="chicken" value="chicken">Chicken</td>
		</tr>
	</table>

	<h1 class="red_h">Veggies</h1>
	<table>
		<tr>
            <td>
            <input type="checkbox"  id="pineapple" value="pineapple">Pineapple</td>
            <td>
            <input type="checkbox"  id="onions" value="onions">Onions</td>
            <td>
            <input type="checkbox"  id="red_onions" value="red_onions">Red Onions</td>
            <td>
            <input type="checkbox"  id="tomatoes" value="tomatoes">Tomatoes</td>
            <td>
            <input type="checkbox"  id="black_olives" value="black_olives">Black Olives</td>
            <td>
            <input type="checkbox"  id="green_olives" value="green_olives">Green Olives</td>
            <td>
            <input type="checkbox"  id="kalamata_olives" value="kalamata_olives">Kalamata Olives</td>
		</tr>
		
		<tr>
            <td>
            <input type="checkbox"  id="mushrooms" value="mushrooms">Mushrooms</td>
            <td>
            <input type="checkbox"  id="spinach" value="spinach">Spinach</td>
            <td>
            <input type="checkbox"  id="banana_peppers" value="banana_peppers">Banana Peppers</td>
            <td>
            <input type="checkbox"  id="bell_peppers" value="bell_peppers">Bell Peppers</td>
            <td>
            <input type="checkbox"  id="oregano" value="oregano">Oregano</td>
            <td>
            <input type="checkbox"  id="broccoli" value="broccoli">Broccoli</td>
            <td>
            <input type="checkbox"  id="garlic" value="garlic">Garlic</td>
		</tr>
	</table>
<br><br>
<input type="text" id="item" name="item"/><br/>
Number of calzones: <input type="number" id="count" name="count" value="1" min="1" max="20"/>
<input type="text" id="price_display" disabled /><input id=submit type="submit" value="Add calzone to cart"/>

<script type="text/javascript" src="track.js"></script>
<script type="text/javascript" src="calzone_submit.js"></script>

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
