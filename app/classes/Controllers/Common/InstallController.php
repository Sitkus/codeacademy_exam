<?php

namespace App\Controllers\Common;

use App\App;
use Core\FileDB;

class InstallController {
    public function install() {
        App::$db = new FileDB(DB_FILE);

        App::$db->createTable('users');
        App::$db->insertRow('users', ['email' => 'test@test.lt', 'password' => 'test', 'firstname' => 'Lukas', 'lastname' => 'Sitkus']);
        App::$db->createTable('reviews');
    }
}

