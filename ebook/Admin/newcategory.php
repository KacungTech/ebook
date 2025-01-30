<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
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
		
			<p>New Category</p><br>
			
			<form action="addcategory.php" method="post" enctype="multipart/form-data">
	
				<table>

					<tr>
						<td>Category Name</td>
						<td>
							<input type="text" name="newcategory" required>
						</td>
					</tr>
					
					<tr>
						<td></td>
						<td>
							<input id="btn" name="addcategory" type="submit" value="Add">
						</td>
					</tr>
					
				</table>
			</form>
		</div>
		
	</body>

</html>