<?php 

 // Headers
 header('Access-Control-Allow-Origin: *');
 header('Content-Type: application/json');

 include_once '../../classes/Dbase.php';
 include_once '../../classes/Quote.php';

 // instantiate db & connect
 $database = new Dbase();
 $db = $database->connect();


 // instantiate blog post object

 $quote = new Quote($db);

 // Get ID
 $quote->id = isset($_GET['id']) ? $_GET['id'] : die();

 //Get post
 $quote->getSingle();

 // create array
 $quoteArray = array(
 	'id' => $quote->id,
 	'quote' => $quote->quote,
 	'author' => $quote->author,
 );


//make JSON
 print_r(json_encode($quoteArray));
