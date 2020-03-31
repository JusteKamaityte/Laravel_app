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
function form_ok($form, $safe_input)
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
        'fail' => 'form_ok'
    ],
    'fields' => [
        'laukelis_1' => [
            'label' => 'tavo mintis',
            'type' => 'text',
            'validate' => [
                'validate_not_empty',
            ],
            'extra' => [
                'attr' => [
                    'placeholder' => 'Įveskite minti'
                ]
            ]
        ],
        'laukelis_2' => [
            'label' => 'pakartok minti',
            'type' => 'text',
            'validate' => [
                'validate_not_empty',
            ],
            'extra' => [
                'attr' => [
                    'placeholder' => 'Pakartokite minti'
                ]
            ]
        ],
    ],
    'buttons' => [
        'submit' => [
            'text' => 'Važiuojam',
            'name' => 'action',
            'validate' => [
                'validate_not_empty'
            ],
        ],
    ],
    'validators' => [
        'validate_fields_match' => [
            'laukelis_1',
            'laukelis_2'
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