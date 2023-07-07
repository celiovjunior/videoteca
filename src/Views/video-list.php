<?php

require_once __DIR__ . "/open-html.php"; ?>
    <section>
        <ul>
            <?php foreach ($videoList as $video); ?>
                <li class="video-box">
                    <h3><?= $video->title ?></h3>
                    <iframe width="350" height="197" src="<?php echo $video->url; ?>" title="<?= $video->title; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>                        
                    <div class="video-box__actions">
                        <a class="video-box__edit" href="/editar-video?id=<?= $video->id; ?>">Edit</a>
                        <a class="video-box__delete" href="/remover-video?id=<?= $video->id; ?>">Delete</a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
<?php require_once __DIR__ . "/close-html.php";