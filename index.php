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
        var_dump($field);
        if (isset($field['filter'])) {
            $filter_parameters[$field_id] = $field['filter'];
        } else {
            $filter_parameters[$field_id] = FILTER_SANITIZE_SPECIAL_CHARS;
        }
    }
    var_dump($filter_parameters);
//is cia gaunam isfiltruotus
    return get_filtered_input(INPUT_POST, $filter_parameters);
}

////if($_POST){
//    $safe_input = get_filtered_input($form);
//    validate_form($form, $safe_input);
////}


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
 * apskritai patikrinti laukelio vertes funkcija turetu buti kuo labiau flexible
 *funkcija tikrinanti form masyvo outputo errorús tustiems laukams
 * @param array $form
 * @param $safe_input
 * @return bool
 */
function validate_form(array &$form, array $safe_input): bool
{
    $success = true;

    foreach ($safe_input as $field_id => $value) {
        $field = &$form['fields'][$field_id];
        $field['value'] = $value;

        foreach ($field['validate'] ?? [] as $item) {
            $is_valid = $item($value, $field);

            if (!$is_valid) {
                $success = false;
            break;
            }
        }
    }
    return $success;
}

//sukurtus validatorius priskirti fieldui age

function validate_is_number($safe_input, &$form){

    foreach($safe_input as $field_id => $age){
        $field = &$form['fields'][$field_id];
        $field['age'] = $age;

        if(is_integer($age)){
            
        }
    }
}

function validate_is_positive($field_input, &$form){

}

function validate_max_100($field_input, &$form){

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
        'select_age' => [
            'label' => 'select age',
            'type' => 'select',
            'value' => '',
            'options' => [
                'option_one' => 10,
                'option_two' => 20,
                'option_three' =>25,
                'option_four' =>35,
                'option_five' =>45,
                'option_six' =>55,
                'option_seven' =>65,
                'option_seven' =>75,
                'option_eight' =>85,
                'option_nine' =>95,
                'option_ten' =>105,
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
var_dump($form);
?>

<html>
<head>
    <title>Form security</title>
    <style>
    </style>
</head>
<body>
<!--<h1>--><?php //print var_dump($form['name']); ?><!--</h1>-->
<h2>Formos generavimas</h2>
<?php include 'templates/form.tpl.php'; ?>
</body>
</html>