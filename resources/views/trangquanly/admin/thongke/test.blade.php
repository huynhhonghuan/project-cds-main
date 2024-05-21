<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biểu đồ lục giác - Mức độ sẵn sàng chuyển đổi số</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
</head>

<body>
    <canvas id="myChart" width="400" height="400"></canvas>
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

        console.log(datasets);

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
