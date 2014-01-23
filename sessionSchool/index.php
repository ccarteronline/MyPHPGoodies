<?
	ini_set('display_errors', 1);
	session_start();
	if(isset($_SESSION['usr']) && isset($_SESSION['pswd'])){
		header("Location: profile.php");
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title></title>
	</head>
<body>
	<center>
		<form action="login.php" method="post">
			<table>
				<tr><td>Username</td><td><input type="text" name="usr"></td></tr>
				<tr><td>Password</td><td><input type="password" name="pswd"></td></tr>	
				<tr><td><input type="submit" name="login" value="Login"></td>
				<td><input type="reset" name="reset" value="Rest"></td></tr>
			</table>
		</form>
	</center>

</body>
</html>