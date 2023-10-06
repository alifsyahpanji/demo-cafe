<?php

include("ceksession.php");

$total_harga = 0;

include("../env.php");

$sql_menu = "SELECT keranjang.id, keranjang.jumlah, keranjang.keterangan, menu.nama, menu.harga, menu.foto FROM keranjang INNER JOIN menu ON keranjang.id_menu = menu.id WHERE keranjang.id_akun = $id_akun ORDER BY keranjang.id DESC";
$run_menu = mysqli_query($conn, $sql_menu);
$count_menu = mysqli_num_rows($run_menu);
$data_count = false;


# Format Rupiah

include("../utility/rupiah.php");

?>

<?php
include("head.php");
?>

<body>

    <?php
    include("nav.php");
    ?>

    <div class="container-menu">
        <div class="title-menu">Keranjang Anda</div>
    </div>

    <?php

    if ($count_menu > 0) {
        $data_count = true;
        ?>

        <div class="center-container-margin">
            <div class="container-margin">

                <div class="card card-margin-kerajang size-card-informasi shadow">
                    <div class="card-body">
                        <h5 class="card-title-informasi">Informasi</h5>

                        <div class="deskripsi-informasi mt-3 mb-3">Total pembayaran anda adalah
                            <div class="fw-bolder">Rp
                                <span id="totalharga"></span>
                            </div>
                        </div>

                        <a href="order.php" class="btn btn-primary">Pesan Sekarang</a>
                    </div>
                </div>


            </div>
        </div>


        <div class="center-container-margin">
            <div class="container-margin">


                <?php

                while ($row_keranjang = mysqli_fetch_assoc($run_menu)) {
                    $total_harga += $row_keranjang["harga"] * $row_keranjang["jumlah"];

                    ?>






                    <div class="card card-margin-kerajang shadow" style="width: 290px;">
                        <img src="../assets/image/file/<?php echo $row_keranjang["foto"]; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo $row_keranjang["nama"]; ?>
                            </h5>
                            <div>Jumlah: <span class="fw-bolder">
                                    <?php echo $row_keranjang["jumlah"]; ?>
                                </span></div>
                            <div>Keterangan: <span class="fw-bolder">
                                    <?php echo $row_keranjang["keterangan"]; ?>
                                </span></div>

                            <div class="mt-3">
                                <a href="editmenu.php?id=<?php echo $row_keranjang["id"]; ?>" class="btn btn-warning">Edit</a>
                                <a href="hapusmenu.php?id=<?php echo $row_keranjang["id"]; ?>&akun=<?php echo $id_akun; ?>"
                                    class="btn btn-danger">Hapus</a>
                            </div>

                        </div>
                    </div>









                    <?php
                }
                $harga_final = rupiah($total_harga);

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
                        <p class="deskripsi-informasi">Keranjang anda masih kosong, silahkan pilih menu terlebih dahulu</p>
                    </div>
                </div>


            </div>
        </div>

        <?php
    }

    ?>








    <div class="blox-nav"></div>

    <?php

    if ($data_count) {
        ?>
        <script>
            const elementHarga = document.getElementById("totalharga");
            elementHarga.innerHTML = "<?php echo $harga_final; ?>";
        </script>
        <?php
    }

    ?>

</body>

</html>