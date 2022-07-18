<?php
include('api/contactAPI.php');
$contact_object = new contactAPI();
$id = mysqli_real_escape_string($contact_object->connect, $_POST["id"]);
$contact_object->deleteContact($id);
?>