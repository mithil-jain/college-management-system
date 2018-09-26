<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Attendance</title>
	<link rel="stylesheet" href="Addons/attendance.css">
    <link rel="stylesheet" href="Addons/addattendance.css">
</head>
<body>
	<?php
	    if (isset($_GET['UserId'])) {update();}
				
	    function update() {

			$user = 'teacher';
			$pass = 'root';
			$db = 'students';

			$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to server".$db);

			if($_POST[$_GET['UserId'].'Notifications']!=""){
				$sql = "UPDATE `profile` SET `Notifications`=\"".$_POST[$_GET['UserId'].'Notifications']."\" WHERE UserId=\"".$_GET['UserId']."\"";
			}

			else{
				$sql = "UPDATE `profile` SET `Notifications`=NULL WHERE UserId=\"".$_GET['UserId']."\"";	
			}

			if (mysqli_query($conn, $sql)) {
				echo "Added details, refreshing data...";
	            header("refresh:3;url=http://localhost/Git/college-system/home.php?page=notifications.php");
			}
			else {
				echo "Error: ".mysqli_error($conn);
			}

			mysqli_close($conn);
	    }
					
	?>
	<?php

		fetch();
		function fetch() {
			
			$user = 'student';
			$pass = 'sakec';
			$db = 'students';

			$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to server".$db);

			$get_all = "select * from profile order by Division, RollNo";
					
			$data = mysqli_query($conn, $get_all) or die("No records found.");

			$row = mysqli_fetch_assoc($data);

			echo "<div class=\"table\"><table><tr><th>UserId</th><th>Name</th><th>Class-Div-Roll</th><th>Notificaion</th><th>Update</th></tr>";

			while($row = mysqli_fetch_assoc($data)) {
				echo
	                "<tr><form action='home.php?page=notifications.php&UserId=".$row['UserId']."' method=POST>
	                <td>".$row["UserId"]."</td>	            
	                <td>".$row["Fname"]." ".$row["Lname"]."</td>
	                <td>".$row["Class"]." ".$row["Division"]." ".$row["RollNo"]."</td>
	                <td><input type='text' name='".$row['UserId']."Notifications' style='width:100%;' value='".$row["Notifications"]."'></td>
	            	<td><input type='submit' name='".$row['UserId']."submit' value='Update' style='width:80px'></td>
	                </form></tr>";
			}
			echo "</table></div>";
		}
	?>
</body>
</html>