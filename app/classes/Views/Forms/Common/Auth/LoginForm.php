<?php

namespace App\Views\Forms\Common\Auth;

use Core\Views\Form;

class LoginForm extends Form
{
    public function __construct()
    {
        parent::__construct([
            'attr' => [
                'class'  => 'sign-up-in',
                'method' => 'POST'
            ],
            'fields' => [
                'email' => [
                    'label' => 'Email',
                    'type' => 'email',
                    'validators' => [
                        'validate_field_not_empty',
                        'validate_email',
                        'validate_user_doesnt_exists'
                    ],
                    'extra' => [
                        'attr' => [
                            'class'       => 'sign-up-in__input',
                            'placeholder' => 'johnny.bravo@gmail.com',
                        ],
                    ],
                ],
                'password' => [
                    'label' => 'Password',
                    'type' => 'password',
                    'validators' => [
                        'validate_field_not_empty',
                        'validate_correct_password'
                    ],
                    'extra' => [
                        'attr' => [
                            'class'       => 'sign-up-in__input',
                            'placeholder' => '*******',
                        ],
                    ],
                ],
            ],
            'buttons' => [
                'login' => [
                    'title' => 'Login',
                    'extra' => [
                        'attr' => [
                            'class' => 'sign-up-in__button',
                        ]
                    ]
                ],
            ],
            'validators' => [
                'validate_login' => [
                    'email',
                    'password',
                ]
            ]
        ]);
    }
}
