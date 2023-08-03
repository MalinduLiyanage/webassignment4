<head>
    <script src="http://localhost/5005/assets/js/sweetalert2.all.min.js"></script>
    <script src="http://localhost/5005/assets/js/particles.js"></script>
    <link rel="stylesheet" href="http://localhost/5005/assets/w3.css">
</head>
<body>
<div class="w3-top">
  <div class="w3-bar w3-black w3-card" style="display: flex;justify-content: center;">
    <a href="#" class="w3-bar-item  w3-button w3-wide unclickable" style="font-family: Arial, sans-serif;">JOHNSON TAILORS</a>
  </div>
</div>

<div class="w3-bottom">
  <div class="w3-bar w3-black w3-card" style="display: flex;justify-content: center;">
    <p class="w3-large" style="text-align: center;">ICT1920067 / Index : 5005 / Assignment 04</p>
  </div>
</div>
<?php

session_start();


// Database credentials
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'johnsontailors';

// Create a connection to the database
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}else{
	$conn_status = true;
}

if (isset($_GET['logoutRequest'])) {
    logOut();
}

if (isset($_GET['deleteRequest'])) {
    delAcc();
}

if (isset($_GET['showUser'])) {
    showUsers();
}

if (isset($_GET['addCart'])) {
    addCarts($_GET['addCart'],$_GET['priceTag']);
}

if (isset($_GET['del_item'])) {
    delCart($_GET['del_item']);
}

if (isset($_GET['discount'])) {
    addDiscount($_GET['discount']);
}

if (isset($_GET['del_msg'])) {
    delMsg($_GET['del_msg']);
}

$msg_name = 'undefined';
$msg_phone = 'undefined';
$msg_msg = 'undefined';
$msg_ids = 'undefined';

//Check if user is registered.
//If registered, user is looged in
//Else user is being created
function userCheck($nameinput, $phone) {
    global $conn;

    $sanitized_phone = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
    $sql = "SELECT * FROM users WHERE Phone = '$sanitized_phone'";
    $result = mysqli_query($conn, $sql);

    if (empty($sanitized_phone) || empty($nameinput) || strlen($sanitized_phone) != 10) {
    	echo '<script>';
		echo 'Swal.fire({
		    title: "Error!",
		    html: `Fields cannot be empty!<br>Enter valid phone number as 0xxxxxxxxx`,
		    icon: "error",
		    confirmButtonText: "Try Again",
		    closeOnConfirm: true,
		    allowOutsideClick: false
		    }).then((result) => {
		       if (result.isConfirmed) {
		           history.back();
		       }
		    });';
		echo '</script>';
	    exit();
    }else {
    	if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
     
	        if($nameinput != $row['Name']){
	        	echo '<script>';
				echo 'Swal.fire({
		                    title: "Mismatch!",
		                    text: "Your details seems to be incorrect!",
		                    icon: "error",
		                    confirmButtonText: "Try Again",
		                    closeOnConfirm: true,
		                    allowOutsideClick: false
		                  }).then((result) => {
		                    if (result.isConfirmed) {
		                      history.back();
		                    }
		                  });';
		        echo '</script>';
	        	exit();
	        }else{
	        	$_SESSION['username'] = $row['Name'];
	        	$_SESSION['phone'] = $phone;
	        	echo '<script>';
				echo 'Swal.fire({
		                    title: "Welcome!",
		                    text: "Successfully logged in!",
		                    icon: "success",
		                    confirmButtonText: "OK",
		                    closeOnConfirm: true,
		                    allowOutsideClick: false
		                  }).then((result) => {
		                    if (result.isConfirmed) {
		                      window.location="http://localhost/5005/";
		                    }
		                  });';
		        echo '</script>';
	        	exit();
	        }
	    } else {
	        registerUser($nameinput, $sanitized_phone);
	    }
    }
}


