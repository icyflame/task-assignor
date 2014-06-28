<?php
session_start();

if(isset($_SESSION['loggedin'])){
    $name = $_SESSION['username'];
	echo "<b>Logged in as $name</b><br/>";
}

else{
    echo "<script>document.location='login-form.php'</script>";
    exit;
}

?>