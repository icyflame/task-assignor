<?php

if($stat == 0){

	echo "Task ongoing.";

	echo "<form action='updatestat.php' method='POST'><input style='display: none;' name='$tid' value='2'><input type='submit' value='Mark as completed'></form>";

}

elseif($stat == 1){

	echo "Applied for completion.";

	echo "<form action='updatestat.php' method='POST'><input style='display: none;' name='$tid' value='0'><input type='submit' value='Revert to ongoing'></form>";
	echo "<form action='updatestat.php' method='POST'><input style='display: none;' name='$tid' value='2'><input type='submit' value='Mark as completed'></form>";

}

elseif($stat == 2){

	echo "Task has been completed.";

}

?>