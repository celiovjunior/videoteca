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

        $videoList = $this->videoRepository->all();
        require_once __DIR__ . "../../Views/video-list.php";
    }
}