<?php

include("ceksession.php");

$id_keranjang = $_GET["id"];

include("../env.php");

# Menu

$sql_menu = "SELECT keranjang.id, keranjang.id_akun, keranjang.jumlah, keranjang.keterangan, menu.nama, menu.foto FROM keranjang INNER JOIN menu ON keranjang.id_menu = menu.id WHERE keranjang.id = $id_keranjang AND keranjang.id_akun = $id_akun ";
$run_menu = mysqli_query($conn, $sql_menu);
$row_menu = mysqli_fetch_assoc($run_menu);



?>

<?php
include("head.php");
?>

<body>

    <?php
    include("nav.php");
    ?>

    <div class="container-menu">
        <div class="title-menu">Ubah Menu</div>
    </div>

    <div class="center-container-margin">
        <div class="container-margin">

            <div class="card card-margin-jumlah shadow" style="width: 290px;">
                <img src="../assets/image/file/<?php echo $row_menu["foto"]; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">
                        <?php echo $row_menu["nama"]; ?>
                    </h5>

                    <form action="proseseditmenu.php" method="post">

                        <div class="mt-4 mb-3">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah"
                                value="<?php echo $row_menu["jumlah"]; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="3"
                                placeholder="Panas, Dingin, Manis, 1 Panas dan 1 Dingin atau Lainnya"><?php echo $row_menu["keterangan"]; ?></textarea>
                        </div>




                        <input type="hidden" name="idkeranjang" value="<?php echo $row_menu["id"]; ?>">


                        <div class="mt-2"><button type="submit" class="btn btn-primary">Ubah</button>
                        </div>

                    </form>


                    <div class="mt-2"><button type="button" class="btn btn-danger"
                            onclick="history.back()">Kembali</button>
                    </div>

                </div>
            </div>





        </div>
    </div>

    <div class="blox-nav"></div>
</body>

</html>