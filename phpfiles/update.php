<html>
<body>
<?php

$servername = "$OPENSHIFT_MYSQL_DB_HOST";
$username = "adminFUq5Qku";
$password = "ZIB3z9IB-xLy";
$database =  "hotline";

$conn = new mysqli($servername, $username, $password, $database);


  $sql = 'SELECT * FROM Tickets';
  $results = mysqli_query($conn,$sql);

  while($rowitem = mysqli_fetch_array($results)){

    $line = $rowitem['room'] . " (" . $rowitem['issue'] . ")";
    $click = 'move(' . '"' . $line . '"' .')';

    echo '<a class="dropdown-item car-blue-text clicke" onclick=' . '\'' . $click . '\''.'>' . $line .  '</a>';
  }

  ?>
</body>
</html>
