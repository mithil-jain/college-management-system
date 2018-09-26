<?php
	// include 'session.php';
	if ($_SESSION['type']=="admin") {
		include 'add_events.php';
	}
	else {
		include 'check_events.php';
	}
?>