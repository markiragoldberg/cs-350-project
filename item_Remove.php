<?php
    $itemid = $_GET["item"];
    
    $servername = "dbserv.cs.siu.edu";
    $username = "mgoldberg";
    $password = "Eu7BugDf";
    $dbname = "mgoldberg";
    $con = mysqli_connect($servername, $username, $password, $dbname);
    if(!$con)
    {
        die("Unable to connect to the database");
    }
    
    $sql = "DELETE FROM pizza_items WHERE id = ?";
    $deleteRow = $con->prepare($sql);
    $deleteRow->bind_param("i", $itemid);
    $deleteRow->execute();
    $result = mysqli_stmt_get_result($deleteRow);
    print $result;
    
    $deleteRow->close();
    mysqli_close($con);
    
?>
