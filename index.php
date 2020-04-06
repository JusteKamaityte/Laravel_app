<?php
require 'bootloader.php';
//
///**
// *F-cija kuri  ivyks, kai forma atitiks visus validacijos reikalavimus
// * @param $form
// * @param $safe_input
// */
//function form_success($safe_input, $form)
//{
//    var_dump('registracija teisinga');
//
//}
//
//
///**
// *F-cija kuri  ivyks, kai forma neatitiks nors vieno validacijos reikalavimu
// * @param $form
// * @param $safe_input
// */
//function form_fail(array $form, array $safe_input)
//{
//    array_to_file(['tuscia'], 'app/data/db_file.txt');
//}

//$test = array_to_file(db);


$form = [
    'attr' => [
        'action' => 'index.php',
        'method' => 'POST',
        'class' => 'form',
    ],
    'callbacks' => [
        'success' => 'form_success',
        'fail' => 'form_fail'
    ],
    'fields' => [
        'question_1' => [
            'label' => 'Ar laikai kardaną?',
            'type' => 'radio',
            'validate' => [
                'validate_not_empty',
            ],
            'select' => [
                'taip' => 'Taip',
                'ne' => 'Ne',
            ],
        ],
        'question_2' => [
            'label' => 'Ar pili į baką?',
            'type' => 'radio',
            'validate' => [
                'validate_not_empty',
            ],
            'select' => [
                'taip' => 'Taip',
                'ne' => 'Ne',
            ],
        ],
        'question_3' => [
            'label' => 'Ar rūkai žolių arbatą?',
            'type' => 'radio',
            'validate' => [
                'validate_not_empty',
            ],
            'select' => [
                'taip' => 'Taip',
                'ne' => 'Ne',
            ],
        ],
    ],
    'buttons' => [
        'submit' => [
            'text' => 'žiūrėti statistiką',
            'name' => 'action',
            'validate' => [
                'validate_not_empty',
            ],
        ],
    ],
];


if ($_POST) {

    $filtered_input = get_filtered_input($form);
    $validation = validate_form($form, $filtered_input);
}
var_dump($form);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="app/assets/css/main.css">
    <title>Apklausa</title>
</head>
<body>

<?php include 'core/templates/form.tpl.php'; ?>

</body>
</html>