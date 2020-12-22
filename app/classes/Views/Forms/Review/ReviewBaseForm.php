<?php

namespace App\Views\Forms\Review;

use Core\Views\Form;

class ReviewBaseForm extends Form {
    public function __construct() {
        parent::__construct([
            'fields' => [
                'comment' => [
                    'label' => 'Leave review',
                    'type'  => 'textarea',
                    'validators' => [
                        'validate_field_not_empty',
                        'validate_textarea_length'
                    ],
                    'extra' => [
                        'attr' => [
                            'class'       => 'reviews__textarea',
                            'placeholder' => 'Type in your review...'
                        ],
                    ],
                ],
            ],
        ]);
    }
}
