<?php
include_once("connection.php");

if(isset($_POST["btnpeyment"])){
$userid = $_POST["userid"];
$bookid = $_POST["bookid"];
	
	$insert = "INSERT INTO `payments` (`userid`, `bookid`, `paymentid`, `status`, `payment_report`) 
					VALUES (:userid, :bookid, NULL, 'belum_bayar', NULL);";
					
					$query = $dbConnection->prepare($insert);
                
        $query->bindparam(':userid', $userid);
        $query->bindparam(':bookid', $bookid);
        
		if($query->execute()){
			$idpayment = "select * from payments where userid=:id AND bookid=:bookid";
		$query = $dbConnection->prepare($idpayment);	
		$query->bindparam(':id', $userid);
        $query->bindparam(':bookid', $bookid);
		$query->execute();
		$data = $query->fetch(PDO::FETCH_ASSOC);
		$id = $data['paymentid'];
		
			header("Location: paymentReport.php?id=$id");
		}else{
			echo "gagal";
		}
	
	
		
}
?>