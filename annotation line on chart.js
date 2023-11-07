<!DOCTYPE html>
<html>
<head>
  <title>Chart.js Warning Line</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <canvas id="myChart" width="400" height="200"></canvas>

  <script>
    // Sample data
    var data = {
      labels: ['January', 'February', 'March', 'April', 'May'],
      datasets: [{
        label: 'My Dataset',
        data: [10, 20, 15, 25, 30],
        backgroundColor: 'rgba(75, 192, 192, 0.2)',
        borderColor: 'rgba(75, 192, 192, 1)',
        borderWidth: 1
      }]
    };

    // Configuration with annotation
    var options = {
      scales: {
        y: {
          beginAtZero: true
        }
      },
      plugins: {
        annotation: {
          annotations: {
            warningLine: {
              type: 'line',
              mode: 'horizontal',
              scaleID: 'y',
              value: 22, // Adjust this value to set the warning threshold
              borderColor: 'red',
              borderWidth: 2,
              label: {
                content: 'Warning Line',
                enabled: true,
                position: 'left'
              }
            }
          }
        }
      }
    };

    // Create the chart
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: data,
      options: options
    });
  </script>
</body>
</html>