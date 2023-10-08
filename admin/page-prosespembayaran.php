<?php

include("../env.php");

$sql_proses_pembayaran = "SELECT pesanan.id, pesanan.total_harga, pesanan.tanggal, pesanan.jam, pesanan.status_pembayaran, akun.nama FROM pesanan INNER JOIN akun ON pesanan.id_akun = akun.id WHERE pesanan.status_pembayaran = 'belum bayar' LIMIT 50";
$run_proses_pembayaran = mysqli_query($conn, $sql_proses_pembayaran);
$count_proses_pembayaran = mysqli_num_rows($run_proses_pembayaran);

# Format Rupiah
include("../utility/rupiah.php");

# Format Tanggal
include("../utility/tgl.php");

?>

<?php include("head.php"); ?>


<body>

    <?php include("nav.php"); ?>

    <div class="container-center">





        <?php

        if ($count_proses_pembayaran > 0) {
            ?>
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Proses Pembayaran</h5>
                    <p class="card-text">Siahkan verifikasi pembayaran dari pelanggan anda</p>

                </div>
            </div>


            <?php

            while ($row = mysqli_fetch_assoc($run_proses_pembayaran)) {
                ?>
                <div class="card shadow mt-3 mb-3">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $row["nama"]; ?>
                        </h5>
                        <div class="mt-2">Total pembayaran: <span class="fw-bolder ms-2">Rp
                                <?php echo rupiah($row["total_harga"]); ?>
                            </span> </div>
                        <div class="mt-2">Tanggal: <span class="fw-bolder ms-2">
                                <?php echo tgl($row["tanggal"]); ?>
                            </span> </div>
                        <div class="mt-2">Jam: <span class="fw-bolder ms-2">
                                <?php echo $row["jam"]; ?>
                            </span> </div>
                        <div class="mt-2">Status Pembayaran: <span class="fw-bolder ms-2">
                                <?php echo $row["status_pembayaran"]; ?>
                            </span> </div>


                        <div class="mt-2"><a href="page-verifikasipembayaran.php?id=<?php echo $row["id"]; ?>"><button
                                    type="button" class="btn btn-primary">Verifikasi</button></a></div>
                    </div>


                </div>
                <?php
            }

        } else {
            ?>
            <div class="card shadow mt-3 mb-3">
                <div class="card-body">
                    <h5 class="card-title">Kosong</h5>
                    <p class="card-text">Belum ada pelanggan yang melakukan pesanan</p>

                </div>
            </div>
            <?php
        }
        ?>


    </div>



    <div class="blox-nav"></div>
</body>

</html>