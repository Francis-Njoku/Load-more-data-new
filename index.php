
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Scholarship</title>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/style14.css" rel="stylesheet" type="text/css">
<link href="css/button2.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="container schola_first" >
			<div class="row">
			<div class="col-md-1"></div>
				<div class="col-md-6"><br />
					<p class="schoola">Scholarships</p>
					<p class="schoola_2">Register with just one click</p>
					<a href="login.php" class="btn btn-skin btn-lg btn-scroll" style="background-color:#70b234; color:#fff;">Find Scholarships</a><br /><br />
                    <p class="schoola_3" >Over &#8358;500 Million in awards waiting for you to apply
					</p>
                    <p class="schoola_3">All students ranging from Secondary school, Undergraduates &amp; Postgraduates are eligible</p>
				</div>
                <div class="col-md-5">
				
					<img src="img/scho.jpg" width="500px"  class="img-responsive img-rounded" alt="Scholarship list" style="margin-top: 10px; margin-bottom: 10px;" />
				</div>
			</div>		
		</div>
        
        
<div class="container schoola_5">
<div class="row">
<div class="col-md-12">
<p class="schoola_4">Top scholarship this week</p>
</div>
</div>
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">
<div class="row">
<?php 
include_once("includes/config.inc.php");
// Get all the categories and
// link them to category.php.

// Define and execute the query:
$q = "SELECT nscho_id, nscho_name, nscho_deadline, nscho_amount, nscho_currency FROM persons WHERE nscho_display = 'no' ORDER BY nscho_name";
$r = mysqli_query($mysqli, $q);

// Fetch the results:
while(list($fcid, $fcat, $fdead, $famount, $fcurrency) = mysqli_fetch_array($r, MYSQLI_NUM)) {
	
	// Print as a list item.
	echo "
<div class=\"col-sm-5 schoola_drop\"><a href=\"scholarship-apply2.php?cid=$fcid\">$fcat</a><br />
	<span>$fdead <span>&emsp;&emsp;<b>$fcurrency"; 
	
	if (!empty($famount)) {
 echo $famount;
 }else { // No widgets here!
echo '<b>Unknown</b>';
 }
	echo"</b></div>
<div class=\"col-sm-1\"></div>\n";
	} // End of while loop.
	
	?></div>
</div>
    <div class="col-md-2"></div>
</div>
    <div class="row">
    <div class="col-md-12">
    <p align="center" class="schoola othe">Find Scholarships in</p>
    <div class="col-md-1"></div>
    <div class="col-md-10">
    <div class="row">
    <div class="col-sm-4 othe2" align="center">
    <a href="nig_login.php" class="round-button">Nigeria</a>
    </div>
    <div class="col-sm-4 othe2" align="center">
    <a href="us_login.php" class="round-button2">USA</a>
    </div>
    <div class="col-sm-4 othe2" align="center">
    <a href="uk_login.php" class="round-button3">UK</a>
    </div>
    </div>
    </div>
    <div class="col-md-1">
    </div>
    </div>
        <div class="col-md-12">
            <p class="schoola_other"><a href="login.php" class="btn btn-skin btn-lg btn-scroll" style="background-color:#2e3456; color:#fff;">Find other scholarships</a></p>

        </div>
    </div>
</div>


    
<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>