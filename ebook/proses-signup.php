<?php
include_once("connection.php");

if(isset($_POST["btnsignup"])){
$Username = $_POST["user"];
$Email = $_POST["email"];
	$Password = $_POST["pass"];
	$Verify_Password = $_POST["Vpsd"];
	
	if($Password == $Verify_Password){
		$insert = "INSERT INTO `users` (`userid`, `username`, `status`, `email`, `password`) 
					VALUES (NULL, :username,'User', :email, :password);";
	
		$query = $dbConnection->prepare($insert);
                
        $query->bindparam(':username', $Username);
        $query->bindparam(':email', $Email);
        $query->bindparam(':password', $Password);
        
		if($query->execute()){
			echo "<script>window.location='thanks2.php' </script>";
		}else{
			echo "gagal";
		}
	}else{
		echo "Password must be the same with Verify Password";
	}
	
	
		
}
?>