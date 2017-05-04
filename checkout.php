<!DOCTYPE html >
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<title>Mario's Pizza</title>
	<link rel="stylesheet" type="text/css" href="pizza.css">
</head>

<body>

<p id=logo><img src="Marios_Logo.jpg" alt="pizza_logo" /></p>

<h3 class="red_h">Your Order</h3>
<?php
    session_start();
    include('estimate_current_delay.php');
    include('estimate_cart_timecost.php');
    
    if(!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        echo "Your shopping cart is empty.";
    } else {
        echo "Your cart has the following items in it:<br/>";
        $cart_size = count($_SESSION['cart']);
        for($i = 0; $i < $cart_size; ++$i) {
            echo "<span>" .
                 $_SESSION['cart'][$i] . // the actual cart item string; not super user friendly
                 "<button class=\"delete_button\" id=\"cart_button_$i\" onclick=\"delete_cart_item(this)\">Delete</button>" .
                 "<br/></span>";
        }
    }
    echo "<br/>";
    // Display time estimate for existing orders
    $delay_minutes = estimate_current_delay();
    $cart_timecost = estimate_cart_timecost();
    if($delay_minutes) {
        echo "Other customers are ahead of you!<br/>
              It will take us <span class=\"dynamic_warning\">$delay_minutes minutes</span> before we can start your order.<br/>";
    }
    // Display time estimate for your own order
    if($cart_timecost) {
        echo "<span id=\"timecost_display\">Your order will take <span class=\"dynamic_info\">" .
             ($delay_minutes ? "an additional " : "") .
             "<span id=\"timecost_value\">$cart_timecost</span> minutes</span> to fill" .
             ($delay_minutes ? " after that" : "") .
             ".</span>";
    }
?>
<br/>
<h3 class="green_h">Payment info</h3>
<form method='post' action='OrderPizza.php'>
    <table>
        <tr>
            <td>Name:</td>
            <td><input type="text" id="name" name="name" required /></td>
        </tr>
        <tr>
            <td>Phone:</td>
            <td><input type="text" id="phone" name="phone" required /></td>
        </tr>
        <tr>
            <td>Credit Card:</td>
            <td><input type="text" id="card" name="card" required /></td>
        </tr>
        <tr>
            <td>Card Security Code:</td>
            <td><input type="text" id="ccSec" name="ccSec" required /></td>
        </tr>
    </table>
    <input type="text" id="item" name="item"/><br/>
    <input type="submit" value="Confirm Order"/>
    <input type="button" onclick="location.href='clear_cart.php';" value="Clear Your Cart"/>
</form>

<script type="text/javascript" src="checkout.js"></script>

</body>
</html>
