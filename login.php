
<?php
session_start();
include "db_conn.php";

if (isset($_POST['email']) &&  isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$email = validate($_POST['email']);
	$password = validate($_POST['password']);


	if (empty($email)) {
		header("Location: login.php?error=email is required");
	    exit();
	}


	else if(empty($password)){
        header("Location: login.php?error=Password is required");
	    exit();
	}

	else{



		$sql = "SELECT * FROM user WHERE email='$email' AND password='$password' AND var='Donor' ";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {

				$_SESSION['email'] = $email;
            	header("Location: donorlogin.php");
		        exit();

		}else{

          $sqlx = "SELECT * FROM user WHERE email='$email' AND var='Donor' ";
          $resultx = mysqli_query($conn, $sqlx);

		  if (mysqli_num_rows($resultx) === 0) {

           echo "<script>alert('No user with this email-id and password is Registered,please Register!!');window.location.href='register.html?error=not Registered';</script>";
		         exit();
		  }
		  else {
			$sqly = "SELECT * FROM user WHERE password='$password' ";
          $resulty = mysqli_query($conn, $sqly);

		if (mysqli_num_rows($resulty) === 0) {

           echo "<script>alert('Incorrect Password');window.location.href='login.html?error=Incorrect password';</script>";
		        exit();
            }


	      }


		}
	}

}else{
	header("Location: login.html");
	exit();
}
