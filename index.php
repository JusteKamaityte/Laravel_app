<?php
$x = 0;
function change_x(&$x){
    $x = 1;
}
change_x($x);

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