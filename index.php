<?php
$roll_joints = true;

$joint1 = &$roll_joints;
$joint2 = &$joint1;
$joint3 = &$joint2;

 var_dump($joint1);
 ?>

<html>
<head>
    <title>&</title>
    <style>

    </style>
</head>
<body>
<p><?php print $joint1; ?></p>
<p><?php print $joint2; ?></p>
<p><?php print $joint3; ?></p>
</body>
</html>