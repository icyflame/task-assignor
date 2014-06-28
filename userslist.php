<?php

require 'connect.php';

$res = mysql_query("SELECT * FROM `users` ORDER BY `position`");

echo "<table border=2 cellpadding=10><tr><th>Username</th><th>Full Name</th><th>Email ID</th><th>Position</th></tr>";

while($row = mysql_fetch_assoc($res)){

	$username = $row['username'];
	$fullname = $row['firstname'].' '.$row['lastname'];
	$email = $row['email'];
	$position = $row['position'];

	echo "<tr><td>$username</td><td>$fullname<td>$email</td><td>$position</td></tr>";

}

echo "</table>";

echo "<p><b>Note that you can assign work only to members who have a position value less than yours</b></p>"

?>