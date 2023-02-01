

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
$userid = $_POST['userid'];


// Insert the data into the database

$sql = "delete from register where userid='$userid'";

try
{
  if(mysqli_query($conn, $sql)) 
  {
    echo "deleted successfully";
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
