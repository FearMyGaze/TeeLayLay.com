<?php

	session_start();

	unset($_SESSION['RememberMe']);
	unset($_SESSION['Email']);

	session_destroy();

	header("Location: ../../index.php");

?>