<?php
include_once("connection.php");
session_start();
if(!empty($_GET['id'])){
	$id = $_GET['id'];
	$userid = $_SESSION['userid'];
    //get content from database
    $user = "select * from books where bookid=:id";
	
		$query = $dbConnection->prepare($user);
                
        $query->bindparam(':id', $id);
		$query->execute();
		$count = $query->rowCount();
		
		$cek = "select * from user_books where userid=:userid and bookid=:bookid";
		$query2 = $dbConnection->prepare($cek);
		$query2->bindparam(':userid', $userid);
        $query2->bindparam(':bookid', $id);
		$query2->execute();
		$count2 = $query2->rowCount();
		
		if($count > 0){
			$data = $query->fetch(PDO::FETCH_ASSOC); ?>
		<div class="row">
		<div class="col-md-5">
			<img src="cover/<?php echo $data["bookcover"]?>" width="297px" height="397px" alt="sao">
						
		</div>
		<div class="col-md-7">
		<h2><?php echo $data["booktitle"]?></h2>
		<h2><?php echo $data["description"]?></h2>
		<?php
		if ($data['price'] == 0){ ?>
			<a href="readBook.php?id=<?php echo $id ?>" class="btn btn-primary">Read</a>
		<?php
		} 
		else{ ?>
			<?php if($count2 > 0) { ?>
			
			<a href="readBook.php?id=<?php echo $id ?>" class="btn btn-primary">Read</a>
		
			<?php }else{?>
			<a href="payment.php?id=<?php echo $id ?>" class="btn btn-primary">Buy</a>
			
			<?php } ?>
		<?php
		} ?>
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