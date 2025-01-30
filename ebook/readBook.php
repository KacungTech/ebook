<?php
session_start();
	if(!isset($_SESSION['userid'])){
		header("Location: login.php");
	}
?>

<?php
include_once("connection.php");
 $id= $_GET['id'];
$user = "select * from books where bookid=:id";
	
		$query = $dbConnection->prepare($user);
                
        $query->bindparam(':id', $id);
		$query->execute();
$data = $query->fetch(PDO::FETCH_ASSOC);
?>
<?php
if(isset($_POST['btm'])){
	header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/style.css">
		
		<link rel="icon" href="img/icon.png"> 
		<title> E-Book Store </title> 
		<style>
		
			input{
	  height: 50px;
	  background-color: #E94B3F;
	  color: white;
	  font-size: 30px;
	  border-bottom-width: 2px;
	margin-bottom: 70px;
		margin-left: 120px;

	}
		</style>
	</head>
	<body>
	
	<div class="content2">
		<div style="margin-right:100px;margin-top:10px">
		<iframe src="file/<?php echo $data['bookfile'] ?>" width="100%" height="1100px"></iframe></div>
		<form action="" method="post">
	<table>
     
      <div id="rere">
	  
	<tr> 
		<td style= "padding-top: 200px; padding-left: 250px"></td> 
		<td>
			<input type="submit" name="btm" value="BACK TO HOME" style="width: 300px; ">
		</td>
	</tr>
	  </table>
    </form>
		
	</div>
	</div>
	</body>
	</html>