<?php
	
include_once("../connection.php");

if(isset($_POST["btnupload"])){
$id = $_POST["id"];
$title = $_POST["title"];
$category = $_POST["category"];
$cover2 = $_POST["cover2"];
$file2 = $_POST["file2"];
$payment = $_POST["payment"];
	if($payment>0){
		$payment=$_POST["price"];
	}
$description = $_POST["description"];
$dir1="../cover/";
$dir2="../file/";

if(!empty($_FILES["cover"]["name"])){
  $cover = $_FILES["cover"]["name"];
$targetcover=$dir1.basename($_FILES["cover"]["name"]);
}

if(!empty($_FILES["file"]["name"])){
$targetfile=$dir2.basename($_FILES["file"]["name"]);
  $file = $_FILES["file"]["name"];
}


if(!isset($cover) and !isset($file)){
	$insert = "UPDATE `books` SET booktitle=:title, category=:category, bookcover=:cover, bookfile=:file, price=:payment, description=:desc where bookid=:id";
	
		$query = $dbConnection->prepare($insert);
                
        $query->bindparam(':title', $title);
        $query->bindparam(':category', $category);
		$query->bindparam(':cover', $cover2);
        $query->bindparam(':file', $file2);
        $query->bindparam(':payment', $payment);
        $query->bindparam(':desc', $description);
        $query->bindparam(':id', $id);
        
		if($query->execute()){
			echo "<script>alert('buku berhasil diupload');window.location='editbooks.php' </script>";
		}else{
			echo "gagal";
		}
}

if(!empty($cover) and !isset($file)){
	move_uploaded_file($_FILES["cover"]["tmp_name"], $targetcover);
	$insert = "UPDATE `books` SET booktitle=:title, category=:category, bookcover=:cover, bookfile=:file, price=:payment, description=:desc where bookid=:id";
	
		$query = $dbConnection->prepare($insert);
                
        $query->bindparam(':title', $title);
        $query->bindparam(':category', $category);
		$query->bindparam(':cover', $cover);
        $query->bindparam(':file', $file2);
        $query->bindparam(':payment', $payment);
        $query->bindparam(':desc', $description);
        $query->bindparam(':id', $id);
        
		if($query->execute()){
			echo "<script>alert('buku berhasil diupload');window.location='editbooks.php' </script>";
		}else{
			echo "gagal";
		}
}

if(!empty($file) and !isset($cover)){
	move_uploaded_file($_FILES["file"]["tmp_name"], $targetfile);
	$insert = "UPDATE `books` SET booktitle=:title, category=:category, bookcover=:cover, bookfile=:file, price=:payment, description=:desc where bookid=:id";
	
		$query = $dbConnection->prepare($insert);
                
        $query->bindparam(':title', $title);
        $query->bindparam(':category', $category);
        $query->bindparam(':cover', $cover2);
        $query->bindparam(':file', $file);
        $query->bindparam(':payment', $payment);
        $query->bindparam(':desc', $description);
        $query->bindparam(':id', $id);
        
		if($query->execute()){
			echo "<script>alert('buku berhasil diupload');window.location='editbooks.php' </script>";
		}else{
			echo "gagal";
		}
}

if(!empty($cover) and !empty(file)){
	move_uploaded_file($_FILES["cover"]["tmp_name"], $targetcover);
	move_uploaded_file($_FILES["file"]["tmp_name"], $targetfile);
	$insert = "UPDATE `books` SET booktitle=:title, category=:category, bookcover=:cover, bookfile=:file, price=:payment, description=:desc where bookid=:id";
	
		$query = $dbConnection->prepare($insert);
                
        $query->bindparam(':title', $title);
        $query->bindparam(':category', $category);
		$query->bindparam(':cover', $cover);
        $query->bindparam(':file', $file);
        $query->bindparam(':payment', $payment);
        $query->bindparam(':desc', $description);
        $query->bindparam(':id', $id);
        
		if($query->execute()){
			echo "<script>alert('buku berhasil diupload');window.location='editbooks.php' </script>";
		}else{
			echo "gagal";
		}
}
}
?>