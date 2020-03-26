<?php
///**
// *
// * @param array $attr
// * @return array
// */
//function html_attr(array $attr): array
//{
//    foreach ($attr as $key => $value) {
//
//        $attr = '';
//
//
//    }
//    return $attr;
//}


//    foreach ($attr as $index => $value) {
//        $attributes .= "$index=\"$value\" ";
//
//
//    }
//    return $attributes;
//}

/**
 * funkcija apsauganti nuo pavojingu ivesciu(POST)
 * @param array $form
 * @return array|null
 */
function get_filtered_input(array $form): ?array
{
    //parametrai pagal kuriuos nusako kaip reikia POST masyva isfiltruoti
    $filter_parameters = [];

    foreach ($form['fields'] as $field_id => $field_value) {
        $filter_parameters[$field_id] = FILTER_SANITIZE_SPECIAL_CHARS;
        //filter konstanta turi savo verte ir ji supranta tik tai savo verte, todel kitur nei funkcijos viduj negali buti parasyta
    }
    var_dump($filter_parameters);
    //returninam isfiltruota POST
    return filter_input_array(INPUT_POST, $filter_parameters);
}



$form = [
    'attr' => [
        'action' => 'index.php',
        'method' => 'POST',
        'class' => 'my-form',
        'id' => 'form'
    ],
    'fields' => [
        'first_name' => [
            'label' => 'First name',
            'type' => 'text',
            'value' => 'Petras',
            'extra' => [
                'attr' => [
                    'jj' => 'dasa'
                ]
            ]
        ],
        'last_name' => [
            'label' => 'Last name',
            'type' => 'text',

        ],
        'email' => [
            'label' => 'Email',
            'type' => 'email',
            'value' => '...',
        ],
        'password' => [
            'label' => 'Password',
            'type' => 'password',
            'value' => '...',
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
            ]
        ]
    ],
    'buttons' => [
        'submit' => [
            'text' => 'register',
            'name' => 'action',
            'extra' => [
                'attr' => [
                    'class' => 'submit-button'
                ]
            ]

        ],
    ]
];



var_dump($form);
$safe_input = get_filtered_input($form);
?>

<html>
<head>
    <title>Form security</title>
    <style>
    </style>
</head>
<body>
<h1><?php print $safe_input['vardas'] ?? ''; ?></h1>
<h2>Hack it</h2>
<!--    --><?php //include 'templates/form.tpl.php'; ?>
</body>
</html>