<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Attendance</title>
	<link rel="stylesheet" href="Addons/attendance.css">
    <link rel="stylesheet" href="Addons/addattendance.css">
</head>
<body>
    <p class="patten">Add Attendance</p>
    <hr class="hratten">
    <?php
        if (isset($_GET['UserId'])) {update();}
			
        function update() {

				$user = 'teacher';
				$pass = 'root';
				$db = 'students';

				$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to server".$db);
		
				$sql = "UPDATE `profile` SET `S1`=".$_POST[$_GET['UserId'].'S1'].",`S1t`=".$_POST[$_GET['UserId'].'S1t'].",`S2`=".$_POST[$_GET['UserId'].'S2'].",`S2t`=".$_POST[$_GET['UserId'].'S2t'].",`S3`=".$_POST[$_GET['UserId'].'S3'].",`S3t`=".$_POST[$_GET['UserId'].'S3t'].",`S4`=".$_POST[$_GET['UserId'].'S4'].",`S4t`=".$_POST[$_GET['UserId'].'S4t'].",`S5`=".$_POST[$_GET['UserId'].'S5'].",`S5t`=".$_POST[$_GET['UserId'].'S5t']." WHERE UserId=\"".$_GET['UserId']."\"";

				if (mysqli_query($conn, $sql)) {
					echo "Added details, refreshing data...";
                    header("refresh:3;url=http://localhost/Git/college-system/home.php?page=attendance.php");
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

		echo "<div class=\"table\"><table><tr><th>Name</th><th>Class-Div-Roll</th><th>MP</th><th>MP-T</th><th>CN</th><th>CN-T</th><th>AOS</th><th>AOS-T</th><th>DBMS</th><th>DBMS-T</th><th>TCS</th><th>TCS-T</th><th>Atten-ded</th><th>Total</th><th>Perce-ntage</th><th>Update</th></tr>";

		while($row = mysqli_fetch_assoc($data)) {
			echo
                "<tr><form action='home.php?page=attendance.php&UserId=".$row['UserId']."' method=POST>
                <td>".$row["Fname"]." ".$row["Lname"]."</td>
                <td>".$row["Class"]." ".$row["Division"]." ".$row["RollNo"]."</td>
                <td><input type='number' name='".$row['UserId']."S1' value='".$row["S1"]."'></td>
                <td><input type='number' name='".$row['UserId']."S1t' value='".$row["S1t"]."'></td>
                <td><input type='number' name='".$row['UserId']."S2' value='".$row["S2"]."'></td>
                <td><input type='number' name='".$row['UserId']."S2t' value='".$row["S2t"]."'></td>
                <td><input type='number' name='".$row['UserId']."S3' value='".$row["S3"]."'></td>
                <td><input type='number' name='".$row['UserId']."S3t' value='".$row["S3t"]."'></td>
                <td><input type='number' name='".$row['UserId']."S4' value='".$row["S4"]."'></td>
                <td><input type='number' name='".$row['UserId']."S4t' value='".$row["S4t"]."'></td>
                <td><input type='number' name='".$row['UserId']."S5' value='".$row["S5"]."'></td>
                <td><input type='number' name='".$row['UserId']."S5t' value='".$row["S5t"]."'></td>
                <td>".$row["Attended"]."</td>
                <td>".$row["Total"]."</td>
                <td>".$row["Percent"]."</td>
            	<td><input type='submit' name='".$row['UserId']."submit' value='Update' style='width:100%;height:100%;padding:0px'></td>
                </form></tr>";
		}
		echo "</table></div>";
	}
	?>
</body>
</html>
