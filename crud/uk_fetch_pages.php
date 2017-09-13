<?php
require_once("includes/config.inc.php"); //include config file
//sanitize post value
$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);

//throw HTTP error if page number is not valid
if(!is_numeric($page_number)){
	header('HTTP/1.1 500 Invalid page number!');
	exit();
}

$item_per_page = 20;
//get current starting point of records
$position = ($page_number * $item_per_page);



//Limit our results within a specified range. 
$results = $mysqli->prepare("SELECT nscho_id, nscho_name, nscho_deadline, nscho_country, nscho_currency, nscho_amount, nscho_essay, nscho_elig FROM persons WHERE nscho_country = 'UK' ORDER BY nscho_name  DESC LIMIT $position, $item_per_page");
$results->execute(); //Execute prepared Query
$results->bind_result($nscho_id, $id, $name, $country, $curr, $message, $esay, $eli); //bind variables to prepared statement


//output results from database



echo '<div class="container page_result">';
while($results->fetch()){ //fetch values

    
	//echo '<div class="row" id="item_'.$id.'"><div class="col-md-1"></div><div class="col-md-6 page_name"><a href=\"scholarship-apply.php?cid= '.$nscho_id .'\">'. $id.' </a></div><div class="col-md-2"> '.$message.'</div><div class="col-md-2 page_message">'.$name.'</div><div class="col-md-1"></div></div>';	
	
	echo "<div class='row'><div class='col-md-1'></div><div class='col-md-10'><div class='scholar2 row'><div class='col-md-6 page_name'><a href=\"scholarship-apply2.php?cid=$nscho_id\">$id</a><br>
	<b>$eli</b>&emsp;<b>$esay</b></div><div class='col-md-3'>$name</div><div class='col-md-3'><b>$curr</b>&nbsp;$message</div></div></div><div class='col-md-1'></div></div>\n";
}
echo '</div>';


?>

