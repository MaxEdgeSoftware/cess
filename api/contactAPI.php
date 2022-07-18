<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'api/PHPMailer/src/Exception.php';
require 'api/PHPMailer/src/PHPMailer.php';
require 'api/PHPMailer/src/SMTP.php';

class contactAPI{
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
	public function sendContact()
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
    if(empty($_POST['email'])){
		$emailErr = 'email is required';
	}else{
        $email = clean_input( $_POST['email']);  
	}
    
    // check if input is empty
    if(empty($_POST['subject'])){
		$subjectErr = 'Subject is required';
	}else{
        $subject = clean_input( $_POST['subject']);  
    }
    
    // check if input is empty
    if(empty($_POST['message'])){
		$messageErr = 'message is required';
	}else{
        $message = clean_input( $_POST['message']);  
	}
    
		// submit form if not empty
		if(!empty($name) && !empty($email) && !empty($subject) && !empty($message)){

            // $toEmail = "kensconcept@gmail.com";
			// $mailHeaders = "From: " . $name . "<". $email .">\r\n";
			// Import PHPMailer classes into the global namespace 

$mail = new PHPMailer; 
$mail->isSMTP();                      // Set mailer to use SMTP 
$mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers 
$mail->SMTPAuth = true;               // Enable SMTP authentication 
$mail->Username = 'example@gmail.com';   // SMTP username 
$mail->Password = '';   // SMTP password 
$mail->SMTPSecure = 'ssl';            // Enable TLS encryption, `ssl` also accepted 
$mail->Port = 465;                    // TCP port to connect to 
 
// Sender info 
$mail->setFrom($mail, 'Crownprince'); 
$mail->addReplyTo($mail, 'Crownprince'); 
 
// Add a recipient 
$mail->addAddress($email); 
 
//$mail->addCC('cc@example.com'); 
//$mail->addBCC('bcc@example.com'); 
 
// Set email format to HTML 
$mail->isHTML(true); 
 
// Mail subject 
$mail->Subject = $subject; 
 
// Mail body content 
$bodyContent = '<h6>Thank you for contacting us</h6>'; 
$bodyContent .= "<p>{$message}</p>"; 
$mail->Body    = $bodyContent; 
 
// Send email 
if(!$mail->send()) { 
	$data[] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
} else { 
	$success =1;
	if($success) {
			$query="INSERT INTO contact(name, email, subject, message)VALUES('$name', '$email', '$subject', '$message')";
			$sql = $this->connect->query($query);
			if ($sql==true) {
			$data[] = 'Message received. We will get in touch soonest.'; 
		}}
} 
			}else{
				$data[] = 'Please, fill all the fields!!!';
			
			 }

			 echo json_encode($data);
	}

	// Delete contact
	public function deleteContact($id)
	{
		$data = array();
		$query = "DELETE FROM contact WHERE id = '$id'";
		$sql = $this->connect->query($query);

	if ($sql==true) {
		$data[] = 'contact deleted successfully';
	}else{
		$data[] = 'Unable to delete, try again!!!';
		}
		echo json_encode($data);
	}
      	 
}
    
?>