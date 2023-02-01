<?php

// Username is root
$user = 'root';
$password = '';

// Database name is geeksforgeeks
$database = 'project';

// Server is localhost with
// port number 3306
$servername='localhost:3306';
$mysqlic = new Mysqli($servername, $user,
				$password, $database);

// Checking for connections
if ($mysqlic->connect_error) {
	die('Connect Error (' .
	$mysqlic->connect_errno . ') '.
	$mysqlic->connect_error);
}

// SQL query to select data from database
$sql = " SELECT * FROM register ORDER BY userid ";
$result = $mysqlic->query($sql);
$mysqlic->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>GFG User Details</title>
	<!-- CSS FOR STYLING THE PAGE -->
	<style>
        body {
    background-image: url('class.jpg');
    background-size: cover;
}
		table {
  margin: 0 auto;
  font-size: large;
  font-family: Arial, sans-serif;
  border: 1px solid black;
  border-collapse: collapse;
  box-shadow: 2px 2px 5px #ccc;
}

h1 {
  text-align: center;
  color: #006600;
  font-size: xxx-large;
  font-family: 'Gill Sans', 'Gill Sans MT', 'Calibri', 'Trebuchet MS', 'sans-serif';
}

td {
  background-color: #E4F5D4;
  border: 1px solid black;
  border-radius: 5px;
}

th,
td {
  font-weight: bold;
  border: 1px solid black;
  padding: 10px;
  text-align: center;
}

td {
  font-weight: lighter;
}

	</style>
</head>

<body>
	<section>
		<h1>School Drop Out Rates</h1>
		<!-- TABLE CONSTRUCTION -->
		<table>
			<tr>
				<th>User ID</th>
				<th>State Code</th>
				<th>Village ID</th>
				<th>Gender</th>
                <th>Age</th>
                <th>Reason To Drop</th>

			</tr>
			<!-- PHP CODE TO FETCH DATA FROM ROWS -->
			<?php
				// LOOP TILL END OF DATA
				while($rows=$result->fetch_assoc())
				{
			?>
			<tr>
				<!-- FETCHING DATA FROM EACH
					ROW OF EVERY COLUMN -->
				<td><?php echo $rows['userid'];?></td>
				<td><?php echo $rows['statecode'];?></td>
				<td><?php echo $rows['villageid'];?></td>
				<td><?php echo $rows['gender'];?></td>
                <td><?php echo $rows['age'];?></td>
				<td><?php echo $rows['reason'];?></td>

			</tr>
			<?php
				}
			?>
		</table>
		<button style="
                      border: none;
                      border-radius: 4px;
                      color: white;
                      padding: 12px 32px;
                      position:absolute;
                      left:625px;
                      bottom:80px;
                      text-align: center;
                      text-decoration: none;
                      display: inline-block;
                      font-size: 16px;
                      margin: 4px 2px;
                      cursor: pointer;
                      background-color: #4CAF50;" onclick="history.go(-1)">Go Back</button>
					  
					  <a style="
                      border: none;
                      border-radius: 4px;
                      color: white;
                      padding: 12px 32px;
                      position:absolute;
                      left:775px;
                      bottom:80px;
                      text-align: center;
                      text-decoration: none;
                      display: inline-block;
                      font-size: 16px;
                      margin: 4px 2px;
                      cursor: pointer;
                      background-color: #4CAF50;" href="http://localhost/form/graph.php">Gender Based Graph</a>
	</section>
</body>

</html>