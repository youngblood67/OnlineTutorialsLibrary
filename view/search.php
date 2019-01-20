<?php

if (isset($_GET['idTheme'])) {
    $idTheme = intval($_GET['idTheme']);
} else {
    $idTheme = 0;
}
?>


<!-- Page Content -->
<div class="container">

    <div class="row">

       <?php




       ?>

        <div class="col-lg-3">
            <?php
            $theme = new \App\Model\Theme();
            ?>
            <h1 class="my-4">Recherche</h1>
            <div class="list-group">
                <?php foreach ($theme->getAll() as $theme): ?>
                    <a href="../public/index.php?p=recherche&idTheme=<?= $theme->idTheme ?>"
                       class="list-group-item"><?= $theme->titleTheme ?></a>
                <?php endforeach; ?>
            </div>

        </div>
        <!-- /.col-lg-3 -->
        <?php
        $video = new \App\Model\Video();

        ?>
        <div class="col-lg-9">
            <div id="listing" class="row justify-content-center">
                <?php if ($idTheme === 0): ?>
                    <?php foreach ($video->getLast(10) as $vid): ?>
                        <div class="div-video">
                            <a href="index.php?p=videos&idVideo=<?= $vid->idVideo ?>">
                                <div class="video"><?= $vid->titleVideo; ?></div>
                            </a>
                            <div class="text-center">
                                <a href="index.php?p=videos&idVideo=<?= $vid->idVideo ?>">
                                    <img width="50%" alt="thumbnail"
                                         src="<?= $vid->thumbnailVideo; ?>"/>
                                </a></div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>

                    <?php foreach ($video->getLastByTheme($idTheme, 10) as $vid): ?>
                        <div class="div-video">

                            <a href="index.php?p=videos&idVideo=<?= $vid->idVideo ?>">
                                <div class="video"><?= $vid->titleVideo; ?></div>
                            </a>
                            <div class="text-center">
                                <a href="index.php?p=videos&idVideo=<?= $vid->idVideo ?>">
                                    <img width="50%" alt="thumbnail"
                                         src="<?= $vid->thumbnail; ?>"/>
                                </a></div>
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

