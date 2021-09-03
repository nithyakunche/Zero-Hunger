<?php
session_start();
include "db_conn.php";


if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phnno']) && isset($_POST['rating']) &&
isset($_POST['feedback'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}



	$name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $phnno = validate($_POST['phnno']);
    $rating = validate($_POST['rating']);
    $feedback= validate($_POST['feedback']);
		if (empty($name)) {
		header("Location: feedback.html?error=name is required");
	    exit();
	}else if(empty($email)){
        header("Location: feedback.html?error=email is required");
	    exit();
	}else if(empty($phnno)){
        header("Location: feedback.html?error=phone number is required");
	    exit();
	}else if(empty($rating)){
        header("Location: feedback.html?error=rating is required");
	    exit();
	}else if(empty($feedback)){
        header("Location: feedback.html?error=feedback is required");
	    exit();
	}else {

		$sqlx = "SELECT * FROM user WHERE email='$email'";
	 $resultx = mysqli_query($conn, $sqlx);

	 if (mysqli_num_rows($resultx) === 0) {

			 echo "<script>alert('This User is not Registered, please Register as User first!!');window.location.href='register.html?error=not Registered';</script>";
			 exit();
	 }

	 $sql1 = "SELECT * FROM feedback WHERE email='$email'";
 $result1 = mysqli_query($conn, $sql1);

 if (mysqli_num_rows($result1) === 1) {


					 $sql2 ="UPDATE feedback SET name='$name',email='$email', phnno='$phnno', rating='$rating', feedback='$feedback'  WHERE email='$email' ";
					 $result2 = mysqli_query($conn, $sql2);

					 if ($result2) {
			 echo "<script>alert('Thank You for Feedback');window.location.href='home.html?error=feedback submitted';</script>";
					 exit();
				}
			 else{

				 echo "<script>alert('Please Resubmit Your Feedback');window.location.href='feedback.html?error=please resubmit';</script>";
					 exit();
			 }

	 }

	 $sql ="INSERT INTO feedback (name, email, phnno, rating, feedback)
	 VALUES ('$name', '$email', '$phnno', '$rating', '$feedback')";

	 $result = mysqli_query($conn, $sql);

	 if ($result) {
			 //header("Location: hospregis.html?error=Inserted successfully");
		 echo "<script>alert('Thank You for Feedback');window.location.href='home.html?error=feedback submitted';</script>";
				 exit();
		 }
		 else{

			 echo "<script>alert('Please Resubmit Your Feedback');window.location.href='feedback.html?error=please resubmit';</script>";
				 exit();
		 }
 }

}else{
 header("Location: feedback.html");
 exit();
}
