<?php

namespace Videoteca\Mvc\Controller;
use Videoteca\Mvc\Entity\Video;
use Videoteca\Mvc\Repository\VideoRepository;

class EditVideoController
{
    public function __construct(private VideoRepository $videoRepository) {}

    public function requestProcess(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id === false || $id === null) {
            header('Location: /?success=0');
        } 
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

        $video = new Video($url, $title);
        $video->setId($id);

        $success = $this->videoRepository->update($video);

        if ($success === false) {
            header('Location: /?success=0');
        } else {
            header('Location: /?success=1');
        }
    }
}