<?php

$id_pesanan = $_GET["id"];

include("../env.php");

$sql_detail_pesanan = "SELECT id FROM detail_pesanan WHERE id_pesanan = $id_pesanan";
$run_detail_pesanan = mysqli_query($conn, $sql_detail_pesanan);



while ($row = mysqli_fetch_assoc($run_detail_pesanan)) {
    $id_detail_pesanan = $row["id"];
    $sql_delete_detailpesanan = "DELETE FROM detail_pesanan WHERE id = $id_detail_pesanan";
    $run_delete_detailpesanan = mysqli_query($conn, $sql_delete_detailpesanan);

}

$sql_delete_pesanan = "DELETE FROM pesanan WHERE id = $id_pesanan";
$run_delete_pesanan = mysqli_query($conn, $sql_delete_pesanan);

?>

<?php include("head.php"); ?>


<body>

    <?php include("nav.php"); ?>

    <div class="container-center">
        <div class="card shadow">
            <div class="card-body">

                <?php
                if ($run_delete_pesanan) {
                    ?>
                    <h5 class="card-title">Informasi</h5>
                    <p class="card-text">Pesanan pelanggan anda telah dihapus</p>
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