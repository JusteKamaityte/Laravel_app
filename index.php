<?php
$x = 0;
$b = &$x;

unset($b);

$b = 1;
var_dump($x);
?>

<html>
<head>
    <title>&</title>
    <style>

    </style>
</head>
<body>
<h1><?php print $x; ?></h1>
</body>
</html>