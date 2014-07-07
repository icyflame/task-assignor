<?php

session_start();

require 'checklogin.php';
require 'logoutbtn.php';
require 'connect.php';

$user = $_SESSION['username'];

echo "<b>Tasks assigned to you</b><br/><br/>";

// display all the tasks assigned to user.

$query = "SELECT * FROM `tasks` WHERE assignee='$user'";

$res = mysql_query($query);

if(mysql_num_rows($res) == 0){
    echo "No tasks have been assigned to you.<br/><br/>";
}

else{

	include('disp-res-table-form.php');

}

echo "<b>Tasks assigned by you</b><br/><br/>";

$query = "SELECT * FROM `tasks` WHERE assignor='$user'";

$res = mysql_query($query);

if(mysql_num_rows($res) == 0){
	echo "No tasks have been assigned by you.<br/><br/>";
}

else{

	include('disp-res-table-noform.php');

}

?>

<a href="assign-work.php">Assign a new task</a> <br/>
<a href="display-table.php">View all ongoing tasks</a> <br/>
<a href="userslist.php">Look at a list of all registered users</a> <br/>