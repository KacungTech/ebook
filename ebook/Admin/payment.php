<?php
include_once("../connection.php");
 
$result = $dbConnection->query("SELECT * FROM payments");
$result->execute();
$data = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../bootstrap/bootstrap.css">
		<link rel="stylesheet" href="css/cssadmin.css">
		<link rel="icon" href="img/icon.png">
		<title> E-Book Store </title>
	</head>
	<body>
		
		<div class="menu">
			
			<div class="logo">
			<h2> E-Book Store </h2>
			</div>
			
			<ul class="dropmenu">
				<li><a href="index.php">Home</a></li>
				<li><a href="">Books</a>
					<ul>
						<li><a href="uploadbooks.php">UploadBooks</a></li>
						<li><a href="editbooks.php">EditBooks</a></li>
						<li><a href="newcategory.php">NewCategory</a></li>
					</ul>
				</li>
				<li  class="highlight"><a href="payment.php">Payment</a></li>
				<li><a href="../logout.php">Logout</a></li>
	</ul>
		</div>
		
		<div class="header">
	
			<h1>E-Book<span>Store</span></h1>
			<p>Online Book Store & Read Book Online</p>
	
			</div>
		
		<div class="content">
			<form action="upload.php" method="post" enctype="multipart/form-data">
	
				<table border="1">

					<tr>
						<th>Username</th>
						<th>Book</th>
						<th>Price</th>
						<th>File</th>
						<th>Aksi</th>
					</tr>
					<?php foreach($data as $data2){
						$id=$data2['bookid'];
						$result = $dbConnection->query("SELECT * FROM books where bookid=$id");
						$result->execute();
						$dataprice = $result->fetch(PDO::FETCH_ASSOC);
						
						?>
					<tr>
						<td><?php echo $data2['userid'] ?></td>
						<td><?php echo $data2['bookid'] ?></td>
						<td><?php echo $dataprice['price'] ?></td>
						<td><?php if (isset($data2['payment_report'])){?>
						<a href="javascript:void(0);" data-href="getimage.php?id=<?php echo $data2['paymentid'] ?>" class="openPopup btn btn-primary">
						check
							</a>
						<?php }else{ ?>
						
						<?php } ?>
							</td>
							
						<td>
						<?php if ($data2['status'] != "sudah_bayar"){?>
						<a href="approve.php?id=<?php echo $data2['paymentid'] ?>" class="openPopup btn btn-primary">
						approve
							</a>
						
						<?php }elseif($data2['status'] == "sudah_bayar"){?>
						
						sudah approve
							
						<?php } ?>
						<a href="deletepayment.php?id=<?php echo $data2['paymentid'] ?>" class="openPopup btn btn-danger" onclick="javascript : return confirm('Apakah anda yakin??')">
						delete
							</a>
							</td>
					</tr>
					<?php } ?>
				</table>
			</form>
			<div id="myModal" class="modal fade " role="dialog">
				  <div class="modal-dialog modal-lg">

					<!-- Modal content-->
					<div class="modal-content">
					  
					  <div class="modal-body">
						<p>Some text in the modal.</p>
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					  </div>
					</div>

				  </div>
				</div>
		</div>
		<script src="../bootstrap/jquery.js"></script>
		<script src="../bootstrap/bootstrap.js"></script>
		<script>
			$(document).ready(function(){
			$('.openPopup').on('click',function(){
				var dataURL = $(this).attr('data-href');
				$('.modal-body').load(dataURL,function(){
					$('#myModal').modal({show:true});
				});
				}); 
			});
		</script>
		
	</body>

</html>