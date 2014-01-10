MyPHPGoodies
============

This are some classes that I have written for myself and will soon evolve into something a whole lot more organized

.::Connect to a Database::.

$db = new dbConnect();

$myConnection = $db->connectToDB('host', 'username', 'password', 'databaseName');

.::Register a user::.

*You must create a table named 'members' with columns: first name, last name, username, email, and password.

--------------------------------------------------------------------------------------------
fName   |   lName   |   newUserName   |   newEmail   | newPassword
--------------------------------------------------------------------------------------------

$handleUser->registerUser($myConnection, 'email','members', $fName, $lName, $username, $email, $newPass);

*You may pre-validate the data before placing into the database. In this example. the column email is being checked to see if a user exists.

.::User Login::.

$handleUser = new userHandling();

$handleUser->loginUser($myConnection, 'members', $username, $password);

The above returns either true or false. If its true, the credentials match in the database, create a session to store their presence.

