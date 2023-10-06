<?php
include("ceksession.php");

$id_keranjang = $_GET["id"];
$get_id_akun = $_GET["akun"];

include("../env.php");

if ($id_akun == $get_id_akun) {
    $sql_delete = "DELETE FROM keranjang WHERE id = $id_keranjang ";
    $run_delete = mysqli_query($conn, $sql_delete);

    if ($run_delete) {
        header("Location: keranjang.php");
        die();
    } else {
        echo "Error, ada kesalahan sistem. Mohon hubungi kami";
    }

} else {
    echo "Error, tidak bisa akses";
}


?>