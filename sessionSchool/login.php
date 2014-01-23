<?
	ini_set('display_errors', 1);
	session_start();
	
	if($_REQUEST['usr'] == "ABC" && $_REQUEST['pswd'] == "123"){
		$_SESSION['usr'] = "ABC";
		$_SESSION['pswd'] = "123";
		
		header("Location: profile.php");
			
	}else{
		header("Location: index.php");
	}
	echo $_REQUEST['usr'];
	echo $_REQUEST['pswd'];
	echo 'You are good';
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title></title>
	</head>
<body>
</body>
</html>