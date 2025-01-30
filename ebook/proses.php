<?php
include_once("connection.php");
session_start();

if(isset($_POST["btnlogin"])){
$Username = $_POST["user"];
	$Password = $_POST["pass"];
	
	$user = "select * from users where username=:user and password=:pass";
	
		$query = $dbConnection->prepare($user);
                
        $query->bindparam(':user', $Username);
        $query->bindparam(':pass', $Password);
		$query->execute();
		
		$count = $query->rowCount();
		
		if($count > 0){
			$userLogin = $query->fetch(PDO::FETCH_ASSOC);
			
			if($userLogin['status']=="Admin"){
				echo "<script>window.location='Admin/index.php' </script>";
			}else{
				$_SESSION['userid']=$userLogin['userid'];
				echo "<script>window.location='index.php' </script>";
			}
			echo "ok";
		}else{
			echo "gagal";
		}
		
}
?>