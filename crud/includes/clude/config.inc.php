<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Scholarship</title>
</head>

<body>
<?php # Script - config.inc.php
// Errors are emailed here.
 $contact_email = 'njokuchimauche@gmail.com';
 
 // Determine wheter we're working on a local server 
 // or on the real server:
 if (stristr($_SERVER['HTTP_HOST'], 'local') || (substr($_SERVER['HTTP_HOST'], 0, 7) == '192.168')) {
	 $local = TRUE;
	 } else {
		 $local = FALSE;
		 }
		 
// Determine location of files and the URL of the site:
// Allow for development on different servers.
if($local) {
	
	// Always debug when running locally:
	$debug = TRUE;
	
	// Define the constants:
	define('BASE_URI', '/scholarship/crud/includes/');
	define('BASE_URL', 'http://localhost/scholarship/crud/backy.php/');
	} else {
		
		define ('BASE_URI', '/path/to/live/html/folder/');
		define ('BASE_URL', 'http://www.homeworks.ng/');
		}
	
	/*
	 * Most important setting...
	 * The $debug variable is used to set error management.
	 * To debug a specific page, do this:
	 
	 $debug = TRUE;
	 require_once('./includes/config.inc.php');
	 
	 * on that page.
	 *
	 * To debug theentire site, do 
	 
	 $debug = TRUE;
	 
	 * before this next conditional
	 */
	 
	// Assume debugging is off
	if (!isset($debug)) {
		$debug = FALSE;
		}
	
	# **** SETTINGS **** #
	# ****************** #
	
	# ****************************** #
	# ****** ERROR MANAGEMENT ****** #
	
	// Create the error handler.
	function my_error_handler ($e_number, $e_message, $e_file, $e_line, $e_vars) {
		
		global $debug, $contact_email;
		
		// Build the error message.
		$message = "An error occurred in script '$e_file' on line $e_line: \n<br />$e_message\n<br />";
		
		// Add the date and time.
		$message .= "Date/Time: " . date('n-j-Y H:i:s') . "\n<br />";
		
		// Append $e_vars to the $message.
		$message .= "<pre>" . print_r($e_vars, 1) . "</pre>\n<br />";
		
		if ($debug) {// Show the error.
		
		echo '<p class="error">' . $message . '</p>';
		} else {
			
			// Log the error:
			error_log ($message, 1, $contact_email); // Send email.
			
			// Only print an error message if the error isn't a notice or strict.
			if (($e_number != E_NOTICE) && ($e_number < 2048)) {
				echo '<p class="error">A system error occurred. We apologize for the inconvenience.</p>';
				}
			} // End of $debug IF.
		} // End of my_error_handler() definition.
		
 // Use my error handler:
 set_error_handler ('my_error_handler'); //
 
 $db_username = 'root';
$db_password = '';
$db_name = 'crud';
$db_host = 'localhost';
$item_per_page = 5;

$mysqli = mysqli_connect ($db_host, $db_username, $db_password, $db_name) OR
trigger_error("Could not connect to the database!\n<br />MySQL Error: " .
mysqli_connect_error());

 
 // Create a function for escaping the data.
 function escape_data ($data) {
	 
	 // Need the connection:
	 global $mysqli;
	 
	 // Address Magic Quotes.
	 if (ini_get('magic_quotes_gpc')) {
		 $data = stripslashes($data);
		 }
		 
		 // Trim and escape:
		 return mysqli_real_escape_string($mysqli, trim($data));
	 } // End of escape_data() function.
	 
	 # ***** DATABASE STUFF ***** #
	 # ************************** #
?>

</body>
</html>