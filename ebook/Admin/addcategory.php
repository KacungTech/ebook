<?php
		include_once("../connection.php");
		
		if(isset($_POST["addcategory"])){
			$category = $_POST["newcategory"];
			
			$insert = "INSERT INTO `categories` (`categoryid`,`categoryname`) 
					VALUES (NULL, :category);";
	
			$query = $dbConnection->prepare($insert);
			$query->bindparam(':category', $category);
			
			if($query->execute()){
				echo "<script>alert('Berhasil menambahkan kategori baru');window.location='index.php' </script>";
			} else{
			echo "Gagal menambahkan kategori baru";
			}
			
		}
		
?>