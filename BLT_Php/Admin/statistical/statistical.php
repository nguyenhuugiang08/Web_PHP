<?php
require_once('../../database/dbhelper.php');
require_once('../../utils/utility.php');

require_once('../layout/admin_header.php');
?>
<div class="row p-5">
    <div class="col-md-6 mt-5 wrapper-tag">
        <div class="wrapper-tag__title">Thống Kê Doanh Thu</div>
        <canvas id="myChart" width="-1" height="-1"></canvas>
    </div>
</div>
<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    console.log(ctx.canvas.width)
    const labels = ['1','2','3','4','5','6','7','8','9','10','11','12',
    ];
    const data = {
        labels: labels,
        datasets: [{
            data: [65, 59, 80, 81, 56, 55, 40],
            borderColor: 'rgb(255,0,0)',
            data: [0, 10, 5, 2, 20, 30, 45],
            tension: 0.1
        }, ]
    };

    const myChart = new Chart(ctx, {
        type: 'line',
        data: data,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false,
                    position: 'top',
                },
                title: {
                    display: false,
                }
            }
        },
    });
</script>