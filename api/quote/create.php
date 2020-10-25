<?php 

 // Headers
 header('Access-Control-Allow-Origin: *');
 header('Content-Type: application/json');
 header('Access-Control-Allow-Methods: POST');
 header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

 include_once '../../classes/Dbase.php';
 include_once '../../classes/Quote.php';

 // instantiate db & connect
 $database = new Dbase();
 $db = $database->connect();


 // instantiate the Quote class
 $quote = new Quote($db);



 // Get raw posted data
 $data = json_decode(file_get_contents("php://input"));

 
 $quote->quote = $data->quote;
 $quote->author = $data->author;

 if($quote->quote == null || $quote->author == null) {
 	echo json_encode (
 		array('message' => 'Values cannot be empty')
 	);
 } else {


	 // Create quote
	 if($quote->create()) {
	 	echo json_encode(
	 		array('message' => 'Quote Created')
	 	);

	 } else {
	 	echo json_encode (
	 		array('message' => 'Quote Not Created')
	 	);
	 }

 }