<?php 

 // Headers
 header('Access-Control-Allow-Origin: *');
 header('Content-Type: application/json');
 header('Access-Control-Allow-Methods: DELTE');
 header('Acces-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

 include_once '../../classes/Dbase.php';
 include_once '../../classes/Quote.php';

 // instantiate db & connect
 $database = new Dbase();
 $db = $database->connect();


 // instantiate the Quote class

 $quote = new Quote($db);


 // Get raw posted data
 $data = json_decode(file_get_contents("php://input"));

//check if the data is a valid object
 if(!is_object($data)) {
	echo json_encode (
 		array('message' => 'Input is not a valid object')
 	);
 	exit;
}


 // Set ID to update
 $quote->id = $data->id;

 // Create post
 if($quote->delete()) {
 	echo json_encode(
 		array('message' => 'Quote Deleted')
 	);

 } else {
 	echo json_encode (
 		array('message' => 'Quote Not Deleted')
 	);
 }