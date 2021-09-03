<html>
<head>
<title> Available Food </title>
<style>
body{
  background-image: url("tablebgimg.jpeg");
}
#tab {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  text-align: center;
}

#tab td, #tab th {
  border: 1px solid #ddd;
  padding: 8px;
}


#tab tr:hover {background-color: #ddd;}

#tab th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #f08080;
  color: white;
}
#button {
    width: 6em;
    border: 2px solid green;
    background: #ffe;
    border-radius: 5px;
    position: absolute;
    top:10px;
    right:10px;
}
a {
    display: block;
    width: 100%;
    line-height: 2em;
    text-align: center;
    text-decoration: none;
    border-radius: 5px;
}
a:hover {
    color: red;
    background: #eff;
}

</style>
</head>

<body>
  <h1 style="text-align:center; color:blue;">Details of Available Food</h1>
  <div id="button"><a href="home.html" onclick="return confirm('Do you really want to exit this Page?');">Logout</a></div>
<table id="tab" border="2">
<tr>
<th>Name </th>
<th>Phone Number</th>
<th>Email ID</th>
<th>Food Type</th>
<th>Date of cooking</th>
<th>Quantity</th>
<th>Address</th>
<th>Status</th>
</tr>

<?php
include "db_conn.php";
error_reporting(0);
$query="select * from fooddetails";
$data=mysqli_query($conn,$query);
$total=mysqli_num_rows($data);

if($total!=0)
{
	while($result=mysqli_fetch_assoc($data))
	{
		echo "
		<tr>
	<td>".$result['name']."</td>
	<td>".$result['phnno']."</td>
    <td>".$result['email']."</td>
	<td>".$result['food']."</td>
	<td>".$result['date']."</td>
	<td>".$result['quantity']."</td>
	<td>".$result['address']."</td>
  <td><a href='request.html'>REQUEST</td>

	</tr>
	";
	}
}
else
{
	echo "No Food Available";
}
?>
</table>
</body>
</html>
