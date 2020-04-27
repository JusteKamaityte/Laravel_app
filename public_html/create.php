<?php
//require '../bootloader.php';
//
//
//$title = 'Create';
//
//$form = [
//    'fields' => [
//        'team_name' => [
//            'label' => 'Team name',
//            'type' => 'text',
//            'validate' => [
//                'validate_not_empty',
////                'validate_team'
//            ],
//            'extra' => [
//                'attr' => [
//                ],
//            ],
//        ],
//    ],
//    'buttons' => [
//        'submit' => [
//            'text' => 'Create',
//        ],
//    ],
//    'callbacks' => [
//        'success' => 'form_success',
//    ],
//];
//
///**
// * @param $safe_input
// * @param $form
// */
//function form_success($safe_input, $form)
//{
//    $data = file_to_array(TEAMS_FILE) ?: [];
//    $data[] = [
//        'team_name' => $safe_input['team_name'],
//        'players' => []
//    ];
//
//    array_to_file($data, TEAMS_FILE);
//
//    setcookie('submit', 1, time() + (3600), "/");
//    header("Location: /join.php");
//}
//
//if (isset($_COOKIE['submit'])) {
//    header("Location: /join.php");
//}
//
//if ($_POST) {
//    $safe_input = get_filtered_input($form);
//   validate_form($form, $safe_input);
//}
//
//?>
<!--<!DOCTYPE html>-->
<!--<html lang="en" dir="ltr">-->
<!--<head>-->
<!--    <meta charset="utf-8">-->
<!--    <link rel="stylesheet" href="app/assets/css/main.css">-->
<!--    <title>--><?php //print $title ;?><!--</title>-->
<!--</head>-->
<!--<body>-->
<!--<section>-->
<!--        --><?php //include 'core/templates/form.tpl.php'; ?>
<!--</section>-->
<!---->
<!--</body>-->
<!--</html>-->
<!---->
