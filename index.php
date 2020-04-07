<?php
require 'bootloader.php';

/**
 *F-cija kuri  ivyks, kai forma atitiks visus validacijos reikalavimus
 * @param $form
 * @param $safe_input
 */
function form_success($safe_input, $form)
{
    $data = file_to_array(DB_FILE) ?: [];

    $data[] = $safe_input;
    $data[] =[
        'question_1' => $safe_input['question_1'],
        'question_2' => $safe_input['question_1'],
        'question_3' => $safe_input['question_1'],
    ];
    array_to_file($data, DB_FILE);

    var_dump('duomenys įrašyti teisingai');

    setcookie('submit', 1, time() + (3600), "/");
    header("Location: /index.php");
}
if(isset($_COOKIE['submit'])){
    header("Location: /users.php");
}


/**
 *F-cija kuri  ivyks, kai forma neatitiks nors vieno validacijos reikalavimu
 * @param $form
 * @param $safe_input
 */
function form_fail(array $form, array $safe_input)
{
    if(isset($_COOKIE['']))
    var_dump('fail');
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


//setting cookies
$cookie_value = 0;

if(!isset($_COOKIE['user_id'])){
    $user_id = rand(1,5);
    setcookie('user_id', time() + 180);
    var_dump('sukurtas useris' .$user_id);
    setcookie('visits', 1, time() +180);
}else{
    var_dump('useris jau rastas' .$_COOKIE['user_id']);
    setcookie('visits', $_COOKIE['visits'] +1, time() + 180);
    var_dump($_COOKIE);
}

var_dump('user_id');



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