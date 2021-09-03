<?php
session_start();
include "db_conn.php";


if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phnno']) && isset($_POST['address']) && isset($_POST['msg'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}



	$name = validate($_POST['name']);
	$email = validate($_POST['email']);
    $phnno= validate($_POST['phnno']);
    $address= validate($_POST['address']);
	$msg= validate($_POST['msg']);



	if (empty($name)) {
		header("Location: request.html?error=name is required");
	    exit();
	}else if(empty($email)){
        header("Location: request.html?error=EmailId is required");
	    exit();
	}else if(empty($phnno)){
        header("Location: request.html?error=email id  is required");
	    exit();
	}else if(empty($address)){
        header("Location: request.html?error=password is required");
	    exit();
	}else if(empty($msg)){
        header("Location: request.html?error=Address is required");
	    exit();
	}else {

    $sql ="INSERT INTO request (name,email, phnno, address,msg)
    VALUES ('$name', '$email', '$phnno', '$address', '$msg')";

		$result = mysqli_query($conn, $sql);

		if ($result) {

			echo "<script>alert('Request Completed');window.location.href='foodavailable.php?error=successfully Registered';</script>";
	        exit();
			}
		else{
		       echo "<script>alert('user is already Registered');window.location.href='request.html?error=already Registered';</script>";
	        exit();
		}
	}

}else{
	header("Location: request.html");
	exit();
}
