<?php

$id_pesanan = $_GET["id"];

include("../env.php");


$sql_proses_pembayaran = "SELECT pesanan.status_pesanan, akun.nama FROM pesanan INNER JOIN akun ON pesanan.id_akun = akun.id WHERE pesanan.id = $id_pesanan";
$run_proses_pembayaran = mysqli_query($conn, $sql_proses_pembayaran);
$row = mysqli_fetch_assoc($run_proses_pembayaran);


# Format Rupiah
include("../utility/rupiah.php");


?>

<?php include("head.php"); ?>


<body>

    <?php include("nav.php"); ?>

    <div class="container-center">

        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">Detail Pesanan</h5>
                <div class="card-text">Ini adalah detail pesanan pelanggan anda</div>

                <div class="mt-4">Atas Nama: <span class="fw-bolder ms-1">
                        <?php echo $row["nama"]; ?>
                    </span></div>
                <div class="mt-2">Status Pesanan: <span class="fw-bolder ms-1">
                        <?php echo $row["status_pesanan"]; ?>
                    </span></div>

                <div class="mt-4">
                    <span><button type="button" class="btn btn-primary"
                            onclick="selesai(<?php echo $id_pesanan; ?>)">Pesanan Selasai</button></span>

                    <span class="ms-2"><button type="button" class="btn btn-danger"
                            onclick="history.back()">Kembali</button></span>
                </div>





            </div>
        </div>

    </div>

    <?php include("component-detailpesanan.php"); ?>



    <div class="blox-nav"></div>

    <script src="../assets/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script>
        function selesai(id) {
            Swal.fire({
                title: 'Apakah pesanan sudah selesai dikirim ke pelanggan ?',
                showCancelButton: true,
                cancelButtonText: 'Batal',
                confirmButtonText: 'Ok',
                cancelButtonColor: '#d33',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    window.location = `page-pesananselesai.php?id=${id}`;
                }
            })
        }
    </script>
</body>

</html>