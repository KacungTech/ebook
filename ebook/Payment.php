<?php
session_start();
	if(!isset($_SESSION['userid'])){
		header("Location: login.php");
	}
?>

<?php
include_once("connection.php");
if(!empty($_GET['id'])){
	$id = $_GET['id'];
    //get content from database
    $user = "select * from books where bookid=:id";
	
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
}else{
    echo 'Content not found....';
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>payment</title>
  </head>
  <body>
    <form action="prosespayment.php" method="post">
	<input type="hidden" name="userid" maxlength="30" value="<?php echo $_SESSION['userid']?>" readonly>
	<input type="hidden" name="bookid" maxlength="30" value="<?php echo $data['bookid']?>" readonly>
	<table>
      <p id="log">Payment </br></p>
      <div id="rere">
       <tr>
		<td>Book</td>
		<td>
			<input type="text" name="book" maxlength="30" value="<?php echo $data['booktitle']?>" autofocus required readonly>
		</td>
	</tr>	
	<tr>
		<td>Price</td>
		<td>
			<input type="text" name="price" maxlength="11" value="<?php echo $data['price']?>" readonly>
		</td>
	</tr>	
	<tr>
		<td>BNI</td>
		<td>
			<input type="text" name="bni" maxlength="11" value="123456789" readonly>
		</td>
	</tr>
	<tr>
		<td>BRI</td>
		<td>
			<input type="text" name="bri" maxlength="11" value="099123456" readonly>
		</td>
	</tr>	
	<tr> 
		<td style= "padding-top: 50px"></td> 
		<td>
			<input type="submit" name="btnpeyment" value="DONE" style="float:right; width: 66px; height: 31px;">
		</td>
	</tr>
	  </div>
	  </table>
    </form>
  </body>

  <style type="text/css">
  body{
    background-color:#2E3138;
    margin: 0;
    padding: 0;
  }
  #log{
    height: 60px;
    width: 100%;
    text-align: center;
    font-family: Century;
    font-size: 50px;
    margin: 20;
    color: #FFFFFF;
	margin-bottom: 20px;
    padding-top: 40px;
    padding-bottom: 1px;
  }

  form{
    font-family: monospace;
    width: 550px;
    height: 400px;
    margin: 100px 0 0 380px;
    background-color: #222328;

  }

  #rere{
    width: 20%;
    margin-left: 25px;
    height: 10px;
    margin-bottom: 20px;
	font-size: 20px;
  
  }
  td{
	  color:white;
	  font-size: 20px;
	  padding-left: 100px;
	  
  }
  input{
	  height: 25px;
	  background-color: #E94B3F;
	  color: white;
	  font-size: 15px;
  }

  button{
    width: 25%;
    padding: 3px 0px 3px 0px;
    border: none;
    height: 40px;
    margin-left: 250px;
    margin-top: 30px;
    margin-right: 150px;
    font-size: 15px;
    color: white;
    background-color: #E94B3F;
  }

</style>
<script type="text/javascript">
	function validasi() {
		var username = document.getElementById("username").value;
		var password = document.getElementById("password").value;		
		if (username != "" && password!="") {
			return true;
		}else{
			alert('Username dan Password harus di isi !');
			return false;
		}
	}
 
</script>
  
