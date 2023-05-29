
<x-app-layout>
</x-app-layout>

<!DOCTYPE html>
<html>
<head>
  <title>Record Chart</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
  <style>
    #chart-container {
      width: 100%;
      max-width: 2000px; /* Adjust the maximum width as needed */
      height: 600px;
      overflow: hidden; /* Hide horizontal scroll bar */
      position: relative;
    }
    
    #chart-container canvas {
      display: block;
      width: 100%;
    }
    
    .scroll-button {
      position: absolute;
      top: 0;
      bottom: 0;
      width: 30px;
      background-color: rgba(0, 0, 0, 0.5);
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      z-index: 2;
      transition: opacity 0.3s ease;
    }
    
    .scroll-button:hover {
      opacity: 0.8;
    }
    
    .scroll-button.scroll-left {
      left: 0;
    }
    
    .scroll-button.scroll-right {
      right: 0;
    }
  </style>
</head>
<body>
  <div id="chart-container">
    <canvas id="line-chart"></canvas>
    <div class="scroll-button scroll-left">&lt;</div>
    <div class="scroll-button scroll-right">&gt;</div>
  </div>

  <script>
    var chartData = <?php echo json_encode($chartData); ?>;
    var numVisibleDataPoints = 30; // Number of data points to display at a time
    var startIdx = 0; // Starting index for the visible data points
    var endIdx = startIdx + numVisibleDataPoints; // Ending index for the visible data points

    var labels = chartData.map(function(item) {
      return item.Created_at;
    });

    var distances = chartData.map(function(item) {
      return item.Distance;
    });

    var ctx = document.getElementById('line-chart').getContext('2d');
    var chart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: labels.slice(startIdx, endIdx),
        datasets: [{
          label: 'Water Level Record',
          data: distances.slice(startIdx, endIdx),
          fill: false,
          borderColor: 'blue',
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
          x: {
            display: true
          },
          y: {
            display: true
          }
        },
        elements: {
          line: {
            tension: 1.0 // Adjust the tension value (between 0 and 1) for smoother curves
          }
        }
      }
    });

    // Scroll left button event listener
    document.querySelector('.scroll-button.scroll-left').addEventListener('click', scrollLeft);

    // Scroll right button event listener
    document.querySelector('.scroll-button.scroll-right').addEventListener('click', scrollRight);

    // Keyboard event listener
    document.addEventListener('keydown', function(event) 
    {
        if (event.key === 'ArrowLeft') 
        {
          scrollLeft();
        } 
      else if (event.key === 'ArrowRight') 
      {
        scrollRight();
      }
    });

    // Function to scroll left
      function scrollLeft() 
      {
        if (startIdx > 0) 
        {
          startIdx--;
          endIdx--;
          updateData();
        }
      }

    // Function to scroll right
    function scrollRight() 
    {
        if (endIdx < chartData.length) 
  
         {
            startIdx++;
            endIdx++;
            updateData();
          }
    }

    // Function to update the chart with new data
    function updateData() {
      chart.data.labels = labels.slice(startIdx, endIdx);
      chart.data.datasets[0].data = distances.slice(startIdx, endIdx);
      chart.update();
    }
  </script>
</body>
</html>

















