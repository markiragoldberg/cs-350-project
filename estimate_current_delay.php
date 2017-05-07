<?php
function estimate_current_delay() {
    $servername = "dbserv.cs.siu.edu";
    $username = "mgoldberg";
    $password = "Eu7BugDf";
    $dbname = "mgoldberg";
    $con = mysqli_connect($servername, $username, $password, $dbname);
    if(!$con)
    {
        die("Unable to connect to the database");
    }
    
    
    $item_counts = array();
    $i;
    $result = $con->prepare("SELECT count(*) FROM `pizza_items` WHERE item_type = ?");
    $result->bind_param("s", $i);
    for ($i = 0; $i < 4; ++$i) {
        $result->execute();
        $result->bind_result($item_counts[$i]);
        $result->fetch();
    }
    // Delay before all current orders are completed, in minutes
    $current_delay = 0;
    // Pizza = 15 minutes
    $current_delay += $item_counts[0] * 15;
    // Calzone = 10 minutes
    $current_delay += $item_counts[1] * 10;
    // Salad = 3 minutes
    $current_delay += $item_counts[2] * 3;
    // Drink = no time cost
    //$current_delay += $item_counts[3] * 0;
    
    $result->close();
    
    return $current_delay;
}
?>
