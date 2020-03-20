<?php

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