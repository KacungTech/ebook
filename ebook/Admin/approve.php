<?php
include_once("../connection.php");

if(isset($_GET["id"])){

$id = $_GET['id'];

	$select = "select * from payments where paymentid=:id2";
	$query = $dbConnection->prepare($select);
	$query->bindparam(':id2', $id); 
	$query->execute();
	$data=$query->fetch(PDO::FETCH_ASSOC);
	
	$update  = "update `payments` SET  status='sudah_bayar' where paymentid=:id;";
					
					$query = $dbConnection->prepare($update);
                
        
        
        $query->bindparam(':id', $id);
        
		if($query->execute()){
				$insert = "INSERT INTO `user_books` (`libraryid`, `userid`, `bookid`) 
					VALUES (NULL, :id,:bookid);";	
			$query = $dbConnection->prepare($insert);
        $query->bindparam(':id', $data['userid']);
        $query->bindparam(':bookid', $data['bookid']);
        
		$query->execute();
			header("Location: payment.php");
		}else{
			echo "gagal";
		}
	
		
}
?>