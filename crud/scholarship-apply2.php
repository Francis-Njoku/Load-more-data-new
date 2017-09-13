<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php # Page title




 $row = FALSE; // Assume nothing!

 if (isset($_GET['cid']) &&
is_numeric($_GET['cid']) ) { // Make sure there's a print ID!

 $lid = (int) $_GET['cid'];
// Get the print info:
 require_once("includes/config.inc.php");


 $q = "SELECT * FROM persons WHERE nscho_id = $lid";
 //$q = "SELECT CONCAT_WS(' ', first_name,
//middle_name, last_name) AS artist,
//print_name, price, description, size,
//image_name FROM artists, prints WHERE
//artists.artist_id = prints.artist_id AND
//prints.print_id = $lid";

 $r = mysqli_query ($mysqli, $q);
if (mysqli_num_rows($r) == 1) { // Good to go!

 // Fetch the information:
 $row = mysqli_fetch_array ($r, MYSQLI_ASSOC);
 // Start the HTML page:
echo "{$row['nscho_name']} ";
}
}
?></title>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/style14.css" rel="stylesheet" type="text/css">
</head>

<body>

<?php # body
 // This part displays the body of a particular scholarship.


 $row = FALSE; // Assume nothing!

 if (isset($_GET['cid']) &&
is_numeric($_GET['cid']) ) { // Make sure there's a scholarship ID!

 $lid = (int) $_GET['cid'];
// Get the scholarship info:
 require_once("includes/config.inc.php");


 $q = "SELECT * FROM persons WHERE nscho_id = $lid";
 //$q = "SELECT CONCAT_WS(' ', first_name,
//middle_name, last_name) AS artist,
//print_name, price, description, size,
//image_name FROM artists, prints WHERE
//artists.artist_id = prints.artist_id AND
//prints.print_id = $lid";

 $r = mysqli_query ($mysqli, $q);
if (mysqli_num_rows($r) == 1) { // Good to go!

 // Fetch the information:
 $row = mysqli_fetch_array ($r, MYSQLI_ASSOC);
 // Start the HTML page:
echo " <div class='scholar_top container'></div>

<div class='container'><div class='row'><div class='col-md-1'></div><div class='col-md-8'><br /><p class='schola_head2'>You are here</p><p class='schola_head'>Home >> Scholarship >>
<b class='schola_head3'>{$row['nscho_name']}</b></p></div></div> ";
// Display a header:
echo "<div class=\"row\"><div class='col-md-1'></div>
<div class=\"col-md-8\">
 <b class='schola_mid'>{$row['nscho_name']}</b><br /><p class='schola_mid_2'> by
{$row['nscho_provider']}</p><br /></div></div>";

 // Print the size or a default message:

 echo "<div class=\"row\"><div class=\"col-md-1\"></div><div class=\"col-md-8\"><p class='schola_red'>Scholarship Details</p></div></div>";

 echo "<div class=\"row\">
 <div class=\"col-md-1\"></div>
 <div class=\"col-md-2 \"><p class='schola_deadline'>Application Deadline</p>
 <p class='schola_deadline_2'>";
echo (is_null($row['nscho_deadline'])) ? '(No deadline)' :
$row['nscho_deadline'];

echo "</p><br/>
<p class='schola_deadline'>Scholarship Worth</p>
<p class='schola_deadline_2'>{$row['nscho_currency']}
";

// Print the category description, if it's not empty.
 if (!empty($row['nscho_amount'])) {
 echo $row['nscho_amount'];
 }else { // No widgets here!
echo '<b>Unknown</b>';
 }

echo "</p><br />
<p>{$row['nscho_essay']}</p><br />
<p>
<a href=\"{$row['nscho_website']}\" class='load_more btn-dark-blue-contact'>Apply</a></p>
 </div><div class=\"col-md-8 schola_border\"><p class='schola_deadline'>Scholarship Eligibility</p>
 <div class='schola_deadline_3'><p>{$row['nscho_elig']}</p></div><br/>
 <p class='schola_deadline'>Overview</p>
 <div class='schola_deadline_3'><p>{$row['nscho_overview']}</p><br /></div>
 <p class='schola_deadline'>Purpose</p>
 <div class='schola_deadline_3'><p>{$row['nscho_purpose']}</p></div>
 </div>
 <div class=\"col-md-1\"></div>
 </div><br />";

 //echo "<br />\${$row['nscho_overview']}
//<a
//href=\"add_cart.php?pid=$pid\">Add to Cart</a>
 //</div><br />";

 // Get the image information and display the image:
//if ($image = @getimagesize ("../uploads/$pid")) {
//echo "<div align=\"center\"><img
//src=\"show_image.php?image=$pid&na
//me=" .
//urlencode($row['image_name']) .
//"\" $image[3]
//alt=\"{$row['print_name']}\" /></div>\n";
 //} else {
 //echo "<div align=\"center\">No image available.</div>\n";
 //}

 // Add the description message:

echo '</div>';
} // End of the mysqli_num_rows() IF.

 mysqli_close($mysqli);
}

if (!$row) { // Show an error message.
$page_title = 'Error';
//include ('includes/header.html');
//echo '<div align="center">This page has been accessed in error!</div>';
}
 // Complete the page:
//include ('includes/footer.html');
 ?>
 <script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>