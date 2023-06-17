<?php

namespace Videoteca\Mvc\Controller;
use Videoteca\Mvc\Entity\Video;
use Videoteca\Mvc\Repository\VideoRepository;

class NewVideoController implements IController
{
    public function __construct(private VideoRepository $videoRepository) {}

    public function requestProcess():void
    {
        $url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
        if ($url === false) {
            header('Location: /?success=0');
            return;
        }
        $title = filter_input(INPUT_POST, 'title');
        if ($title === false) {
            header('Location: /?success=0');
            return;
        }

        $sucess = $this->videoRepository->create(new Video($url, $title));
        if ($sucess === false) {
            header('Location: /?success=0');
        } else {
            header('Location: /?success=1');
        }
    }
}