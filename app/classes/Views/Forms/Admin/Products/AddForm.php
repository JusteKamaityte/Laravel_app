<?php
namespace  App\Views\Forms\Admin\Products;

use Core\Views\Form;

class AddForm extends Form{

    public function __construct(array $form = []){

        $form = [
            'attr'=>[
                'method' => 'POST',
                'id' => 'add-drink-form',
                'class' => 'add-edit-drink-form'
            ],
            'fields'=> [
                'drink_name' => [
                    'label' => 'Pavadinimas',
                    'type' => 'text',
                    'value' => '',
                    'validators' => [
                        'validate_not_empty',
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Pvz.: Lithuanica'
                        ]
                    ]
                ],
                'degrees' => [
                    'label'=> 'Laipsniai',
                    'type'=> 'number',
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Pvz: 40'
                        ],
                    ],
                    'validations' => [
                        'validate_not_empty',
                        'validate_field_range' => [
                            'min' => 0,
                            'max' => 500,
                        ]
                    ],
                ],
                'capacity' => [
                    'label'=> 'Tūris(ml)',
                    'type'=> 'number',
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Pvz: 700'
                        ],
                    ],
                    'validations' => [
                        'validate_not_empty',
                        'validate_field_range' => [
                            'min' => 0,
                            'max' => 2000,
                        ]
                    ],
                ],
                'in_stock' => [
                    'label'=> 'Kiekis Sandėlyje',
                    'type'=> 'number',
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Pvz: 10'
                        ],
                    ],
                    'validations' => [
                        'validate_not_empty',
                        'validate_field_range' => [
                            'min' => 0,
                            'max' => 999,
                        ]
                    ],
                ],
                'price' => [
                    'label'=> 'Kaina(EUR)',
                    'type'=> 'number',
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Pvz: 14.99'
                        ],
                    ],
                    'validations' => [
                        'validate_not_empty',
                    ],
                ],
                'photo' => [
                    'label'=> 'Nuotrauka(URL)',
                    'type'=> 'text',
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Pvz: http://...'
                        ],
                    ],
                    'validations' => [
                        'validate_not_empty',
                    ],
                ],
            ],
            'buttons' => [
                'add_drink' => [
                    'text' => 'Sukurti',
                    'extra' => [
                        'attr' => [
                            'class' => 'add-btn',
                        ]
                    ]
                ],
            ],
        ];

        parent::__construct($form);
    }
}