//New user registration
function registerUser($name,$phone){
	global $conn;
	$uid = uniqid();
	$stmt = $conn->prepare("INSERT INTO users (User_ID, Name, Phone) VALUES (?, ?, ?)");
	$stmt->bind_param("sss", $uid, $name, $phone); 
	$stmt->execute();
	$_SESSION['username'] = $name;
	$_SESSION['phone'] = $phone;
	echo '<script>';
	echo 'Swal.fire({
	    title: "Thank You!",
	    text: "Your cart is now ready!",
	    icon: "success",
	    confirmButtonText: "OK",
	    closeOnConfirm: true,
	    allowOutsideClick: false
	    }).then((result) => {
	    if (result.isConfirmed) {
	        window.location="http://localhost/5005/";
	    }
	    });';
	echo 'start()';
	echo '</script>';
    exit();
}

//To record messages from Contact form
function contactMsg($name,$phone,$msg){
	global $conn;
	$msg_id = uniqid();

	$sanitized_name = filter_var($name,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$sanitized_phone = filter_var($phone,FILTER_SANITIZE_NUMBER_INT);
	$sanitized_msg = filter_var($msg,FILTER_SANITIZE_FULL_SPECIAL_CHARS);

	if (empty($sanitized_name) || empty($sanitized_msg) || empty($sanitized_phone) || strlen($sanitized_phone) != 10) {
		echo '<script>';
		echo 'Swal.fire({
		    title: "Error!",
		    html: `Fields cannot be empty!<br>Enter valid phone number as 0xxxxxxxxx`,
		    icon: "error",
		    confirmButtonText: "Try Again",
		    closeOnConfirm: true,
		    allowOutsideClick: false
		    }).then((result) => {
		       if (result.isConfirmed) {
		           history.back();
		       }
		    });';
		echo '</script>';
		
	} else {
		$stmt = $conn->prepare("INSERT INTO contacts (Msg_ID, Name, Phone, Message) VALUES (?, ?, ?, ?)");
		$stmt->bind_param("ssss", $msg_id, $sanitized_name, $sanitized_phone, $sanitized_msg); 
		$stmt->execute();
		echo '<script>';
		echo 'Swal.fire({
		    title: "Recorded!",
		    html: `Your message is recorded!`,
		    icon: "success",
		    confirmButtonText: "OK",
		    closeOnConfirm: true,
		    allowOutsideClick: false
		    }).then((result) => {
		       if (result.isConfirmed) {
		           history.back();
		       }
		    });';
		echo '</script>';
	}
}

function logOut(){
	session_destroy();
	echo '<script>';
			echo 'Swal.fire({
	                    title: "Done!",
	                    text: "Successfully logged out!",
	                    icon: "success",
	                    confirmButtonText: "OK",
	                    closeOnConfirm: true,
	                    allowOutsideClick: false
	                  }).then((result) => {
	                    if (result.isConfirmed) {
	                      window.location="http://localhost/5005/";
	                    }
	                  });';
	        echo '</script>';
    exit();
}

function delAcc() {
    $phone = $_SESSION['phone'];
    $sql = "DELETE FROM users WHERE Phone = '$phone'";
    global $conn;
    if ($conn->query($sql) === TRUE) {
    		echo '<script>';
			echo 'Swal.fire({
	                    title: "Done!",
	                    text: "Successfully deleted!",
	                    icon: "info",
	                    confirmButtonText: "OK",
	                    closeOnConfirm: true,
	                    allowOutsideClick: false
	                  }).then((result) => {
	                    if (result.isConfirmed) {
	                      window.location="http://localhost/5005/";
	                    }
	                  });';
	        echo '</script>';
        session_destroy();
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

function loadCart() {
    global $conn;

    $phone = mysqli_real_escape_string($conn, $_SESSION['phone']);
    $sql = "SELECT * FROM cart WHERE Phone = '" . $phone . "'";
    $result = $conn->query($sql);

    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    return $data;
}

