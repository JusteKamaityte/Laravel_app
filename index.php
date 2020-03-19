<?php
$panos = [
    [
        'vardas' => 'Monika',
        'graži' => true,
        'protinga' => false
    ],
    [
        'vardas' => 'Julija',
        'graži' => false,
        'protinga' => false
    ],
    [
        'vardas' => 'Aistė',
        'graži' => false,
        'protinga' => true
    ],
    [
        'vardas' => 'Lina',
        'graži' => true,
        'protinga' => true
    ],
];
/**
 * @param $panos
 * @return array
 */
function get_normal_panos(array $panos): array
{
    $results = [];

    foreach ($panos as $pana) {
        if ($pana['graži'] && $pana['protinga']) {
            $results[] = $pana;
        }
    }

    return $results;
}

$normali = get_normal_panos($panos);
$result = 'Graži ir protinga: ';

/**
 * funkcija grazina random varda is array
 * @param array $panos
 * @return string
 */
function get_random_girl_name(array $panos): string
{
    $index = array_rand($panos);
    return $panos[$index]['vardas'];
}

$get_random = 'Atsitiktinė pana : ' . get_random_girl_name($panos);

/**
 * Funkcija apskaiciuoja normalių panų procentą
 * @param array $panos
 * @return float
 */
function percentage_normal_panos(array $panos): float
{

    $normal_panos = count(get_normal_panos($panos));
    $all_panos = count($panos);
    return round($normal_panos * 100 / $all_panos, 1);
}

$percentage = 'Normalių panų procentas: ' . percentage_normal_panos($panos) . '%';
var_dump(percentage_normal_panos($panos));

/**
 * gauti ko ieskai is array panos filtruojant ir naudojant globalia funkcija
 * @param $array
 * @param $col
 * @param $value
 * @return array
 */
function filter_array(array $array, $col, $value): array
{
    $results = [];

    foreach ($array as $pana) {
        if($pana[$col] === $value){
            $results[] = $pana;
        }
    }

    return $results;
}

var_dump(filter_array($panos, 'graži', true));

function filter_array(array $array, $conditions){
    $results = [];

    foreach ($array as $pana) {
        if($pana[$conditions] === true ){
            $results[] = $pana;
        }
    }
    return $results;
}

$conditions = [
    'graži' => true,
    'protinga' => true
]
var_dump(filter_array($panos, $conditions))
?>

<html>
<head>
    <title>Panos</title>
    <style>

    </style>
</head>
<body>
<h1><?php print $percentage; ?></h1>
<ul>
    <?php foreach ($normali as $pana): ?>
        <li><?php print $result . $pana['vardas']; ?></li>
    <?php endforeach; ?>
    <li><?php print $get_random; ?> </li>
</ul>
</body>
</html>