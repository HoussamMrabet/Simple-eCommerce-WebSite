<?php

	// Anti-clickjacking header
	header('X-Frame-Options: DENY');

	// Secure session settings
	ini_set('session.cookie_httponly', 1);
	ini_set('session.cookie_samesite', 'Strict');
	ini_set('session.cookie_secure', 0);
	session_start();

	include 'connect.php';

	// Routes

	$tpl 	= 'includes/templates/'; // Template Directory
	$lang 	= 'includes/languages/'; // Language Directory
	$func	= 'includes/functions/'; // Functions Directory
	$css 	= 'layout/css/'; // Css Directory
	$js 	= 'layout/js/'; // Js Directory

	// Include The Important Files

	include $func . 'functions.php';
	include $lang . 'english.php';
	include $tpl . 'header.php';

	// Include Navbar On All Pages Expect The One With $noNavbar Vairable

	if (!isset($noNavbar)) { include $tpl . 'navbar.php'; }
	

	