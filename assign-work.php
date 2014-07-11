<?php
session_start();

$from_mail = 'noreply@yecindia.com';

require 'checklogin.php';
require 'logoutbtn.php';
require 'connect.php';

// connected to database

// name of the table is tasks

if(!empty($_POST)){

	if(isset($_POST['desc']) && isset($_POST['dl']) && isset($_POST['assignee'])){

		echo $_POST['desc'].'<br/>';
		echo $_POST['dl'].'<br/>';
		echo $_POST['assignee'].'<br/>';

		$date = $_POST['dl'];

		$desc = $_POST['desc'];
		$assignee = $_POST['assignee'];

		if(!isset($_SESSION['loggedin']))
			echo 'Log in before adding a task.<br/>';

		else{

			// Finding the task ID

			$check = mysql_query("SELECT COUNT(*) FROM `tasks`");                
			$row = mysql_fetch_array($check);
			$taskid = $row[0] + 1;

			$assignor = $_SESSION['username'];
			$add = date('Y-m-d',time());

			$query = "INSERT INTO `tasks` VALUES('$taskid', '$desc', '$assignor', '$assignee', '$date', '$add')";

			// $query = "INSERT INTO `tasks` VALUES(".$desc.','."STR_TO_DATE(".$date.", '%m/%d/%Y')".','.$assignee.','.$assignor.')';

			echo $query.'<br/>';

			// query validation

			// check if the assignor is present in the database.

			if( $check = mysql_query("SELECT * FROM `users` WHERE username='$assignee'") ){

				if ( mysql_num_rows($check) == 0 ){
					echo "The name of the assignor does not exist in the database.";
				}

				else{

					$check = mysql_query("SELECT `position` FROM `users` WHERE username='$assignor'");

					$row = mysql_fetch_assoc($check);
					$assignor_pos = $row['position'];

					$check = mysql_query("SELECT `position` FROM `users` WHERE username='$assignee'");

					$row = mysql_fetch_assoc($check);
					$assignee_pos = $row['position'];

					// check if the assignor has privileges to assign work to the assignor.

					if($assignor_pos > $assignee_pos){

						echo "You do not have the privileges to delegate work to $assignee";

					}

					else

						if(mysql_query($query)){
							echo "Successfully added task to database<br/>";
							
							unset($_SESSION['loggedin']);

						// send an email to both the assignor and the assignee

							$res = mysql_query("SELECT email FROM `users` WHERE username='$assignee'");

							$res_rows = mysql_fetch_assoc($res);

							$assignee_mail = $res_rows['email'];

							$res = mysql_query("SELECT email FROM `users` WHERE username='$assignor'");

							$res_rows = mysql_fetch_assoc($res);

							$assignor_mail = $res_rows['email'];

						// comppose the mail

							$subject = "[work-assigned] New task";

							$body = "Some points about the work assigned:\n\nDescription of the task:\n$desc\nDeadline for this task:\n$date\n";

							$headers = "From: ".$from_mail;

							$body_assignee = "A new task has been assigned to you by $assignor\n\n";
							$body_assignor = "You assigned a task to $assignee\n\n";

							mail($assignee_mail, $subject, $body_assignee.$body, $headers);
							mail($assignor_mail, $subject, $body_assignor.$body, $headers);

						}

						else{
							echo "Unable to add to database<br/>";
							echo mysql_error();
						}

					}

				}

			}

		}

	}


	?>

	<html>

	<body>

		<form action="" method="POST">

			<table>

				<tr>

					<td>
						Work Description: 
					</td>

					<td>
						<textarea name="desc" rows="15" cols="30"></textarea>
					</td>

				</tr>

				<td>
					Deadline:
				</td>
				<td>
					<input type="date" name="dl"/>
				</td>

			</tr>
			<td>
				Assign this to: 
			</td>
			<td>
				<!--				<input type="text" name="assignee1"/> -->
				<?php

				$query = "SELECT * FROM `users` ORDER BY position DESC";

				$res = mysql_query($query);

				echo "<select name='assignee'>";

				$startpos = -1;

				while($row = mysql_fetch_assoc($res)){
					$un = $row['username'];
					$current_pos = $row['position'];

					echo "<option value='$un'>$un - Position $current_pos</option>";
				}

				echo "</select>";

				?>
				
			</td>

		</tr>

	</table>
	<input type="submit" value="Assign"/>

</form>

<a href="userslist.php">Look at a list of registered users</a>

</body>

</html>