<?php

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

?>