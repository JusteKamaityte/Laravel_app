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
        'graži' => true,
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
function gauti_normalias_panas(array $panos): array
{
    $results = [];

    foreach ($panos as $pana) {
        if ($pana['graži'] && $pana['protinga']) {
            $results[] = $pana;
        }
    }

    return $results;
}

$normali = gauti_normalias_panas($panos);
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
?>

<html>
<head>
    <title>Panos</title>
    <style>

    </style>
</head>
<body>
<ul>
    <?php foreach ($normali as $pana): ?>
        <li><?php print $result . $pana['vardas']; ?></li>
    <?php endforeach; ?>
    <li><?php print $get_random; ?> </li>
</ul>
</body>
</html>