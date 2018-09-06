<!--nasfk-->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!-- <meta http-equiv="refresh" content="2"> -->
	<link rel="stylesheet" href="Addons/updateNnewpass.css">
	<title>Add Details</title>
</head>
<body>		
	
	<?php
		// include 'session.php';
	?>
    <p class="pupdate">Edit Profile</p>
    <hr class=hratten>
    <div class="update">
	<div class="tags">
		<ul>
			<li>Smart-Card No: </li>
			<li>Reg No: </li>
			<li>Name: </li>
			<li>Classs/Division:</li>
			<li>Roll No:</li>
			<li>Mobile Number: </li>
			<li>Address: </li>
		</ul>
	</div>
	
	<?php

		fetch();
		function fetch() {
			$user = 'student';
			$pass = 'sakec';
			$db = 'students';

			$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to server".$db);

			$get_all = "select * from profile where UserId=\"".$_SESSION['name']."\"";
				
			$data = mysqli_query($conn, $get_all) or die("No records found.");

			$row = mysqli_fetch_assoc($data);

			echo'<div class="container">
				<form action="" method="POST">
					<br><ul class=\"ulright\">
					<li>'.$row["UserId"].'</li>
					<li>'.$row["RegNo"].'</li>
					<li><span>'.$row["Fname"].' '.$row["Lname"].'</span><br></li>
					<li><span>'.$row["Class"].' '.$row["Division"].'</span><br></li>
					<li><span>'.$row["RollNo"].'</span><br></li>
					<li><input type="number" name="MobNo" value="'.$row["MobNo"].'"><br></li>
					<li><input type="text" name="Addr" value="'.$row["Addr"].'"><br></li>
					<input name="update" type="submit" value="Update">
					<input name="pass" type="submit" value="Change Pass"></ul>
				</form> 
			</div>';
			mysqli_close($conn);
		}

		if (isset($_POST['pass'])) {
			header('Location: home.php?page=new_pass.php');
		}

		if (isset($_POST['update'])) {update();}
	
		function update() {


			$user = 'student';
			$pass = 'sakec';
			$db = 'students';

			$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to server".$db);


			$sql = "UPDATE `profile` SET MobNo=".$_POST['MobNo'].", Addr=\"".$_POST['Addr']."\" WHERE UserId=\"".$_SESSION['name']."\"";

			if (mysqli_query($conn, $sql)) {
				echo "Updated Profile, redirecting to home...";
			}
	
			else {
				echo "Error: ".mysqli_error($conn);
			}

			mysqli_close($conn);

			header("Location: home.php?page=update.php");
		}
		
		?>
        </div>

</body>
</html>