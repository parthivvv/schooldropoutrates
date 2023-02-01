

<?php

// Connect to the database
$host = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbname = 'project';
$conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Escape user input to prevent SQL injection
$userid = mysqli_real_escape_string($conn, $_POST['userid']);
$statecode = mysqli_real_escape_string($conn, $_POST['statecode']);
$villageid = mysqli_real_escape_string($conn, $_POST['villageid']);
$gender = mysqli_real_escape_string($conn, $_POST['gender']);
$age = mysqli_real_escape_string($conn, $_POST['age']);
$reason = mysqli_real_escape_string($conn, $_POST['reason']);

// Insert the data into the database

$sql = "INSERT INTO register (userid, statecode, villageid, gender, age, reason) VALUES ('$userid', '$statecode', '$villageid', '$gender', '$age', '$reason')";

try
{
  if(mysqli_query($conn, $sql)) 
  {
    echo "New record created successfully";
  }
  else 
  {
    echo "Error: ";
  } 
} 
catch (Exception $e) {
  echo 'Caught exception: ';
}

// Close the connection
mysqli_close($conn);

?>
