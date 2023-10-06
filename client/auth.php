<?php

include("../utility/randomtelepon.php");
include("../utility/randomname.php");

include("../env.php");

$nama = randomName();
$telepon = randomTelepon();

$sql_cek_telepon = "SELECT telepon FROM akun WHERE telepon = '$telepon' ";
$run_telepon = mysqli_query($conn, $sql_cek_telepon);
$count_telepon = mysqli_num_rows($run_telepon);

if ($count_telepon > 0) {
    header("Location: auth.php");
    die();
}

$sql_insert = "INSERT INTO akun (nama, telepon) VALUES ('$nama', '$telepon')";
$run_insert = mysqli_query($conn, $sql_insert);


if ($run_insert) {
    $last_id = mysqli_insert_id($conn);
    session_start();

    $_SESSION["id"] = $last_id;

    header("Location: index.php");
    die();

}

?>