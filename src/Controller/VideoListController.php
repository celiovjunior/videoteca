<?php

namespace Videoteca\Mvc\Controller;
use Videoteca\Mvc\Repository\VideoRepository;

class VideoListController
{
    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function requestProcess(): void
    {
        $videoList = $this->videoRepository->all();
        require_once __DIR__ . "/../../open-html.php"; ?>
        <body>
        <h1>olá mundo!</h1>
        <h2>Bem vindo ao <b>Videoteca</b></h2>
        <nav>
            <ul>
                <li><a href="./novo-video">Criar registro</a></li>
                <li><a href="./pages/lista-video.html">Ver lista</a></li>
            </ul>
        </nav>
        <section>
            <ul>
                <?php foreach ($videoList as $video): ?>
                        <li>
                            <h3><?= $video->title ?></h3>
                            <iframe width="703" height="395" src="<?php echo $video->url; ?>" title="<?= $video->title; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>                        
                            <div>
                                <a href="/editar-video?id=<?= $video->id; ?>">Editar</a>
                                <a href="/remover-video?id=<?= $video->id; ?>">Excluir</a>
                            </div>
                        </li>

                <?php endforeach; ?>
            </ul>
        </section>
        <?php require_once __DIR__ . "/../../close-html.php";

    }
}