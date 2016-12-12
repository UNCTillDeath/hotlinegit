<html>
<body>
<?php


$servername = "$OPENSHIFT_MYSQL_DB_HOST";
$username = "adminPirx1YN";
$password = "zNnqASjayr3w";
$database =  "php";
$conn = new mysqli($servername, $username, $password, $database);


  $sql = 'SELECT * FROM Tickets';
  $results = mysqli_query($conn,$sql);

/*

if(mysql_num_rows($results) > 0){}

  else {
    echo "<div class='placeholder'>
                    Congrats! You have no tickets assigned to you.
                </div>";
  }*/


  echo '<table class="table table-striped">
    <thead>
      <tr>
        <th>Room Number</th>
        <th>Issue</th>
        <th>Worklog</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>';


   while($rowitem = mysqli_fetch_array($results)) {
    echo '<tr>';
    echo '<td>' . $rowitem['room'] . '</td>';
    echo '<td>' . $rowitem['issue'] . '</td>';
    echo '<td>' . $rowitem['worklog'] . '</td>';
    echo '<td>' . $rowitem['status'] . '</td>';
    echo '</tr>';
  }
  echo '</tbody>';
  echo '</table>';



  mysqli_close($conn);

?>
</body>
</html>
