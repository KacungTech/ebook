<?php
session_start();
	if(!isset($_SESSION['userid'])){
		header("Location: login.php");
	}
?>
<?php
include_once("connection.php");
 
$result = $dbConnection->query("SELECT * FROM books ORDER BY bookid DESC LIMIT 6");
$result2 = $dbConnection->query("SELECT * FROM books where category='Novel' ORDER BY bookid DESC LIMIT 6");
$result->execute();
$result2->execute();
$data = $result->fetchAll(PDO::FETCH_ASSOC);
$data2 = $result2->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="manifest" href="manifest.json">
    <script>
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('/sw.js').then(function(registration) {
                console.log('ServiceWorker registration successful with scope: ', registration.scope);
            }).catch(function(error) {
                console.log('ServiceWorker registration failed: ', error);
            });
        }
    </script>
    <title>E-Book Store</title>
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
			<p>New Books</p>
			
			<div id="myCarousel1" class="carousel slide" data-ride="carousel">
				  <!-- Indicators -->
				  

				  <!-- Wrapper for slides -->
				  <div class="carousel-inner">
					
					<div class="item active">
					  <div class="booklist">
			
						<li>
				
							<a href="javascript:void(0);" data-href="getContent.php?id=<?php echo $data[0]['bookid'] ?>" class="openPopup">
								<img src="cover/<?php echo $data[0]["bookcover"]?>" width="300px" height="400px" alt="image">
								<span><?php echo $data[0]["booktitle"]?></span>
							</a>
				
						</li>
						
						<li>
				
							<a href="javascript:void(0);" data-href="getContent.php?id=<?php echo $data[1]['bookid'] ?>" class="openPopup">
								<img src="cover/<?php echo $data[1]["bookcover"]?>" width="300px" height="400px" alt="image">
								<span><?php echo $data[1]["booktitle"]?></span>
							</a>
				
						</li>
						
						<li>
				
							<a href="javascript:void(0);" data-href="getContent.php?id=<?php echo $data[2]['bookid'] ?>" class="openPopup">
								<img src="cover/<?php echo $data[2]["bookcover"]?>" width="300px" height="400px" alt="image">
								<span><?php echo $data[2]["booktitle"]?></span>
							</a>
				
						</li>
					</div>
					</div>

					<div class="item">
					  <div class="booklist">
			
						<li>
				
							<a href="javascript:void(0);" data-href="getContent.php?id=<?php echo $data[3]['bookid'] ?>" class="openPopup">
								<img src="cover/<?php echo $data[3]["bookcover"]?>" width="300px" height="400px" alt="image">
								<span><?php echo $data[3]["booktitle"]?></span>
							</a>
				
						</li>
						
						<li>
				
							<a href="javascript:void(0);" data-href="getContent.php?id=<?php echo $data[4]['bookid'] ?>" class="openPopup">
								<img src="cover/<?php echo $data[4]["bookcover"]?>" width="300px" height="400px" alt="image">
								<span><?php echo $data[4]["booktitle"]?></span>
							</a>
				
						</li>
						
						<li>
				
							<a href="javascript:void(0);" data-href="getContent.php?id=<?php echo $data[5]['bookid'] ?>" class="openPopup">
								<img src="cover/<?php echo $data[5]["bookcover"]?>" width="300px" height="400px" alt="image">
								<span><?php echo $data[5]["booktitle"]?></span>
							</a>
				
						</li>
					</div>
					</div>
				  </div>

				  <!-- Left and right controls -->
				  <a class="left carousel-control" href="#myCarousel1" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
					<span class="sr-only">Previous</span>
				  </a>
				  <a class="right carousel-control" href="#myCarousel1" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
					<span class="sr-only">Next</span>
				  </a>
				</div>

				<p>Novel</p>

				<div id="myCarousel2" class="carousel slide" data-ride="carousel">
				  <!-- Indicators -->
				  

				  <!-- Wrapper for slides -->
				  <div class="carousel-inner">
					
					<div class="item active">
					  <div class="booklist">
			
						<li>
				
							<a href="javascript:void(0);" data-href="getContent.php?id=<?php echo $data2[0]['bookid'] ?>" class="openPopup">
								<img src="cover/<?php echo $data2[0]["bookcover"]?>" width="300px" height="400px" alt="image">
								<span><?php echo $data2[0]["booktitle"]?></span>
							</a>
				
						</li>
						
						<li>
				
							<a href="javascript:void(0);" data-href="getContent.php?id=<?php echo $data2[1]['bookid'] ?>" class="openPopup">
								<img src="cover/<?php echo $data2[1]["bookcover"]?>" width="300px" height="400px" alt="image">
								<span><?php echo $data2[1]["booktitle"]?></span>
							</a>
				
						</li>
						
						<li>
				
							<a href="javascript:void(0);" data-href="getContent.php?id=<?php echo $data2[2]['bookid'] ?>" class="openPopup">
								<img src="cover/<?php echo $data2[2]["bookcover"]?>" width="300px" height="400px" alt="image">
								<span><?php echo $data2[2]["booktitle"]?></span>
							</a>
				
						</li>
					</div>
					</div>

					<div class="item">
					  <div class="booklist">
			
						<li>
				
							<a href="javascript:void(0);" data-href="getContent.php?id=<?php echo $data2[3]['bookid'] ?>" class="openPopup">
								<img src="cover/<?php echo $data2[3]["bookcover"]?>" width="300px" height="400px" alt="image">
								<span><?php echo $data2[3]["booktitle"]?></span>
							</a>
				
						</li>
						
						<li>
				
							<a href="javascript:void(0);" data-href="getContent.php?id=<?php echo $data2[4]['bookid'] ?>" class="openPopup">
								<img src="cover/<?php echo $data2[4]["bookcover"]?>" width="300px" height="400px" alt="image">
								<span><?php echo $data2[4]["booktitle"]?></span>
							</a>
				
						</li>
						
						<li>
				
							<a href="javascript:void(0);" data-href="getContent.php?id=<?php echo $data2[4]['bookid'] ?>" class="openPopup">
								<img src="cover/<?php echo $data2[4]["bookcover"]?>" width="300px" height="400px" alt="image">
								<span><?php echo $data2[4]["booktitle"]?></span>
							</a>
				
						</li>
					</div>
					</div>
				  </div>

				  <!-- Left and right controls -->
				  <a class="left carousel-control" href="#myCarousel2" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
					<span class="sr-only">Previous</span>
				  </a>
				  <a class="right carousel-control" href="#myCarousel2" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
					<span class="sr-only">Next</span>
				  </a>
				</div>
		
			
							<!-- Modal -->
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
		<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Tag manifest dan lainnya -->
    <link rel="manifest" href="/manifest.json">
</head>
<body>
    <!-- Konten halaman -->
    <button id="install-btn" style="display: none;">Install App</button>

    <!-- Load JavaScript -->
    <script src="/path/to/main.js"></script>
</body>
</html>

	</body>

</html>