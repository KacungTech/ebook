<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>login</title>
  </head>
  <body>
    <form action="proses.php" method="post">
	<table>
      <p id="log">Login </br></p>
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
	<td colspan='2'> <center>Doesn't have an Account? <a href="signup.php" style="color:white;">Sign Up</a></center></td>
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
#doesnt{
	padding-top: 
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
  
