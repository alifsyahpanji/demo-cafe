<?php
include("ceksession.php");

date_default_timezone_set("Asia/Jakarta");
$tanggal = date("Y-m-d");
$jam = date("H.i");
$total_harga = 0;


include("../env.php");

# Keranjang

$sql_menu = "SELECT keranjang.jumlah, keranjang.keterangan, menu.harga, menu.id AS id_menu FROM keranjang INNER JOIN menu ON keranjang.id_menu = menu.id WHERE keranjang.id_akun = $id_akun ";
$run_menu = mysqli_query($conn, $sql_menu);


# Insert Pesanan

$sql_pesanan = "INSERT INTO pesanan (id_akun, tanggal, jam, status_pesanan, status_pembayaran) VALUES ($id_akun, '$tanggal', '$jam', 'dalam antrian', 'belum bayar')";
$run_pesanan = mysqli_query($conn, $sql_pesanan);

$id_pesanan = mysqli_insert_id($conn);



while ($row_keranjang = mysqli_fetch_assoc($run_menu)) {
    $total_harga += $row_keranjang["harga"] * $row_keranjang["jumlah"];

    $id_menu = $row_keranjang["id_menu"];
    $jumlah = $row_keranjang["jumlah"];
    $harga = $row_keranjang["harga"];
    $keterangan = $row_keranjang["keterangan"];

    $sql_detail_pesanan = "INSERT INTO detail_pesanan (id_pesanan, id_menu, jumlah, harga, keterangan) VALUES ($id_pesanan, $id_menu, $jumlah, $harga, '$keterangan')";
    $run_detail_pesanan = mysqli_query($conn, $sql_detail_pesanan);

}

$sql_total_harga = "UPDATE pesanan SET total_harga = $total_harga WHERE id = $id_pesanan ";
$run_total_harga = mysqli_query($conn, $sql_total_harga);

$sql_delete_cart = "DELETE FROM keranjang WHERE id_akun = $id_akun";
$run_delete_cart = mysqli_query($conn, $sql_delete_cart);

if ($run_delete_cart) {
    header("Location: pesanan.php");
    die();
} else {
    echo "Error ada kesalahan sistem. Mohon hubungi kami";
}



?>