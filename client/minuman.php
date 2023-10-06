<?php

include("ceksession.php");
include("../env.php");

# Teh

$sql_menu_teh = "SELECT * FROM menu WHERE kategori = 'teh' AND stok = 'tersedia' ";
$run_menu_teh = mysqli_query($conn, $sql_menu_teh);
$cek_menu_teh = mysqli_num_rows($run_menu_teh);

# Kopi

$sql_menu_kopi = "SELECT * FROM menu WHERE kategori = 'kopi' AND stok = 'tersedia' ";
$run_menu_kopi = mysqli_query($conn, $sql_menu_kopi);
$cek_menu_kopi = mysqli_num_rows($run_menu_kopi);



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

    if ($cek_menu_teh > 0) {
        ?>

        <div class="container-menu">
            <div class="title-menu">Katagori Teh</div>
        </div>
        <div class="center-container-margin">
            <div class="container-margin">
                <?php
                while ($row_teh = mysqli_fetch_assoc($run_menu_teh)) {
                    ?>

                    <div class="card card-menu-margin shadow" style="width: 290px;">
                        <img src="../assets/image/file/<?php echo $row_teh["foto"]; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo $row_teh["nama"]; ?>
                            </h5>
                            <p class="card-text">Harga Rp
                                <?php echo rupiah($row_teh["harga"]); ?>
                            </p>
                            <a href="jumlah.php?id=<?php echo $row_teh["id"]; ?>" class="btn btn-primary">Pilih</a>
                        </div>
                    </div>

                    <?php
                }
    }

    ?>
        </div>
    </div>


    <?php

    if ($cek_menu_kopi > 0) {
        ?>

        <div class="container-menu">
            <div class="title-menu">Katagori Kopi</div>
        </div>

        <div class="center-container-margin">
            <div class="container-margin">
                <?php
                while ($row_kopi = mysqli_fetch_assoc($run_menu_kopi)) {
                    ?>

                    <div class="card card-menu-margin shadow" style="width: 290px;">
                        <img src="../assets/image/file/<?php echo $row_kopi["foto"]; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo $row_kopi["nama"]; ?>
                            </h5>
                            <p class="card-text">Harga Rp
                                <?php echo rupiah($row_kopi["harga"]); ?>
                            </p>
                            <a href="jumlah.php?id=<?php echo $row_kopi["id"]; ?>" class="btn btn-primary">Pilih</a>
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