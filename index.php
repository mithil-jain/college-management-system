<html>
<title>Login</title>
<head>
	<link rel="stylesheet" type="text/css" href="Addons/index.css">
	<script>
		function forgot(){
			window.alert("Mail ur details at peacock@gmail.com");
		}
		function reset() {
			window.location.assign("index.php");
		}
	</script> 
	<link rel="shortcut icon" href="Addons/title_img.ico" />
</head>
<body>

	<?php
		session_start();
		session_unset();
	?>
	<div class="block">
	  
		<div class="image">
			<img src="Addons/person-flat.png" alt="P">
		</div>
	  
		<div class="form">
	  
			<form action="" method="POST">
				<p class="formp">Username</p>
				<input name="id" type=text placeholder="Enter username">
				<p class="formp">Password</p>
				<input name="pass" type=password placeholder="Enter password"><br><br>
				<input type=submit name="login" value="Login"><br>
				<input type=button value="Reset" onclick="reset()">
				<a href="" onclick="forgot()"><p class="forgot">Forgot your username or password?</p></a>
			</form>
	  	
			<?php
				if (isset($_POST['login'])&&$_POST['id']!="") {
					validate();
				}

				function validate()
				{
					$user = 'student';
					$pass = 'sakec';
					$db = 'students';

					$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to server".$db);

					$check = "SELECT Pass FROM profile WHERE UserId=\"".$_POST['id']."\"";

					$data = mysqli_query($conn, $check) or die("User not found.");

					$row = mysqli_fetch_assoc($data);

					if ($_POST['pass'] == $row['Pass']) {
						mysqli_close($conn);
						session();
					}

					else {
						echo '<p class="error">Wrong Id or Password</p>';
					}
				}

				function session() {
					session_start();
					if ($_POST['id']=="0") {
						$_SESSION['type']="admin";
					}
					else {
							$_SESSION['type']="user";
					}
					$_SESSION['name']=$_POST['id'];
					header("Location: home.php");
				}
			?>
		</div>
		
	</div>

</body>
</html>
