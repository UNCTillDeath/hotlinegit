<html>
<body>
<?php

$servername = "$OPENSHIFT_MYSQL_DB_HOST";
$username = "adminPirx1YN";
$password = "zNnqASjayr3w";
$database =  "php";
$conn = new mysqli($servername, $username, $password, $database);

$data = $_GET['data'];


$sql = "SHOW TABLES";

$results = mysqli_query($conn,$sql);


while($rowitem = mysqli_fetch_array($results)){
  if( in_array($data, $rowitem)){

    $sql = "SELECT * FROM $data";


    $results = mysqli_query($conn,$sql);


     while($rowitem = mysqli_fetch_array($results)){
       echo "<option label ='$rowitem[1]' value='$rowitem[1]'>";
     }

  }
}




?>
</body>
</html>
