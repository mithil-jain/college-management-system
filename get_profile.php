<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!-- <meta http-equiv="refresh" content="2"> -->
	<title>Student List</title>
	<link rel="stylesheet" href="Addons/attendance.css">
</head>
<body>
	<p class="patten">Student List-TE
    
	<?php

		$user = 'student';
		$pass = 'sakec';
		$db = 'students';

		$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to server".$db);

		$fetchdiv = "select * from profile where UserId=\"".$_SESSION['name']."\"";

		$temp = mysqli_query($conn, $fetchdiv) or die("Record not found.");

		$div = mysqli_fetch_assoc($temp);

		echo "".$div['Division']."<hr class=\"hratten\"></p>";
		$get_all = "select Fname, Lname, Class, Division, RollNo from profile where UserId!=\"0\" and Division=".$div['Division']." order by RollNo";
		
		$data = mysqli_query($conn, $get_all) or die("No records found.");

		echo "<div class=\"table\"><table><tr><th>First Name</th><th>Last Name</th><th>Class</th><th>Div</th><th>Roll No</th>";

		while($row = mysqli_fetch_assoc($data)) {
			echo "<tr><td>".$row["Fname"]."</td><td>".$row["Lname"]."</td><td>".$row["Class"]."</td><td>".$row["Division"]."</td><td>".$row["RollNo"]."</td></tr>";
		}
		echo "</table></div>"; 

		mysqli_close($conn);
	?>
	
</body>
</html>