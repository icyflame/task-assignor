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

	echo "<tr><td>$deadline</td><td>$desc<td>$nor</td><td>$nee</td><td>$adddate</td><td><form action='updaterem.php' method='POST'><input type='text' name='$tid' value='$rem'></input>";

	// echo "<select name='status'><option>0</option><option>1</option><option>2</option></select>";

	echo "<input type='submit'></form></td>";

	include 'build-button.php';

	echo "</tr>";

}

echo "</table>";

?>