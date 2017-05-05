<?php

include('get_item_price.php');

// Only start session if not started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$total_price = 0;
foreach($_SESSION['cart'] as $item) {
    $item_price = get_item_price($item);
    $total_price += $item_price;
    echo "$item_price, ";
}
echo "$total_price";
?>
