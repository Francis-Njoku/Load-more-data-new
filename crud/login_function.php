<?php
/**
 * Created by PhpStorm.
 * User: chimauche
 * Date: 6/27/2016
 * Time: 7:48 AM
 */

function absolute_url ($page = 'login.php') {
// Start defining the URL...
 // URL is http:// plus the host name plus the current directory:
    $url = 'http://' . $_SERVER['HTTP_HOST']
        . dirname($_SERVER['PHP_SELF']);
 // Remove any trailing slashes:



 // Return the URL:
 return $url;

 } // End of absolute_url() function.

?>