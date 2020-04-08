<?php
//require 'bootloader.php';
//
///**
// *F-cija kuri  ivyks, kai forma atitiks visus validacijos reikalavimus
// * @param $form
// * @param $safe_input
// */
//function form_success($safe_input, $form)
//{
//    $data = file_to_array(DB_FILE) ?: [];
//    $data[] = $safe_input;
//    array_to_file($data, DB_FILE);
//
//
//    setcookie('submit', 1, time() + (3600), "/");
////    header("Location: /index.php");
//}
//
//if (isset($_COOKIE['submit'])) {
////    header("Location: /users.php");
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
//    $valid_fields = [];
//    foreach ($form['fields'] as $field_id => $field){
//        if(!isset($field['error'])){
//            $valid_fields[$field_id] = $field['value'];
//        }
//    }
//    $data = json_encode($valid_fields);
//    setcookie('data', $data, time() + 3600);
//
//    if (isset($_COOKIE['']))
//        var_dump('fail');
//    fill_form($form, $data);
//}
//
//
//$form = [
//    'attr' => [
//        'action' => 'index.php',
//        'method' => 'POST',
//        'class' => 'form',
//    ],
//    'callbacks' => [
//        'success' => 'form_success',
//        'fail' => 'form_fail'
//    ],
//    'fields' => [
//        'question_1' => [
//            'label' => 'Ar laikai kardaną?',
//            'type' => 'radio',
//            'options' => [
//                'taip' => 'taip',
//                'ne' => 'ne',
//            ],
//        ],
//        'question_2' => [
//            'label' => 'Ar pili į baką?',
//            'type' => 'radio',
//            'options' => [
//                'taip' => 'taip',
//                'ne' => 'ne',
//            ],
//        ],
//        'question_3' => [
//            'label' => 'Ar rūkai žolių arbatą?',
//            'type' => 'radio',
//            'options' => [
//                'taip' => 'taip',
//                'ne' => 'ne',
//            ],
//        ],
//    ],
//    'buttons' => [
//        'submit' => [
//            'text' => 'žiūrėti statistiką',
//            'name' => 'action',
//        ],
//    ],
//];
//
//
//if ($_POST) {
//
//    $filtered_input = get_filtered_input($form);
//    $validation = validate_form($form, $filtered_input);
//}
//
//
////setting cookies
//$cookie_value = 0;
//
//if (!isset($_COOKIE['user_id'])) {
//    $user_id = rand(1, 5);
//    setcookie('user_id', time() + 180);
//    var_dump('sukurtas useris ' . $user_id);
//    setcookie('visits', 1, time() + 180);
//} else {
//    var_dump('useris jau rastas ' . $_COOKIE['user_id']);
//    setcookie('visits', $_COOKIE['visits'] + 1, time() + 180);
//    var_dump($_COOKIE);
//}
//
//var_dump('user_id');
//
//
//?>
<!---->
<!--<!DOCTYPE html>-->
<!--<html lang="en" dir="ltr">-->
<!--<head>-->
<!--    <meta charset="utf-8">-->
<!--    <link rel="stylesheet" href="app/assets/css/main.css">-->
<!--    <title>Apklausa</title>-->
<!--</head>-->
<!--<body>-->
<!---->
<?php //include 'core/templates/form.tpl.php'; ?>
<!---->
<!--</body>-->
<!--</html>-->