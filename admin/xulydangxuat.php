<?php
	session_start();
	unset($_SESSION['useradmin']);
	header("LOCATION: ../index.php");
?>