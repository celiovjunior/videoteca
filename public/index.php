<?php

use Videoteca\Mvc\Controller\IController;
use Videoteca\Mvc\Controller\Error404Controller;
use Videoteca\Mvc\Repository\VideoRepository;

require_once __DIR__ . "/../vendor/autoload.php";
// empty($_SERVER["PATH_INFO"])

$dbPath = __DIR__ . '/../banco.sqlite';
$pdo = new PDO("sqlite:$dbPath");
$videoRepository = new VideoRepository($pdo);
$pathInfo = $_SERVER["PATH_INFO"] ?? '/';
$httpMethod = $_SERVER["REQUEST_METHOD"];

$routes = require_once __DIR__ . "../../config/routes.php";

$key = "$httpMethod|$pathInfo";
if (array_key_exists($key, $routes)) {
    $controllerClass = $routes["$httpMethod|$pathInfo"];
    $controller = new $controllerClass($videoRepository);
} else {
    $controller = new Error404Controller();
}

/** @var IController $controller */
$controller->requestProcess();