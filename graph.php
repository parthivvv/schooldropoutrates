<!DOCTYPE HTML>
<html>
<head>
  <title>Gender Breakdown</title>
  <!-- Load the Google Charts library -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <style>
    body {
    background-image: url('kids.jpg');
    background-size: cover;
}
    /* Style the chart container */
    #chart_div {
        
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0 auto; 
    position: relative;
    top: 250px;

      width: 25%;
      height: 50%;
      border: 1px solid #ccc;
    padding: 20px;
    box-shadow: 2px 2px 5px #ccc;
    background-color: rgba(255, 255, 255, 0.8);
    }
  </style>
</head>
<body>
  <!-- Chart will be drawn inside this div -->
  <div id="chart_div"></div>
  <button style="
                      border: none;
                      border-radius: 4px;
                      color: white;
                      padding: 12px 32px;
                      position:absolute;
                      left:700px;
                      bottom:80px;
                      text-align: center;
                      text-decoration: none;
                      display: inline-block;
                      font-size: 16px;
                      margin: 4px 2px;
                      cursor: pointer;
                      background-color:slategray;" onclick="history.go(-1)">Go Back</button>

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

  // Retrieve the data from the 'register' table
  $sql = "SELECT gender, COUNT(*) as count FROM register GROUP BY gender";
  $result = mysqli_query($conn, $sql);

  // Convert the data from the MySQL result set into a format that can be used by Google Charts
  $data = array();
  $data[] = array('Gender', 'Count');
  while ($row = mysqli_fetch_array($result)) {
    $data[] = array($row['gender'], (int) $row['count']);
  }

  // Close the connection
  mysqli_close($conn);
  ?>

  <script>
  // Create a function that will be called when the page loads and will create the pie chart
  function drawChart() {
    // Create the data table
    var data = google.visualization.arrayToDataTable(<?php echo json_encode($data); ?>);

    // Set chart options
    var options = {
      title: 'Gender Breakdown'
      
      
    };

    // Instantiate and draw the chart
    var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
    chart.draw(data, options);
  }

  // Load the Google Charts library and call the drawChart function when the page loads
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);
  </script>
</body>
</html>
