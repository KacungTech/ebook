<?php
session_start();
	if(!isset($_SESSION['userid'])){
		header("Location: login.php");
	}
?>

<?php
include_once("connection.php");
	$id = $_SESSION['userid'];
    //get content from database
    $user = "select * from users where userid=:id";
	
		$query = $dbConnection->prepare($user);
                
        $query->bindparam(':id', $id);
		$query->execute();
    
		$count = $query->rowCount();
		
		if($count > 0){
			$data = $query->fetch(PDO::FETCH_ASSOC); ?>
		<?php
    }else{
        echo 'Content not found....';
    }
?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="Admin/css/cssadmin.css"> //File CSS
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
							<li><a href="logout.php">Logout</a></li>
						</ul>
					</li>
				</ul>
		</div>
		
		<div class="header">
	
			<h1>E-Book<span>Store</span></h1>
			<p>Online Book Store & Read Book Online</p>
	
			</div>
		
		<div class="content">
		
			<p>Ganti Password</p><br>
			
			<form action="editPassword.php" method="post" enctype="multipart/form-data">
					<input type="hidden" name="userid" maxlength="50" value="<?php echo $_SESSION['userid']?>" autofocus required>
				<table>

					<tr>
						<td>Username</td>
						<td>
							<input type="text" name="name" maxlength="50" value="<?php echo $data['username']?>" autofocus required>
						</td>
					</tr>
					<tr>
						<td>Password lama</td>
						<td>
							<input type="password" name="pass_lama" maxlength="50" value="" autofocus required>
						</td>
					</tr>
					<tr>
						<td>Password baru</td>
						<td>
							<input type="password" name="pass_baru" maxlength="50" value="" autofocus required>
						</td>
					</tr>
					<tr>
						<td>verify Password baru</td>
						<td>
							<input type="password" name="baru_verify" maxlength="50" value="" autofocus required>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input id="btn" type="submit" value="submit" name="btnpass">
						</td>
					</tr>
					
				</table>
			</form>
		</div>
		
	</body>

</html>