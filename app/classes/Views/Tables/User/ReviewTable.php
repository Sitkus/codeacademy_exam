<?php

namespace App\Views\Tables\User;

use Core\Views\Table;

class ReviewTable extends Table {
    public function __construct($reviews = []) {
        parent::__construct([
            'headers' => [
                'ID',
                'Name',
                'Comment',
                'Date'
            ],
            'rows' => $reviews
        ]);
    }
}
