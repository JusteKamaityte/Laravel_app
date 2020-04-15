<?php
require 'bootloader.php';

$title = 'Login';

$form = [
    'fields' => [
        'email' => [
            'label' => 'Email',
            'type' => 'text',
            'value' => '',
            'extra' => [
                'attr' => [
                    'placeholder' => 'name@email.com'
                ],
            ],
            'validate' => [
                'validate_not_empty',
                'validate_email',
            ],
        ],
        'password' => [
            'label' => 'Password',
            'type' => 'password',
            'value' => '',
            'validate' => [
                'validate_not_empty',
            ],
        ],
    ],
    'buttons' => [
        'submit' => [
            'text' => 'login',
            'name' => 'action',
        ],
    ],
    'validators' => [
        'validate_login',
    ],
    'callbacks' => [
        'success' => 'form_success',
        'fail' => 'form_fail',
    ],
];

if ($_POST) {
    $safe_input = get_filtered_input($form);
    $is_valid = validate_form($form, $safe_input);
}

function form_success($safe_input, $form)
{
    var_dump('login success');

    $_SESSION['email'] = $safe_input['email'];

    var_dump($_SESSION);

    header("Location: /index.php");

}


function form_fail($safe_input, $form)
{
    var_dump('login fail');
}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="app/assets/css/main.css">
        <title><?php print $title; ?></title>
    </head>
    <body>
        <section class="nav_bar">
            <?php include 'core/templates/nav.tpl.php'; ?>
        </section>

        <h1><?php print $title; ?></h1>
        <main>
            <?php include 'core/templates/form.tpl.php'; ?>
        </main>


    </body>
</html>

