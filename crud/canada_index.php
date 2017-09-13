<?php

require_once("includes/config.inc.php");

$q = "SELECT * FROM persons WHERE nscho_country = 'Canada'";
$r = @mysqli_query ($mysqli, $q);
$num = mysqli_num_rows($r);

echo "
<div class='section section-breadcrumbs' style='margin-top: 100px; background-color:#2e3456;'>
			<div class='container'>
				<div class='row'>
					<div class='col-md-12'>
						<h1 class='scholar'>List of Scholarships in USA</h1>
					</div>
				</div>
			</div>
		</div>
<div class='container'>

<div class='row'><div class='col-md-2'></div><div class='col-md-10 scholar4'> <p>There are <b class='number2'>$num</b> scholarships.</p></div></div></div>\n";

echo "<div class='container schag'><div class='row'><div class='col-md-1'></div><div class='col-md-10'><div class='row ads_top3'><div class='col-md-6'><p>Name of Scholarship</p></div><div class='col-md-3'><p>Deadline</p></div><div class='col-md-3'><p>Amount</p></div></div></div><div class='col-md-1'></div></div></div>";

$get_total_rows = 0;
$results = $mysqli->query("SELECT * FROM persons WHERE nscho_country = 'Canada'");
if($results){
$get_total_rows = $results->fetch_row(); 
}

//break total records into pages
$total_pages = ceil($get_total_rows[0]/$item_per_page);	

?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>List of Scholarship in Canada</title>
<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {

	var track_click = 0; //track user click on "load more" button, righ now it is 0 click
	
	var total_pages = <?php echo $total_pages; ?>;
	$('#results').load("canada_fetch_pages.php", {'page':track_click}, function() {track_click++;}); //initial data to load

	$(".load_more").click(function (e) { //user clicks on button
	
		$(this).hide(); //hide load more button on click
		$('.animation_image').show(); //show loading image

		if(track_click <= total_pages) //make sure user clicks are still less than total pages
		{
			//post page number and load returned data into result element
			$.post('canada_fetch_pages.php',{'page': track_click}, function(data) {
			
				$(".load_more").show(); //bring back load more button
				
				$("#results").append(data); //append data received from server
				
				//scroll page to button element
				$("html, body").animate({scrollTop: $("#load_more_button").offset().top}, 500);
				
				//hide loading image
				$('.animation_image').hide(); //hide loading image once data is received
	
				track_click++; //user click increment on load button
			
			}).fail(function(xhr, ajaxOptions, thrownError) { 
				alert(thrownError); //alert any HTTP error
				$(".load_more").show(); //bring back load more button
				$('.animation_image').hide(); //hide loading image once data is received
			});
			
			
			if(track_click >= total_pages-1)
			{
				//reached end of the page yet? disable load button
				$(".load_more").attr("abled", "disabled");
			}
		 }
		  
		});
});
</script>

<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/style14.css" rel="stylesheet" type="text/css">
    <link href="css/button2.css" rel="stylesheet" type="text/css">

</head>
<body>
<div id="results"></div>

<div align="center" class="container">
<div class="row">
<div class="col-md-12">
<button class="load_more btn-dark-blue-contact" id="load_more_button">load More</button>
<div class="animation_image" style="display:none;"><img src="ajax-loader.gif" class="loader1"> Loading...</div>
</div>
</div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <p align="center" class="schoola othe">Find Scholarships in</p>
        </div>

    </div>
    <div class="row">
        <div class="col-sm-1">
        </div>
        <div class="col-sm-2 othe2" align="center">
            <a href="nig_login.php" class="round-button11">Nigeria</a>
        </div>
        <div class="col-sm-2 othe2" align="center">
            <a href="us_login.php" class="round-button22">USA</a>
        </div>
        <div class="col-sm-2 othe2" align="center">
            <a href="uk_login.php" class="round-button33">UK</a>
        </div>
        <div class="col-sm-2 othe2" align="center">
            <a href="australia_login.php" class="round-button33">Australia</a>
        </div>
        <div class="col-sm-2 othe2" align="center">
            <a href="canada_login.php" class="round-button22">Canada</a>
        </div>
    </div>
</div>

</body>
</html>
