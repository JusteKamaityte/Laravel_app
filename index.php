<?php
$title = 'Sriuba';
$soup_ml = rand(400,700);
$soup_temp = rand(15, 40);
$piss_ml = rand(100,350);
$piss_temp = 36.4;

$soup_piss_temp = round(($soup_ml * $soup_temp + $piss_ml * $piss_temp) / ($soup_ml + $piss_ml), 1);

$h1 = 'Sriubos prognoze';
$p1 = "Pradzioje puode buv $soup_ml ml. $soup_temp C. sriubos";
$p2 = "I puoda primyzus $piss_ml ml., sriubos temperatura patapo $soup_piss_temp C.";

?>



<html>
<head>
    <meta charset="utf-8">
    <title><?php print $print_title?></title>
</head>
<body>
    <h1><?php print $h1 ?></h1>
    <p><?php print $p1 ?></p>
    <p><?php print $p2 ?></p>
</body>
</html>

