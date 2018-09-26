<?php
	// include 'session.php';
	if ($_SESSION['type']=="admin") {
		include 'add_notifications.php';
	}
	else {
		include 'check_notifications.php';
	}
?>