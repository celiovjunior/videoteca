<?php
require_once __DIR__ . '/open-html.php'; 
/** @var \Videoteca\Mvc\Entity\Video|null $video */
?>
    <body>
    <h1>Preencha o formulário a seguir para cadastrar um novo vídeo:</h1>
    <form  method="post">
        <label for="url">Url do vídeo:</label>
        <input type="url" name="url" value="<?= $video?->url; ?>">

        <label for="title">Título do vídeo:</label>
        <input type="text" name="title" id="title" value="<?= $video?->title; ?>">

        <input type="submit" value="Cadastrar">
    </form>
<?php require_once __DIR__ . '/close-html.php';