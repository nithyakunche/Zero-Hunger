<html>
<head>
<title>Food Requests</title>
<style>
body{
  background-image: url("foodrequest2.jpg");

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


#tab tr:hover {background-color: #ddd;}

#tab th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #fa8072;
  color: white;
}
</style>
</head>

<body>
  <h1 style="text-align:center; color:black;">Details of Food Requests</h1>
  <div id="button"><a href="donorlogin.php">GoBack</a></div>
<table id="tab" border="2">
<tr>
<th>Name </th>
<th>Email Id</th>
<th>Phone Number</th>
<th>Address</th>
<th>Message</th>
</tr>

<?php
include "db_conn.php";
error_reporting(0);

$query="select * from request";
$data=mysqli_query($conn,$query);
$total=mysqli_num_rows($data);

if($total!=0)
{
	while($result=mysqli_fetch_assoc($data))
	{
		echo "
		<tr>
	<td>".$result['name']."</td>
	<td>".$result['email']."</td>
    <td>".$result['phnno']."</td>
	<td>".$result['address']."</td>
	<td>".$result['msg']."</td>
	</tr>
	";
	}
}
else
{
	echo "No Requests";
}
?>
</table>
</body>
</html>
