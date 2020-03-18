<?php

/**
 * funkcija generuojanti kvadratine matrica
 * @param $size
 * @return array
 */
function generate_matrix($size)
{
    $matrix = [];

    for ($x = 0; $x < $size; $x++) {
        for ($y = 0; $y < $size; $y++) {
            $matrix[$x][$y] = rand(0, 1);
        }
    }
    return $matrix;
}

function get_winning_rows($matrix){
    $winnings = [];

    foreach($matrix as $row_id => $columns)
        if(array_sum($columns) === count($columns)) {
            $winnings[] = $row_id;
        }
    }
    return $winnings;
}

$winning_row_indexes= get_winning_rows($matrix);


$matrix = generate_matrix(3);
var_dump($matrix);
?>


<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/main.css">
    <title>Matrix</title>
</head>
<body>
<div class="matrix">
    <?php foreach ($matrix as $row_id => $col): ?>
        <div class="col <?php print in_array($row_id, $winning_row_indexes) ; ?> ">
            <?php foreach ($row_id as $col): ?>
                <div class="<?php print ($col ? 'blue_square' : 'red_square'); ?>"></div>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>
