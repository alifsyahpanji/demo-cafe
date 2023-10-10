<?php

include("../env.php");

$id_pesanan = $_POST["idpesanan"];
$total_harga = $_POST["totalharga"];
$jumlah_pembayaran = $_POST["jumlahpembayaran"];
$kembalian = $jumlah_pembayaran - $total_harga;

$sql_update = "UPDATE pesanan SET status_pesanan = 'proses', status_pembayaran = 'sudah bayar', jumlah_pembayaran = $jumlah_pembayaran, kembalian = $kembalian WHERE id = $id_pesanan";

$run_update = mysqli_query($conn, $sql_update);

if ($run_update) {
    header("Location: page-pembayaranselesai.php");
    die();
} else {
    echo "Proses gagal, ada kesalahan sistem. Mohon hubungi kami";
}



?>