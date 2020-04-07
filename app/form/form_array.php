<?php

$form = [
    'attr' => [
        'action' => 'index.php',
        'method' => 'POST',
        'class' => 'form',
    ],
    'callbacks' => [
        'success' => 'form_success',
        'fail' => 'form_fail'
    ],
    'fields' => [
        'question_1' => [
            'label' => 'Ar laikai kardaną?',
            'type' => 'radio',
            'validate' => [

            ],
            'select' => [
                'taip' => 'Taip',
                'ne' => 'Ne',
            ],
        ],
        'question_2' => [
            'label' => 'Ar pili į baką?',
            'type' => 'radio',
            'validate' => [

            ],
            'select' => [
                'taip' => 'Taip',
                'ne' => 'Ne',
            ],
        ],
        'question_3' => [
            'label' => 'Ar rūkai žolių arbatą?',
            'type' => 'radio',
            'validate' => [

            ],
            'select' => [
                'taip' => 'Taip',
                'ne' => 'Ne',
            ],
        ],
    ],
    'buttons' => [
        'submit' => [
            'text' => 'žiūrėti statistiką',
            'name' => 'action',
            'validate' => [

            ],
        ],
    ],
];