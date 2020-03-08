<<<<<<< HEAD
<?php
?>
<!doctype html>
<html>
<head>
    <title>PHP and HTML</title>
</head>
<body>
    <h1>Embed PHP in HTML</h1>

    <!--    Sample 1-->
</body>
</html>
=======
<?php

$print_title = 'dviratis';
$print_title = 'dviratis';

$rand = rand(0,2);

if ($rand == 1) {
$wheel = 'wheel1';
$saddle =  'saddle1';
$handlebar = 'handlebar1';
}
elseif ($rand == 2) {
$wheel = 'wheel2';
$saddle =  'saddle2';
$handlebar = 'handlebar2';
}
else {
$wheel = 'wheel3';
$saddle =  'saddle3';
$handlebar = 'handlebar3';
}

?>

<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <style>

    </style>
    <link rel="stylesheet" href="./css/main.css">
    <title><?php print $print_title; ?></title>
</head>
<body>
<div class="<?php print $ratai; ?>"></div>
<div class="<?php print $ratai; ?>"></div>
<div class="<?php print $sedyne; ?>"></div>
<div class="<?php print $vairas; ?>"></div>
<div class="kebulas"></div>
<div class="frame">
    <div class="wheel_back <?php print $wheel; ?>"></div>
    <div class="wheel_front <?php print $wheel; ?>"></div>
    <div class="saddle <?php print $saddle; ?>"></div>
    <div class="handlebar <?php print $handlebar; ?>"></div>
</div>
</body>
</html>
>>>>>>> 810d6712f4d7d9ea9ee3e9c23d5931ff4a371393
