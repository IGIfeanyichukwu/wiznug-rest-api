<?php

class Quote {

	//db properties
	private $conn;
	private $quotesTable = 'quotes';

	// Quote properties
	public $id;
	public $quote;
	public $author;

	public function __construct($db) {
		$this->conn = $db;
	}


	public function getAll() {

		$query = 'SELECT * FROM '. $this->quotesTable;

		//prepare statement
		$stmt = $this->conn->prepare($query);

		//execute
		$stmt->execute();

		//return the statement
		return $stmt;
	}


}