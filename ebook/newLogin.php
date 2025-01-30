<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/style.css">
		<title> login </title>
	</head>
	<body>	
		<div class="content">
		<form action="proses.php" method="post">
	<table>
      <p id="logo">Login </br></p>
      <div id="rere">
       <tr>
		<td>Username</td>
		<td>
			<input type="text" name="user" maxlength="30" value="" autofocus required>
		</td>
	</tr>	
	<tr>
		<td>Password</td>
		<td>
			<input type="password" name="pass" maxlength="11" value="">
		</td>
	</tr>	
	<tr> 
		<td style= "padding-top: 50px"></td> 
		<td>
			<input type="submit" name="btnlogin" value="Login" style="float:right; width: 66px; height: 31px;">
		</td>
	</tr>
	<div id="doesnt">
	<tr>
	<td colspan='2'> <center>Doesn't have an Account? Sign Up</center></td>
	</tr>
     </div>
	  </div>
	  </div>
	  </table>
		
		
	</body>

</html>

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
  
