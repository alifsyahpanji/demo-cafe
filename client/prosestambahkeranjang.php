<?php

include("ceksession.php");

$id_menu = $_POST["idmenu"];

$jumlah = $_POST["jumlah"];
$keterangan = $_POST["keterangan"];

include("../env.php");

$sql_insert_keranjang = "INSERT INTO keranjang (id_akun, id_menu, jumlah, keterangan) VALUES ($id_akun, $id_menu, $jumlah, '$keterangan')";

$run_insert_keranjang = mysqli_query($conn, $sql_insert_keranjang);

if ($run_insert_keranjang) {
    header("Location: keranjang.php");
    die();
} else {
    echo "Ada kesalahan sistem, harap hubungi kami";
}


?>