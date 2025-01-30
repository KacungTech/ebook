<?php
	
include_once("../connection.php");

if(isset($_POST["btnupload"])){
$title = $_POST["title"];
$category = $_POST["category"];
$payment = $_POST["payment"];
	if($payment>0){
		$payment=$_POST["price"];
	}
$description = $_POST["description"];
$cover = $_FILES["cover"]["name"];
$file = $_FILES["file"]["name"];

$dir1="../cover/";
$dir2="../file/";

$targetcover=$dir1.basename($_FILES["cover"]["name"]);
$targetfile=$dir2.basename($_FILES["file"]["name"]);

if(move_uploaded_file($_FILES["cover"]["tmp_name"], $targetcover)){
	if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetfile)){
		
		$insert = "INSERT INTO `books` (`bookid`, `booktitle`, `category`, `price`, `bookcover`,`bookfile`,`description`) 
					VALUES (NULL, :title,:category, :payment, :cover, :file, :desc);";
	
		$query = $dbConnection->prepare($insert);
                
        $query->bindparam(':title', $title);
        $query->bindparam(':category', $category);
        $query->bindparam(':payment', $payment);
        $query->bindparam(':cover', $cover);
        $query->bindparam(':file', $file);
        $query->bindparam(':desc', $description);
        
		if($query->execute()){
			echo "<script>alert('buku berhasil diupload');window.location='index.php' </script>";
		}else{
			echo "gagal";
		}
	}
}
}
?>