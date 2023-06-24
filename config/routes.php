<?php

use Videoteca\Mvc\Controller\DeleteVideoController;
use Videoteca\Mvc\Controller\EditVideoController;
use Videoteca\Mvc\Controller\LoginFormController;
use Videoteca\Mvc\Controller\NewVideoController;
use Videoteca\Mvc\Controller\VideoFormController;
use Videoteca\Mvc\Controller\VideoListController;

return [
    'GET|/' => VideoListController::class,
    'GET|/novo-video' => VideoFormController::class,
    'POST|/novo-video' => NewVideoController::class,
    'GET|/editar-video' => VideoFormController::class,
    'POST|/editar-video' => EditVideoController::class,
    'GET|/remover-video' => DeleteVideoController::class,
    'GET|/login' => LoginFormController::class,
];