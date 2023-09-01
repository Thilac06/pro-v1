<!DOCTYPE html>
<html>
<head>
  <title>Pie Chart</title>
  <!-- Include Google Charts library -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>
  <div id="pieChart" style="width: 600px; height: 400px;"></div>

  <?php
  // Fetch data from the database and convert it to JSON format
  $data = array();
  $data[] = ['Defect', 'Quantity'];
  
  // Replace with your database connection code
  $conn = mysqli_connect($servername, $username, $password, $database);
  
  $sql = "SELECT defect, SUM(quantity) AS total_quantity FROM details GROUP BY defect";
  $result = mysqli_query($conn, $sql);
  
  while ($row = mysqli_fetch_assoc($result)) {
      $data[] = [$row['defect'], (int)$row['total_quantity']];
  }
  
  mysqli_close($conn);
  
  // Convert data to JSON format
  $jsonData = json_encode($data);
  ?>

  <script type="text/javascript">
    // Load the Google Charts library
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable(<?php echo $jsonData; ?>);

      var options = {
        title: 'Defect Distribution',
        is3D: true
      };

      var chart = new google.visualization.PieChart(document.getElementById('pieChart'));
      chart.draw(data, options);
    }
  </script>
</body>
</html>
