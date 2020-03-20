<?php

$avys = [];

for ($x = 0; $x < 5; $x++) {

    if ($x === 0) {
        $avys[0] = 'blee';
    } else {
        $avys[$x] = &$avys[$x - 1];
    }
}


var_dump($avys);
$result = 'avys sako : ' .$avys[0];
?>

<html>
<head>
    <title>&</title>
    <style>

    </style>
</head>
<body>
<p><?php print $result; ?></p>

</body>
</html>