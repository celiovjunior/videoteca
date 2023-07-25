<?php
require_once __DIR__ . '/open-html.php'; 
/** @var \Videoteca\Mvc\Entity\Video|null $video */
?>
    <body>
        <div id="form">
            <h1>Novo video:</h1>
            <p>Preencha o formulário abaixo para acrescentar um novo vídeo</p>
            
            <form enctype="multipart/form-data" method="post">
                <label for="url">Url do vídeo:</label>
                <input type="url" name="url" value="<?= $video?->url; ?>">
        
                <label for="title">Título do vídeo:</label>
                <input type="text" name="title" id="title" value="<?= $video?->title; ?>">

                <label for="image">Imagem de capa:</label>
                <input accept="image/*" type="file" name="image" id="image" value="">

                <input class="button" type="submit" value="Cadastrar">
            </form>
        </div>
<?php require_once __DIR__ . '/close-html.php';