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
        // Tạo canvas cho biểu đồ
        const canvas = document.getElementById('myChart');
        const ctx = canvas.getContext('2d');

        // Dữ liệu cho biểu đồ
        const data = {
        labels: ['Nông, lâm nghiệp, thủy sản', 'Công nghiệp chế biến, chế tạo', 'Hoạt động hành chính và hỗ trợ dịch vụ', 'Bán buôn và bán lẻ', 'Xây dựng', 'Hoạt động chuyên môn, khoa học và công nghệ', 'Dịch vụ lưu trú và ăn uống', 'Giáo dục đào tạo', 'Vận tải kho bãi'],
        datasets: [{
            label: 'Tỷ lệ (%)',
            data: [33.3, 16.7, 14.0, 14.0, 8.8, 5.3, 4.4, 2.6, 0.9],
            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#99FF99', '#C2C2F0', '#FFCC99', '#CDAA7D', '#66CDAA'],
            borderWidth: 1
        }]
        };

        // Tùy chọn cấu hình biểu đồ
        const options = {
        indexAxis: 'y', // Trục x là trục ngang
        // scales: {
        //     x: {
        //     stacked: true, // Cột xếp chồng lên nhau
        //     ticks: {
        //         beginAtZero: true // Bắt đầu trục x từ giá trị 0
        //     }
        //     }
        // },
        plugins: {
            title: {
            display: true,
            text: 'Biểu đồ 4: Phân bổ doanh nghiệp tham gia khảo sát theo ngành (%)'
            }
        }
        };

        // Tạo biểu đồ
        const myChart = new Chart(ctx, {
        type: 'bar', // Loại biểu đồ
        data: data,
        options: options
        });
    </script>
</body>

</html>
