<!DOCTYPE html >
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<title>Pizza Example</title>
	<link rel="stylesheet" type="text/css" href="Pizza_example.css">
</head>

<body>

<p id=logo><img src="Marios_Logo.jpg" alt="pizza_logo" /></p>

<!--
    Link to shopping cart
    This could look nicer later
-->
<?php
    session_start();
    
    if(!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        echo "Your shopping cart is empty.";
    } else {
        $cart = $_SESSION['cart'];
        echo "Your shopping cart has " . count($cart) . " items in it. <a href='checkout.php'>Checkout</a>";
    }
?>

<form id="pizza_form" name="pizza_form" method="post" action="add_pizza_to_cart.php">
	
	<h1 class="red_h">Size</h1>
	<input type="radio" id="small" name="size" value="small" required>Small
	<input type="radio" id="medium" name="size" value="medium">Medium	
	<input type="radio" id="large" name="size" value="large">Large
	
	<h1 class="green_h">Sauces</h1>
	<input type="radio" id="tomato_sauce" name="sauce" value="tomato_sauce" required>Tomato Sauce
	<input type="radio" id="dressing" name="sauce" value="dressing">Dressing
	<input type="radio" id="garlic_butter" name="sauce" value="garlic_butter">House-Made Garlic Butter	
	<input type="radio" id="hummus" name="sauce" value="hummus">Hummus
	<input type="radio" id="olive_oil" name="sauce" value="olive_oil">Olive Oil

	<h1 class="red_h">Cheeses</h1>
	<table>
		<tr>
            <!-- This is how it's done -->
            <td><label for="ricotta"><img class="food_pic" src="ricotta_cheese.jpg" onclick="click_color(this);"></label>
            <input type="checkbox" class="image_checkbox" id="ricotta" value="ricotta">Ricotta Cheese</td>
            <td><label for="blue"><img class="food_pic" src="blue_cheese.png" onclick="click_color(this);"></label>
            <input type="checkbox" class="image_checkbox" id="blue" value="blue">Blue Cheese</td>
            <td><label for="feta"><img class="food_pic" src="feta_cheese.jpg" onclick="click_color(this);"></label>
            <input type="checkbox" class="image_checkbox" id="feta" value="feta">Feta Cheese</td>
		</tr>
	</table>
	
	<h1 class="green_h">Meats</h1>
	<table>
		<tr>
            <td><label for="sausage"><img class="food_pic" src="sausage.jpg" onclick="click_color(this);"></label>
            <input type="checkbox" class="image_checkbox" id="sausage" value="sausage">Sausage</td>
            <td><label for="pepperoni"><img class="food_pic" src="pepperoni.jpg" onclick="click_color(this);"></label>
            <input type="checkbox" class="image_checkbox" id="pepperoni" value="pepperoni">Pepperoni</td>
            <td><label for="beef"><img class="food_pic" src="beef.jpg" onclick="click_color(this);"></label>
            <input type="checkbox" class="image_checkbox" id="beef" value="beef">Beef</td>
            <td><label for="ham"><img class="food_pic" src="ham.jpg" onclick="click_color(this);"></label>
            <input type="checkbox" class="image_checkbox" id="ham" value="ham">Ham</td>
            <td><label for="bacon"><img class="food_pic" src="bacon.jpg" onclick="click_color(this);"></label>
            <input type="checkbox" class="image_checkbox" id="bacon" value="bacon">Bacon</td>
            <td><label for="chicken"><img class="food_pic" src="chicken.jpg" onclick="click_color(this);"></label>
            <input type="checkbox" class="image_checkbox" id="chicken" value="chicken">Chicken</td>
		</tr>
	</table>

	<h1 class="red_h">Veggies</h1>
	<table>
		<tr>
            <td><label for="pineapple"><img class="food_pic" src="pineapple.jpg" onclick="click_color(this);"></label>
            <input type="checkbox" class="image_checkbox" id="pineapple" value="pineapple">Pineapple</td>
            <td><label for="onions"><img class="food_pic" src="onion.png" onclick="click_color(this);"></label>
            <input type="checkbox" class="image_checkbox" id="onions" value="onions">Onions</td>
            <td><label for="red_onions"><img class="food_pic" src="red_onion.png" onclick="click_color(this);"></label>
            <input type="checkbox" class="image_checkbox" id="red_onions" value="red_onions">Red Onions</td>
            <td><label for="tomatoes"><img class="food_pic" src="tomatoes.png" onclick="click_color(this);"></label>
            <input type="checkbox" class="image_checkbox" id="tomatoes" value="tomatoes">Tomatoes</td>
            <td><label for="black_olives"><img class="food_pic" src="black_olives.jpg" onclick="click_color(this);"></label>
            <input type="checkbox" class="image_checkbox" id="black_olives" value="black_olives">Black Olives</td>
            <td><label for="green_olives"><img class="food_pic" src="green_olives.jpg" onclick="click_color(this);"></label>
            <input type="checkbox" class="image_checkbox" id="green_olives" value="green_olives">Green Olives</td>
            <td><label for="kalamata_olives"><img class="food_pic" src="kalamata_olives.jpg" onclick="click_color(this);"></label>
            <input type="checkbox" class="image_checkbox" id="kalamata_olives" value="kalamata_olives">Kalamata Olives</td>
		</tr>
		
		<tr>
            <td><label for="mushrooms"><img class="food_pic" src="mushrooms.jpg" onclick="click_color(this);"></label>
            <input type="checkbox" class="image_checkbox" id="mushrooms" value="mushrooms">Mushrooms</td>
            <td><label for="spinach"><img class="food_pic" src="spinach.jpg" onclick="click_color(this);"></label>
            <input type="checkbox" class="image_checkbox" id="spinach" value="spinach">Spinach</td>
            <td><label for="banana_peppers"><img class="food_pic" src="banana_peppers.jpg" onclick="click_color(this);"></label>
            <input type="checkbox" class="image_checkbox" id="banana_peppers" value="banana_peppers">Banana Peppers</td>
            <td><label for="bell_peppers"><img class="food_pic" src="bell_peppers.jpg" onclick="click_color(this);"></label>
            <input type="checkbox" class="image_checkbox" id="bell_peppers" value="bell_peppers">Bell Peppers</td>
            <td><label for="oregano"><img class="food_pic" src="oregano.jpg" onclick="click_color(this);"></label>
            <input type="checkbox" class="image_checkbox" id="oregano" value="oregano">Oregano</td>
            <td><label for="broccoli"><img class="food_pic" src="broccoli.jpg" onclick="click_color(this);"></label>
            <input type="checkbox" class="image_checkbox" id="broccoli" value="broccoli">Broccoli</td>
            <td><label for="garlic"><img class="food_pic" src="garlic.jpg" onclick="click_color(this);"></label>
            <input type="checkbox" class="image_checkbox" id="garlic" value="garlic">Garlic</td>
		</tr>
	</table>
<br><br>
<input type="text" id="item" name="item"/><br/>
<input id=submit type="submit" value="Add pizza to cart"/>

<script type="text/javascript" src="pizza_submit.js"></script>

</form>
		
</body>
</html>
