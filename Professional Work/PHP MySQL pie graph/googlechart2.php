<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          <?php echo $data; ?>
        ]);

        var options = {
          title: 'Countries',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
        
        
      }
      google.charts.setOnLoadCallback(drawChart2);
      function drawChart2() {
        var data = google.visualization.arrayToDataTable([
          <?php echo $data2; ?>
        ]);

        var options = {
          title: 'Gender',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('2piechart_3d'));
        chart.draw(data, options);
        
        
      }
    </script>
  </head>
  <body>
    <div id="piechart_3d" style="width: 500px; height: 500px;"></div>
    <div id="2piechart_3d" style="width: 500px; height: 500px;"></div>
  </body>
</html>