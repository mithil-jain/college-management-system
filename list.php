<?php
	// include 'session.php';
	if ($_SESSION['type']=="admin") {
		include 'add_details.php';
	}
	else {
		include 'get_profile.php';
	}
?>