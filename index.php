<?php
require 'bootloader.php';

/**
 *
 * @param $form
 * @param $safe_input
 */
function form_success($form, $safe_input)
{
    $target = $safe_input['guess'];
    $answer = $safe_input['answer'];
    $difference = sqrt($target) - $answer;
    var_dump("Nuo tinkamo atsakymo nukrypai $difference");

}


/**
 *
 * @param $form
 * @param $safe_input
 */
function form_fail($form, $safe_input)
{
    var_dump('Neivedei atsakymo');
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
        'guess' => [
            'label' => 'Spėk, kokia bus šaknis iš',
            'type' => 'text',
            'value' => rand(0, 1000),
            'validate' => [
                'validate_not_empty',
                'validate_is_number',
            ],
            'extra' => [
                'attr' => [
                    'readonly' => true,
                ],
            ],
        ],
        'answer' => [
            'label' => 'Atsakymas:',
            'type' => 'text',
            'value' => '',
            'validate' => [
                'validate_not_empty',
                'validate_is_number',
            ],
//            'extra' => [
//                'attr' => [
//                    'class' => 'red',
//                    'placeholder' => 'Iveskite skaiciu'
//                ],
//            ],
        ],
    ],
    'buttons' => [
        'submit' => [
            'text' => 'SPĖTI',
            'name' => 'action',
            'validate' => [
                'validate_not_empty'
            ],
        ],
    ],
//    'validators' => [
//        'validate_fields_match' => [
//            'guess',
//            'answer'
//        ],
//    ],
];

function add_field(&$form, $num){
    $form['field'][$num] = [
            'name' => "name{$num}",
            'label' => "Laukelis{$num}",
            'type' => 'text'
    ];
}

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
<h1>QUIZ</h1>
<h2>Matematikas?</h2>
<?php include 'core/templates/form.tpl.php'; ?>
</body>
</html>