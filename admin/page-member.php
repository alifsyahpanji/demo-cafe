<?php

include("../env.php");

$batas = 50;
$halaman = isset($_GET['halaman']) ? (int) $_GET['halaman'] : 1;
$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

$previous = $halaman - 1;
$next = $halaman + 1;

$sql_get_data = "SELECT id FROM akun";
$data = mysqli_query($conn, $sql_get_data);
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);

$data_member = mysqli_query($conn, "SELECT * FROM akun LIMIT $halaman_awal, $batas");


?>

<?php include("head.php"); ?>


<body>

    <?php include("nav.php"); ?>

    <div class="container-center">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">Member</h5>
                <p class="card-text">Ini adalah data pelanggan anda total ada <span class="fw-bolder">
                        <?php echo $jumlah_data; ?> member
                    </span></p>




            </div>
        </div>
    </div>

    <?php include("pagination.php"); ?>


    <div class="container-center">
        <?php

        if ($jumlah_data > 0) {
            while ($row_akun = mysqli_fetch_assoc($data_member)) {
                ?>

                <div class="card shadow mt-3 mb-3">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $row_akun["nama"]; ?>
                        </h5>
                        <p class="card-text">Telepon:
                            <span class="fw-bolder ms-1">
                                <?php echo $row_akun["telepon"]; ?>
                            </span>
                        </p>
                    </div>
                </div>

                <?php
            }

        } else {
            ?>
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Data Kosong</h5>
                    <p class="card-text">Belum ada data pelanggan anda</p>
                </div>
            </div>


            <?php
        }

        ?>
    </div>



    <div class="blox-nav"></div>
</body>

</html>