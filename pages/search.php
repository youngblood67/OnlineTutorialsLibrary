<?php

if (isset($_GET['idTheme'])) {
    $idTheme = intval($_GET['idTheme']);
} else {
    $idTheme = 0;
}
//echo "<h1>{$cat}</h1>";
?>



<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-lg-3">
            <?php
            $theme = new \App\Tables\Theme();
            ?>
            <h1 class="my-4">Recherche</h1>
            <div class="list-group">
                <?php foreach ($theme->getAll() as $theme): ?>
                    <a href="../public/index.php?p=recherche&idTheme=<?= $theme->idTheme ?>"
                       class="list-group-item"><?= $theme->title ?></a>
                <?php endforeach; ?>
            </div>

        </div>
        <!-- /.col-lg-3 -->
        <?php
            $video = new \App\Tables\Video;
        ?>
        <div class="col-lg-9">
            <div id="listing" class="row justify-content-center">
                <?php if ($idTheme === 0): ?>
                    <?php foreach ($video->getLast(10) as $vid): ?>
                        <div class="div-video">
                            <a href="<?= $vid->url; ?>">
                                <div class="video"><?= $vid->title; ?></div>
                            </a>
                            <iframe style="margin-bottom: 10px" width="560" height="315" src="<?= $vid->url; ?>"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <?php foreach ($video->getLastByTheme($idTheme, 10) as $vid): ?>
                        <div class="div-video">
                            <a href="<?= $vid->url; ?>">
                                <div class="video"><?= $vid->vidTitle; ?></div>
                            </a>
                            <iframe style="margin-bottom: 10px" width="560" height="315" src="<?= $vid->url; ?>"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

    </div>
    <!-- /.col-lg-9 -->

</div>
<!-- /.row -->

</div>
<!-- /.container -->

