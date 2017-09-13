<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>connector</title>
</head>

<body>
<?php # Script 16.4 - connector.php

// This file contains the database access information.
// This file also establishes a connection to MySQL
// and selects the database.
// Set the database access information as constants:
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'crud');

// Make the connection:
$mysqli = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (!$mysqli) {
	trigger_error ('could not connect to MySQL: ' . mysqli_connect_error());
	}
?>
</body>
</html>