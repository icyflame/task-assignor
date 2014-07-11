<?php

if($stat == 0){

	echo "Task ongoing.";

	echo "<form action='updatestat.php' method='POST'><input style='display: none;' name='$tid' value='1'><input type='submit' value='Apply for Completion'></form>";

}

elseif($stat == 1){

	echo "Applied for completion.";

	echo "<form action='updatestat.php' method='POST'><input style='display: none;' name='$tid' value='0'><input type='submit' value='Revert to ongoing'></form>";

}

elseif($stat == 2){

	echo "Task has been completed.";

}


?>