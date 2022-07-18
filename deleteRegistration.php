<?php
include('api/registrationAPI.php');
$registration_object = new registrationAPI();
$id = mysqli_real_escape_string($registration_object->connect, $_POST["id"]);
$registration_object->deleteRegistration($id);
?>