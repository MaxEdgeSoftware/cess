<?php

class teamAPI{
    public $connect = '';

	function __construct()
	{
		$this->database_connection();
	}

	function database_connection()
	{
			$this->connect = new mysqli("localhost", "airsbfrj_logic", "Alonso652.", "airsbfrj_crown");
	}

    // add trainer
	public function addTeam()
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
	  if(empty($_POST['title'])){
		$titleErr = 'title is required';
	}else{
        $title = clean_input( $_POST['title']);  
    }
  
    // check if input is empty
    if(empty($_POST['about'])){
		$aboutErr = 'about is required';
	}else{
        $about = clean_input( $_POST['about']);  
	}
	
	 // check if input is empty
	 if(empty($_POST['twitter'])){
		$twitterErr = 'twitter is required';
	}else{
        $twitter = clean_input( $_POST['twitter']);  
	}

    // check if input is empty
    if(empty($_POST['facebook'])){
		$facebookErr = 'facebook is required';
	}else{
        $facebook = clean_input( $_POST['facebook']);  
    }
    
	 // check if input is empty
	 if(empty($_POST['instagram'])){
		$instagramErr = 'instagram is required';
	}else{
        $instagram = clean_input( $_POST['instagram']);  
	}

 // check if input is empty
 if(empty($_POST['linkedin'])){
	$linkedinErr = 'linkedin is required';
}else{
	$linkedin = clean_input( $_POST['linkedin']);  
}

// check if input is empty
if(empty( $_FILES['image']['name'])){
	$imageErr = 'image is required';
}else{
$image = clean_input($_FILES['image']['name']);
$image_tmp= $_FILES['image']['tmp_name'];
}
    
		// submit form if not empty
		if(!empty($name) && !empty($title) && !empty($about) && !empty($twitter) && !empty( $facebook) && !empty( $instagram) && !empty( $linkedin) && !empty( $image)){
			if(file_exists("assets/img/trainers/$image")){
				$data[] = 'Image already exists!!!';
			}else{


				move_uploaded_file($image_tmp, "assets/img/trainers/$image");

				$query="INSERT INTO team (name, title, about, twitter, facebook, instagram, linkedin, image)VALUES('$name', '$title', '$about', '$twitter', '$facebook', '$instagram', '$linkedin', '$image')";
				$sql = $this->connect->query($query);
				if ($sql==true) {
					
				$data[] = 'Trainer added successfully.';	
			}
			else{ $data[] = 'something went wrong!!!';
			}
		}

			}else{
				//  echo "<script> alert('Please, fill all the field!!!') </script>";
				$data[] = 'Please, fill all the fields!!!';
			
			 }
			 echo json_encode($data);
	}    
	

	// Delete student record
	public function deleteTrainer($id)
	{
		$data = array();
		// delete files from directory
		$select = "SELECT image FROM team WHERE id='$id'";
		$result = $this->connect->query($select);
		$row = $result->fetch_assoc();
		$deleteTrainer = $row['image'];
	
		if(file_exists("assets/img/trainers/$deleteTrainer")){
		unlink("assets/img/trainers/$deleteTrainer");
		}

		// delete from database
		$query = "DELETE FROM team WHERE id = '$id'";
		$sql = $this->connect->query($query);

	if ($sql==true) {
		// header("Location:students.php?statusDelete=deleteStudent");
		$data[] = 'Trainer deleted successfully';
	}else{
		// echo "<script> alert(Student does not delete try again) </script>";
		$data[] = 'Unable to delete, try again!!!';
		}
		echo json_encode($data);
	}


	// edit trainer
	public function editTeam()
	{
		$data = array();
	
        $name = $_POST['nameEdit'];  
	
        $title = $_POST['titleEdit'];  
   
        $about = $_POST['aboutEdit'];  
	
        $twitter = $_POST['twitterEdit'];  

        $facebook = $_POST['facebookEdit'];  

        $instagram = $_POST['instagramEdit'];  

		$linkedin = $_POST['linkedinEdit'];  

		$image = $_FILES['imageEdit']['name'];
		$image_tmp= $_FILES['imageEdit']['tmp_name'];

		$id = $_POST['id'];


		// submit form if not empty
		if(!empty($id) && !empty($name) && !empty($title) && !empty($about) && !empty($twitter) && !empty( $facebook) && !empty( $instagram) && !empty( $linkedin) && !empty( $image)){

			// delete files from directory
		$select = "SELECT image FROM team WHERE id='$id'";
		$result = $this->connect->query($select);
		$row = $result->fetch_assoc();
		$deleteTrainer = $row['image'];
	
		if(file_exists("assets/img/trainers/$deleteTrainer")){
		unlink("assets/img/trainers/$deleteTrainer");
		}
		move_uploaded_file($image_tmp, "assets/img/trainers/$image");
			$query="UPDATE team  SET name='$name', title='$title', about='$about', twitter='$twitter', facebook='$facebook', instagram='$instagram', linkedin='$linkedin', image='$image' WHERE id = '$id'";
			$sql = $this->connect->query($query);
			if ($sql==true) {
				
			$data[] = 'Trainer edited successfully.';	
		}
		else{ $data[] = 'something went wrong!!!';
		}
	



		}else{
			//  echo "<script> alert('Please, fill all the field!!!') </script>";
			$data[] = 'Please, fill all the fields!!!';
		
		 }

				
			 echo json_encode($data);
	} 
	
	
	
	
}
    
?>