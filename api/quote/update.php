<?php 

 // Headers
 header('Access-Control-Allow-Origin: *');
 header('Content-Type: application/json');
 header('Access-Control-Allow-Methods: PUT');
 header('Acces-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../classes/Dbase.php';
 include_once '../../classes/Quote.php';

 // instantiate db & connect
 $database = new Dbase();
 $db = $database->connect();


 // instantiate blog post object

 $quote = new Quote($db);

 // Get raw posted data
 $data = json_decode(file_get_contents("php://input"));

if(!is_object($data)) {
	echo json_encode (
 		array('message' => 'Input is not a valid object')
 	);
 	exit;
}
 // set the id of the quote to be updated
 $quote->id = $data->id;

 $quote->quote = $data->quote;
 $quote->author = $data->author;

 // update quote
 if($quote->quote == null || $quote->author == null) {
 	echo json_encode (
 		array('message' => 'Values cannot be empty')
 	);
 } else {


	 // Create quote
	 if($quote->update()) {
	 	echo json_encode(
	 		array('message' => 'Quote updated')
	 	);

	 } else {
	 	echo json_encode (
	 		array('message' => 'Quote Not updated')
	 	);
	 }

 }