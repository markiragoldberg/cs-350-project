<?php

function get_item_price($item) {
    $type = strstr($item, ',', true);
    // If no descriptors, use just the item
    if(!$type) {
        $type = $item;
    }
    switch($type) {
        case 'pizza':
            return get_pizza_price($item);
        case 'calzone':
            return get_calzone_price($item);
        case 'salad':
            return get_salad_price($item);
        case 'drink':
            return get_drink_price($item);
        default:
            die("Tried to get price of item with unrecognized type");
    }
}

// TODO WARNING REDO Put the prices in the db when you can do so without
// breaking anything, and get the prices from the db too

function get_pizza_price($pizza) {    
    $price = 0;
    $descriptors = explode(', ', $pizza);
    foreach($descriptors as $d) {
        switch($d) {
            // Sizes are expensive
            case "small":
                $price += 7.0;
                break;
            case "medium":
                $price += 9.0;
                break;
            case "large":
                $price += 10.75;
                break;
            // The itemtype is free
            // The sauce is free
            case "pizza":
            case "tomato_sauce":
            case "dressing":
            case "garlic_butter":
            case "hummus":
            case "olive_oil":
                break;
            // Toppings are $0.75
            default:
                $price += 0.75;
        }
    }
    return $price;
}
function get_calzone_price($calzone) {  
    return 7.25;
}
function get_salad_price($salad) {  
    return 5;
}
function get_drink_price($drink) {  
    return 2;
}

?>
