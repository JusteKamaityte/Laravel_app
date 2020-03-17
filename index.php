<?php
$stats = [
    [
        'city' => 'Warsawa ',
        'virus_cases' => 50,

    ],
    [
        'city' => 'Vilnius ',
        'virus_cases' => 19,
    ],
    [
        'city' => 'Rome ',
        'virus_cases' => 1500,
    ],
    [
        'city' => 'Berlin ',
        'virus_cases' => 1000,
    ],
];

foreach ($stats as $stats_key => $stat) {
    if ($stat['virus_cases'] < 500) {
       $stat['is_closed'] = true;
    } else {
        $stat['is_closed'] = false;
    }
   if ($stat['is_closed']){
       $stat['text'] = 'Miestas ' .$stat['city'] .'uždarytas ' .$stat['virus_cases'] .' cases';
   }else{
       $stat['text'] = 'Miestas ' .$stat['city'] .'atidarytas ' .$stat['virus_cases'] .' cases';
   }
   $stats[$stats_key]['text'] = $stat;
}
var_dump($stats);

?>


<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/main.css">
    <title><?php print $title; ?></title>
</head>
<body>

<ul>
    <?php foreach ($stats as $city): ?>
        <li>
            <?php print $city['text']; ?>
        </li>
    <?php endforeach; ?>
</ul>
</body>
</html>
