<?php
include_once("../connection.php");

if(!empty($_GET['id'])){
	$id = $_GET['id'];
    //get content from database
    $user = "select * from payments where paymentid=:id";
	
		$query = $dbConnection->prepare($user);
                
        $query->bindparam(':id', $id);
		$query->execute();
    
		$count = $query->rowCount();
		
		if($count > 0){
			$data = $query->fetch(PDO::FETCH_ASSOC); ?>
		<div class="row">
		<div class="col-md-5">
			<img src="../pembayaran/<?php echo $data["payment_report"]?>" width="297px" height="397px" alt="sao">
						
		</div>
		</div>
		<?php
    }else{
        echo 'Content not found....';
    }
}else{
    echo 'Content not found....';
}
?>