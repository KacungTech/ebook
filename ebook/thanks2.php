<?php
session_start();
if(isset($_POST['btm'])){
	header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sign Up</title>
  </head>
  <body>
    <form action="" method="post">
	<table>
      <p id="log">Thanks for <br> signin up <br></br></p>
      <div id="rere">
	  
	<tr> 
		<td style= "padding-top: 350px"></td> 
		<td>
			<input type="submit" name="btm" value="Login" style="width: 229px; ">
		</td>
	</tr>
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
    font-size: 40px;
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
    margin-bottom: 40px;
	font-size: 20px;
  
  }
  td{
	  padding-left: 13px;
	  padding-bottom: 100px;
	  
  }
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
  
