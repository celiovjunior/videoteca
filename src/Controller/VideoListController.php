<?php

namespace Videoteca\Mvc\Controller;
use Videoteca\Mvc\Repository\VideoRepository;

class VideoListController implements IController
{
    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function requestProcess(): void
    {
        session_start(); // sempre dar start quando usar o $_SESSION
        if (!array_key_exists('logged', $_SESSION)) {
            header("Location: /login");
            return;
        }

        $videoList = $this->videoRepository->all();
        require_once __DIR__ . "../../Views/video-list.php";
    }
}