function delCart($item_id){

	$phone = $_SESSION['phone'];
	$sql = "DELETE FROM cart WHERE Phone = '$phone' AND Item_ID = '$item_id'";
    global $conn;
    if ($conn->query($sql) === TRUE) {
    		echo '<script>';
			echo 'Swal.fire({
	                    title: "Removed!",
	                    text: "Item removed from cart!",
	                    icon: "info",
	                    confirmButtonText: "OK",
	                    closeOnConfirm: true,
	                    allowOutsideClick: false
	                  }).then((result) => {
	                    if (result.isConfirmed) {
	                      history.back();
	                    }
	                  });';
	        echo '</script>';
        exit();
    }
}

function eligibleDiscount(){
	global $conn;
	$phone = $_SESSION['phone'];

	$sql = "SELECT COUNT(*) as count FROM discount_users WHERE Phone = '$phone'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $count = $row['count'];

    if($count == 0){
    	$isEligible = true;
    } else {
    	$isEligible = false;
    }

    return $isEligible;
}



function addDiscount($item_id){

	$phone = $_SESSION['phone'];
	global $conn;
	$stmt = $conn->prepare("INSERT INTO discount_users (Phone) VALUES (?)");
	$stmt->bind_param("s", $phone); 
	$stmt->execute();

	$update_stmt = $conn->prepare("UPDATE cart SET Price = Price - 2000 WHERE Item_ID = ? AND Phone = ?");
	$update_stmt->bind_param("ss", $item_id, $phone);
	$update_stmt->execute();

	echo '<script>';
	echo 'Swal.fire({
	    title: "Added!",
	    text: "New User Discount is added to selected item!",
	    icon: "success",
	    confirmButtonText: "OK",
	    closeOnConfirm: true,
	    allowOutsideClick: false
	    }).then((result) => {
	        if (result.isConfirmed) {
	            history.back();
	        }
	    });';
	echo '</script>';

}

function showUsers(){

	global $conn;
	$sql = "SELECT Name, Phone FROM users";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    echo '<script>';
		echo 'Swal.fire({
	         title: "Here are Saved Logins!",
	         html: `<table class="w3-table-all w3-card-4">
	              <tr>
	    				<th>Name</th>
	    				<th>Phone</th>
	    		  </tr>';
	    	while ($row = $result->fetch_assoc()) {
	                 echo      '<tr>
	        						<td>' . $row['Name'] . '</td>
	        						<td> 0' . $row['Phone'] . '</td>
	        					</tr>';
	    }
	          echo    '  </table>`,
	                    icon: "info",
	                    confirmButtonText: "OK",
	                    closeOnConfirm: true,
	                    allowOutsideClick: false
	                  }).then((result) => {
	                    if (result.isConfirmed) {
	                      history.back();
	                    }
	                  });';
	        echo '</script>';
	} else {
	    echo '<script>';
			echo 'Swal.fire({
	                    title: "No Data!",
	                    text: "No users are recorded!",
	                    icon: "error",
	                    confirmButtonText: "OK",
	                    closeOnConfirm: true,
	                    allowOutsideClick: false
	                  }).then((result) => {
	                    if (result.isConfirmed) {
	                      history.back();
	                    }
	                  });';
	        echo '</script>';
	}
}

