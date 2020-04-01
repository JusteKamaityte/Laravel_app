<?php
require 'bootloader.php';

/**
 *
 * @param $form
 * @param $safe_input
 */
function form_success($form, $safe_input)
{
    var_dump('Success');
}


/**
 *
 * @param $form
 * @param $safe_input
 */
function form_fail($form, $safe_input)
{
    var_dump('Klaida');
}


$form = [
    'attr' => [
        'action' => 'index.php',
        'method' => 'POST',
        'class' => 'my-form',
        'id' => 'form'
    ],
    'callbacks' => [
        'success' => 'form_success',
        'fail' => 'form_fail'
    ],
    'fields' => [
        'username' => [
            'label' => 'Username',
            'type' => 'text',
            'validate' => [
                'validate_not_empty',
                'validate_text_lenght' => [
                    'min' => 0,
                    'max' => 6
                ],
            ],
            'extra' => [
                'attr' => [
                    'class' => 'red',
                    'placeholder' => ' '
                ],
            ],
        ],
        'email' => [
            'label' => 'Email',
            'type' => 'text',
            'validate' => [
                'validate_not_empty',
                'validate_text_lenght' => [
                    'min' => 0,
                    'max' => 6
                ],
            ],
            'extra' => [
                'attr' => [
                    'class' => 'red',
                    'placeholder' => 'name@gmail.com '
                ],
            ],
        ],
        'password' => [
            'label' => 'Password',
            'type' => 'password',
            'validate' => [
                'validate_not_empty',
                'validate_text_lenght' => [
                    'min' => 0,
                    'max' => 6
                ],
            ],
            'extra' => [
                'attr' => [
                    'class' => 'red',
                    'placeholder' => '*********'
                ],
            ],
        ],
        'password_repeat' => [
            'label' => 'Repeat password',
            'type' => 'password',
            'validate' => [
                'validate_not_empty',
                'validate_text_lenght' => [
                    'min' => 0,
                    'max' => 100
                ],
            ],
            'extra' => [
                'attr' => [
                        'class' => 'red',
                    'placeholder' => '*********'
                ],
            ],
        ],
        'phone_number' => [
            'label' => 'Phone number',
            'type' => 'number',
            'validate' => [
                'validate_not_empty',
                'validate_is_number',

            ],
            'extra' => [
                'attr' => [
                    'placeholder' => 'validate_phone'
                ],
            ],
        ],
    ],
    'buttons' => [
        'submit' => [
            'text' => 'Register',
            'name' => 'action',
            'validate' => [
                'validate_not_empty'
            ],
        ],
    ],
    'validators' => [
        'validate_fields_match' => [
            'password',
            'password_repeat'
        ],
    ],
];

if ($_POST) {

    $filtered_input = get_filtered_input($form);
    $validation = validate_form($form, $filtered_input);
}


?>

<html>
<head>
    <title>Form security</title>
    <style>
    </style>
</head>
<body>
<h1>FORM VALIDATORS</h1>
<?php include 'core/templates/form.tpl.php'; ?>
</body>
</html>