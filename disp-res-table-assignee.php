<?php

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
	echo "<td><form action='updaterem.php' method='POST'><input type='text' name='$tid' value='$rem'></input>";

	// echo "<select name='status'><option>0</option><option>1</option><option>2</option></select>";

	echo "<input type='submit'></form></td><td>";

	include 'build-button-assignee.php';

	echo "</td></tr>";

}

echo "</table>";

?>