<?php session_start(); ?>
<?php # backend.php

//The user is redirected here from backy.php
ob_start();
// start the session.
// if no session value is present, redirect the user:
require_once ('includes/config.inc.php');
if (!isset($_SESSION['minad_id'])) 
{
	
	$url = 'backy.php';
	header("Location: $url");
	exit();
} 
else
{
	include_once('boondocks.php');
}
?>