function addCarts($item_id,$price_tag){
	
	if(isset($_SESSION['username'])){
		global $conn;
		$phone = $_SESSION['phone'];
		$date = date("Y-m-d");

		$sql = "SELECT COUNT(*) as count FROM cart WHERE Phone = '$phone' AND Item_ID = '$item_id'";
	    $result = $conn->query($sql);
	    $row = $result->fetch_assoc();
	    $count = $row['count'];

	    if($count == 0){
			$stmt = $conn->prepare("INSERT INTO cart (Phone, Item_ID, Date, Price) VALUES (?, ?, ?, ?)");
			$stmt->bind_param("ssss", $phone, $item_id, $date, $price_tag); 
			$stmt->execute();
			echo '<script>';
			echo 'Swal.fire({
			    title: "Done!",
			    text: "Item is added to Cart!",
			    icon: "success",
			    confirmButtonText: "OK",
			    closeOnConfirm: true,
			    allowOutsideClick: false
			    }).then((result) => {
			    	if (result.isConfirmed) {
			            history.back();
			        }

			    });';
			echo 'start()';
			echo '</script>';
		    exit();
		}else {
			echo '<script>';
			echo 'Swal.fire({
			    title: "No Need!",
			    text: "Item is already in the Cart!",
			    icon: "info",
			    confirmButtonText: "View Cart",
			    closeOnConfirm: true,
			    allowOutsideClick: false
			    }).then((result) => {
			    	if (result.isConfirmed) {
			            history.back();
			        }

			    });';
			echo '</script>';
		}
	} else {
		header("Location: http://localhost/5005/login.php");
    	exit();
	}
}

function loadMsgs() {
    global $conn;

    $phone = mysqli_real_escape_string($conn, $_SESSION['phone']);
    $sql = "SELECT * FROM contacts WHERE Phone = '" . $phone . "'";
    $result = $conn->query($sql);

    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    return $data;
}

function delMsg($msg_id){

	$phone = $_SESSION['phone'];
	$sql = "DELETE FROM contacts WHERE Phone = '$phone' AND Msg_ID = '$msg_id'";
    global $conn;
    if ($conn->query($sql) === TRUE) {
    		echo '<script>';
			echo 'Swal.fire({
	                    title: "Deleted!",
	                    text: "Message is deleted!",
	                    icon: "info",
	                    confirmButtonText: "OK",
	                    closeOnConfirm: true,
	                    allowOutsideClick: false
	                  }).then((result) => {
	                    if (result.isConfirmed) {
	                      history.back();
	                    }
	                  });';
	        echo '</script>';
        exit();
    }

}

function msgInfo($msg_id){

	global $conn;
	global $msg_name;
	global $msg_phone;
	global $msg_msg;
	global $msg_ids;

	$sql = "SELECT * FROM contacts WHERE Msg_ID = ?";
    $stmt = $conn->prepare($sql);
    $updateMsgValue = $msg_id;
    $stmt->bind_param('s', $updateMsgValue);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result) {

        $row = $result->fetch_assoc();
        
        $msg_name = $row['Name'];
        $msg_phone = $row['Phone'];
        $msg_msg = $row['Message'];
        $msg_ids = $updateMsgValue;
        $result->close();
    }

}

function updateMsg($msg,$msg_id){
	
	global $conn;

	$sanitized_msg = filter_var($msg,FILTER_SANITIZE_STRING,FILTER_FLAG_ENCODE_AMP|FILTER_FLAG_ENCODE_HIGH|FILTER_FLAG_ENCODE_LOW);

	if (empty($msg)) {
		echo '<script>';
		echo 'Swal.fire({
		    title: "Error!",
		    html: `Message cannot be empty!`,
		    icon: "error",
		    confirmButtonText: "Try Again",
		    closeOnConfirm: true,
		    allowOutsideClick: false
		    }).then((result) => {
		       if (result.isConfirmed) {
		           history.back();
		       }
		    });';
		echo '</script>';
		
	} else {
		$update_stmt = $conn->prepare("UPDATE contacts SET Message = ? WHERE Msg_ID = ?");
		$update_stmt->bind_param("ss", $sanitized_msg, $msg_id);
		$update_stmt->execute();
		echo '<script>';
		echo 'Swal.fire({
		    title: "Updated!",
		    html: `Your message is updated!`,
		    icon: "success",
		    confirmButtonText: "OK",
		    closeOnConfirm: true,
		    allowOutsideClick: false
		    }).then((result) => {
		       if (result.isConfirmed) {
		           history.go(-2);
		       }
		    });';
		echo '</script>';
	}
}


?>
</body>


