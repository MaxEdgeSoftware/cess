<?php
include('api/fetchAPI.php');
$fetch_object = new fetchAPI();
$id = mysqli_real_escape_string($fetch_object->connect, $_POST["id"]);
$fetch_object->fetchTrainer($id);
?>