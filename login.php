<?php
require 'bootloader.php';

$title = 'Login';

/**
 * @param $safe_input
 * @param $form
 */
function form_success($safe_input, $form)
{
    var_dump('useris yra');

    $_SESSION['email'] = $safe_input['email'];
    $_SESSION['password'] = $safe_input['password'];

    header("Location: /index.php");

}

/**
 * @param $safe_input
 * @param $form
 */
function form_fail($safe_input, $form)
{
    var_dump('fail');
}

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
   validate_form($form, $safe_input);
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
            <?php include 'app/templates/nav.tpl.php'; ?>
        </section>

        <h1><?php print $title; ?></h1>
        <main>
            <?php include 'core/templates/form.tpl.php'; ?>
        </main>


    </body>
</html>

