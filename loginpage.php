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

	echo "<table border=2 cellpadding=10><tr><th>Deadline</th><th>Description</th><th>Assignor</th><th>Assignee</th><th>Date Added</th><th>Remarks</th></tr>";

	while($row = mysql_fetch_assoc($res)){

		$tid = $row['taskid'];
		$desc = $row['taskdesc'];
		$nor = $row['assignor'];
		$nee = $row['assignee'];
		$deadline = $row['deadline'];
		$adddate = $row['adddate'];
		$rem = $row['remarks'];

		echo "<tr><td>$deadline</td><td>$desc<td>$nor</td><td>$nee</td><td>$adddate</td><td><form action='updaterem.php' method='POST'><input type='text' name='$tid' value='$rem'></input><input type='submit'></form></td></tr>";

	}

	echo "</table>";

}

echo "<b>Tasks assigned by you</b><br/><br/>";

$query = "SELECT * FROM `tasks` WHERE assignor='$user'";

$res = mysql_query($query);

if(mysql_num_rows($res) == 0){
	echo "No tasks have been assigned by you.<br/><br/>";
}

else{

	echo "<table border=2 cellpadding=10><tr><th>Deadline</th><th>Description</th><th>Assignor</th><th>Assignee</th><th>Date Added</th><th>Remarks</th></tr>";

	while($row = mysql_fetch_assoc($res)){

		$desc = $row['taskdesc'];
		$nor = $row['assignor'];
		$nee = $row['assignee'];
		$deadline = $row['deadline'];
		$adddate = $row['adddate'];
		$rem = $row['remarks'];

		echo "<tr><td>$deadline</td><td>$desc<td>$nor</td><td>$nee</td><td>$adddate</td><td>$rem</td></tr>";

	}

	echo "</table>";

}

?>

<a href="assign-work.php">Assign a new task</a> <br/>
<a href="display-table.php">View all ongoing tasks</a> <br/>
<a href="userslist.php">Look at a list of all registered users</a> <br/>