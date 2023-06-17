<?php

namespace Videoteca\Mvc\NewVideoController;
use Videoteca\Mvc\Entity\Video;
use Videoteca\Mvc\Repository\VideoRepository;

class NewVideoController
{
    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function requestProcess(Video $video): bool
    {
        $newVideo = $this->videoRepository->create($video);
        return $newVideo;
    }
}