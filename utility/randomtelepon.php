<?php
function randomTelepon()
{
    $randomnumber = rand(100000000, 999999999);
    $stringnumber = (string) $randomnumber;
    $telepon = "081" . $stringnumber;

    return $telepon;
}

?>