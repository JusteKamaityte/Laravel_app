<?php
//require 'bootloader.php';
//
//$title = 'Join the team';
//
//$form = [
//    'fields' => [
//        'team_id' => [
//            'label' => 'Select team ',
//            'type' => 'select',
//            'options' => [],
//            'validate' => [
//                'validate_select'
//            ],
//            'extra' => [
//                'attr' => [
//                    'class' => 'select',
//                ],
//            ],
//        ],
//        'nickname' => [
//            'label' => 'Nickname',
//            'type' => 'text',
//            'value' => '',
//            'validate' => [
//                'validate_not_empty',
//            ],
//            'extra' => [
//                'attr' => [
//                    'class' => 'select',
//                ],
//            ],
//        ],
//    ],
//    'buttons' => [
//        'submit' => [
//            'text' => 'Join'
//        ],
//    ],
//    'callbacks' => [
//        'success' => 'form_success',
//    ],
//    'validators' => [
//        'validate_player'
//    ],
//];
//
//$teams = file_to_array(TEAMS_FILE) ?: [];
//
//foreach ($teams as $team_id => $team) {
//    $form['fields']['team_name']['options'][$team_id] = $team['team_name'];
//    var_dump($team);
//}
//
//
///**
// * @param $safe_input
// * @param $form
// */
//function form_success($safe_input, $form)
//{
//
//    $teams = file_to_array(TEAMS_FILE) ?: [];
//    $teams[$safe_input['team_id']]['players'][] = [
//        'nickname' => $safe_input['nickname'],
//        'score' => 0,
//    ];
//    array_to_file($teams, TEAMS_FILE);
//
//        setcookie('submit', 1, time() + (3600), "/");
////        header("Location: /join.php");
//}
//
//var_dump($teams);
//
//
//if ($_POST) {
//    $safe_input = get_filtered_input($form);
//    validate_form($form, $safe_input);
//}
//?>
<!---->
<!--<!DOCTYPE html>-->
<!--<html lang="en" dir="ltr">-->
<!--<head>-->
<!--    <meta charset="utf-8">-->
<!--    <link rel="stylesheet" href="app/assets/css/main.css">-->
<!--    <title>--><?php //print $title; ?><!--</title>-->
<!--</head>-->
<!--<body>-->
<!--<section>-->
<!--    --><?php //include 'core/templates/form.tpl.php'; ?>
<!--</section>-->
<!--</body>-->
<!--</html>-->
<!---->
