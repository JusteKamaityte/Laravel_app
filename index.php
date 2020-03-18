<?php

$full_array = generate_matrix(3);

function generate_matrix($size){
    $matrix = [];
    for ($row_index = 0; $row_index <= $size; $row_index++) {
        $matrix[$row_index] = [];

        for ($col_index = 0; $col_index <= $size; $col_index++) {

            $matrix[$row_index][$col_index] = rand(0, 1);
        }
    }
    return $matrix;
}



var_dump($full_array);
?>


<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/main.css">
    <title>Matrix</title>
</head>
<body>
<div class="matrix_container">
    <?php foreach ($full_array as $row): ?>
        <div class="row_container">
            <?php foreach ($row as $col): ?>
                <?php if ($col == 0): ?>
                    <div class="blue_square"></div>
                 <?php else: ?>
                     <div class="red_square"></div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>
