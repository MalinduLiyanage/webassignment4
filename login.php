<?php

session_start();

if (isset($_SESSION['username'])) {
	header("Location: http://localhost/5005/account.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Login First</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/w3.css">
<link rel="stylesheet" href="assets/basic_styles.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
</body>

<div class="w3-top">
  <div class="w3-bar w3-black w3-card" style="display: flex;justify-content: center;">
    <a href="#" class="w3-bar-item  w3-button w3-wide unclickable" style="font-family: Arial, sans-serif;">JOHNSON TAILORS</a>
  </div>
</div>

 <div class="w3-row w3-grayscale w3-row-padding" style="text-align: center;">
    <div class="w3-col l6 m4 w3-row-padding" style="text-align: center;margin-top:8%;">
    	<h2>Please Login First</h2>
	  <p>This will create your account at Johnson's if you haven't one...</p>
      <form method="POST" action="assets/sql/login_operation.php">

      	<input class="w3-input w3-border w3-large w3-margin-bottom"type="text" id="nameinput" placeholder="Enter your Name" name="nameinput">
      	<input class="w3-input w3-border w3-large"type="text" id="phone" placeholder="Enter Telephone No" name="phone">
      	<input class="w3-button w3-medium w3-black w3-section w3-center" type="submit">
      </form>
      <div class="w3-col l12 m10 w3-center">
      <button id="saveLogs" class="w3-button w3-lightyellow w3-center" onclick="location.href='assets/sql/functions.php?showUser=true';" onmouseover="addTransition(this)" onmouseout="removeTransition(this)">SAVED LOGINS</button>
    </div>
    </div>


    <div class="w3-col l6 m4 w3-row-padding w3-hide-small" style="text-align: center;margin-top:10%;">
        <img src="assets/bg/mainbg_3.webp" style="width: 90%; height: 100%;border-radius: 10px">
    </div>

</div>

<div class="w3-bottom">
  <div class="w3-bar w3-black w3-card" style="display: flex;justify-content: center;">
    <p class="w3-large" style="text-align: center;">ICT1920067 / Index : 5005 / Assignment 04</p>
  </div>
</div>

</html>
