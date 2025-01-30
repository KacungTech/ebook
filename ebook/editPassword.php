<?php
include_once("connection.php");

if(isset($_POST["btnpass"])){
$Username = $_POST["name"];
$pass_lama = $_POST["pass_lama"];
	$pass_baru = $_POST["pass_baru"];
	$baru_verify = $_POST["baru_verify"];
	$userid = $_POST["userid"];
	
	if($pass_baru == $baru_verify){
		
		$user = "select * from users where userid=:userid and password=:pass";
	
		$query = $dbConnection->prepare($user);
                
        $query->bindparam(':userid', $userid);
        $query->bindparam(':pass', $pass_lama);
		$query->execute();
		
		$count = $query->rowCount();
		
		if($count > 0){
			$update = "UPDATE `users` SET  username=:username, password=:pass where userid=:id";
	
		$query = $dbConnection->prepare($update);
                
        $query->bindparam(':username', $Username);
        $query->bindparam(':pass', $pass_baru);
        $query->bindparam(':id', $userid);
        
		if($query->execute()){
			echo "<script>alert('password berhasil dirubah');window.location='index.php' </script>";
		}else{
			echo "gagal";
		}
		}
	}
	
	
		
}
?>