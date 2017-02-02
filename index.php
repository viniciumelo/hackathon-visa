<?php error_reporting(E_ALL);  // Turn on all errors, warnings and notices for easier debugging

// API request variables
$endpoint = 'http://svcs.ebay.com/services/search/FindingService/v1';  // URL to call
$version = '1.0.0';  // API version supported by your application
$appid = 'DayanneF-PackBuy-PRD-acd44e4f7-e764cfc3';  // Replace with your own AppID
$globalid = 'EBAY-US';  // Global ID of the eBay site you want to search (e.g., EBAY-DE)
$query = 'mouse';  // You may want to supply your own query
$safequery = urlencode($query);  // Make the query URL-friendly

$i = '0';  // Initialize the item filter index to 0

// Create a PHP array of the item filters you want to use in your request
$filterarray =
  array(
    array(
    'name' => 'MaxPrice',
    'value' => '25',
    'paramName' => 'Currency',
    'paramValue' => 'USD'),
    array(
    'name' => 'FreeShippingOnly',
    'value' => 'true',
    'paramName' => '',
    'paramValue' => ''),
    array(
    'name' => 'ListingType',
    'value' => array('AuctionWithBIN','FixedPrice'),
    'paramName' => '',
    'paramValue' => ''),
  );

  // Generates an indexed URL snippet from the array of item filters
  function buildURLArray ($filterarray) {
    global $urlfilter;
    global $i;
    // Iterate through each filter in the array
    foreach($filterarray as $itemfilter) {
      // Iterate through each key in the filter
      foreach ($itemfilter as $key =>$value) {
        if(is_array($value)) {
          foreach($value as $j => $content) { // Index the key for each value
            $urlfilter .= "&itemFilter($i).$key($j)=$content";
          }
        }
        else {
          if($value != "") {
            $urlfilter .= "&itemFilter($i).$key=$value";
          }
        }
      }
      $i++;
    }
    return "$urlfilter";
  } // End of buildURLArray function

  // Build the indexed item filter URL snippet
  buildURLArray($filterarray);

// Construct the findItemsByKeywords HTTP GET call
$apicall = "$endpoint?";
$apicall .= "OPERATION-NAME=findItemsByKeywords";
$apicall .= "&SERVICE-VERSION=$version";
$apicall .= "&SECURITY-APPNAME=$appid";
$apicall .= "&GLOBAL-ID=$globalid";
$apicall .= "&keywords=$safequery";
$apicall .= "&paginationInput.entriesPerPage=3";
$apicall .= "$urlfilter";

// Load the call and capture the document returned by eBay API
$resp = simplexml_load_file($apicall);

// Check to see if the request was successful, else print an error
if ($resp->ack == "Success") {
  $results = '';
  // If the response was loaded, parse it and build links
  foreach($resp->searchResult->item as $item) {
    $id = $item->productId;
    // $pic   = $item->galleryPlusPictureURL;
    $pic   = $item->galleryURL;
    $link  = $item->viewItemURL;
    $title = $item->title;
    $price = (float) $item->sellingStatus->currentPrice;

    // For each SearchResultItem node, build a link and append it to $results
    $results .= "<div class=\"thumbnail\" > <a href=\"produtos.php?id=$id\" title=\"$title\"> <img src=\"$pic\" alt=\"$title\"> <div class=\"caption\"> <h3 align=\"center\"> $title </h3> </div> </a> <p align=\"center\"> $price </p> </div>";
  }
}
// If the response does not indicate 'Success,' print an error
else {
  $results  = "<h3>Oops! The request was not successful. Make sure you are using a valid ";
  $results .= "AppID for the Production environment.</h3>";
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>

  	  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-9303490577411539",
    enable_page_level_ads: true
  });
</script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <title>Packbuy</title>

    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<link href="css/customCss.css" rel="stylesheet">


  </head>
  <body>

    <div class="container-fluid">

    	     <div class="row">

    		       <div class="col-md-12">
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<img class="logo-topo" id="logo" alt="Packbuy"src="img/logo.png" class="img-default img-responsive ">
					
					
				</div>
				
			</nav>
    		           

                  
				  
              </div>
			  <br>
			  <br>
			 <div class="col-xs-12">
			<div class="row">
				<br><div class=" col-xs-3"><center>
				<a href="#">
					<img alt="Americanas" src="img/americanas.jpg" class="img-circle img-responsive" >
					
                    </a><br><b>80%</b>
                    </center>
				</div>
				<div class="col-xs-3">
                <center>
				<a href="#">
					<img alt="Submarino" src="img/submarino.png" class="img-circle img-responsive">
                    </a><br><b>55%</b>
                    </center>
				</div>
				<div class="col-xs-3">
                <center>
				<a href="#">
					<img alt="netshoes" src="img/netshoes.png" class="img-circle img-responsive">
                    </a><br><b>15%</b>
                    </center>
				</div>
                 <div class="col-xs-3">
                <center>
				<a href="#">
					<img alt="centeuro" src="img/centauro.jpg" class="img-circle img-responsive">
                    </a><br><b>30%</b>
                    </center>
				</div>
			</div>

         </div>
		<form class="form-search">
			<input type="text" class="input-max search-query">
			<button type="submit" class="btn">Busca</button>
		</form>
    <?php
    require_once 'system/config.php';
    require_once 'system/database.php';
    ?>

    <div class="" id="packbuy>

                <?php $categ = $query; ?>

    		<div class="col-md-4" >
			<a href="">
    				<?php echo $results ?>
					</a>
        </div>


    </div>
  </div>



    <?php include'includes/rodape.php';?>
