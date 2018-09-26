<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!-- <meta http-equiv="refresh" content="2"> -->
	<title>Student List</title>
	<link rel="stylesheet" href="Addons/attendance.css">

</head>
<body>
	<p class="patten">Event List</p>
    <hr class="hratten">
	<?php

		$user = 'student';
		$pass = 'sakec';
		$db = 'students';

		$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to server".$db);
        
        $date = date("Y-m-d");
		$fetch = 'select * from events where date>="'.$date.'" order by date';

		$temp = mysqli_query($conn, $fetch) or die("Record not found.");

        echo "<div class=\"table\"><table><tr><th>Event Id</th><th>Date</th><th>Time</th><th>venue</th><th>Event Name</th>";
		while($row = mysqli_fetch_assoc($temp)) {
			echo "<tr><td>".$row["id"]."</td><td>".$row["date"]."</td><td>".$row["time"]."</td><td>".$row["venue"]."</td><td><a style=\"text-decoration:none;\" href=\"".$row["link"]."\" target='_blank'>".$row["event_name"]."</td></tr>";
		}
        echo "</table></div>"; 

		mysqli_close($conn);
	?>
	
</body>
</html>