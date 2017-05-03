<?php
    session_start();
    
    if(!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    
    // Right now the pizza is validated when the order is submitted
    // It would be nicer if it was also validated when ordered, too
    array_push($_SESSION['cart'], $_POST["item"]);
    header('Location: pizza_menu.php');
?>
