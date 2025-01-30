<?php
session_start();
	if(!isset($_SESSION['userid'])){
		header("Location: login.php");
	}
?>

<?php
include_once("connection.php");
session_start();
$id = $_SESSION['userid'];
$select = "select * from user_books where userid=:id";
	$query = $dbConnection->prepare($select);
	$query->bindparam(':id', $id); 
	$query->execute();
	$data=$query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="bootstrap/bootstrap.css">
		<link rel="stylesheet" href="css/style.css"> 
		<link rel="icon" href="img/icon.png"> /* Icon Website */
		<title> E-Book Store </title> /* Judul Website */
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
							<li><a href="settings.php">Settings</a></li>
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
			<p>My Book</p>
		
			<div class="booklist">
			<?php foreach($data as $data2){?>
				<?php
				$select = "select * from books where bookid=:id";
					$query = $dbConnection->prepare($select);
					$query->bindparam(':id', $data2['bookid']); 
					$query->execute();
					$book=$query->fetch(PDO::FETCH_ASSOC);
			?>
			<li>
							<a href="javascript:void(0);" data-href="getContent.php?id=<?php echo $book ['bookid'] ?>" class="openPopup">
								<img src="cover/<?php echo $book["bookcover"]?>" width="300px" height="400px" alt="image">
								<span><?php echo $book["booktitle"]?></span>
							</a>
				
						</li>
			<?php } ?>
			</div>
			
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
			
		<script src="bootstrap/jquery.js"></script>
		<script src="bootstrap/bootstrap.js"></script>
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