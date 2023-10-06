<?php
function tgl($data_tgl)
{
    $newDate = date("d-F-Y", strtotime($data_tgl));
    return $newDate;
}

?>