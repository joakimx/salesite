<?php
//Databse connection_status
$con = new mysqli("localhost", "notroot1", "P@ssw0rd", "ecommerce1");
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

?>
