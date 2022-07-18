<?php
class loginAPI {
    
    public $connect = '';

	function __construct()
	{
		$this->database_connection();
	}

    // database connection
	function database_connection()
	{
			$this->connect = new mysqli("localhost", "airsbfrj_logic", "Alonso652.", "airsbfrj_crown");
	}

    // session login for admin
	public function adminLogin($post){
		$adminUserName = $this->connect->real_escape_string($_POST['adminUserName']);
		$adminPassword = $this->connect->real_escape_string($_POST['adminPassword']);
		//$adminPassword = md5($adminPassword);
		$sql = "SELECT * FROM admin_table WHERE 
		adminUserName='$adminUserName' AND adminPassword ='$adminPassword'";

		$result = $this->connect->query($sql);
		
		if($result->num_rows > 0){
		
		$_SESSION['adminUserName'] = $adminUserName;
		
		echo "<script>window.open('admin.php','_self')</script>";
		}
		else {
		
		echo "<script>alert('Admin Username or password is incorrect')</script>";
		
		}


		}	

    // login session for staff
	public function staffLogin($post){
		$staffId = $this->connect->real_escape_string($_POST['staffId']);
		$staffPassword = $this->connect->real_escape_string($_POST['staffPassword']);
		
		$staffPassword = md5($staffPassword);

		$sql = "SELECT * FROM teachers WHERE 
		teacherId='$staffId' AND teacherPassword ='$staffPassword'";
		
		$result = $this->connect->query($sql);
		
		if($result->num_rows > 0){
		
		$_SESSION['staffId'] = $staffId;
		
		echo "<script>window.open('staff.php','_self')</script>";
		}
		else {
		
		echo "<script>alert('Staff Id or password is incorrect')</script>";
		
		}
		}


		// login session for result check
	public function resultCheck($post){
		$studentId = $this->connect->real_escape_string($_POST['studentId']);
		//$staffPassword = $this->connect->real_escape_string($_POST['staffPassword']);

		$sql = "SELECT * FROM students WHERE 
		studentId='$studentId'";
		
		$result = $this->connect->query($sql);
		
		if($result->num_rows > 0){
		
		$_SESSION['studentId'] = $studentId;
		
		echo "<script>window.open('result.php','_self')</script>";
		}
		else {
		
		echo "<script>alert('Student Id  is incorrect')</script>";
		
		}
		}


		// change admin password
		public function changeAdminLoginDetails($post){
			$currentPassword = $this->connect->real_escape_string($_POST['currentPassword']);
			$newPassword = $this->connect->real_escape_string($_POST['newPassword']);
			$confirmPassword = $this->connect->real_escape_string($_POST['confirmPassword']);
			$adminUserName = $_POST['adminUserName'];
			
			$sql = "SELECT * FROM admin_table WHERE adminUserName ='$adminUserName'";
			
			$query = $this->connect->query($sql);
			$result = $query->fetch_assoc();

			if($currentPassword == $result['adminPassword']){
				if($newPassword == $confirmPassword){
					$newPassword = md5($newPassword);
					$sql = "UPDATE admin_table SET adminPassword = '$newPassword' WHERE adminUserName = '$adminUserName'";
					$query = $this->connect->query($sql);
					if ($query==true) {
			 
						// echo "<script> alert('password changed successfully!!!') </script>";
						header("Location:admin.php?statusUpdate=passwordChanged");

						
					}else{
						echo "<script> alert('password could not be updated') </script>";
						
					}


				}else{
					echo "<script> alert('Confirm password do not match new password, try again!!!') </script>";
				}

			}else{
				echo "<script> alert('current password not correct, try again!!!') </script>";
			}
			}


				// change staff password
		public function changeStaffLoginDetails($post){
			$currentPassword = $this->connect->real_escape_string($_POST['currentPassword']);
			$newPassword = $this->connect->real_escape_string($_POST['newPassword']);
			$confirmPassword = $this->connect->real_escape_string($_POST['confirmPassword']);
			$staffId = $_POST['staffId'];
		
			$sql = "SELECT * FROM teachers WHERE teacherId ='$staffId'";
			
			$query = $this->connect->query($sql);
			$result = $query->fetch_assoc();

			if($currentPassword == $result['teacherPassword']){
				if($newPassword == $confirmPassword){
					$newPassword = md5($newPassword);

					$sql = "UPDATE teachers SET teacherPassword = '$newPassword' WHERE teacherId = '$staffId'";
					$query = $this->connect->query($sql);
					if ($query==true) {
			 
						// echo "<script> alert('password changed successfully!!!') </script>";
						header("Location:staff.php?statusUpdate=passwordChanged");
						
					}else{
						echo "<script> alert('password could not be updated') </script>";
						
					}


				}else{
					echo "<script> alert('Confirm password do not match new password, try again!!!') </script>";
				}

			}else{
				echo "<script> alert('current password not correct, try again!!!') </script>";
			}
			}


}

?>