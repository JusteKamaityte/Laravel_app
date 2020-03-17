<?php


function pirminis($x){
    for($i = 2; $i <= $x / 2; $i++){
        if($x % $i == 0) {
            return false;
        }
    }
         return true;
}

/**
 * @param $x pirmas skaicius
 * @param $y antras skaicius
 * @return mixed
 */
    function sum($x, $y){
        $sum = $x + $y;
        return $sum;
    }

/**
 * @param $x pirmas skaicius
 * @param $y antras skaicius
 * @return bool|mixed
 */

    function sum_if_prime($x, $y) {
        if(pirminis($x) && pirminis($y)){
            return sum(pirminis($x), $y);
        }else {
            return false;
        }
    }

$x= rand(1, 100);
$y = rand(1, 100);
$sum = sum_if_prime($x, $y);

$p1 = pirminis($x) ? "{$x} yra pirminis skaicius" : "{$x} nera pirminis skaicius";
$p2 = pirminis($y) ? "{$y} yra pirminis skaicius" : "{$y} nera pirminis skaicius";
$p3 = $sum ? "Pirm. sk. suma: {$sum}" : "--";
?>


<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/main.css">
    <title>Pirminiai skaiciai</title>
</head>
<body>
<p><?php print $p1 ?></p>
<p><?php print $p2 ?></p>
<p><?php print $p3 ?></p>
</body>
</html>
