<?php
include("ceksession.php");


$telepon = $_POST["telepon"];
$nama = $_POST["nama"];

include("../env.php");

$datastatus = false;

# Cek Nomor Telpon

$sql_get_telepon = "SELECT * FROM akun WHERE telepon = '$telepon' ";
$run_get_telepon = mysqli_query($conn, $sql_get_telepon);
$count_get_telepon = mysqli_num_rows($run_get_telepon);

if ($count_get_telepon > 0) {
    $row_get_telepon = mysqli_fetch_assoc($run_get_telepon);

    if ($row_get_telepon["id"] == $id_akun) {
        $sql_update = "UPDATE akun SET telepon = '$telepon', nama = '$nama' WHERE id = $id_akun";
        $run_update = mysqli_query($conn, $sql_update);
        $datastatus = true;
    }


} else {
    $sql_update = "UPDATE akun SET telepon = '$telepon', nama = '$nama' WHERE id = $id_akun";
    $run_update = mysqli_query($conn, $sql_update);
    $datastatus = true;
}





?>

<?php
include("head.php");
?>

<body>

    <?php
    include("nav.php");
    ?>

    <div class="container-menu">
        <div class="title-menu">Status</div>
    </div>


    <?php

    if ($datastatus) {
        ?>
        <div class="center-container-margin">
            <div class="container-margin">

                <div class="card card-margin-kerajang size-card-informasi shadow">
                    <div class="card-body">
                        <h5 class="card-title-informasi">Berhasil</h5>
                        <p class="deskripsi-informasi">Pengaturan profil anda berhasil disimpan</p>
                    </div>
                </div>


            </div>
        </div>


        <?php
    } else {
        ?>

        <div class="center-container-margin">
            <div class="container-margin">

                <div class="card card-margin-kerajang size-card-informasi shadow">
                    <div class="card-body">
                        <h5 class="card-title-informasi">Gagal</h5>
                        <p class="deskripsi-informasi">Nomor telepon telah digunakan</p>
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