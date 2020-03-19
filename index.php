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

/**
 * funkcija išfiltruojanti iš masyvo pagal griežtus parametrus
 * @param array $array
 * @param $conditions
 * @return array
 */
function filter(array $array, $conditions): array{

    /**
     * Condition masyvas
     *
     * 'graži' => true,
     * 'protinga' => true
     */
    $conditions_results = [];

    foreach ($array as $item) {
        $match = true;
        /**
         * $item = [
         * 'vardas' => 'Monika',
         * 'graži' => true,
         * 'protinga' => false
         * ],
         */

        foreach($conditions as $condition_key => $condition_value){
            /**
             * $condition_key = 'grazi'
             * $condition_value = true
             */
            var_dump("tikrinam indeksą $condition_key, verte $condition_value");
            var_dump($item[$condition_key] . '!==' .$condition_value);
            //$item['grazi'] ar nelygu true?
            if($item[$condition_key] !== $condition_value){
               // suveikia, nes $item['grazi'] = false;

                $match = false;
                var_dump('neatitinka');
                break;//nebera prasmes tikrinti conditions nes vienas netiko
                }
            }
            //jei visi conditions lygo lygus true, tai i resultus itraukiam i masyva
            if($match){
                $conditions_results[] = $item;
                var_dump('isvada: itraukiam i rezultatus');
            }
        }
    return $conditions_results;
}

var_dump(filter($panos, $conditions = [
    'graži' => true,
    'protinga' => true
    ]));
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