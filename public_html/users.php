<?php
require '../bootloader.php';


$table = [
    'thead' => [
        'Klausimas',
        'Taip (%)'
    ],
    'tbody' => [


    ],
];

var_dump($table);

//ar reikia apsirasyti f-cija success table?


//masyvas, tam ,kad galėtume pagal klausimo id gauti patį klausimo tekstą
$questions = [
    'question_1' => 'Ar laikai kardaną?',
    'question_2' => 'Ar pili į baką ?',
    'question_3' => 'Ar rūkai žolių arbatą?',
];


$data = file_to_array(DB_FILE) ?: [];

$stats = [];

foreach ($data as $response) {
    foreach ($response as $question_id => $answer) {
        if (!isset($stats[$question_id])) {
            $stats[$question_id] = 0;
            if ($answer = 'taip') {
                $stats[$question_id]++;
            }
        }
    }
};

$visits = count($data);

foreach ($stats as $question_id => $count) {
    $table['tbody'][] = [
        $questions[$question_id],
        round($count / $visits * 100)
    ];
}


$table['tbody'] = file_to_array(DB_FILE);

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Duomenų lentelė</title>
</head>
<body>

<?php include '../core/templates/table.tpl.php'; ?>
</body>
</html>

