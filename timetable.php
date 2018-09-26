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

		if (isset($_POST['confirm'])) {add();}
		
		function add() {

			$user = 'teacher';
			$pass = 'root';
			$db = 'students';

			$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to server".$db);

			$sql = "INSERT INTO `events`(`id`, `date`, `time`, `venue`, `event_name`,`link`) VALUES (".$_POST['EventId'].",".$_POST['date'].",\"".$_POST['time'].":00\",\"".$_POST['venue']."\",\"".$_POST['EventName']."\",\"".$_POST['link  ']."\")";

			if (mysqli_query($conn, $sql)) {
				echo "Added details, refreshing data...";
                header("refresh:3;url=http://localhost:8080/college-system/home.php?page=events.php");
			}
			else {
				echo "Error: ".mysqli_error($conn);
			}
			mysqli_close($conn);
        }
			
	?>
    
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