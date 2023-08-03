<?php

include 'functions.php';

if (!isset($_POST['nameinput'])) {
	header("Location: http://localhost/5005/");
}

$nameinput = $_POST['nameinput'];
$phone = $_POST['phone'];

if ($conn_status == true) {
	userCheck($nameinput,$phone);
}

?>