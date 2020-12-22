<?php

namespace App\Views;

use Core\View;

class Footer extends View {
    public function __construct() {
        parent::__construct([
            'footer' => '&copy; ' . Date('Y') . '. Lukas Šitkus, all rights reserved.'
        ]);
    }

    public function render($template_path = ROOT . '/app/templates/footer.tpl.php') {
        return parent::render($template_path);
    }
}


