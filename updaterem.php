<?php

session_start();

require 'checklogin.php';
require 'connect.php';

echo $_POST['1'];
echo '<br/>'.$_POST;

echo '<br/><br/>';

print_r($_POST);

foreach ($_POST as $key => $entry)
{

	// here taskId is the key and the entry is the new comment that needs to be updated.

	$query = "UPDATE `tasks` SET remarks='$entry' WHERE taskid='$key'";

	echo $query.'<br/>';

	if (mysql_query($query)){
		echo 'Remarks have been updated';

	}

	else{
		echo mysql_error();
	}

}

?>