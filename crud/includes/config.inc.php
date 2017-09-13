<?php

/* 
 * Configuration file does the following things:
 * has site settings in one location.
 * Stores URLs annd URIs as constants.
 * Sets how errors will be handled.
 * Establishes a connection to the database
 */
 
 # ********************* #
 # ***** SETTINGS ****** #
 
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
	define('BASE_URI', '/scholarship/load/includes/');
	define('BASE_URL', 'http://localhost/scholarship/load/first.php/');
	} else {
		
		define ('BASE_URI', '');
		define ('BASE_URL', 'http://scholarships.lextorahjobs.com/');
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
 set_error_handler ('my_error_handler');
 
 # ***** ERROR MANAGEMENT ***** #
 # **************************** #
 
 # **************************** #
 # ***** DATABASE STUFF ******* #
 
 // Connect to the database:
$db_username = 'root';
$db_password = '';
$db_name = 'crud';
$db_host = 'localhost';
$item_per_page = 5;

# ** $mysqli = new mysqli($db_host, $db_username, $db_password, $db_name);
//Output any connection error **#

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
