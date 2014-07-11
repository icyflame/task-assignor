<?php

session_start();

require 'checklogin.php';
require 'connect.php';

print_r($_POST);

foreach ($_POST as $key => $entry)
{

	// here taskId is the key and the entry is the new task status that needs to be updated.

	$query = "UPDATE `tasks` SET taskstatus='$entry' WHERE taskid='$key'";

	echo $query.'<br/>';
	// echo $query2.'<br/>';

	if (mysql_query($query)) { // && mysql_query($query2)){

	echo '<h1>Task status have been updated</h1>';

}

else{
	echo mysql_error();
}

break;

}

echo"<script>
window.onload = window.setTimeout(re,2000);
function re(){
	window.location = 'homepage.php';
}
</script>";

echo "<h3>You will now be redirected to the <a href='homepage.php'>previous page</a>.</h3>";

?>