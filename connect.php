<?php
	$fullName = $_POST['fullName'];
	$email = $_POST['email'];
	$contactNumber = $_POST['contactNumber'];
	$message = $_POST['message'];

	// Database connection
	$conn = new mysqli('localhost','root','','contacts');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into contacts(fullName, email, contactNumber,message) values(?, ?, ?, ?)");
		$stmt->bind_param("ssis", $fullName, $email, $contactNumber,$message);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>