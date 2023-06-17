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

        require_once __DIR__ . '/../../open-html.php'; ?>
            <body>
            <h1>Preencha o formulário a seguir para cadastrar um novo vídeo:</h1>
            <form  method="post">
                <label for="url">Url do vídeo:</label>
                <input type="url" name="url" value="<?= $video?->url; ?>">

                <label for="title">Título do vídeo:</label>
                <input type="text" name="title" id="title" value="<?= $video?->title; ?>">

                <input type="submit" value="Cadastrar">
            </form>
        <? require_once __DIR__ . '/../../close-html.php';
    }
}