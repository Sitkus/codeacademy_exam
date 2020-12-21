<?php

namespace App\Views\Forms\Common\Auth;

use Core\Views\Form;

class RegisterForm extends Form
{
    public function __construct()
    {
        parent::__construct([
                'attr' => [
                    'class'  => 'sign-up-in',
                    'method' => 'POST'
                ],
                'fields' => [
                    'firstname' => [
                        'label' => 'First name *',
                        'type' => 'text',
                        'validators' => [
                            'validate_field_not_empty',
                            'validate_name_length',
                            'validate_no_symbols_numbers'
                        ],
                        'extra' => [
                            'attr' => [
                                'class'       => 'sign-up-in__input',
                                'placeholder' => 'Johnny',
                            ]
                        ]
                    ],
                    'lastname' => [
                        'label' => 'Last name *',
                        'type' => 'text',
                        'validators' => [
                            'validate_field_not_empty',
                            'validate_name_length',
                            'validate_no_symbols_numbers'
                        ],
                        'extra' => [
                            'attr' => [
                                'class'       => 'sign-up-in__input',
                                'placeholder' => 'Bravo',
                            ]
                        ]
                    ],
                    'email' => [
                        'label' => 'Email *',
                        'type' => 'email',
                        'validators' => [
                            'validate_field_not_empty',
                            'validate_email',
                            'validate_user_unique',
                        ],
                        'extra' => [
                            'attr' => [
                                'class'       => 'sign-up-in__input',
                                'placeholder' => 'johnny.bravo@gmail.com',
                            ]
                        ]
                    ],
                    'password' => [
                        'label' => 'Password *',
                        'type' => 'password',
                        'validators' => [
                            'validate_field_not_empty',
                        ],
                        'extra' => [
                            'attr' => [
                                'class'       => 'sign-up-in__input',
                                'placeholder' => '*******',
                             ]
                        ]
                    ],
                    'password_repeat' => [
                        'label' => 'Repeat password *',
                        'type'  => 'password',
                        'validators' => [
                            'validate_field_not_empty',
                        ],
                        'extra' => [
                            'attr' => [
                                'class'       => 'sign-up-in__input',
                                'placeholder' => '*******',
                            ]
                        ]
                    ],
                    'phone' => [
                        'label' => 'Phone number',
                        'type'  => 'number',
                        'validators' => [
                            'validate_numeric',
                        ],
                        'extra' => [
                            'attr' => [
                                'class'       => 'sign-up-in__input',
                                'placeholder' => '37065445347',
                            ]
                        ]
                    ],
                    'address' => [
                        'label' => 'Home address',
                        'type'  => 'text',
                        'extra' => [
                            'attr' => [
                                'class'       => 'sign-up-in__input  sign-up-in__input--last',
                                'placeholder' => 'Moscow',
                            ]
                        ]
                    ],
                ],
                'buttons' => [
                    'register' => [
                        'title' => 'Register',
                        'extra' => [
                            'attr' => [
                                'class' => 'sign-up-in__button',
                            ]
                        ]
                    ]
                ],
                'validators' => [
                    'validate_fields_match' => [
                        'password',
                        'password_repeat'
                    ]
                ]
            ]
        );

    }
}
