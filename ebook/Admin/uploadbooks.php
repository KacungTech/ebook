<!DOCTYPE html>
<html>

	<head>
	<?php
		include_once("../connection.php");
		$sql = "select categoryname from categories";
		
		try {
			$stmt=$dbConnection->prepare($sql);
			$stmt->execute();
			$results=$stmt->fetchAll();
		}
		catch (Exception $ex) {
			echo ($ex -> getMessage());
		}
	?>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/cssadmin.css"> //File CSS
		<link rel="icon" href="img/icon.png"> //Icon Website
		<title> E-Book Store </title> //Judul Website
		
		<script>
			function showprice(){
				if (document.getElementById('free').checked){
					document.getElementById('showprice').style.display="none";
				}
				else {
					document.getElementById('showprice').style.display="block";
				}
			}
		</script>
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
				<li><a href="payment.php">Payment</a></li>
				<li><a href="../logout.php">Logout</a></li>
	</ul>
		</div>
		
		<div class="header">
	
			<h1>E-Book<span>Store</span></h1>
			<p>Online Book Store & Read Book Online</p>
	
			</div>
		
		<div class="content">
		
			<p>Upload Books</p><br>
			
			<form action="upload.php" method="post" enctype="multipart/form-data">
	
				<table>

					<tr>
						<td>Title</td>
						<td>
							<input type="text" name="title" maxlength="50" value="" autofocus required>
						</td>
					</tr>
					
					<tr>
						<td>Category</td>
						<td>
							<select name="category">
								<option>-- Select Category --</option>
								<?php foreach ($results as $output) {?>
								<option><?php echo $output["categoryname"];?></option>
								<?php }?>
						</td>
					</tr>
					
					<tr>
						<td>Payment</td>
						<td>
							<input type="radio" id="free" name="payment" onclick="showprice()" value="0" checked> <label for="free">Free</label>
							<input type="radio" id="paid" name="payment" onclick="showprice()" value="1"> <label for="paid">Paid</label>
						</td>
					</tr>
					<tr>
						<td></td>
						<td id="showprice" hidden>
							<input type="text" name="price" placeholder="Masukkan Harga">
						</td>
					</tr>
					
					<tr>
						<td>Book Cover</td>
						<td>
							<input type="file" name="cover">
						</td>
					</tr>
					
					<tr>
						<td>Book File</td>
						<td>
							<input type="file" name="file">
						</td>
					</tr>
					
					<tr>
						<td>Description</td>
						<td>
							<textarea cols="50" rows="5" name="description"></textarea>
						</td>
					</tr>
					
					<tr>
						<td></td>
						<td>
							<input id="btn" type="submit" value="Upload" name="btnupload">
						</td>
					</tr>
					
				</table>
			</form>
		</div>
		
	</body>

</html>