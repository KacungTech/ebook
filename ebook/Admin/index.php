<?php
	include_once("../connection.php");
	$result = $dbConnection->query("SELECT * FROM books ORDER BY bookid DESC");
	$result->execute();
	$data = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../bootstrap/bootstrap.css">
		<link rel="stylesheet" href="css/cssadmin.css"> //File CSS
		<link rel="icon" href="img/icon.png"> //Icon Website
		<title> E-Book Store </title> //Judul Website
	</head>
	<body>
		
		<div class="menu">
			
			<div class="logo">
			<h2> E-Book Store </h2>
			</div>
			
			<ul class="dropmenu">
				<li class="highlight"><a href="index.php">Home</a></li>
				<li><a href="">Books</a>
					<ul>
						<li><a href="uploadbooks.php">UploadBooks</a></li>
						<li><a href="editbooks.php">EditBooks</a></li>
						<li><a href="newcategory.php">NewCategory</a></li>
					</ul>
				</li>
				<li><a href="payment.php">Payment</a></li>
				<li><a href="../logout.php">Logout</a></li>
	</ul>
		</div>
		
		<div class="header">
	
			<h1>E-Book<span>Store</span></h1>
			<p>Online Book Store & Read Book Online</p>
	
			</div>
		
		<div class="content">
			<div class="booklist">
			
			<?php foreach($data as $data2){?>
			<div class="row">
			<div class="col-md-4">
				<a href="" data-href="getContent.php?id=<?php echo $data2 ['bookid'] ?>" class="openPopup">
				<img src="../cover/<?php echo $data2['bookcover']?>" width="300px" height="400px" alt="image"></a>
			</div>
			
			<div class="col-md-8 text-center" style="color:white	">
				<h2><?php echo $data2["booktitle"]?></h2>
				<p style="font-size:20px;"><?php echo $data2["description"]?></p>
			</div>
			</div>
			<br>
			<?php } ?>
			
			</div>
		</div>
		
	</body>

</html>