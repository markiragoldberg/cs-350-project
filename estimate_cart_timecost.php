<?php

// Get time to complete all items in current shopping cart
function estimate_cart_timecost() {
    // Only start session if not started
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $timecost = 0;
    foreach($_SESSION['cart'] as $item) {
        $type = strstr($item, ',', true);
        switch($type) {
            case 'pizza':
                $timecost += 15;
                break;
            case 'calzone':
                $timecost += 10;
                break;
            case 'salad':
                $timecost += 3;
                break;
        }
    }
    
    return $timecost;
}
?>
