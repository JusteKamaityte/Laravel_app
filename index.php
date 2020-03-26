<?php
$form = "templates/form.tpl.php";
$form = [
    'attr' => [
        'action' => 'index.php',
        'method' => 'POST',
        'class' => 'my-form',
    ]
];

/**
 *funkcija generuojanti formos atributus
 * @param array $attr
 * @return array
 */
function html_attr(array $attr): array
{
    $attributes = '';

    foreach ($attr as $index => $value) {
        $attributes .= $index=\$value ;
    }

   var_dump($attributes);
}



$attr = html_attr();
var_dump(html_attr($form['attr']));
var_dump($form);

/**
 * funkcija apsauganti nuo pavojingu ivesciu(POST)
 * @param array $form
 * @return array|null
 */
function get_filtered_input(array $form): ?array
{

    $filter_parameters = [];

    foreach ($form['fields'] as $field_id => $field) {
        var_dump($field);
        if(isset($field['filter'] )){
            $filter_parameters[$field_id] = $field['filter'];
        }else {
            $filter_parameters[$field_id] = FILTER_SANITIZE_SPECIAL_CHARS;
        }
    }
    var_dump($filter_parameters);

    return filter_input_array(INPUT_POST, $filter_parameters);
}



/**
 * funkcija, kuri nustatytų kiekvienam field'ui
 * error, jeigu jo vertė yra tusčia
 * @param array $form
 * @param $safe_input
 * @return array
 */
function validate_form(array &$form, $safe_input): array {

    foreach($safe_input as $field_id => $value){
        if($value === ''){
            $form['fields'][$field_id]['errors'] = 'error';
        }
    }
}

if($_POST){
    $safe_input = get_filtered_input($form);
    validate_form($form, $safe_input);
}

var_dump($safe_input);
var_dump($form);


$form = [
    'attr' => [
        'action' => 'index.php',
        'method' => 'POST',
        'class' => 'my-form',
        'id' => 'form'
    ],
    'fields' => [
        'first_name' => [
            'filter' => FILTER_SANITIZE_NUMBER_INT,
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
    <?php include 'templates/form.tpl.php'; ?>
</body>
</html>