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
function normali_pana(array $panos): array
{
    $results = [];
    foreach ($panos as $pana) {
        if ($pana['graži'] && $pana['protinga']) {
            $results[] = $pana;
        }
    }
    return $results;
}

$normali = normali_pana($panos);
$result = 'Graži ir protinga: ';
?>

<html>
<head>
    <title>Panos</title>
    <style>

    </style>
</head>
<body>
<ul>
    <?php foreach($normali as $pana): ?>
        <li><?php print $result;?><?php print $pana['vardas']?></li>
</ul>
</body>
</html>