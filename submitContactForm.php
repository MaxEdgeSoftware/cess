<?php
include('api/contactAPI.php');
$contact_object = new contactAPI();
$contact_object->sendContact();
?>