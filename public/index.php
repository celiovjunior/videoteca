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

/** @var IController $controller */

if (!array_key_exists("PATH_INFO", $_SERVER) || $_SERVER["PATH_INFO"] === "/") {
    $controller = new VideoListController($videoRepository);
} elseif ($_SERVER["PATH_INFO"] === "/novo-video") {
    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        $controller = new VideoFormController($videoRepository);
    } elseif ($_SERVER["REQUEST_METHOD"] === "POST") {
        $controller = new NewVideoController($videoRepository);
    }
} elseif ($_SERVER["PATH_INFO"] === "/editar-video") {
    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        $controller = new VideoFormController($videoRepository);
    } elseif ($_SERVER["REQUEST_METHOD"] === "POST") {
        $controller = new EditVideoController($videoRepository);
    }
} elseif ($_SERVER["PATH_INFO"] === "/remover-video") {
    $controller = new DeleteVideoController($videoRepository);
} else {
    $controller = new Error404Controller();
}
$controller->requestProcess();
