<div class="container">
    <div class="video">

        <p>Video n° <?= $idVideo ?></p>
        <?php
        $video = new \App\Model\Video();
        var_dump($video->getAllVideoInfoById($idVideo));


        ?>
    </div>
</div>