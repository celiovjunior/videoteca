<?php

require_once __DIR__ . "/open-html.php"; ?>
    <body>
        <header>
            <div class="navbar">
                <div class="logo">
                    <h1>videoteca.</h1>
                </div>
                <nav>
                <ul>
                    <li><a href="./novo-video">New</a></li>
                    <li><a href="./login">Login</a></li>
                    <li><a href="./pages/lista-video.html">Sign Up</a></li>
                </ul>
            </nav>
            </div>
        </header>
        <section>
            <ul>
                <?php foreach ($videoList as $video): ?>
                    <li>
                        <h3><?= $video->title ?></h3>
                        <iframe width="703" height="395" src="<?php echo $video->url; ?>" title="<?= $video->title; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>                        
                        <div>
                            <a href="/editar-video?id=<?= $video->id; ?>">Edit</a>
                            <a href="/remover-video?id=<?= $video->id; ?>">Delete</a>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>
<?php require_once __DIR__ . "/close-html.php";