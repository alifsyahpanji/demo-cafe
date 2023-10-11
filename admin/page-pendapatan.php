<?php

date_default_timezone_set("Asia/Jakarta");


$strBulanLalu = strtotime("- 1 month");
$bulanLalu = date("Y-m-d", $strBulanLalu);
$firstBulanLalu = date("Y-m-01", $strBulanLalu);
$lastBulanLalu = date("Y-m-t", $strBulanLalu);


$strBulanLalu2 = strtotime("- 2 month");
$bulanLalu2 = date("Y-m-d", $strBulanLalu2);
$firstBulanLalu2 = date("Y-m-01", $strBulanLalu2);
$lastBulanLalu2 = date("Y-m-t", $strBulanLalu2);


$strBulanLalu3 = strtotime("- 3 month");
$bulanLalu3 = date("Y-m-d", $strBulanLalu3);
$firstBulanLalu3 = date("Y-m-01", $strBulanLalu3);
$lastBulanLalu3 = date("Y-m-t", $strBulanLalu3);



$namaBulanLalu = date("F", $strBulanLalu);
$namaBulanLalu2 = date("F", $strBulanLalu2);
$namaBulanLalu3 = date("F", $strBulanLalu3);

?>

<?php include("head.php"); ?>


<body>

    <?php include("nav.php"); ?>

    <div class="container-center">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">Pendapatan</h5>
                <p class="card-text">Ini adalah data pendapatan anda selama 3 bulan terakhir</p>




            </div>
        </div>
    </div>

    <div class="container-center">
        <canvas id="myChart"></canvas>
    </div>



    <div class="blox-nav"></div>

    <script src="../assets/node_modules/chart.js/dist/chart.umd.js"></script>
    <script>
        const ctx = document.getElementById('myChart');



        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['<?php echo $namaBulanLalu3; ?>', '<?php echo $namaBulanLalu2; ?>', '<?php echo $namaBulanLalu; ?>',],
                datasets: [{
                    label: 'Jumlah Pendapatan',
                    data: [10000000, 12000000, 15000000,],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

</body>

</html>