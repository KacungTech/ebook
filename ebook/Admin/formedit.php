<?php
include_once("../connection.php");


		$id = $_GET['id'];

		$insert = "select * from books WHERE bookid=:id";
	
		$query = $dbConnection->prepare($insert);
        $query->bindparam(':id', $id);
       
      
		if($query->execute()){
			$book = $query->fetch(PDO::FETCH_ASSOC);
			
		}else{
			echo "gagal";
		}
	
?>

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
		
			<p>Edit Books</p><br>
			
			
			<?php
				if(isset($book)){ ?>
				<form action="edit.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="id" maxlength="50" value="<?php echo $book['bookid']; ?>">
				<input type="hidden" name="cover2" maxlength="50" value="<?php echo $book['bookcover']; ?>">
				<input type="hidden" name="file2" maxlength="50" value="<?php echo $book['bookfile']; ?>">

				<table>

					<tr>
						<td>Title</td>
						<td>
							<input type="text" name="title" maxlength="50" autofocus required value="<?php echo $book['booktitle']; ?>">
						</td>
					</tr>
					
					<tr>
						<td>Category</td>
						<td>
							<select name="category">
								<option>-- Select Category --</option>
								<?php foreach ($results as $output) {?>
								<option <?php if($book['category'] == $output["categoryname"] ){echo "selected";};?>><?php echo $output["categoryname"];?></option>
								<?php }?>
						</td>
					</tr>
					
					<tr>
						<td>Payment</td>
						<td>
							<input type="radio" id="free" name="payment" onclick="showprice()" value="0" <?php if($book['price'] == 0 ){echo "checked";};?>> <label for="free">Free</label>
							<input type="radio" id="paid" name="payment" onclick="showprice()" value="1" <?php if($book['price'] > 0 ){echo "checked";};?>> <label for="paid">Paid</label>
						</td>
					</tr>
					<tr>
						<td></td>
						<td id="showprice" hidden>
							<input type="text" name="price" placeholder="Masukkan Harga" value="<?php echo $book['price']; ?>">
						</td>
					</tr>
					
					<tr>
						<td>Book Cover</td>
						<td>
							<input type="file" name="cover" >
						</td>
					</tr>
					
					<tr>
						<td>Book File</td>
						<td>
							<input type="file" name="file" >
						</td>
					</tr>
					
					<tr>
						<td>Description</td>
						<td>
							<textarea cols="50" rows="5" name="description"><?php echo $book['description']; ?>"</textarea>
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
				<?php
				}
			?>
		</div>
		
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
		
	</body>

</html>