<html>
<body>
<?php


$servername = "$OPENSHIFT_MYSQL_DB_HOST";
$username = "adminPirx1YN";
$password = "zNnqASjayr3w";
$database =  "php";

$conn = new mysqli($servername, $username, $password, $database);

$data = $_POST['data'];



$getdata = explode(',', $data);
$room = $getdata[0];
$issue = $getdata[1];
$worklog = $getdata[2];
if($room != "Room" && $issue !="Nothing"){

$sql = "INSERT INTO Tickets (room, issue, status, worklog) VALUES ('$room', '$issue', 'Pending Analyst', '$worklog')";
$conn->query($sql);
}
include('filldb.php');



?>
</body>
</html>
