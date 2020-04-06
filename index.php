<?php
require 'bootloader.php';

/**
 *F-cija kuri  ivyks, kai forma atitiks visus validacijos reikalavimus
 * @param $form
 * @param $safe_input
 */
function form_success($safe_input, $form)
{
    $data= file_to_array(DB_FILE) ?: [];

    $data = $safe_input;
    var_dump('duomenys įrašyti teisingai');

}


/**
 *F-cija kuri  ivyks, kai forma neatitiks nors vieno validacijos reikalavimu
 * @param $form
 * @param $safe_input
 */
function form_fail(array $form, array $safe_input)
{
    array_to_file(['fail'], (DB_FILE));
}




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