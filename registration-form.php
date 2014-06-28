<?php

require 'connect.php';

if(!empty($_POST)){

	echo $_POST['un'].'<br/>';
	echo $_POST['pw'].'<br/>';
	echo $_POST['fn'].'<br/>';
	echo $_POST['ln'].'<br/>';
	echo $_POST['pos'].'<br/>';


	if(isset($_POST['un']) && isset($_POST['pw']) && isset($_POST['fn']) && isset($_POST['ln']) && isset($_POST['pos'])){

		$user = $_POST['un'];
		$pass = md5($_POST['pw']);
		$firs = $_POST['fn'];
		$last = $_POST['ln'];
		$mail = $_POST['em'];
		$posi = $_POST['pos'];

        // before proceeding further we must make sure that the username is not already taken

		$check = mysql_query("SELECT * FROM `users` WHERE username='$user'");

		if( mysql_num_rows($check) != 0){
			echo "This username is already taken. Please give another username.";
		}

		else{

			$query = "INSERT INTO `users` VALUES('$user', '$pass', '$firs', '$last', '$mail', '$posi')";
		// $query = "INSERT INTO users VALUES (".$_POST['un'].')';

			echo $query.'<br/>';

			if(mysql_query($query)){
				echo "Successfully added to database.";
			}

			else{
				echo mysql_error();
			}

		}
		
	}

}

?>

<html>

<body>

	<form action="registration-form.php" method="POST">

		username:<input type="text" name="un"/><br/>
		password:<input type="password" name="pw"/><br/>
		firstname:<input type="text" name="fn"/><br/>
		lastname:<input type="text" name="ln"/><br/>
		email:<input type="text" name="em"/></br/>
		position:<input type="text" name="pos"/><br/>


		<input type="submit" value="register">

	</form>

</body>

</html>