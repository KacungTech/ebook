<?php

include_once("../connection.php");
 

$id = $_GET['id'];
 

$delete = "DELETE FROM books WHERE bookid=:id";
$query = $dbConnection->prepare($delete);
$query->execute(array(':id' => $id));
 
header("Location:editbooks.php");
?>