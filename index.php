<?php
require 'bootloader.php';

///**
// *F-cija kuri  ivyks, kai forma atitiks visus validacijos reikalavimus
// * @param $form
// * @param $safe_input
// */
//function form_success($safe_input, $form)
//{
//    var_dump('registracija teisinga');
//    if(file_exists(db_file.txt)){
//        $username = file_to_array(db);
//        $username[] = [
//            'username' => $safe_input['username'],
//            'password' => $safe_input['password']
//        ];
//        array_to_file($username, db);
//    }else{
//        $username = [
//            'username' => $safe_input['username'],
//            'password' => $safe_input['password']
//        ];
//        array_to_file($username, db);
//    }
//}


///**
// *F-cija kuri  ivyks, kai forma neatitiks nors vieno validacijos reikalavimu
// * @param $form
// * @param $safe_input
// */
//function form_fail(array $form, array $safe_input)
//{
//    array_to_file(['tuscia'], 'app/data/db_file.txt');
//}
//
//$test = array_to_file(db);
//var_dump($test);

$form = [
    'attr' => [
        'action' => 'index.php',
        'method' => 'POST',
        'class' => 'form',
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
                    'class' => 'input',
                    'placeholder' => ' '
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
                    'class' => 'input',
                    'placeholder' => '*********'
                ],
            ],
        ],
    ],
    'buttons' => [
        'submit' => [
            'text' => 'login',
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


$list =[

];

if ($_POST) {

    $filtered_input = get_filtered_input($form);
    $validation = validate_form($form, $filtered_input);
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="app/assets/css/main.css">
    <title></title>
</head>
<body>

<?php include 'core/templates/form.tpl.php'; ?>

</body>
</html>