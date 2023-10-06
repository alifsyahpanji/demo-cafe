<?php

session_start();

if ($_SESSION["id"] == null) {
    header("Location: auth.php");
    die();
}

$id_akun = $_SESSION["id"];

?>