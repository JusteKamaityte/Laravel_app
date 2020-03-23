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
        .anketa{
            display: grid;
            grid-template-column: 1;
            padding: 10px;
            background-color: grey;
        }


        button {
            color:white;
            background-color: black;
            outline: none;
            border: 0px solid black;
            padding:  10px 18px 10px 18px;
            margin-top: 20px;
        }


    </style>
</head>
<body>
<form method="POST">
    <label>
        <input name="object"  type="range" min="1" max="100">
    </label>
    <button name="action" >Choose your size</button>
</form>
<div class="object" >
    <div class="object_2"  style="height:<?php print $object_size; ?>;px; width:<?php print $object_size; ?>;px;"> </div>
    <div class="object_1"  style="height:<?php print $object_size; ?>;px; width:<?php print $object_size; ?>;px;"> </div>
</div>
<p><?php print $slider ?></p>
<div class="anketa">
    <form  method="POST">
        <div class="field_container">
            <div class="input-container">
                <input id="First name" type="text" name="First name" value="First name" required>
                <input id="First name" type="text" name="Last name" value="Last name">

            </div>
        </div>
        <div class="field_container">
            <div class="input-container">
                <h3>Favourite color</h3>
                <input type="color" name="color">
                <input type="color" name="color">
            </div>
        </div>
        <div class="field-container">
            <div class="input-container">
                <h3>Your email</h3>
                <input type="email" name="email" value="email@gmail.com">
            </div>
        </div>
        <div class="field-container">
            <div class="input-container">
                <input type="radio" name="sex" value="man">man<br>
                <input type="radio" name="sex" value="women">women<br>
            </div>
        </div>
        <div class="field-container">
            <h3>Enter your number</h3>
            <input type="tel" name="Phone number" value="eg. +370 123 45 678">
        </div>
        <button name="action" >register</button>
    </form>
</div>

</body>
</html>