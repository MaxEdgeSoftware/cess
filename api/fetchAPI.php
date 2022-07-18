<?php

class fetchAPI
{
	public $connect = '';

	function __construct()
	{
		$this->database_connection();
	}

	function database_connection()
	{
		$this->connect = new mysqli("localhost", "airsbfrj_logic", "Alonso652.", "airsbfrj_crown");
	}


	// Fetch all contact records
	public function showAllContacts()
	{
		$query = "SELECT * FROM contact ORDER BY id asc";
		$result = $this->connect->query($query);
	if ($result->num_rows > 0) {
		$data = array();
		while ($row = $result->fetch_assoc()) {
               $data[] = $row;     
        }
        }else{
            $data[] = 'No contact found';
        }
        
        echo json_encode($data);
	}


	// Fetch all registered users
	public function showRegisteredUsers()
	{
		$query = "SELECT * FROM registration ORDER BY id asc";
		$result = $this->connect->query($query);
	if ($result->num_rows > 0) {
		$data = array();
		while ($row = $result->fetch_assoc()) {
               $data[] = $row;     
        }
        }else{
            $data[] = 'No result found';
        }
        
        echo json_encode($data);
	}

	// Fetch all trainers
	public function showTrainers()
	{
		$query = "SELECT * FROM team ORDER BY id asc";
		$result = $this->connect->query($query);
	if ($result->num_rows > 0) {
		$data = array();
		while ($row = $result->fetch_assoc()) {
               $data[] = $row;     
        }
        }else{
            $data[] = 'No result found';
        }
        
        echo json_encode($data);
	}

	// fetch trainer by id
	public function fetchTrainer($id)
	{
		$query = "SELECT  * FROM team WHERE id = '$id'";
		$sql = $this->connect->query($query);

	if ($sql->num_rows > 0) {
		$row = $sql->fetch_array();
	}
		echo json_encode($row);
	}

		
}

