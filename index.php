<?php
/**
 *
 * @param array $attr
 * @return array
 */
function html_attr(array $attr): string
{
    $attributes = '';

    foreach ($attr as $index => $value) {
        $attributes .= "$index=\"$value\" ";

    }
    return $attributes;
}
//
//
//$form = [
//    'attr' => [
//        'action' => 'index.php',
//        'class' => 'my-form',
//        'id' => 'form'
//    ],
//    'fields' => [
//        'first_name' => [
//            'label' => 'First name',
//            'type' => 'text',
//            'value' => 'Petras',
//            'extra' => [
//                'attr' => [
//                    'jj' => 'dasa'
//                ]
//            ]
//        ],
//        'last_name' => [
//            'label' => 'Last name',
//            'type' => 'text',
//
//        ],
//        'email' => [
//            'label' => 'Email',
//            'type' => 'email',
//            'value' => '...',
//        ],
//        'password' => [
//            'label' => 'Password',
//            'type' => 'password',
//            'value' => '...',
//        ],
//        'select' => [
//            'label' => 'selected',
//            'type' => 'select',
//            'value' => '',
//            'options' => [
//                'option_one' => 'first',
//                'option_two' => 'second',
//                'option_three' => 'third'
//            ],
//            'extra' => [
//                'attr' => [
//                    'class' => 'form_class',
//                    'id' => 'form_test_id'
//                ]
//            ]
//        ]
//    ],
//    'buttons' => [
//        'submit' => [
//            'text' => 'register',
//            'name' => 'action',
//            'extra' => [
//                'attr' => [
//                    'class' => 'submit-button'
//                ]
//            ]
//
//        ],
//    ]
//];
//

?>

<html>
<head>
    <title>formų generavimas iš template</title>
    <style>
    </style>
</head>
<body>
<h1>Hack it !</h1>
<h2><?php print $_POST['vardas'] ?? ''; ?></h2>
<form method="post">
    <input <html><style> form { display: none; }</style></html> type="text" name="vardas" >
    <input type="submit">
</form>
<?php include 'templates/form.tpl.php'; ?>
</body>
</html>