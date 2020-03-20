<?php

/**
 *funkcija, kuri skaiciuoja kiek masyve yra elementu
 * @param $array
 * @param $val
 * @return int
 */
function count_array_values($array, $val)  {

    $count = 0;
    foreach($array as $item){
        if($item === $val){
            $count++;
        }
    }

    return $count;
}

/**
 *funkcija pakeicia array reiksmes
 * @param $array
 * @param $from
 * @param $to
 */
function replace_values(array &$array, $from, $to){

    foreach($array as $value) {
        if ($value === $from) {
            $value = $to;
        }
    }


$avys = [];

for ($x = 0; $x < 5; $x++) {

    if ($x === 0) {
        $avys[0] = 'blee';

    } else {
        $avys[$x] = &$avys[$x - 1];
    }
}

foreach ($avys as $key => $avis) {
    unset($avys[$key]);
    $avys[$key] = $avis;

}


var_dump($avys);
replace_value(array  &$array, $from, $to)
?>

<html>
<head>
    <title>&</title>
    <style>

    </style>
</head>
<body>

</body>
</html>