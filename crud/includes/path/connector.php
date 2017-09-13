
<?php # Script 16.4 - connector.php

// This file contains the database access information.
// This file also establishes a connection to MySQL
// and selects the database.
// Set the database access information as constants:
DEFINE ('DB_USER', 'scholars_crud');
DEFINE ('DB_PASSWORD', 'scholars#01');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'scholars_crud');

// Make the connection:
$mysqli = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (!$mysqli) {
	trigger_error ('could not connect to MySQL: ' . mysqli_connect_error());
	}
?>
