<?php
return [
    new \App\Framework\Router\Route('/', ['GET'],
        [
            'controllerName' => \App\Controller\MainController::class,
            'action' => 'index'
        ]
    ),
    new \App\Framework\Router\Route('/^\/post\/(\d)+$/', ['GET', 'POST'],
        [
            'controllerName' => App\Controller\PostController::class,
            'action' => ['GET' => 'show', 'PUT' => 'update', 'DELETE' => 'remove'],
            'param' => 'paramResolver'
        ]
    ),
    new \App\Framework\Router\Route('/posts', ['GET', 'POST'],
        [
            'controllerName' => App\Controller\PostController::class,
            'action' => 'index',
        ]
    ),
    new \App\Framework\Router\Route('/^\/posts|^\/posts\?(.*[A-Za-z0-9])+$/', ['GET', 'POST'], [
            'controllerName' => App\Controller\PostController::class,
            'action' => 'index'
        ]
    ),
    new \App\Framework\Router\Route('/create-post', ['GET', 'POST'],
        [
            'controllerName' => \App\Controller\PostController::class,
            'action' => 'create'
        ]
    ),
    new \App\Framework\Router\Route('/create-user', ['GET', 'POST'],
        [
            'controllerName' => \App\Controller\UserController::class,
            'action' => 'index'
        ]
    ),
    new \App\Framework\Router\Route('/contact', ['GET', 'POST'],
        [
            'controllerName' => \App\Controller\ContactController::class,
            'action' => 'index'
        ]
    ),
    new \App\Framework\Router\Route('/login', ['GET', 'POST'],
        [
            'controllerName' => \App\Controller\AuthController::class,
            'action' => 'index'
        ]
    ),
    new \App\Framework\Router\Route('/logout', ['GET'],
        [
            'controllerName' => \App\Controller\AuthController::class,
            'action' => 'logout'
        ]
    ),
    new \App\Framework\Router\Route('/createTables', ['GET'],
        [
            'controllerName' => App\Controller\PostController::class,
            'action' => 'createTables'
        ]
    ),
    new \App\Framework\Router\Route('/testscript', ['GET'],
        [
            'controllerName' => App\Controller\PostController::class,
            'action' => 'testscript'
        ]
    ),
];


