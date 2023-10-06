<?php

include("ceksession.php");


include("../env.php");

$sql_pesanan = "SELECT * FROM pesanan WHERE id_akun = $id_akun ORDER BY id DESC LIMIT 20";
$run_pesanan = mysqli_query($conn, $sql_pesanan);
$count_pesanan = mysqli_num_rows($run_pesanan);


# Get Nama

$sql_get_akun = "SELECT nama FROM akun WHERE id = $id_akun";
$run_get_akun = mysqli_query($conn, $sql_get_akun);
$row_get_akun = mysqli_fetch_assoc($run_get_akun);


# Format Rupiah

include("../utility/rupiah.php");

# Format Tanggal

include("../utility/tgl.php");



?>

<?php
include("head.php");
?>

<body>

    <?php
    include("nav.php");
    ?>

    <div class="container-menu">
        <div class="title-menu">Pesanan Anda</div>
    </div>

    <?php

    if ($count_pesanan > 0) {

        ?>

        <div class="center-container-margin">
            <div class="container-margin">

                <div class="card card-margin-kerajang size-card-informasi shadow">
                    <div class="card-body">
                        <h5 class="card-title-informasi">Informasi</h5>

                        <div class="deskripsi-informasi mt-3 mb-3">Silahkan menuju kasir untuk menyelesaikan pembayaran,
                            agar pesanan anda segera di proses.
                        </div>


                    </div>
                </div>


            </div>
        </div>


        <div class="center-container-margin">
            <div class="container-margin">


                <?php

                while ($row_pesanan = mysqli_fetch_assoc($run_pesanan)) {


                    ?>






                    <div class="card card-margin-kerajang shadow" style="width: 290px;">
                        <div class="card-body">
                            <h5 class="card-title">Rp
                                <?php echo rupiah($row_pesanan["total_harga"]); ?>
                            </h5>
                            <div>Tanggal: <span class="fw-bolder">
                                    <?php echo tgl($row_pesanan["tanggal"]); ?>
                                </span></div>
                            <div>Jam: <span class="fw-bolder">
                                    <?php echo $row_pesanan["jam"]; ?>
                                </span></div>

                            <div>Status Pesanan: <span class="fw-bolder">
                                    <?php echo $row_pesanan["status_pesanan"]; ?>
                                </span></div>
                            <div>Status Pembayaran: <span class="fw-bolder">
                                    <?php echo $row_pesanan["status_pembayaran"]; ?>
                                </span></div>

                            <div>Atas Nama: <span class="fw-bolder">
                                    <?php echo $row_get_akun["nama"]; ?>
                                </span></div>

                            <div class="mt-3">
                                <a href="detailpesanan.php?id=<?php echo $row_pesanan["id"]; ?>"
                                    class="btn btn-primary">Detail</a>

                            </div>

                        </div>
                    </div>









                    <?php
                }


                ?>
            </div>
        </div>
        <?php
    } else {
        ?>

        <div class="center-container-margin">
            <div class="container-margin">

                <div class="card card-margin-kerajang size-card-informasi shadow">
                    <div class="card-body">
                        <h5 class="card-title-informasi">Kosong</h5>
                        <p class="deskripsi-informasi">Silahkan lakukan pemesanan terlebih dahulu</p>
                    </div>
                </div>


            </div>
        </div>

        <?php
    }

    ?>








    <div class="blox-nav"></div>

    <script>
        window.setTimeout(function () {
            window.location.reload();
        }, 20000);
    </script>
</body>

</html>