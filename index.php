<?php

$h2 = 'Enemy war';

$my_soldier = 10;
$enemy_soldier = rand(5, 15);
$win_percentage = round($my_soldier / ($my_soldier + $enemy_soldier), 1)* 100;
$win_chance = rand(0,100);

$h1 = "Fight $my_soldier  $enemy_soldier";
$h2 = 'enemies_killed';

$fights = [];

for ($i = 0; $i < $my_soldier; $i++) {
    for($b=0; $b<$enemy_soldier; $b++){
        var_dump("my_soldier : {$i} kovoja su priesu: {$b}");
    }
}
//    $fights[$i]['enemies_killed'] = 0;
//    while($enemy_soldier){
//        var_dump("Cia yra enemies: {$enemy_soldier}");
//        $rand = rand(0, 100);
//        if ($win_chance >= $rand) {
//            $fights[$i]['enemies_killed'] += 1;
//            $enemy_soldier--;
//        } else {
//            break;
//        }
//}
//
//foreach($fights as $fight){
//    print"{$fight['enemies_killed']}";
//}
?>


<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/main.css">
    <title>Fight</title>
</head>
<body>
<main>
    <h1><?php print $h1; ?></h1>
    <h2><?php print $h2; ?></h2>
    <div class="fights-container">
        <?php foreach ($fights as $fight): ?>
             <div class="fight">
                <div class="my_soldier">M</div>
                <div class="hedge">-</div>
                <?php for ($i = 0;
                $i < $fight['enemies_killed'];
                $i++): ?>
                    <div class="enemy_soldier">E</div>
            <?php endfor; ?>
        </div>
        <?php endforeach; ?>
    </div>
</main>
</body>
</html>