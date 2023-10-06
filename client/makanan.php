<?php

include("ceksession.php");
include("../env.php");

# Makanan

$sql_menu_makanan = "SELECT * FROM menu WHERE kategori = 'makanan' AND stok = 'tersedia' ";
$run_menu_makanan = mysqli_query($conn, $sql_menu_makanan);
$cek_menu_makanan = mysqli_num_rows($run_menu_makanan);



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



    <?php

    if ($cek_menu_makanan > 0) {
        ?>

        <div class="container-menu">
            <div class="title-menu">Katagori Makanan</div>
        </div>

        <div class="center-container-margin">
            <div class="container-margin">
                <?php
                while ($row_makanan = mysqli_fetch_assoc($run_menu_makanan)) {
                    ?>

                    <div class="card card-menu-margin shadow" style="width: 290px;">
                        <img src="../assets/image/file/<?php echo $row_makanan["foto"]; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo $row_makanan["nama"]; ?>
                            </h5>
                            <p class="card-text">Harga Rp
                                <?php echo rupiah($row_makanan["harga"]); ?>
                            </p>
                            <a href="jumlah.php?id=<?php echo $row_makanan["id"]; ?>" class="btn btn-primary">Pilih</a>
                        </div>
                    </div>

                    <?php
                }
    }

    ?>
        </div>
    </div>





    <div class="blox-nav"></div>
</body>

</html>