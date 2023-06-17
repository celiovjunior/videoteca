<?php
use Videoteca\Mvc\Controller\VideoListController;
use Videoteca\Mvc\DeleteVideoController\DeleteVideoController;
use Videoteca\Mvc\EditVideoController\EditVideoController;
use Videoteca\Mvc\NewVideoController\NewVideoController;
use Videoteca\Mvc\Repository\VideoRepository;
use Videoteca\Mvc\VideoFormController\VideoFormController;

require_once __DIR__ . "/../vendor/autoload.php";
// empty($_SERVER["PATH_INFO"])

$dbPath = __DIR__ . '/../banco.sqlite';
$pdo = new PDO("sqlite:$dbPath");
$videoRepository = new VideoRepository($pdo);

if (!array_key_exists("PATH_INFO", $_SERVER) || $_SERVER["PATH_INFO"] === "/") {
    $controller = new VideoListController($videoRepository);
    $controller->requestProcess();
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
    http_response_code(404);
}
