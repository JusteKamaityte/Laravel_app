<?php
/**
 *funkcija skaičiuojanti kvadratini laipsnį
 * @param $x
 * @return float|int
 */
function square(float $x): float
{

    return $x ** 2;
}

$h2 = 'please enter a number';

if (isset($_POST['number'])) {
    $skaicius = $_POST['number'];

    $square_function = square($skaicius);

} else {
    $square_function = 'įveskite skaičių';
}


var_dump($_POST);
?>

<html>
<head>
    <title>&</title>
    <style>

    </style>
</head>
<body>
<form method="POST">
    <label for="num">Ką pakelti kvadratu: </label>
    <input id="num" name="number" type="number" min="1"  max="200" required/>
    <button name="action" value="square" >Kelti kvadratu</button>
</form>
    <h2> <?php print $square_function ?></h2>
</body>
</html>