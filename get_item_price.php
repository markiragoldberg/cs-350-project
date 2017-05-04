<?php

function get_item_price($item) {
    $type = strstr($item, ',', true);
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
                $price += 10.5;
                break;
            case "large":
                $price += 14.0;
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
    return 8;
}
function get_salad_price($salad) {  
    return 5;
}
function get_drink_price($drink) {  
    return 2;
}

?>
