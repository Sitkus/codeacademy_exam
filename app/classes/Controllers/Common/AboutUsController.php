<?php

namespace App\Controllers\Common;

use App\App;
use App\Views\BasePage;
use App\Views\Forms\Review\ReviewCreateForm;
use App\Views\Tables\User\ReviewTable;
use Core\View;
use Core\Views\Link;

class AboutUsController
{
    protected BasePage $page;

    public function __construct()
    {
        $this->page = new BasePage([
            'title' => 'About Us',
            'js' => ['/media/js/user/review.js']
        ]);
    }
    public function index(): ?string
    {
        $user = App::$session->getUser();

        if ($user) {
            $forms = [
                'create' => (new ReviewCreateForm())->render(),
            ];
        } else {
            $links = [
                'register' => (new Link([
                    'url' => App::$router::getUrl('register'),
                    'text' => 'Would you like to leave a review? Register!'
                ]))->render()
            ];
        }

        $rows = App::$db->getRowsWhere('reviews');

        $table = new ReviewTable();
        $content = (new View([
            'title' => 'Reviews',
            'table' => $table->render(),
            'forms' => $forms ?? [],
            'message' => $text ?? [],
            'links' => $links ?? []
        ]))->render(ROOT . '/app/templates/content/about-us.tpl.php');

        $this->page->setContent($content);
        return $this->page->render();
    }
}
