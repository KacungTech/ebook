<?php
include_once("connection.php");

if(isset($_POST["btnpeyment"])){

$id = $_POST['paymentid'];
$dir1="pembayaran/";
$file_name = $_FILES["image"]["name"];

$targetcover=$dir1.basename($_FILES["image"]["name"]);

if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetcover)){
	
	$update  = "update `payments` SET  payment_report=:report where paymentid=:id;";
					
					$query = $dbConnection->prepare($update);
                
        
        $query->bindparam(':report', $file_name);
        $query->bindparam(':id', $id);
        
		if($query->execute()){
			header("Location: thanks.php");
		}else{
			echo "gagal";
		}
	
}	
		
}
?>