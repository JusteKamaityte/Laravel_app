<?php
require '../bootloader.php';

$title = 'register';

$form = [
    'fields' => [
        'username' => [
            'label' => 'Username',
            'type' => 'text',
            'value' => '',
            'validate' => [
                'validate_not_empty'
            ],
        ],
        'email' => [
            'label' => 'email',
            'type' => 'text',
            'value' => '',
            'extra' => [
                'attr' => [
                    'placeholder' => 'name@email.com'
                ],
            ],
            'validate' => [
                'validate_not_empty',
                'validate_email_unique'
            ],
        ],
        'password' => [
            'label' => 'Password',
            'type' => 'password',
            'validate' => [
                'validate_not_empty',
            ],
        ],
        'password_repeat' => [
            'label' => 'Password repeat',
            'type' => 'password',
            'validate' => [
                'validate_not_empty',
            ],
        ],
    ],
    'buttons' => [
        'submit' => [
            'text' => 'register',
            'name' => 'action',
        ],
    ],
    'callbacks' => [
        'success' => 'form_success',
        'fail' => 'form_fail',
    ],
    'validators' => [
        'validate_fields_match' => [
            'password',
            'password_repeat',
        ],

    ],
];

/**
 * @param $safe_input
 * @param $form
 */
function form_success($safe_input, array $form){
    var_dump('veikia');
    $id=    App\App::$db->insertRow('users', [
        'username'=> $safe_input['username'],
        'email' => $safe_input['email'],
        'password' => $safe_input['password'],
    ]);

//    header("Location: /login.php");
    var_dump([
            'id'=> $id,
            'form'=>$form,
            'safe_input' => $safe_input
    ]);
}

function form_fail($safe_input, $form)
{
    var_dump('toks vartotojas jau egzistuoja');
}

if ($_POST) {
    var_dump('validuojame forma');
    $safe_input = get_filtered_input($form);
    validate_form($form, $safe_input);
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="media/css/main.css">
    <title><?php print $title; ?></title>
</head>
<body>

<section class="nav_bar">
    <?php include '../app/templates/nav.tpl.php'; ?>
</section>
<h1>Registration</h1>
<main>
    <?php include '../core/templates/form.tpl.php'; ?>
</main>
</body>
</html>
