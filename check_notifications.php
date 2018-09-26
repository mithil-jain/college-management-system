<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Notifications</title>
</head>
<body>
	<?php

		$user = 'student';
		$pass = 'sakec';
		$db = 'students';

		$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to server".$db);


		$sql = "select Notifications from profile where UserId=\"".$_SESSION['name']."\"";
		
		$temp = mysqli_query($conn, $sql) or die("Record not found.");

		$row = mysqli_fetch_assoc($temp);

		if ($row['Notifications']==NULL) {
			echo "No notifications";
		}

		else {
			echo $row['Notifications'];

			echo "<form action='' method=POST><input type='submit' name='read' value='Mark as read.'></form>";
		}

		if (isset($_POST['read'])) {
			$sql = "UPDATE `profile` SET `Notifications`=NULL WHERE UserId=\"".$_SESSION['name']."\"";		
			mysqli_query($conn, $sql) or die("Unable to connect to server");
			header('Location: home.php?page=notifications.php');
		}
		mysqli_close($conn);
	?>
</body>
</html>