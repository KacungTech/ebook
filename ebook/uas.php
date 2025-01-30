<?php
include_once("connection.php");
 
$result = $dbConnection->query("SELECT * FROM barang");
$result->execute();
$data = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="bootstrap/bootstrap.css">
		<link rel="stylesheet" href="css/style.css"> 
		<title> E-Book Store </title>
	</head>
	<body>
		
		<div class="menu">
			
			<div class="logo">
				<h2> E-Book Store </h2>
			</div>
				
				<ul class="dropmenu">
					<li class="highlight"><a href="index.php">Home</a></li>
					<li><a href="freebook.php">Free Book</a></li>
					<li><a href="">Category</a>
						<ul>
							<li><a href="novel.php">Novel</a></li>
							<li><a href="humor.php">Humor</a></li>
							<li><a href="uas.php">UAS</a></li>
							<li><a href="more.php">More</a></li>
						</ul>
					</li>
					<li><a href="#3">Account</a>
						<ul>
							<li><a href="mybook.php">MyBooks</a></li>
							<li><a href="settings.php">Profil</a></li>
							<li><a href="logout.php" onclick="javascript: return confirm('apakah anda yakin')">Logout</a></li>
						</ul>
					</li>
				</ul>
		</div>
		
		<div class="header">
	
			<h1>E-Book<span>Store</span></h1>
			<p>Online Book Store & Read Book Online</p>
	
			</div>
		
		<div class="content">
			<form action="upload.php" method="post" enctype="multipart/form-data">
	
				<table border="1">

					<tr style="color:white">
						<th>Kode Barang</th>
						<th>Nama Barang</th>
						<th>Harga Barang</th>
					</tr>
					<?php foreach($data as $data2){
						
						$result = $dbConnection->query("SELECT * FROM barang");
						$result->execute();
						?>
					<tr style="color:white">
						<td><?php echo $data2['kode_barang'] ?></td>
						<td><?php echo $data2['nama_barang'] ?></td>
						<td><?php echo $data2['harga_barang'] ?></td>
						
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