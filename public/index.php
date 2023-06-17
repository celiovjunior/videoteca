<?php
use Videoteca\Mvc\Controller\VideoInsertController;
use Videoteca\Mvc\Controller\VideoListController;
use Videoteca\Mvc\Repository\VideoRepository;

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
        require_once __DIR__ . "/../formulario.php";
    } elseif ($_SERVER["REQUEST_METHOD"] === "POST") {
        require_once __DIR__ . "/../novo-video.php";
    }
} elseif ($_SERVER["PATH_INFO"] === "/editar-video") {
    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        require_once __DIR__ . "/../formulario.php";
    } elseif ($_SERVER["REQUEST_METHOD"] === "POST") {
        require_once __DIR__ . "/../editar-video.php";
    }
} elseif ($_SERVER["PATH_INFO"] === "/remover-video") {
    require_once __DIR__ . "/../remover-video.php";
} else {
    http_response_code(404);
}
