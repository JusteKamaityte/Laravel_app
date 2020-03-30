<?php
require 'bootloader.php';


function form_success($form, $safe_input)
{
    var_dump('success');
}

function form_failed($form, $safe_input)
{
    var_dump('failed');
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
        'first_name' => [
            'filter' => FILTER_SANITIZE_NUMBER_INT,
            'label' => 'First name',
            'type' => 'text',
            'value' => 'Jonas',
            'extra' => [
                'attr' => [
                    'jj' => 'dasa'
                ]
            ],
            'validate' => [
                'validate_not_empty'
            ],
        ],
        'last_name' => [
            'label' => 'Last name',
            'value' => 'Jonauskas',
            'type' => 'text',
            'validate' => [
                'validate_not_empty'
            ],

        ],
        'age' => [
            'label' => 'Age',
            'type' => 'number',
            'value' => '...',
            'filter' => 'FILTER_SANTIZE_INT',
            'validators' => [
                'validate_not_empty',
                'validate_is_number',
                'validate_is_positive',
                'validate_max_100'
            ],
        ],
        'email' => [
            'label' => 'Email',
            'type' => 'email',
            'value' => 'vardas@gmail.com',
            'validate' => [
                'validate_not_empty'
            ],
        ],
        'password' => [
            'label' => 'Password',
            'type' => 'password',
            'value' => '.......',
            'validate' => [
                'validate_not_empty'
            ],
        ],
        'select' => [
            'label' => 'selected',
            'type' => 'select',
            'value' => '',
            'options' => [
                'option_one' => 'first',
                'option_two' => 'second',
                'option_three' => 'third'
            ],
            'extra' => [
                'attr' => [
                    'class' => 'form_class',
                    'id' => 'form_test_id'
                ]
            ],
            'validate' => [
                'validate_not_empty'
            ],
        ]
    ],
    'buttons' => [
        'submit' => [
            'text' => 'submit',
            'name' => 'action',
            'extra' => [
                'attr' => [
                    'class' => 'submit-button'
                ]
            ],
            'validate' => [
                'validate_not_empty'
            ],
        ],
    ]
];

?>

<html>
<head>
    <title>Form security</title>
    <style>
    </style>
</head>
<body>
<h1></h1>
<h2></h2>
<?php include 'core/templates/form.tpl.php'; ?>
</body>
</html>