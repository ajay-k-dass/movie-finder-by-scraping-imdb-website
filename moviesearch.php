<!DOCTYPE html>
<html>

<body>
<form action="" method="post">

  <input name="search" type="search" autofocus><input type="submit" name="button">

</form>

</body>
</html>
<?php
 $dbhost = "localhost";
 $dbuser = "localhost";
 $dbpass = "###123###";
 $db = "csv_db";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db);
 echo "success";
 if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $searchString =  $_POST["search"];
    $results = mysqli_query("SELECT * FROM tbl_name WHERE title LIKE %ss", $searchString);
    echo($results);
  





?>
