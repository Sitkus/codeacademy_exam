<?php

use Core\Router;

// Auth Controllers
Router::add('login', '/login', \App\Controllers\Common\Auth\LoginController::class, 'login');
Router::add('register', '/register', \App\Controllers\Common\Auth\RegisterController::class, 'register');
Router::add('logout', '/logout', \App\Controllers\Common\Auth\LogoutController::class, 'logout');
Router::add('install', '/install', \App\Controllers\Common\InstallController::class, 'install');

// Common Routes
Router::add('index', '/', \App\Controllers\Common\HomeController::class);
Router::add('index2', '/index', \App\Controllers\Common\HomeController::class);

// Other page routes
Router::add('about-us', '/about-us', \App\Controllers\Common\AboutUsController::class);

// API Routes
Router::add('api_get', '/api/reviews/get', \App\Controllers\Common\API\ReviewApiController::class);
Router::add('api_create', '/api/reviews/create', \App\Controllers\User\API\ReviewApiController::class, 'create');
