<?php

use Videoteca\Mvc\Controller\IController;
use Videoteca\Mvc\Controller\VideoListController;
use Videoteca\Mvc\Controller\DeleteVideoController;
use Videoteca\Mvc\Controller\EditVideoController;
use Videoteca\Mvc\Controller\Error404Controller;
use Videoteca\Mvc\Controller\NewVideoController;
use Videoteca\Mvc\Repository\VideoRepository;
use Videoteca\Mvc\Controller\VideoFormController;

require_once __DIR__ . "/../vendor/autoload.php";
// empty($_SERVER["PATH_INFO"])

$dbPath = __DIR__ . '/../banco.sqlite';
$pdo = new PDO("sqlite:$dbPath");
$videoRepository = new VideoRepository($pdo);
$pathInfo = $_SERVER["PATH_INFO"] ?? '/';
$httpMethod = $_SERVER["REQUEST_METHOD"];

$routes = require_once __DIR__ . "../../config/routes.php";

$controllerClass = $routes["$httpMethod|$pathInfo"];

/** @var IController $controller */
$controller = new $controllerClass($videoRepository);
$controller->requestProcess();
