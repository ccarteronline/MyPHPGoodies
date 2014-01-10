<?
	//connect to db class
	class dbConnect{
		//Connect to database
		public function connectToDB($host, $username, $password, $dbName){
			$connection = mysqli_connect($host, $username, $password, $dbName);
			if($connection){
				$myConnectionStatus = true;
				return $connection;				
			}else{
				die('Cant connect to Database!');
			}				
		}
	}
	
	class userHandling extends dbConnect{
		//register validate user and execute registration	
		public $registerMessages = '';	
		public $loginMessages = '';
		
		public function registerUser($dbConnection, $column, $tableName, $fname, $lname, $newUsername, $newUserEmail, $password){			
			//query the database
			$checkEmailExist = mysqli_query($dbConnection, "SELECT $column FROM $tableName WHERE $column = '$newUserEmail'");
			$checkUsernameExist = mysqli_query($dbConnection, "SELECT username FROM $tableName WHERE username = '$newUsername'");
			
			//validate user's email address and username
			if(mysqli_num_rows($checkEmailExist)>0){
				$this->registerMessages = "This email already exists";
			}else if(mysqli_num_rows($checkUsernameExist)>0){
				$this->registerMessages =  "This username already exists";
			}else if(!filter_var($newUserEmail, FILTER_VALIDATE_EMAIL)){
				$this->registerMessages =  'Please use a valid email address';
			}else if($password == "" || $password == "password"){
				$this->registerMessages =  'please use a legitimate password';
			}else{
				//echo 'There is no user by this name, please register!';
				//Strip slashes and prep email and password for database
				
				$fname = strip_tags($fname);
				$fname = stripcslashes($fname);
				$fname = trim($fname);
				
				$lname = strip_tags($lname);
				$lname = stripcslashes($lname);
				$lname = trim($lname);
				
				$newUsername = strip_tags($newUsername);
				$newUsername = stripcslashes($newUsername);
				$newUsername = trim($newUsername);
				
				$newUserEmail = strip_tags($newUserEmail);
				$newUserEmail = stripslashes($newUserEmail);
				$newUserEmail = trim($newUserEmail);
				//
				$password = strip_tags($password);
				$password = stripslashes($password);
				$password = trim($password);
				$password = md5($password);
				
				//push the items into the database
				$this->pushIntoDatabase($dbConnection, $tableName, $fname, $lname, $newUsername, $newUserEmail, $password);
			}
		}
		//push the new user into the database
		private function pushIntoDatabase($con, $table, $fname, $lname, $newUsername, $email, $pass){
			$this->registerMessages =  'pushing users into the database';
			$placeIn = "INSERT INTO $table (id, firstName, lastName, username, email, password) VALUES ('','".$fname."', '".$lname."', '".$newUsername."', '".$email."', '".$pass."')";
			mysqli_query($con, $placeIn) or die("Sorry, there was an issue with the server ");
		}
		
		public function loginUser($dbconnect, $tbl, $username, $pass){
			$username = trim($username);
			$username = stripslashes($username);
			$username = strip_tags($username);
			//
			$pass = trim($pass);
			$pass = stripslashes($pass);
			$pass = strip_tags($pass);
			$pass = md5($pass);
			
			$query = mysqli_query($dbconnect, 'SELECT * FROM members WHERE username= "'.$username.'" AND password= "'.$pass.'"');
			if(empty($username) || empty($pass)){
				$this->loginMessages =  'Please enter a username and password!';
			}else if(mysqli_num_rows($query) == 1){
				//$this->startSessionLogin($username);
				$this->loginMessages = 'Great! You are logged in, please wait..';
				return true;
			}else{
				$this->loginMessages = 'Sorry, your username or password was incorrect <a href="#">Forgot password?</a>';
				return false;
			}
		}
		
		private function startSessionLogin($user){
			
			//$locationControl->locateHandler("http://google.com");
			//$this->changeLocation('http://google.com');
			//session_start();
			$_SESSION['username'] = $user;
			$_SESSION['isLoggedIn'] = true;
			$isLoggedin = $_SESSION['isLoggedIn'];
			echo "<script> window.location='makeupyourownthing.com/profile.php?username=$user';</script>";
			
		}
	}
	class pageSwitcherRoo{
		public function pageSwitch(){
			
		}
	}
	
	
	//Written by Chris Carter ccarteronline.com 2013
?>			