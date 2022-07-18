<?php
include('api/teamAPI.php');
$trainer_object = new teamAPI();
$id = mysqli_real_escape_string($trainer_object->connect, $_POST["id"]);
$trainer_object->deleteTrainer($id);
?>