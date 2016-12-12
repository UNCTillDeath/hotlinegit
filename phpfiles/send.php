<html>
<body>
<?php


$servername = "$OPENSHIFT_MYSQL_DB_HOST";
$username = "adminFUq5Qku";
$password = "ZIB3z9IB-xLy";
$database =  "hotline";

$conn = new mysqli($servername, $username, $password, $database);

$data = $_POST['data'];



$getdata = explode(',', $data);
$worklog = $getdata[1];
$status = $getdata[2];



$parse = explode('(', $getdata[0]);
$room = $parse[0];

$tmp = explode(')', $parse[1]);
$issue = $tmp[0];

$room = trim($room);


  $sql = "UPDATE Tickets SET worklog = '$worklog', status = '$status' WHERE room ='$room' AND issue = '$issue'";


$conn->query($sql);


$sql = "DELETE FROM Tickets WHERE status = 'Resolved'";

$conn->query($sql);



?>
</body>
</html>
