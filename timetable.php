<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Time Table</title>
	<link rel="stylesheet" href="Addons/attendance.css">
</head>
<body>
	<p class="patten">Time Table for TE4</p>
    <hr class="hratten">
	<?php

		$user = 'student';
		$pass = 'sakec';
		$db = 'students';

		$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to server".$db);

		$get_all = "select * from timetable";
		
		$data = mysqli_query($conn, $get_all) or die("No records found.");

		echo "<div class=\"table\"><table><tr><th>Time</th><th>Monday</th><th>Tuesday</th><th>Wednesday</th><th>Thursday</th><th>Friday</th>";

		while($row = mysqli_fetch_assoc($data)) {
			echo "<tr><td>".$row["Time"]."</td><td>".$row["Monday"]."</td><td>".$row["Tuesday"]."</td><td>".$row["Wednesday"]."</td><td>".$row["Thursday"]."</td><td>".$row["Friday"]."</td></tr>";
		}
		echo "</table></div>"; 

		mysqli_close($conn);
	?>
</body>
</html>