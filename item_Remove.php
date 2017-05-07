<?php
		$itemid = $_GET["item"];
    function sql_query($con, $sql) {
        $result = mysqli_query($con, $sql);
        if(!$result) {
            return "Error with query '" . $sql . "'.<br/>";
        } else {
            return $result;
        }
    }
    $servername = "dbserv.cs.siu.edu";
    $username = "cleidner";
    $password = "yNQ8M2uh";
    $dbname = "cleidner";
    $con = mysqli_connect($servername, $username, $password, $dbname);
    if(!$con)
    {
        die("Unable to connect to the database");
    }
    $sql = "DELETE FROM pizza_items WHERE id = '$itemid'";
    $result = (sql_query($con, $sql));
    print $result;
    mysqli_close($con);
    
    ?>
