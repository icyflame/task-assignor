<?php

session_start();

require 'connect.php';

if(!empty($_POST)){

    echo $_POST['un'].'<br/>';
	echo $_POST['pw'].'<br/>';	

	if(isset($_POST['un']) && isset($_POST['pw'])){

		$user = "'".$_POST['un']."'";
		$pass = "'".md5($_POST['pw'])."'";

		$query = "SELECT `password` FROM `users` WHERE username=".$user;

		echo $query.'<br/>';

		$res = mysql_query($query);

		$resrow = mysql_fetch_assoc($res);

		$pass_entered = md5($_POST['pw']);

		$pass_stored = $resrow['password'];

		echo 'Pass stored: '.$pass_stored.'<br/>';
		echo 'Pass entered: '.$pass_entered.'<br/>';

		if($pass_stored == $pass_entered){

			echo 'Login Confirmed';
            $_SESSION['loggedin'] = 1;
            $_SESSION['username'] = $_POST['un'];
            
            echo "<script> document.location='loginpage.php'; </script>";
            exit;
            
		}

		else

			echo 'Bad Password';

	}

}

?>

<html>

<body>

	<form action="login-form.php" method="POST">

		username:<input type="text" name="un"/><br/>
		password:<input type="password" name="pw"/><br/>

		<input type="submit" value="login">

	</form>
	
	<br/>
	<a href='registration-form.php'>Register</a>

</body>

</html>
