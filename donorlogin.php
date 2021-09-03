<?php
	session_start();
	if(!ISSET($_SESSION['email'])){
		header('location:login.php');
	}
?>
<html>
<head>
<title>Welcome Donor!</title>
<link rel="stylesheet" href="styles.css">
<style type="text/css">
#button{
background-color:#bc8f8f;
height:30px;
position:absolute;
top:0;
right:0;
font-size:20px;
font-family:courier;
}
.container{
	height:100vh;
	width:100%;
	background-image:url(donar.jpeg);
	background-size:cover;
	background-position:center;
	position:relative;
}
.content{
position:center;
}
.heading{
	margin-left:6%;
}
.heading h1{
	font-size:40px;
	color:#FFF;
	line-height:110px;
	float:left;
	font-family:courier;
}
#button1,.btn
{
padding:1rem 3rem;
outline:None;
font-size:1rem;
display:block;
margin:auto;
margin:0 0 0 7rem;
border:none;
font-style:courier;
color:#fff;
background-color:#E91E63;
margin-top:4rem;
border-radius:1rem;
box-shadow:0 1rem 1rem -0.7rem rgba(0,0,0,0.4);
}
#button1:hover{
background-color:#C61350;
}
#button2,.btn
{
padding:1rem 3rem;
outline:None;
font-size:1rem;
display:block;
margin:auto;
margin:0 0 0 10rem;
border:none;
font-style:courier;
color:#fff;
background-color:#E91E63;
margin-top:4rem;
border-radius:1rem;
box-shadow:0 1rem 1rem -0.7rem rgba(0,0,0,0.4);
}
#button2:hover{
background-color:#C61350;
}
</style>
<script type = "text/javascript" >
function preventBack() { window.history.forward(); }
setTimeout("preventBack()", 0);
window.onunload = function () { null };
</script>
</head>
<body>
<div class="container">
<div class="heading">
<table>
<tr>
<td style="font-size:40px;color:white;">WELCOME </td></tr>
<tr>
<?php
				include "db_conn.php";
				$query = mysqli_query($conn, "SELECT * FROM `user` WHERE `email`='$_SESSION[email]'") or die(mysqli_error());
				$fetch = mysqli_fetch_array($query);

				echo "<td style='font-size:40px;color:white;text-align:center;' class='text-success'>".$fetch['name']."</td>";
			?>
			</tr>
			</table>
</div>
<div class="content">
<table>
<tr>
<td><a href="donorrequest.php">
<input type="button" id="button1" value="REQUESTS" style="color:white"/></a></td>
<td><a href="fooddetails.html">
<input type="button" id="button1" value="FOODDETAILS" style="color:white"/></a></td>
<td><a href="home.html" onclick="return confirm('Do you really want to exit this Page?');">
<input type="button" id="button2" value="LOGOUT" style="color:white"/></a></td>
</tr>
</table>
</div>
</div>
</body>
</html>
