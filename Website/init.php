<?php
	
	// Anti-clickjacking header
	header('X-Frame-Options: DENY');
	
	// Secure session settings
	ini_set('session.cookie_httponly', 1);
	ini_set('session.cookie_samesite', 'Strict');
	session_start();

// Start session
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

// Initialize session variables if they don't exist
if (!isset($_SESSION['last_regeneration'])) {
	$_SESSION['last_regeneration'] = time();
}
if (!isset($_SESSION['last_activity'])) {
	$_SESSION['last_activity'] = time();
}

// Regenerate session ID every 30 minutes
$regeneration_time = 30 * 60; 
if (time() - $_SESSION['last_regeneration'] > $regeneration_time) {
	session_regenerate_id(true);
	$_SESSION['last_regeneration'] = time();
}

// Session timeout after 30 minutes of inactivity
$timeout = 30 * 60;
if (time() - $_SESSION['last_activity'] > $timeout) {
	session_unset();
	session_destroy();
	session_start();
	session_regenerate_id(true);
	$_SESSION['last_activity'] = time();
	$_SESSION['last_regeneration'] = time();
} else {
	$_SESSION['last_activity'] = time();
}

// Error Reporting

ini_set('display_errors', 'On');
error_reporting(E_ALL);

include 'admin/connect.php';

$sessionUser = '';
$sessionAvatar = '';

if (isset($_SESSION['user'])) {
	$sessionUser = $_SESSION['user'];
	$sessionAvatar = $_SESSION['avatar'];
}

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
