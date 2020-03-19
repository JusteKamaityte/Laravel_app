<?php

/**
 * funkcija, generuojanti kvadratinę matricą
 *
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
/**
* @param $matrix
 */
function get_winning_rows(array $matrix): ?array
{

    $winners = [];

    foreach($matrix as $row_key=> $row){
        $comparison = $row[0];
        $is_winner = true;

        foreach ($row as $col) {
            if ($col != $comparison) {
                $is_winner = false;
                break;
            }
        }

        // Jeigu eilutė laiminga, įtraukiame
        // jos raktą į laimingų eilučių masyvą
        if ($is_winner) {
            $winners[] = $row_key;
        }
    }

    return empty(!$winners) ? $winners : null;
}

$array = generate_matrix(3);
$winners = get_winning_rows($array);

?>

<html>
<head>
    <title>Matrica</title>
    <style>
        .matrix {
            width: 350px;
        }

        .row {
            display: flex;
            flex-direction: row;
        }

        .row div {
            height: 100px;
            width: 100px;
            margin: 10px;
        }

        .blue {
            background-color: blue;
        }

        .green{
            background-color: green;
        }

        .win {
            border: solid 2px red;
        }
    </style>
</head>
<body>
<div class="matrix">
    <?php foreach ($array as $key => $row): ?>
        <div class="row <?php print in_array($key, $winners) ? 'win' : ''; ?>">
            <?php foreach ($row as $item): ?>
                <div class="<?php print $item ? 'blue' : 'green'; ?>"></div>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>