function drawChart(ctx, labels, data, colors, type, title) {
    if (data !== null) {
        var myChart = new Chart(ctx, {
            type: type,
            data: {
                labels: labels,
                datasets: [{
                    label: 'Biểu đồ dữ liệu',
                    data: data,
                    backgroundColor: colors.map(color => color),
                    borderColor: colors.map(color => color.replace('0.2', '1')),
                    borderWidth: 2
                }]
            },
            options: {
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: title,
                    },
                },
            }
        });
    }
}
