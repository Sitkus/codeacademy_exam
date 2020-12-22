<?php

namespace App\Views;

use Core\Views\Page;

class BasePage extends Page {
    public function __construct($data) {
        $nav = new Navigation();
        $footer = new Footer();

        parent::__construct($data + [
                'css' => [
                    'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap',
                    '/media/css/style.css'
                ],
                'js' => [],
                'header' => $nav->render(),
                'footer' => $footer->render()
            ]);
    }

    public function addCSS($link): void {
        $this->data['css'][] = $link;
    }

    public function addJS($link): void {
        $this->data['js'][] = $link;
    }

    public function setTitle($title): void {
        $this->data['title'] = $title;
    }

    public function setHeader($header): void {
        $this->data['header'] = $header;
    }

    public function setContent($content): void {
        $this->data['content'] = $content;
    }

    public function setFooter($footer): void {
        $this->data['footer'] = $footer;
    }
}
