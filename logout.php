<?php

	session_start();

	session_destroy();

	$_SESSION = Array();

	header('Location: becomeseller.php');

?>