<?php
session_start();
	if(!isset($_SESSION['userid'])){
		header("Location: login.php");
	}
?>
<?php
	include_once("connection.php");
	$result = $dbConnection->query("SELECT * FROM books where category='teknologi' ORDER BY bookid DESC ");
	$result->execute();
	$data = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/style.css"> //File CSS
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
				<li><a href="freebook.php">Free Book</a></li>
				<li><a href="">Category</a>
					<ul>
					<li><a href="novel.php">Novel</a></li>
					<li><a href="humor.php">Humor</a></li>
					<li><a href="humor.php">UAS</a></li>
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
			<p>Teknologi</p>
		
			<div class="booklist">
			<?php
			foreach($data as $data2){ ?>
				<li>
				
					<a href="readBook.php?id=<?php echo $data2['bookid']?>">
						<img src="cover/<?php echo $data2['bookcover']?>" alt="sao" style="width:300px;height:400px">
						<span><?php echo $data2['booktitle']?></span>
					</a>
				
				</li>
			<?php }
			?>
			</div>
		</div>
		
	</body>

</html>