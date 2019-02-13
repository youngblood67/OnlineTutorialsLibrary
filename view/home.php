<div class="row">
    <div class="col" style="margin-top:0px;">
        <div id="checkSession"><?=$checkSession?></div>
        <?php

        $video = new \App\Model\Video();
        $headList = $video->getLast(3);
        $showModal = "";
        ?>

        <div id="carouselHome" class="carousel slide mb-4" data-ride="carousel">
        

            <div class="carousel-inner" role="listbox">
                <?php
                for ($i = 0; $i < count($headList); $i++):
                    ?>
                <div class="carousel-item <?php if ($i == 0): ?>active<?php endif; ?>">
                    <div class="row no-gutters">
                        <div class="col-6 description_box">
                            <div class="parag">
                                <h1><?= $headList[$i]->titleVideo ?></h1><br>
                                <?= $headList[$i]->descriptionVideo ?>
                            </div>
                        </div>
                        <div class="col ">
                            <img class="d-block img-fluid img-carousel-home"
                                src="<?= is_null($headList[$i]->urlVideo) ? $headList[$i]->getYoutubeVideoThumbnail($headList[$i]->idYoutube) : $headList[$i]->getDriveVideoThumbnail($headList[$i]->urlVideo); ?>"
                                alt="First slide">
                        </div>
                    </div>


                </div>

                <?php endfor; ?>

            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!--<div id="search-result"></div>-->
        <div class="container">
            <div class="row" id="search-result">
            

            </div>
            <div class="row" id="home-page-videos">

                <?php
                
                $videoList = $video->getLast(16);
                
                foreach ($videoList as $vid):
                    ?>
                <?php
//                    var_dump($videoList);  die();
                    
                    $linkToVideo = "index.php?p=videos&idVideo=" . $vid->idVideo;
                    if (!isset($_SESSION['con'])) {
                        $showModal = "$('#connexionModal').modal('show'); return false;";
                        $checkSession = 1;
                    } else {
                        if (\App\Model\User::isSubscribed($_SESSION['email']) || $vid->priceVideo <= 0){
                            $showModal = "";
                            $checkSession = (\App\Model\User::isSubscribed($_SESSION['email'])) ? "ok" : "not ok";
                        }else {
                            $showModal = "$('#subscriptionTypeModal').modal('show'); return false;";
                            $checkSession = 3;
                        }

                    }

                    ?>

                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card h-100">
                        <a href="<?= $linkToVideo ?>"><img class="card-img-top"
                                src="<?= is_null($vid->urlVideo) ? $vid->getYoutubeVideoThumbnail($vid->idYoutube) : $vid->getDriveVideoThumbnail($vid->urlVideo); ?>
                                "
                                alt="" onclick="<?= $showModal ?>"></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="<?= $linkToVideo ?>" onclick="<?= $showModal ?>"><?= $vid->titleVideo ?></a>
                            </h4>

                            <p class="card-text"> <?= $vid->descriptionVideo ?></p>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <small class="text-muted col">&#9733; &#9733; &#9733; &#9733; &#9734;</small>

                                <div id="price col" class="btn btn-success">
                                    <?php if ($vid->priceVideo == 0): ?>
                                    Gratuit
                                    <?php elseif (isset($_SESSION['email']) && \App\Model\User::isSubscribed($_SESSION['email'])): ?>
                                    <div class="green">accès abonné</div>
                                    <?php else: ?>

                                    <?= $vid->priceVideo ?>
                                    €
                                    <?php endif;
                                        ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php endforeach; ?>

            </div>


        </div>


    </div>


</div>
<div id="checkSession"><?=$checkSession ?></div>