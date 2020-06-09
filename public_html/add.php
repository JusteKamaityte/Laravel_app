<?php

use App\Pixels\Pixel;
use App\Pixels\Model;

require '../bootloader.php';

$form = [
    'attr' => [
        'action' => 'add.php',
        'method' => 'POST',
    ],
    'fields' => [
        'x' => [
            'label' => ' ',
            'type' => 'number',
            'value' => '',
            'extra' => [
                'attr' => [
                    'placeholder' => 'X koordinatė'
                ],
                'validate' => [
                    'validate_not_empty',
                    'validate_field_range' => [
                        'min' => 40,
                        'max' => 500
                    ],
                ],
            ],
        ],
        'y' => [
            'label' => ' ',
            'type' => 'number',
            'value' => '',
            'extra' => [
                'attr' => [
                    'placeholder' => 'Y koordinatė'
                ],
            ],
            'validate' => [
                'validate_not_empty',
                'validate_field_range' => [
                    'min' => 40,
                    'max' => 500
                ],
            ],
        ],
        'color' => [
            'label' => 'color',
            'type' => 'color',
            'validate' => [
                'validate_not_empty'
            ],
        ],
        'option' => [
            'label' => 'Choose',
            'type' => 'select',
            'value' => 1,
            'options' => [
                'vienas',
                'du'
            ],
        ],
    ],
    'buttons' => [
        'submit' => [
            'text' => 'Įdėti pixelį',
            'name' => 'action',
        ],
    ],
    'callbacks' => [
        'success' => 'form_success',
    ],
    'validators' => [
        'validate_pixel',
        'validate_is_logged_in'
    ]
];

//$properties =[
//    'email'=> $_SESSION['email'],
//    'x' => $safe_input['x'],
//    'y' => $safe_input['y'],
//    'color' => $safe_input['color']
//];

/**
 * tikrinam ar pikselis egzistuoja tomis koordinatemis ir jei egzistuoja updatin jei ne, tai
 * @param $form
 * @param $safe_input
 * @throws Exception
 */
function form_success($safe_input, array $form)
{

    $user = App\App::$session->getUser();

//    var_dump([
//        'form'=> $form,
//        'safe_input' => $safe_input,
//        'user' => $user
//    ]);

    $pixel=[
        'email'=> $_SESSION['email'],
        'x' => $safe_input['x'],
        'y' => $safe_input['y'],
        'color' => $safe_input['color']
    ];

    if ($pixels = App\App::$db->getRowsWhere('pixels', ['x' => $pixel['x'], 'y' => $pixel['y']])) {
        $row_id = array_key_first($pixel);
        App\App::$db->updateRow('pixels', $pixel, $row_id);
    } else {
        App\Pixels\Model::insert(new \App\Pixels\Pixel($safe_input));
    }

    header("Location: /index.php");
}

if ($_POST ) {
    $safe_input = get_filtered_input($form);
    validate_form($form, $safe_input);
}

$test = new Pixel();
$test->x = 200;

//var_dump(get_class_methods($test));


$view = new \Core\View($form);
$view->render('../app/templates/nav.tpl.php');
//var_dump($view);
?>

<html>
<head>
    <meta>
    <link rel="stylesheet" href="media/css/main.css">
    <title>Home</title>
</head>
<body>
<main>
    <section class="nav_bar">
        <?php print $view->render('../app/templates/nav.tpl.php');?>
    </section>
    <?php include '../core/templates/form.tpl.php'; ?>
</main>
</body>
</html>


