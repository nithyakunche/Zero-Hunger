<?php
session_start();
include "db_conn.php";


if (isset($_POST['name']) && isset($_POST['phnno']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['address']) && isset($_POST['var'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}



	$name = validate($_POST['name']);
    $phnno= validate($_POST['phnno']);
    $email = validate($_POST['email']);
    $password= validate($_POST['password']);
    $address= validate($_POST['address']);
		$var = validate($_POST['var']);



	if (empty($name)) {
		header("Location: register.html?error=name is required");
	    exit();
	}else if(empty($phnno)){
        header("Location: register.html?error=phone number is required");
	    exit();
	}else if(empty($email)){
        header("Location: register.html?error=email id  is required");
	    exit();
	}else if(empty($password)){
        header("Location: register.html?error=password is required");
	    exit();
	}else if(empty($address)){
        header("Location: register.html?error=Address is required");
	    exit();
	}else if(empty($var)){
        header("Location: register.html?error=field is required");
	    exit();}
	else {

    $sql ="INSERT INTO user (name, phnno, email, password, address,var)
    VALUES ('$name', '$phnno', '$email', '$password', '$address','$var')";

		$result = mysqli_query($conn, $sql);

		if ($result) {

			echo "<script>alert('Registration Completed');window.location.href='home.html?error=successfully Registered';</script>";
	        exit();
			}
		else{
		       echo "<script>alert('user is already Registered');window.location.href='home.html?error=already Registered';</script>";
	        exit();
		}
	}

}else{
	header("Location: register.html");
	exit();
}
