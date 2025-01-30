<?php

include_once("../connection.php");
 

$id = $_GET['id'];
 

$delete = "DELETE FROM payments WHERE paymentid=:id";
$query = $dbConnection->prepare($delete);
$query->execute(array(':id' => $id));
 
header("Location:payment.php");
?>