<?
	ini_set('display_errors', 1);
	session_start();
	if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
		header("Location: index.php");
	}
	
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title></title>
	</head>
<body>
 This is the profile page.
 <a href="./logout.php">Logout!</a>
</body>
</html>