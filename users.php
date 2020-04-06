<?php
require 'bootloader.php';


$table = [
    'thead' => [
        'Klausimas',
        'Taip (%)',
    ],
    'tbody' => [
        'question_1' => [
            'Ar laikai kardaną?'
        ],
        'question_2' => [
            'Ar pili į baką ?'
        ],
        'question_3' => [
            'Ar rūkai žolių arbatą?'
        ],
    ],
];


//masyvas, tam ,kad galėtume pagal klausimo id gauti patį klausimo tekstą
$questions = [
    'question_1' => 'Ar laikai kardaną?',
    'question_2' => 'Ar pili į baką ?',
    'question_3' => 'Ar rūkai žolių arbatą?',
];

//į form success turi įsirašyti tokiu principu, kad kiekviena karta submitin'us forma su atsakymais, atsirastu toks data masyvas
$data[] = [
    [
        'question_1' => 'Taip',
        'question_2' => 'Taip',
        'question_3' => 'Taip,'
    ],
    [
        'question_1' => 'Ne',
        'question_2' => 'Ne',
        'question_3' => 'Ne',
    ],

];

$stats = [];


foreach ($data as $response) {
    foreach ($response as $question_id => $answer) {
        if (!isset($stats[$question_id])) {
            $stats[$question_id] = 0;

        }
        if ($answer = 'taip') {
            $stats[$question_id]++;
        }
    }
}
$respondents = count($data);

foreach ($stats as $question_id => $count) {
    $table['trow'][] = [
        $questions[$question_id],
        round($count / $respondents * 100)
    ];
}

$table['tbody'] = file_to_array(DB_FILE);

var_dump($stats);
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="app/assets/css/main.css">
    <title>Duomenų lentelė</title>
</head>
<body>
<h1></h1>
<?php include 'core/templates/table.tpl.php'; ?>
</body>
</html>

