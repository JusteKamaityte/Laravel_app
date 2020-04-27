<?php
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
                        'max' => 250
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
                    'max' => 250
                ],
            ],
        ],
        'color' => [
            'label' => 'color',
            'type' => 'color',
            'extra' => [
                'attr' => [
                    'placeholder' => 'select'
                ],
            ],
            'validate' => [
                'validate_not_empty'
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


/**
 * tikrinam ar pikselis egzistuoja tomis koordinatemis ir jei egzistuoja updatin jri ne, tai
 * @param $form
 * @param $safe_input
 */
function form_success($safe_input, $form)
{

    $user = App\App::$session->getUser();
    var_dump([
        'form'=> $form,
        'safe_input' => $safe_input,
        'user' => $user
    ]);
    $pixel = [
        'email'=> $user['email'],
        'x' => $safe_input['x'],
        'y' => $safe_input['y'],
        'color' => $safe_input['color']

    ];


    if ($pixels = App\App::$db->getRowsWhere('pixels', ['x' => $pixel['x'], 'y' => $pixel['y']])) {
        $row_id = array_key_first($pixel);
        App\App::$db->updateRow('pixels', $pixel, $row_id);
    } else {
        App\App::$db->insertRow('pixels', $pixel);

    }

}


//isitraukt pixelius


//$logged_in_user = App\App::$session->getUser();

if ($_POST ) {
    $safe_input = get_filtered_input($form);
    validate_form($form, $safe_input);
}

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
        <?php include '../app/templates/nav.tpl.php'; ?>
    </section>

    <?php include '../core/templates/form.tpl.php'; ?>

</main>
</body>
</html>
