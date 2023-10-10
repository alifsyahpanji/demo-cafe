<?php

$id_pesanan = $_GET["id"];

include("../env.php");

# SQL Pesanan

$sql_pesanan = "SELECT pesanan.id, pesanan.total_harga, akun.nama FROM pesanan INNER JOIN akun ON pesanan.id_akun = akun.id WHERE pesanan.id = $id_pesanan";
$run_pesanan = mysqli_query($conn, $sql_pesanan);
$row_pesanan = mysqli_fetch_assoc($run_pesanan);




# Format Rupiah

include("../utility/rupiah.php");

?>

<?php include("head.php"); ?>


<body>

    <?php include("nav.php"); ?>

    <div class="container-center">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title mb-4">Verifikasi Pembayaran</h5>
                <div class="mt-2">Atas Nama: <span class="fw-bolder">
                        <?php echo $row_pesanan["nama"]; ?>
                    </span></div>
                <div class="mt-2">Total Harga: <span class="fw-bolder">Rp
                        <?php echo rupiah($row_pesanan["total_harga"]); ?>
                    </span></div>

                <form action="proses-bayar.php" method="post">
                    <div class="mt-3 mb-3">
                        <label for="jumlahpembayaran" class="form-label mb-2">Jumlah Pembayaran: <span
                                class="fw-bolder">Rp <span id="jmlpembtext"></span>
                            </span></label>
                        <input type="number" class="form-control" id="jumlahpembayaran" name="jumlahpembayaran"
                            placeholder="10000" onchange="jumlahPembayaran()">
                    </div>

                    <button type="button" class="btn btn-success mt-3" onclick="bayar(this.form)">Bayar</button>


                    <button type="button" class="btn btn-primary mt-3 ms-2" onclick="history.back()">Kembali</button>

                    <button type="button" class="btn btn-danger mt-3 ms-2" onclick="hapus()">Hapus</button>

                    <input type="hidden" name="idpesanan" value="<?php echo $row_pesanan["id"]; ?>">
                    <input type="hidden" name="totalharga" value="<?php echo $row_pesanan["total_harga"]; ?>">
                </form>


            </div>
        </div>
    </div>

    <?php include("component-detailpesanan.php"); ?>



    <div class="blox-nav"></div>


    <script>
        let rupiahFormat = 0;

        function jumlahPembayaran() {
            const nilai = document.getElementById("jumlahpembayaran");
            const jmlPembText = document.getElementById("jmlpembtext");

            nilai.value = nilai.value.replace(/[\W]/g, '');

            rupiahFormat = nilai.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
            jmlPembText.innerHTML = rupiahFormat;


        }
    </script>



    <script src="../assets/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script>
        function bayar(form) {
            Swal.fire({
                title: `Sudah menerima pembayaran sebesar Rp ${rupiahFormat} ?`,
                showCancelButton: true,
                cancelButtonText: 'Batal',
                confirmButtonText: 'Ok',
                cancelButtonColor: '#d33',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    const elementJumlah = document.getElementById("jumlahpembayaran");
                    if (elementJumlah.value == "") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Mohon isi jumlah pembayaran'
                        })
                    } else {
                        form.submit();
                    }
                }
            })
        }
    </script>


    <script>
        function hapus() {
            Swal.fire({
                title: 'Apakah anda ingin menghapus pesanan ini ?',
                showCancelButton: true,
                cancelButtonText: 'Batal',
                confirmButtonText: 'Ok',
                cancelButtonColor: '#d33',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    window.location = "proses-hapuspesanan.php?id=<?php echo $id_pesanan; ?>";
                }
            })
        }
    </script>
</body>

</html>