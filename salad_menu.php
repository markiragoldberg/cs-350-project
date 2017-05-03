<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<title>Salad Example</title>
	<link rel="stylesheet" type="text/css" href="pizza.css">
</head>

<body>

<p id=logo><img src="Marios_Logo.jpg" alt="pizza_logo"/></p>
<form id="salad_form" name="salad_form" method="post" action="OrderPizza.php">
	
	<h1 class="red_h">Choose Your Salad!</h1>
	<input type="radio" id="house" name="type" value="type" required>House
	<input type="radio" id="combo" name="type" value="type">Combo
	<input type="radio" id="mediterranean" name="type" value="type">Mediterranean
	<input type="radio" id="blt" name="type" value="type">BLT

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
	Name: <input type="text" id="name" name="name"/><br/>
    Phone: <input type="text" id="phone" name="phone"/><br/>
    Credit Card: <input type="text" id="card" name="card"/><br/>
    <input type="text" id="item" name="item"/><br/>

<br><br>
<input id=submit type="submit" value="Submit"/>

<script type="text/javascript" src="salad_submit.js"></script>

</form>
		
</body>
</html>
