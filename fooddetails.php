<?php
session_start();
include "db_conn.php";


if (isset($_POST['name']) && isset($_POST['phnno']) && isset($_POST['email']) && isset($_POST['food']) && isset($_POST['date'])  && isset($_POST['quantity']) && isset($_POST['address'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}



	$name = validate($_POST['name']);
    $phnno= validate($_POST['phnno']);
    $email = validate($_POST['email']);
	$food = validate($_POST['food']);
    $date= validate($_POST['date']);
	$quantity = validate($_POST['quantity']);
    $address= validate($_POST['address']);



	if (empty($name)) {
		header("Location: fooddetails.html?error=name is required");
	    exit();
	}else if(empty($phnno)){
        header("Location: fooddetails.html?error=phone number is required");
	    exit();
	}else if(empty($email)){
        header("Location: fooddetails.html?error=email id  is required");
	    exit();
	}else if(empty($food)){
        header("Location: fooddetails.html?error=Type of food is required");
	    exit();
	}else if(empty($date)){
        header("Location: fooddetails.html?error=Date is required");
	    exit();
    }else if(empty($quantity)){
        header("Location: fooddetails.html?error=Quantity is required");
	    exit();
	}else if(empty($address)){
        header("Location: fooddetails.html?error=Address is required");
	    exit();
	}else {

    $sql ="INSERT INTO fooddetails (name, phnno, email,food,date,quantity ,address)
    VALUES ('$name', '$phnno', '$email', '$food','$date','$quantity', '$address')";

		$result = mysqli_query($conn, $sql);

		if ($result) {

			echo "<script>alert('Food Details Saved');window.location.href='donorlogin.php?error=successfully Registered';</script>";
	        exit();
			}
		else{
		       echo "<script>alert('user is already Registered');window.location.href='login.html?error=already Registered';</script>";
	        exit();
		}
	}

}else{
	header("Location: fooddetails.html");
	exit();
}
