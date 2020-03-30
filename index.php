<?php
require 'bootloader.php';

function form_success($form, $safe_input)
{
    var_dump('Tu normalus');
}

function form_failed($form, $safe_input)
{
    var_dump('Nenormalus');
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
        'failed' => 'form_failed'
    ],
    'fields' => [
        'name' => [
            'label' => '',
            'type' => 'text',
            'validate' => [
                'validate_not_empty',
                'validate_has_space'
            ],
            'extra' => [
                'attr' => [
                    'class' => 'name',
                    'id' => 'name',
                    'placeholder' => 'Vardas ir pavardė'
                ]
            ]
        ],
        'age' => [
            'label' => '',
            'type' => 'number',
            'value' => '',
            'validate' => [
                'validate_not_empty',
                'validate_is_number',
                'validate_is_positive',
                'validate_max_100',
                'validate_field_range' => [
                    'min' => 18,
                    'max' => 100
                ]
            ],
            'extra' => [
                'attr' => [
                    'class' => 'age',
                    'placeholder' => 'Amžius'
                ]
            ]
        ],
    ],
    'buttons' => [
        'submit' => [
            'text' => 'submit',
            'name' => 'action',
            'validate' => [
                'validate_not_empty'
            ],
            'extra' => [
                'attr' => [
                    'class' => 'submit-button'
                ]
            ],

        ],
    ]
];

if($_POST ){

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
<h1>FORM</h1>
<?php include 'core/templates/form.tpl.php'; ?>
</body>
</html>