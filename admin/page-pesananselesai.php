<?php

$id_pesanan = $_GET["id"];

include("../env.php");

$sql_update = "UPDATE pesanan SET status_pesanan = 'selesai' WHERE id = $id_pesanan";
$run_update = mysqli_query($conn, $sql_update);

?>

<?php include("head.php"); ?>


<body>

    <?php include("nav.php"); ?>

    <div class="container-center">
        <div class="card shadow">
            <div class="card-body">

                <?php
                if ($run_update) {
                    ?>
                    <h5 class="card-title">Informasi</h5>
                    <p class="card-text">Pesanan pelanggan anda telah berhasil diselesaikan</p>
                    <?php
                } else {
                    echo "Error, ada kesalahan sistem. mohon hubungi kami";
                }
                ?>

            </div>
        </div>
    </div>



    <div class="blox-nav"></div>
</body>

</html>