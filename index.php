<?php


function do_it(&$array) {
    foreach ($array as $key => $item) {
        $array[$key] = 'bamboozled';
    }

}

$array = [
    'bamboozled' => 'no'
];

do_it($array);

print $array['bamboozled'];


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