<?php

class registrationAPI{
    public $connect = '';

	function __construct()
	{
		$this->database_connection();
	}

	function database_connection()
	{
			$this->connect = new mysqli("localhost", "airsbfrj_logic", "Alonso652.", "airsbfrj_crown");
	}

    // submit contact form
	public function registration()
	{
		$data = array();
		// clean user input
		function clean_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	  }

	  // check if input is empty
	  if(empty($_POST['name'])){
		$nameErr = 'Name is required';
	}else{
        $name = clean_input( $_POST['name']);  
    }
  
     // check if input is empty
	  if(empty($_POST['phone'])){
		$phoneErr = 'Phone is required';
	}else{
        $phone = clean_input( $_POST['phone']);  
    }
  
    // check if input is empty
    if(empty($_POST['email'])){
		$emailErr = 'email is required';
	}else{
        $email = clean_input( $_POST['email']);  
	}
    
    // check if input is empty
    if(empty($_POST['address'])){
		$addressErr = 'address is required';
	}else{
        $address = clean_input( $_POST['address']);  
    }
    
    // check if input is empty
    if(empty($_POST['training_type'])){
		$training_typeErr = 'training_type is required';
	}else{
        $training_type = clean_input( $_POST['training_type']);  
	}
    
		// submit form if not empty
		if(!empty($name) && !empty($phone) && !empty($email) && !empty($address) && !empty( $training_type)){

	       
					$query="INSERT INTO registration(name, phone, email, address, training_type)VALUES('$name', $phone, '$email', '$address', '$training_type')";
					$sql = $this->connect->query($query);
					if ($sql==true) {
						
					$data[] = 'Your registration is successful, we will get back to you soon.';	
				}
                else{ $data[] = 'something went wrong!!!';
                }
			}else{
				//  echo "<script> alert('Please, fill all the field!!!') </script>";
				$data[] = 'Please, fill all the fields!!!';
			
			 }
			 echo json_encode($data);
	}   
	
	// Delete registration
	public function deleteRegistration($id)
	{
		$data = array();
		$query = "DELETE FROM registration WHERE id = '$id'";
		$sql = $this->connect->query($query);

	if ($sql==true) {
		$data[] = 'delete successful';
	}else{
		$data[] = 'Unable to delete, try again!!!';
		}
		echo json_encode($data);
	}


}
    
?>