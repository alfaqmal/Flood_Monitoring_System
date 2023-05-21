<x-app-layout>
</x-app-layout>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var chartData = <?php echo json_encode($chartData); ?>;

        var data = google.visualization.arrayToDataTable([
          ['Created_at', 'Distance'],
          ...chartData
        ]);

        var options = {
          title: 'Record',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="curve_chart" style="width: 1500px; height: 900px"></div>
  </body>
</html>

