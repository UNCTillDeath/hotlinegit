<?php

$servername = "$OPENSHIFT_MYSQL_DB_HOST";
$username = "adminFUq5Qku";
$password = "ZIB3z9IB-xLy";
$database =  "hotline";

$conn = new mysqli($servername, $username, $password, $database);

$sql = "CREATE TABLE IF NOT EXISTS Tickets
  (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    onyen VARCHAR(30),
    room  VARCHAR(30),
    issue VARCHAR(30),
    status VARCHAR(30),
    worklog VARCHAR(100),
    reg_date TIMESTAMP
  )";


  if ($conn->query($sql) === TRUE) {
      echo "Table Made";
  } else {
      echo "Error creating table: " . $conn->error;
  }
?>
