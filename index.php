<?php
$form = "templates/form.tpl.php";

/**
 *funkcija generuojanti formos atributus
 * @param array $attr
 * @return string
 */
function html_attr(array $attr): string
{
    $attributes = '';

    foreach ($attr as $index => $value) {
        $attributes .= "$index=\"$value\" ";
    }

//   var_dump($attributes);
    return $attributes;
}

$form = [
    'attr' => [
        'action' => 'index.php',
        'method' => 'POST',
        'class' => 'my-form',
    ]
];

//var_dump($form);

/**
 * funkcija apsauganti nuo pavojingu ivesciu(POST)
 * @param array $form
 * @return array|null
 */
function get_filtered_input(array $form): ?array
{

    $filter_parameters = [];

    foreach ($form['fields'] as $field_id => $field) {
//        var_dump($field);
        if (isset($field['filter'])) {
            $filter_parameters[$field_id] = $field['filter'];
        } else {
            $filter_parameters[$field_id] = FILTER_SANITIZE_SPECIAL_CHARS;
        }
    }
//    var_dump($filter_parameters);

    return filter_input_array(INPUT_POST, $filter_parameters);
}

//if($_POST){
//    $safe_input = get_filtered_input($form);
//    validate_form($form, $safe_input);
//}


//tikrina vieno field input

/**
 * funkcija grazina errora, jei laukelis tuscias
 * @param $field_input
 * @param $field
 * @return mixed
 */
function validate_not_empty($field_input, &$field): bool
{

    if (empty($field_input)) {
        $field['error'] = 'Laukelis tuščias';
        return false;
    }
    
    return true;
}


/**
 *funkcija tikrinanti form masyvo outputo errorús tustiems laukams
 * @param array $form
 * @param $safe_input
 * @return bool
 */
function validate_form(&$form, $safe_input)
{

    foreach ($safe_input as $field_id => $value) {
        $field = &$form['fields'][$field_id];

    if(isset($safe_input[$field_id])){
        $field['value'] = $safe_input[$field_id];
    }

//        validate_not_empty($value, $field);
    }
    if(isset($field['validate'])){
        foreach($field['validate'] as $item){
            $item($value, $field);
        }
    }
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
            'filter' => FILTER_SANITIZE_NUMBER_INT,
            'label' => 'First name',
            'type' => 'text',
            'value' => 'Jonas',
            'extra' => [
                'attr' => [
                    'jj' => 'dasa'
                ]
            ],
            'validate'=> [
                'validate_not_empty'
            ],
        ],
        'last_name' => [
            'label' => 'Last name',
            'value' => 'Jonauskas',
            'type' => 'text',
            'validate'=> [
                'validate_not_empty'
            ],

        ],
        'email' => [
            'label' => 'Email',
            'type' => 'email',
            'value' => 'vardas@gmail.com',
            'validate'=> [
                'validate_not_empty'
            ],
        ],
        'password' => [
            'label' => 'Password',
            'type' => 'password',
            'value' => '.......',
            'validate'=>[
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
             'validate'=> [
                'validate_not_empty'
            ],
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
            ],
             'validate'=> [
                'validate_not_empty'
            ],
        ],
    ]
];


$safe_input = get_filtered_input($form);
var_dump($form);
?>

<html>
<head>
    <title>Form security</title>
    <style>
    </style>
</head>
<body>
<h1><?php print $safe_input['vardas'] ?? ''; ?></h1>
<h2>Formos generavimas</h2>
<?php include 'templates/form.tpl.php'; ?>
</body>
</html>