<?php
	session_start();

	session_unset(); // Unset The Data

	session_destroy(); // Destory The Session

	header('Location: index.php');

	exit();