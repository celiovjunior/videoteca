<?php

namespace Videoteca\Mvc\VideoFormController;
use Videoteca\Mvc\Entity\Video;
use Videoteca\Mvc\Repository\VideoRepository;

class VideoFormController
{
    public function __construct(private VideoRepository $repository)
    {
    }
    public function requestProcess():void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        /** @var ?Video $video */
        $video = null;
        if ($id !== false && $id !== null) {
            $video = $this->repository->find($id);
        }
    }
}