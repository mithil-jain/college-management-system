<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Assignment</title>
	<link rel="stylesheet" href="Addons/attendance.css">
</head>
<body>
	<p class="patten">Assignment List</p>
    <hr class="hratten">
	<?php

		$user = 'student';
		$pass = 'sakec';
		$db = 'students';

		$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to server".$db);
        
        $date=date("Y-m-d");

		$fetch = 'select * from assign where submission>="'.$date.'" order by submission';

		$temp = mysqli_query($conn, $fetch) or die("Record not found.");

        echo "<div class=\"table\"><table><tr><th>Assignment No</th><th>Subject</th><th>Assigned Date</th><th>Submission Date</th>";
		while($row = mysqli_fetch_assoc($temp)) {
			echo "<tr><td>".$row["no."]."</td><td>".$row["subject"]."</td><td>".$row["assigned"]."</td><td>".$row["submission"]."</td></tr>";
		}
        echo "</table></div>"; 

		mysqli_close($conn);
	?>
	
</body>
</html>