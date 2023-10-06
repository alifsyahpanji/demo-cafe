<?php

include("ceksession.php");

$id_pesanan = $_GET["id"];

include("../env.php");

# SQL Pesanan

$sql_pesanan = "SELECT * FROM pesanan WHERE id = $id_pesanan AND id_akun = $id_akun ";
$run_pesanan = mysqli_query($conn, $sql_pesanan);
$row_pesanan = mysqli_fetch_assoc($run_pesanan);


# SQL Detail Pesanan

$sql_detail_pesanan = "SELECT detail_pesanan.jumlah, detail_pesanan.jumlah * detail_pesanan.harga AS total_harga_item, menu.nama, menu.foto FROM pesanan INNER JOIN detail_pesanan ON pesanan.id = detail_pesanan.id_pesanan INNER JOIN menu ON detail_pesanan.id_menu = menu.id WHERE pesanan.id = $id_pesanan AND pesanan.id_akun = $id_akun ";
$run_detail_pesanan = mysqli_query($conn, $sql_detail_pesanan);
$count_detail_pesanan = mysqli_num_rows($run_detail_pesanan);



# Format Rupiah

include("../utility/rupiah.php");
include("../utility/rupiahp.php");

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
        <div class="title-menu">Detail Pesanan</div>
    </div>

    <?php

    if ($count_detail_pesanan > 0) {

        ?>

        <div class="center-container-margin">
            <div class="container-margin">

                <div class="card card-margin-kerajang size-card-informasi shadow">
                    <div class="card-body">
                        <h5 class="card-title-informasi">Informasi</h5>

                        <div class="deskripsi-informasi mt-3 mb-3">Total Harga
                            <div class="fw-bolder">Rp
                                <?php echo rupiah($row_pesanan["total_harga"]); ?>
                            </div>
                        </div>

                        <div class="deskripsi-informasi mt-3 mb-3">Jumlah Pembayaran
                            <div class="fw-bolder">Rp
                                <?php echo rupiahp($row_pesanan["jumlah_pembayaran"]); ?>
                            </div>
                        </div>

                        <div class="deskripsi-informasi mt-3 mb-3">Kembalian
                            <div class="fw-bolder">Rp
                                <?php echo rupiahp($row_pesanan["kembalian"]); ?>
                            </div>
                        </div>



                        <div class="mt-2"><button type="button" class="btn btn-danger"
                                onclick="history.back()">Kembali</button>
                        </div>

                    </div>
                </div>


            </div>
        </div>


        <div class="center-container-margin">
            <div class="container-margin">


                <?php

                while ($row_detail_pesanan = mysqli_fetch_assoc($run_detail_pesanan)) {

                    ?>






                    <div class="card card-margin-kerajang shadow" style="width: 290px;">
                        <img src="../assets/image/file/<?php echo $row_detail_pesanan["foto"]; ?>" class="card-img-top"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo $row_detail_pesanan["nama"]; ?>
                            </h5>
                            <div>Jumlah: <span class="fw-bolder">
                                    <?php echo $row_detail_pesanan["jumlah"]; ?>
                                </span></div>
                            <div>Total Harga Item: <span class="fw-bolder">
                                    <?php echo rupiah($row_detail_pesanan["total_harga_item"]); ?>
                                </span></div>


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
                        <p class="deskripsi-informasi">Detail pesanan anda kosong</p>
                    </div>
                </div>


            </div>
        </div>

        <?php
    }

    ?>








    <div class="blox-nav"></div>



</body>

</html>