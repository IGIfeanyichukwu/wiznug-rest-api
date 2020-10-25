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


	//get single quote
	public function getSingle() {
		//create query
		$query = 'SELECT * FROM '.$this->quotesTable.' WHERE id = ? LIMIT 0,1';

		//prepare statement
		$stmt = $this->conn->prepare($query);

		//bind values
		$stmt->bindValue(1, $this->id);

		//execute query
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		//Set properties
		$this->quote = $row['quote'];
		$this->author = $row['author'];

	}


}