<?php

 $dbhost = "localhost";
 $dbuser = "localhost";
 $dbpass = "###123###";
$con=mysqli_connect($dbhost, $dbuser, $dbpass) or die("Connect failed:".mysqli_connect_error());
mysqli_select_db($con,"csv_db") or die (mysqli_connect_error());
mysqli_close($con);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Search results</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<?php
    $query = $_GET['query']; 
         
        $query = htmlspecialchars($query); 
         
        $query = mysqli_real_escape_string($con,$query);
        $raw_results = mysqli_query($con,"SELECT * FROM tbl_name
            WHERE ('COL 2' LIKE '%".$query."%') ") or die(mysqli_error());
             if(mysqli_num_rows($con,$raw_results) > 0){ 
             while($results = mysqli_fetch_array($con,$raw_results)){
                       echo "<p>".$results['COL 2']."</p>";
                }
             }
        else{ 
            echo "No results";
        }
?>
</body>
</html>
