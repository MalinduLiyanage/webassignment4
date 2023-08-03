<?php

include 'functions.php';

if (!isset($_POST['namecontact'])) {
	header("Location: http://localhost/5005/");
}

$name_contact = $_POST['namecontact'];
$phone_contact = $_POST['phonecontact'];
$msg_contact = $_POST['messagecontact'];

if ($conn_status == true) {
	contactMsg($name_contact,$phone_contact,$msg_contact);
}

?>