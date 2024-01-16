<?php

	$user = 'root';
	$pass = '';
	$db = 'form';
	//To create database.
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$address = $_POST['address'];
	$contactnumber = $_POST['contactnumber'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];
	// Unable to connect to url for some reasons.
	$conn = new mysqli('localhost',$user, $pass, $db);
    	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error); 
		}
		else {
        $stmt = $conn->prepare("insert into form(firstname,lastname,address,contactnumber,age,gender)
        values(?,?,?,?,?,?)");
        $stmt->bind_param("sssiis",$firstname ,$lastname ,$address ,$contactnumber ,$age , $gender);
        $execval = $stmt->execute();
		echo "Thank you!!";
		$stmt->close();
		$conn->close();
    }
?>