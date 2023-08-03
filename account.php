<?php

include 'assets/sql/functions.php';

if (!isset($_SESSION['username'])) {
	header("Location: http://localhost/5005/");
    exit();
}
	
$data = loadCart();
if (empty($data)) {
	$style_attr = 'style="display: none"';
	$style_attr_empty = 'style="display: inline-block"';
}else{
	$style_attr = '';
	$style_attr_empty = 'style="display: none"';
}

$discount_status = eligibleDiscount();

if ($discount_status == true) {
	$style_discount = '';
	$style_disc_stmt = 'style="font-style: italic;display: none"';
} else {
	$style_discount = 'style="display: none"';
	$style_disc_stmt = 'style="font-style: italic;"';
}

$data_msg = loadMsgs();
if (empty($data_msg)) {
	$msg_table = 'style="display: none;"';
	$msg_stmt = '';
}else{
	$msg_table = '';
	$msg_stmt = 'style="display: none"';
}

if (isset($_COOKIE['enteredMessage'])) {
	verifyMsg($_COOKIE['enteredMessage']);
}

?>

<!DOCTYPE html>
<html>
<head>
<title>My Account</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/w3.css">
<link rel="stylesheet" href="assets/basic_styles.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="w3-top">
  <div class="w3-bar w3-black w3-card" id="myNavbar">
    <a href="#home" class="w3-bar-item w3-button w3-wide unclickable" style="font-family: Arial, sans-serif;">MY ACCOUNT</a>

    <div class="w3-right w3-hide-small">
    <a href="#" class="w3-bar-item w3-button unclickable"><?php echo "Welcome, ".$_SESSION['username']?></a>
      <a href="#cart" class="w3-bar-item w3-button" onmouseover="addTransition(this)" onmouseout="removeTransition(this)">CART</a>
      <a href="#contact" class="w3-bar-item w3-button" onmouseover="addTransition(this)" onmouseout="removeTransition(this)">MESSAGES</a>
      <a href="#privacy" class="w3-bar-item w3-button" onmouseover="addTransition(this)" onmouseout="removeTransition(this)">PRIVACY</a>
      
    </div>

    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>

<nav class="w3-sidebar w3-bar-block w3-hide-medium w3-hide-large" style="display:none;background-color: black;right: 0;" id="mySidebar">
  
  <a href="#" class="w3-bar-item w3-button unclickable" style="text-align: center;color: white;"><?php echo "Welcome, ".$_SESSION['username']?></a>
  <a href="#cart" onclick="w3_close()" class="w3-bar-item w3-button" style="text-align: center;color: white;">CART</a>
  <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button" style="text-align: center;color: white;">MESSAGES</a>
  <a href="#privacy" onclick="w3_close()" class="w3-bar-item w3-button" style="text-align: center;color: white;">PRIVACY</a>
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16" style="text-align: center;color: white;">CLOSE SIDEBAR</a>
</nav>

<div class="w3-container w3-padding-64 w3-center" id="cart">
<h2>Shopping Cart</h2>
<p <?php echo $style_attr?>>Your shopping cart is as follows.</p>
<p <?php echo $style_attr_empty?>><br><br>Your shopping cart seems to be empty.</p>
<button  <?php echo $style_attr_empty?> id="addCart" class="w3-button w3-black w3-section w3-center" onclick="location.href='http://localhost/5005/index.php#bestsellers';" onmouseover="addTransition(this)" onmouseout="removeTransition(this)">ADD PRODUCTS TO CART NOW</button>

<table class="w3-table-all w3-card-4" <?php echo $style_attr?>>
    <tr>

        <th>Date</th>
        <th>Item ID</th>
        <th>Price</th>
        <th  <?php echo $style_discount?>>Add Discount</th>
        <th>Remove Item</th>
    </tr>
    <?php foreach ($data as $row) { ?>
        <tr>
            <td style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis; max-width: 2px;"><?php echo $row['Date']; ?></td>
            <td style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis; max-width: 2px;"><?php echo $row['Item_ID']; ?></td>
            <td><?php echo "Rs. ".$row['Price'].".00"; ?></td>
            <td <?php echo $style_discount?>><a href='assets/sql/functions.php?discount=<?php echo $row['Item_ID']; ?>'><i class="fa fa-gift"></i></a></td>
            <td><a href='assets/sql/functions.php?del_item=<?php echo $row['Item_ID']; ?>'><i class="fa fa-trash"></i></a></td>

        </tr>
    <?php } ?>
</table>
<p <?php echo $style_discount?>>* - Rs. 2000.00 /= worth New User discount can be applied to your cart. This discount is only valid for once. <br>** - Even if you delete and recreate the account using same Phone Number, <b>discount will not be applied if used.</b></p>
<p <?php echo $style_disc_stmt?>>New user Discount is already used for this Phone Number.</p>

</div>

<div class="w3-container w3-padding-64 w3-center" id="contact">
<h2>Recorded Messages</h2>
<p>From this section, you can see your recorded contact messages to Johnson's.</p>
<p <?php echo $msg_stmt?>><br><br>No messages are recorded.</p>


<table class="w3-table-all w3-card-4" <?php echo $msg_table?>>
    <tr>

        <th>Msg_ID</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Message</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php foreach ($data_msg as $row) { ?>
        <tr>
            <td style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis; max-width: 2px;"><?php echo $row['Msg_ID']; ?></td>
            <td style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis; max-width: 2px;"><?php echo $row['Name']; ?></td>
            <td style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis; max-width: 2px;"><?php echo $row['Phone']; ?></td>
            <td style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis; max-width: 10px;"><?php echo $row['Message']; ?></td>
            <td><a href='edit_contact.php?update_msg=<?php echo $row['Msg_ID']; ?>'><i class="fa fa-edit"></i></a></td>
            <td><a href='assets/sql/functions.php?del_msg=<?php echo $row['Msg_ID']; ?>'><i class="fa fa-trash"></i></a></td>

        </tr>
    <?php } ?>
</table>	
</div>


<div class="w3-container w3-padding-64 w3-center" id="privacy">
<h2>Privacy of Account</h2>
<p>From this section, you can either logged out from the website or delete your account at Johnson's.</p>
	<div class="w3-row-padding" style="margin-top:10px">
    <div class="w3-col l7 m6">
      <button id="logout" class="w3-button w3-black w3-section w3-center" onclick="location.href='assets/sql/functions.php?logoutRequest=true';" onmouseover="addTransition(this)" onmouseout="removeTransition(this)">LOGOUT FROM ACCOUNT</button>
    </div>
    <div class="w3-col l1 m6">
      <button id="delete" class="w3-button w3-red w3-section w3-center" onclick="location.href='assets/sql/functions.php?deleteRequest=true';" onmouseover="addTransition(this)" onmouseout="removeTransition(this)">DELETE THE ACCOUNT</button>
    </div>
 	 </div>
 	  <p>WARNING! : Deleting your account will be cleared out your order details.</p>
</div>

<div class="w3-bottom">
  <div class="w3-bar w3-black w3-card" style="display: flex;justify-content: center;">
    <p class="w3-large" style="text-align: center;">ICT1920067 / Index : 5005 / Assignment 04</p>
  </div>
</div>

<script type="text/javascript" src="assets/js/navigations.js"></script>
<script type="text/javascript" src="assets/js/smooth_scroll.js"></script>
<script type="text/javascript" src="assets/js/btn_hover.js"></script>
</body>
</html>