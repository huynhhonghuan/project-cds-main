<!DOCTYPE html>
<html>

<head>
    <title>Biểu đồ cột với nhiều cột</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <canvas id="myChart"></canvas>

    <script>
        const labels = ['Nhóm 1', 'Nhóm 2', 'Nhóm 3'];
    const datasets = [
      {
        label: 'Dữ liệu 1',
        data: [10, 20, 30],
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
      },
      {
        label: 'Dữ liệu 2',
        data: [15, 25, 35],
        backgroundColor: 'rgba(54, 162, 235, 0.2)',
      },
      {
        label: 'Dữ liệu 3',
        data: [20, 30, 40],
        backgroundColor: 'rgba(255, 206, 86, 0.2)',
      },
    ];

    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: labels,
        datasets: datasets,
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true,
            },
          }],
        },
      },
    });
    </script>
</body>

</html>
