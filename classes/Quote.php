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

		if($row != null) {
			//Set properties
			$this->quote = $row['quote'];
			$this->author = $row['author'];
		} else {
			echo json_encode (
		 		array('message' => 'No quote with the given id')
		 	);
			exit;
		}


	}


	// Create Quote
	public function create() {
		$query = 'INSERT INTO '. $this->quotesTable .' SET
			quote = :quote,
			author = :author
			';

		//prepare statement
		$stmt = $this->conn->prepare($query);

		// Clean data
		$this->quote = htmlspecialchars(strip_tags($this->quote));
		$this->author = htmlspecialchars(strip_tags($this->author));

		// Bind data
		$stmt->bindParam(':quote', $this->quote);
		$stmt->bindParam(':author', $this->author);

		// Execute query
		if($stmt->execute()) {
			return true;
		}

		// Print error if something goes wrong
		printf("Error: %s. \n", $stmt->error);

		return false;

	}


		// Update Quote
	public function update() {
		// create query 
		$query = 'UPDATE '. $this->quotesTable .' SET
			quote = :quote,
			author = :author,
		WHERE
			id = :id
			';

		//prepare statement
		$stmt = $this->conn->prepare($query);

		// Clean data
		$this->quote = htmlspecialchars(strip_tags($this->quote));
		$this->author = htmlspecialchars(strip_tags($this->author));
		$this->id = htmlspecialchars(strip_tags($this->id));

		// Bind data
		$stmt->bindParam(':quote', $this->quote);
		$stmt->bindParam(':author', $this->author);
		$stmt->bindParam(':id', $this->id);


		// Execute query
		if($stmt->execute()) {
			return true;
		}

		// Print error if something goes wrong
		printf("Error: %s. \n", $stmt->error);

		return false;

	}

		// delete quote
	public function delete() {
		// Create query
		$query = 'DELETE FROM '. $this->quotesTable .' WHERE id = :id';

		// Prepare statement
		$stmt = $this->conn->prepare($query);

		// clean data
		$this->id = htmlspecialchars(strip_tags($this->id));

		 // Bind data
		$stmt->bindParam(':id', $this->id);

		// Execute query
		if($stmt->execute()) {
			return true;
		}

		// Print error if something goes wrong
		printf("Error: %s. \n", $stmt->error);

		return false;
	}


}