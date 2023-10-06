<?php

include("ceksession.php");

$id_menu = $_POST["idmenu"];

$jumlah = $_POST["jumlah"];
$keterangan = $_POST["keterangan"];

include("../env.php");

# SQL Insert
$sql_insert_keranjang = "INSERT INTO keranjang (id_akun, id_menu, jumlah, keterangan) VALUES ($id_akun, $id_menu, $jumlah, '$keterangan')";


#SQL Select
$sql_cek_item = "SELECT id, jumlah FROM keranjang WHERE id_menu = $id_menu ";
$run_cek_item = mysqli_query($conn, $sql_cek_item);
$count_cek_item = mysqli_num_rows($run_cek_item);

if ($count_cek_item > 0) {
    $row_cek_item = mysqli_fetch_assoc($run_cek_item);

    $id_keranjang = $row_cek_item["id"];

    $jumlah_update = $row_cek_item["jumlah"] + $jumlah;

    $sql_update = "UPDATE keranjang SET jumlah = $jumlah_update, keterangan = '$keterangan' WHERE id = $id_keranjang";

    $run_update = mysqli_query($conn, $sql_update);

    if ($run_update) {
        header("Location: keranjang.php");
        die();
    } else {
        echo "Ada kesalahan sistem, harap hubungi kami";
    }


} else {
    $run_insert_keranjang = mysqli_query($conn, $sql_insert_keranjang);

    if ($run_insert_keranjang) {
        header("Location: keranjang.php");
        die();
    } else {
        echo "Ada kesalahan sistem, harap hubungi kami";
    }

}




?>