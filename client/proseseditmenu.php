<?php

include("ceksession.php");

$id_keranjang = $_POST["idkeranjang"];

$jumlah = $_POST["jumlah"];
$keterangan = $_POST["keterangan"];

include("../env.php");

$sql_update_keranjang = "UPDATE keranjang SET jumlah = $jumlah, keterangan = '$keterangan' WHERE id = $id_keranjang AND id_akun = $id_akun ";

$run_update_keranjang = mysqli_query($conn, $sql_update_keranjang);

if ($run_update_keranjang) {
    header("Location: keranjang.php");
    die();
} else {
    echo "Ada kesalahan sistem, harap hubungi kami";
}


?>