<?php

namespace App\Controllers\Common;

use App\Abstracts\Controller;
use App\Views\BasePage;
use App\Views\Forms\Admin\PizzaDeleteForm;
use App\Views\Forms\Admin\OrderCreateForm;
use Core\View;
use App\Views\Content\HomeContent;

class HomeController {
    protected $page;

    /**
     * Controller constructor.
     *
     * We can write logic common for all
     * other methods
     *
     * Goal is to prepare $page
     */
    public function __construct() {
        $this->page = new BasePage([
            'title' => 'Home',
        ]);
    }

    /**
     * Home Controller Index
     *
     * @return string|null
     * @throws \Exception
     */
    public function index(): ?string {
        $content = (new View([
            'forms' => $forms ?? [],
            'links' => $links ?? []
        ]))->render(ROOT . '/app/templates/content/index.tpl.php');

        $this->page->setContent($content);

        return $this->page->render();
    }
}

