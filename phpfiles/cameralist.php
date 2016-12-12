<html>
<body>
<?php

$servername = "$OPENSHIFT_MYSQL_DB_HOST";
$username = "adminPirx1YN";
$password = "zNnqASjayr3w";
$database =  "php";

$conn = new mysqli($servername, $username, $password, $database);


  $sql = "SHOW TABLES";

 $results = mysqli_query($conn,$sql);


  while($rowitem = mysqli_fetch_array($results)){
    $building = str_replace('_', ' ', $rowitem[0]);
    echo "<option class = 'car-blue-text' label ='$building' value='$building'>";

  }

  ?>
</body>
</html>
