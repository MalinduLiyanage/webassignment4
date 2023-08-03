<?php

include 'assets/sql/functions.php';

if (!isset($_SESSION['username'])) {
	header("Location: http://localhost/5005/");
    exit();
}

if (isset($_GET['update_msg'])) {
	msgInfo($_GET['update_msg']);    
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Contact Form</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/w3.css">
<link rel="stylesheet" href="assets/basic_styles.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="w3-top">
  <div class="w3-bar w3-black w3-card" style="display: flex;justify-content: center;">
    <a href="#" class="w3-bar-item  w3-button w3-wide unclickable" style="font-family: Arial, sans-serif;">JOHNSON TAILORS</a>
  </div>
</div>

<div class="w3-container w3-padding-64 w3-center" id="privacy">
<h2>Edit Contact Message</h2>

	<form method="POST" action="assets/sql/editcontact_operation.php">
        <div class="w3-row-padding" style="margin:0 -16px 8px -16px;">
          <div class="w3-half">
            <input class="w3-input w3-border w3-medium" type="text" value="<?php echo "Name : ".$msg_name?>" id="name_input" name="editname" readonly>
          </div>
          <div class="w3-half">
            <input class="w3-input w3-border w3-medium" type="text" value="<?php echo "Phone : ".$msg_phone?>"  id="phone_input" name="editphone" readonly>
          </div>
        </div>
        <input class="w3-input w3-border w3-medium" type="text"value="<?php echo $msg_ids?>" name="editid" readonly>
        <input class="w3-input w3-border w3-medium" type="text" value="<?php echo $msg_msg?>" name="editmessage">
          <button class="w3-button w3-medium w3-black w3-section w3-left" type="submit" onclick="validate()" onmouseover="addTransition(this)" onmouseout="removeTransition(this)">EDIT MESSAGE</button>
      </form>
</div>

<div class="w3-bottom">
  <div class="w3-bar w3-black w3-card" style="display: flex;justify-content: center;">
    <p class="w3-large" style="text-align: center;">ICT1920067 / Index : 5005 / Assignment 04</p>
  </div>
</div>

</body>
</html>