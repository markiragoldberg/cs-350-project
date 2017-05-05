<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $cart_size = count($_SESSION['cart']);
    $delete_index = $_REQUEST["item"];
    // If item exists
    if($delete_index < $cart_size) {
        // Delete item
        unset($_SESSION['cart'][$delete_index]);
        // Re-index session array to fill resulting hole
        $_SESSION['cart'] = array_values($_SESSION['cart']);
        // Return index of deleted item
        echo $delete_index;
    } else {
        // Return -1 to indicate item did not exist
        echo -1;
    }
?>
