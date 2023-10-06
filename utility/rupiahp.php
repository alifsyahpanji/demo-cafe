<?php

function rupiahp($angka)
{

    if ($angka == null) {
        echo "-";
    } else {
        $hasil_rupiah = number_format($angka, 0, ',', '.');
        return $hasil_rupiah;
    }


}

?>