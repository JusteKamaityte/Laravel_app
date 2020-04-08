<?php
require 'core/functions/html.php';

/**
 * // *F-cija kuri  ivyks, kai forma atitiks visus validacijos reikalavimus
 * // * @param $form
 * // * @param $safe_input
 * // */
function form_success($safe_input, $form)
{

}


/**
 *F-cija kuri  ivyks, kai forma neatitiks nors vieno validacijos reikalavimu
 * @param $form
 * @param $safe_input
 */
function form_fail(array $form, array $safe_input)
{

}

$form = [
    'attr' => [
        'action' => 'create.php',
        'method' => 'POST',
        'class' => 'form',
    ],
    'callbacks' => [
        'success' => 'form_success',
        'fail' => 'form_fail'
    ],
    'fields' => [
        'team' => [
            'name' => ' ',
            'type' => 'text',
            'validate' => [
                'validate_not_empty',
                'validate_team'
            ],
            'extra' => [
                'attr' => [
                    'class' => 'team',
                    'placeholder' => 'Team name',
                ],
            ],
        ],
    ],
    'buttons' => [
        'submit' => [
            'text' => 'Create',
            'name' => 'action',
        ],
    ],
];

//demo masyvas, kaip turėtų atrodyti, kai įrašysim į failą
//$teams = [
//    [
//        'team_name' => 'Raganosiai',
//        'players' => [
//            [
//                'name' => 'Pepper',
//                'score' => 5
//            ],
//            [
//                'name' => 'Dinosaur',
//                'score' => 7,
//            ],
//            [
//                'name' => 'Lama',
//                'score' => 2,
//            ],
//        ],
//    ],
//    [
//        'team_name' => 'Katės',
//        'players' => [
//            [
//                'name' => 'Tiger',
//                'score' => 3
//            ],
//            [
//                'name' => 'Wolf',
//                'score' => 1,
//            ],
//            [
//                'name' => 'Hiena',
//                'score' => 8,
//            ],
//        ],
//    ],
//];

var_dump($teams);
var_dump($teams[0]['players']);

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="app/assets/css/main.css">
    <title>Teams</title>
</head>
<body>

<?php include 'core/templates/team_form.tpl.php'; ?>

</body>
</html>

