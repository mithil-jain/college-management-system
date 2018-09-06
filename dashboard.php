<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>DashBoard</title>
	<link rel="stylesheet" href="Addons/dashboard.css">
	<link rel="stylesheet" href="">
</head>
<body>

	<?php
		// include 'session.php';
		$user = 'student';
		$pass = 'sakec';
		$db = 'students';

		$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to server".$db);

		$get_all = "select * from profile where UserId=\"".$_SESSION['name']."\"";
				
		$data = mysqli_query($conn, $get_all) or die("No records found.");

		$row = mysqli_fetch_assoc($data);
        $x=40;
        $y=20;
		echo'<div class="container">
                <div class="details">
                    <p>Details:<p>
                    <hr>
                    <ul class="left">
                    <li>Name: </li>
                    <li>smartcard no:</li>
                    <li>class:</li>
                    </ul>
				    <ul class="right">
				    <li>'.$row["Fname"].' '.$row["Lname"].'</li>
				    <li>'.$row["UserId"].'</li>
				    <li>'.$row["Class"].' - '.$row["Division"].' - '.$row["RollNo"].'</li>
                    </ul>
                </div>
                <div class="attendance">
                    <p>Attendance:</p>
                    <hr>
                    <table class="tattendance">
                    <tr>
                    <th>Attended</th>
                    <th>Total</th>
                    <th>Percentage</th>
                    </tr>
                    <tr>
                    <td>'.$row["Attended"].'</td>
                    <td>'.$row["Total"].'</td>';
                    if ($row["Total"]!=0) {
                        echo '<td>'.$row["Percent"].'%</td>
                    ';
                    }
                    else {
                        echo '<td>0%</td>';
                    }
                    echo '
                    </tr>
                    </table>
                </div>
                <div class="notification">
                    <p>Assignment:</p>
                    <hr>';
            $user = 'student';
            $pass = 'sakec';
            $db = 'students';
            $i = 0;

            $conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to server".$db);

            $fetch = "select * from assign";

            $temp = mysqli_query($conn, $fetch) or die("Record not found.");

            while($row = mysqli_fetch_assoc($temp)) {
                if($i<2){
                echo "<span><b>Assignment No: </b>"   .$row["no."]."<br><b>Subject: </b>".$row["subject"]."<br><b>Assigned Date: </b> ".$row["assigned"]." <br><b>Submission Date: </b>".$row["submission"]."<br><br></span>";
                $i++;
                }
                else {
                    break;
                }
            }
      		  mysqli_close($conn);
                    echo '<p></p>
                </div>
                <div class="event">
                    <p>Events:</p>
                    <hr>';
            $user = 'student';
            $pass = 'sakec';
            $db = 'students';
            $i = 0;

            $conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to server".$db);

            $fetch = "select * from events";

            $temp = mysqli_query($conn, $fetch) or die("Record not found.");

            while($row = mysqli_fetch_assoc($temp)) {
                if($i<2){
                echo "<span><b>Name: </b>"   .$row["event_name"]."<br><b>Event Id: </b>".$row["id"]."<br><b>Date: </b> ".$row["date"]." <br><b>Time: </b>".$row["time"]."<br><b>Venue: </b>".$row["venue"]."<br><br></span>";
                $i++;
                }
                else {
                    break;
                }
            }
            echo "</table></div>"; 
            echo '</p></div>';

		mysqli_close($conn);
	?>
	
</body>
</html>