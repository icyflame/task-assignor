<?php

echo "<table border=2 cellpadding=10><tr><th>Deadline</th><th>Description</th><th>Assignor</th><th>Assignee</th><th>Date Added</th><th>Remarks</th><th>Status</th></tr>";

while($row = mysql_fetch_assoc($res)){

	$desc = $row['taskdesc'];
	$nor = $row['assignor'];
	$nee = $row['assignee'];
	$deadline = $row['deadline'];
	$adddate = $row['adddate'];
	$rem = $row['remarks'];
	$stat = $row['taskstatus'];

	echo "<tr><td>$deadline</td><td>$desc<td>$nor</td><td>$nee</td><td>$adddate</td><td>$rem</td><td>$stat</td></tr>";

}

echo "</table>";

?>