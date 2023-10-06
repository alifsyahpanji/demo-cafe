<?php
function randomName()
{
    $names = array(
        'Hilda',
        'Maulana',
        'Nadya',
        'Feggy',
        'Peter',
        'Armelia',
        'Renaya',
        'Gracia',
        'Yolanda',
        'Aulia',
        'Rida',
        'Denis',
        'Putri',
        'Widi',
        'Ichsan',
        'Meisa',
        'Dita',
        'Rizky',
        'Annisa',
        'Mita',
        'Kurnia',
        'Dwi',
    );

    return $names[rand(0, count($names) - 1)];
}

?>