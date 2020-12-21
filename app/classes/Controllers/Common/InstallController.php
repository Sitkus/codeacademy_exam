<?php

namespace App\Controllers\Common;

use App\App;
use Core\FileDB;

class InstallController
{
    public function install()
    {
        App::$db = new FileDB(DB_FILE);

        App::$db->createTable('users');
        App::$db->insertRow('users', ['email' => 'test@test.lt', 'password' => 'test', 'user_name' => 'testas', 'role' => 'user']);
        App::$db->insertRow('users', ['email' => 'admin@admin.lt', 'password' => 'admin', 'user_name' => 'Admin God', 'role' => 'admin']);
        App::$db->createTable('pizzas');
        App::$db->createTable('orders');
    }
}

