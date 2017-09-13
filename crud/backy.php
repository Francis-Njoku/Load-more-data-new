<?php
/**
 * Created by PhpStorm.
 * User: chimauche
 * Date: 6/28/2016
 * Time: 1:05 PM
 */

 # Script 16.8 - login.php
// This is the login page for the site.
session_start();

 $page_title = 'Login';

if (isset($_POST['submitted'])) {
   require_once ('includes/config.inc.php');

 // Validate the email address:
 if (!empty($_POST['minad_email'])) {
         $e = mysqli_real_escape_string ($mysqli,
            $_POST['minad_email']);
 } else {
         $e = FALSE;
 echo '<p class="error">You forgot to enter your email address!</p>';
 }

 // Validate the password:
 if (!empty($_POST['minad_pass'])) {
         $p = mysqli_real_escape_string ($mysqli, $_POST['minad_pass']);
 } else {
         $p = FALSE;
 echo '<p class="error">You forgot to enter your password!</p>';
 }
    if ($e && $p) { // If everything's OK.

 // Query the database:
        $q = "SELECT minad_id FROM minad WHERE (minad_email='$e' AND minad_pass=SHA1('$p'))";
        $r = mysqli_query ($mysqli, $q) or  trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($mysqli));
         if (@mysqli_num_rows($r) == 1) { // A match was made.

 // Register the values & redirect:
$_SESSION = mysqli_fetch_array ($r, MYSQLI_ASSOC);
             mysqli_free_result($r);
 mysqli_close($mysqli);

 $url =  'backend.php'; // Define the URL:
 ob_end_clean(); // Delete the buffer.
 header("Location: $url");
 exit(); // Quit the script.

 } else { // No match was made.
             echo '<p class="error">Either the email address and password entered do not match those on file or you have not yet activated your account.</p>';
 }

 } else { // If everything wasn't OK.
         echo '<p class="error">Please try again.</p>';
         }

 mysqli_close($mysqli);

 } // End of SUBMIT conditional.
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="css/scholarship.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="section">
    <div class="scho-login">

    <h1>scholarship backend</h1>

    <form action="" method="post">

          <input type="text" name="minad_email"  maxlength="40" placeholder="Email Address" />
         <input type="password" name="minad_pass" class="input" placeholder="password" maxlength="20" />
         <input type="submit" name="submit" value="Login" />
         <input type="hidden" name="submitted" value="TRUE" />

     </form>
     </div>
</div>
</body>
</html>
