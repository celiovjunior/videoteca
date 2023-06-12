<?php
    $dbPath = __DIR__ . '/banco.sqlite';
    $pdo = new PDO("sqlite:$dbPath");
    $videoList = $pdo->query("SELECT * FROM videos;")->fetchAll(PDO::FETCH_ASSOC);
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Videoteca</title>
</head>
<body>
    <h1>olá mundo!</h1>
    <h2>Bem vindo ao <b>Videoteca</b></h2>
    <nav>
        <ul>
            <li><a href="./pages/enviar-video.html">Criar registro</a></li>
            <li><a href="./pages/lista-video.html">Ver lista</a></li>
        </ul>
    </nav>
    <section>
        <ul>
            <?php foreach ($videoList as $video): ?>
                <?php if (!str_starts_with($video['url'], 'http')) {
                    $video['url'] = "https://www.youtube.com/embed/uLovSZ8AQrk";
                } ?>

                    <li>
                        <h3><?= $video['title'] ?></h3>
                        <iframe width="703" height="395" src="<?= $video['url'] ?>" title="<?= $video['title'] ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <div>
                            <a href="/formulario.php?id=<?= $video['id']; ?>">Editar</a>
                            <a href="/remover-video.php?id=<?= $video['id']; ?>">Excluir</a>
                        </div>
                    </li>

            <?php endforeach; ?>
        </ul>
    </section>
</body>
</html>