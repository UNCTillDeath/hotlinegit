<?php

$servername = "$OPENSHIFT_MYSQL_DB_HOST";
$username = "adminPirx1YN";
$password = "zNnqASjayr3w";
$database =  "php";

$conn = new mysqli($servername, $username, $password, $database);


  if (($handle = fopen("Rooms.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {


        $building = $data[0];
        $roomnumber = $data[1];

      $sql = "CREATE TABLE IF NOT EXISTS $building
        (
          id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
          roomnumber VARCHAR(30) UNIQUE
        )";

        if ($conn->query($sql) === TRUE) {

        } else {
            echo "Error creating table: " . $conn->error;
        }

        $sql = "INSERT IGNORE INTO $building (roomnumber) VALUES('$roomnumber')";

        if ($conn->query($sql) === TRUE) {

        } else {
            echo "Error with entry " . $conn->error;
        }
    }
  }
?>
