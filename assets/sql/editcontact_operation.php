<?php

include 'functions.php';

if (!isset($_POST['editid'])) {
	header("Location: http://localhost/5005/");
}

$msg_contact = $_POST['editmessage'];
$id_contact = $_POST['editid'];

if ($conn_status == true) {

	updateMsg($msg_contact,$id_contact);
}

?>