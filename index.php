<?php

/**
 * @param $x
 */
function change_x(&$x)
{
    $x = 1;
}

$x = 0;

change_x($x);


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