<?php

require 'connect.php';
require 'checklogin.php';

$res = mysql_query("SELECT * FROM `tasks` ORDER BY taskid DESC");

echo "<table border=2 cellpadding=10><tr><th>Deadline</th><th>Description</th><th>Assignor</th><th>Assignee</th><th>Date Added</th><th>Remarks</th><th>Status</th></tr>";

while($row = mysql_fetch_assoc($res)){

	$tid = $row['taskid'];
	$desc = $row['taskdesc'];
	$nor = $row['assignor'];
	$nee = $row['assignee'];
	$deadline = $row['deadline'];
	$adddate = $row['adddate'];
	$rem = $row['remarks'];
	$stat = $row['taskstatus'];

	echo "<tr>";

	echo "<td>$deadline</td>";
	echo "<td>$desc<td>$nor</td>";
	echo "<td>$nee</td>";
	echo "<td>$adddate</td>";
	echo "<td>$rem</td>";
	echo "<td>";

	include 'interpret-stat.php';

	echo "</td>";

	echo "</tr>";

}

echo "</table>";

?>