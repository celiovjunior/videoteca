<?php

namespace Videoteca\Mvc\Controller;
use Videoteca\Mvc\Repository\VideoRepository;

class DeleteVideoController implements IController
{
    public function __construct(private VideoRepository $videoRepository) {}

    public function requestProcess(): void
    {
        $id =filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id === null || $id === false) {
            header('Location: /?success=0');
            return;
        }

        $success = $this->videoRepository->delete($id);
        if ($success === false) {
            header('Location: /?success=0');
        } else {
            header('Location: /?success=1');
        }
    }
}