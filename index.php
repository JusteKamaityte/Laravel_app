<?php
$default_size = 200;
$object_size = $default_size;


if (isset($_POST['object'])) {
    $object_size = $default_size * (($_POST['object'] / 100) * 2);
    $slider = $_POST['object'];
}else{
    $object_size = 50 . 'px';
    $slider = 50;
}


var_dump($_POST);
?>

<html>
<head>
    <title>&</title>
    <style>
        .object_1, .object_2{
            display: inline-block;
            border-radius: 50%;
            background: salmon;
        }

    </style>
</head>
<body>
<form method="POST">
    <label>
        <input name="object"  type="range" min="1" max="100">
    </label>
    <button name="action" >Pasirinkite dydį</button>
</form>
<div class="object" >
    <div class="object_2"  style="height:<?php print $object_size; ?>;px; width:<?php print $object_size; ?>;px;"> </div>
    <div class="object_1"  style="height:<?php print $object_size; ?>;px; width:<?php print $object_size; ?>;px;"> </div>
</div>
<p><?php print $slider ?></p>
</body>
</html>