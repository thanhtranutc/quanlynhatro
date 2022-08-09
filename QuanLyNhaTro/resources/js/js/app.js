import $ from 'jquery';
import { Chart, registerables } from "chart.js";
Chart.register(...registerables);

$.ajax({
    url: "api/statistics",
    type: 'GET',
    dataType: 'json',
    success: function (data, textStatus, xhr) {
        var d = document.getElementById('myChart');
        var ctx = d.getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
                datasets: [{
                    label: '#Tiền trọ',
                    data: data.totalPrice,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                },
                {
                    label: '#Tiền nợ',
                    data: data.totalDebt,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }
                ],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    },
    error: function (xhr, textStatus, errorThrown) {
        console.log('Error in Operation');
    }
});
