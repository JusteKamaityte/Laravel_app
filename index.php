<?php
require 'bootloader.php';

/**
 * @param $form
 * @param $safe_input
 */
function form_success($form, $safe_input)
{
    //switch yra tas pats kaip if
  switch($safe_input['select']){
      case 'atimtis':
          $answer = $safe_input['X'] - $safe_input['Y'];
          break;
      case 'sudėtis':
          $answer = $safe_input['X'] + $safe_input['Y'];
          break;
      default:
          $answer = 0;
  }
  var_dump($answer);
}

/**
 * @param $form
 * @param $safe_input
 */
function form_failed($form, $safe_input)
{
    var_dump('Klaida');
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
        'X' => [
            'label' => 'X',
            'type' => 'number',
            'value' => '',
            'validate' => [
                'validate_not_empty',
                'validate_is_number',
            ],
            'extra' => [
                'attr' => [
                    'class' => 'number_x',
                    'placeholder' => 'Įveskite skaičių'
                ]
            ]
        ],
        'Y' => [
            'label' => 'Y',
            'type' => 'number',
            'value' => '',
            'validate' => [
                'validate_not_empty',
                'validate_is_number',

            ],
            'extra' => [
                'attr' => [
                    'class' => 'number_y',
                    'placeholder' => 'Įveskite skaičių'
                ]
            ]
        ],
        'select' => [
            'label' => 'veiksmas',
            'type' => 'select',
            'value' => '',
            'options' => [
                'sudėtis' => 'Sudėtis',
                'atimtis' => 'Atimtis'
            ],
            'validate' => [
                'validate_not_empty',
                'validate_select'
            ],
            'extra' => [
                'attr' => [
                    'class' => ' ',
                ]
            ]
        ]
    ],
    'buttons' => [
        'submit' => [
            'text' => 'Važiuojam',
            'name' => 'action',
            'validate' => [
                'validate_not_empty'
            ],
            'extra' => [
                'attr' => [
                    'class' => 'submit-button'
                ]
            ]

        ]
    ]
];

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
<h1></h1>
<?php include 'core/templates/form.tpl.php'; ?>
</body>
</html>