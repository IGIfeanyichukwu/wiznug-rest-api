<?php 

 // Headers
 header('Access-Control-Allow-Origin: *');
 header('Content-Type: application/json');

 include_once '../../classes/Dbase.php';
 require_once '../../classes/Quote.php';

 // instantiate db & connect
 $database = new Dbase();
 $db = $database->connect();


 // instantiate blog post object

 $quote = new Quote($db);

 //get result statement 
 $result = $quote->getAll();
 //get row count
 $num = $result->rowCount();

 // var_dump($num);


 // check if any posts
 if($num > 0) {
 	//post array
 	$quotesArray = array();
 	$quotesArray['data'] = array();

 	while($row = $result->fetch(PDO::FETCH_ASSOC)) {
 		extract($row);

 		$quoteItem = array(
 			'id' => $id,
 			'body' => html_entity_decode($body),
 			'author' => $author
 		);

 		//Push to 'data' of the quotesArray
 		array_push($quotesArray['data'], $quoteItem);
 	}


 	// covert data to json format
 	echo json_encode($quotesArray);

 } else {

 	//no posts
 	echo json_encode(
 		array('message' => 'No Quote Found')
 	);

 }