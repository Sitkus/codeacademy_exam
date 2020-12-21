<?php

namespace App\Views\Forms\Review;

class ReviewCreateForm extends ReviewBaseForm
{
    public function __construct() {
        parent::__construct();
        $this->data['attr']['id'] = 'review-create-form';
        $this->data['buttons']['create'] = [
            'title' => 'Post!',
        ];
    }
}
