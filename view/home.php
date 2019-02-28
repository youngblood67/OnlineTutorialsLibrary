<?php

        $video = new \App\Model\Video();
        $headList = $video->getFreeVideo();
        $showModal = "";
        $sessionExists ="";
        $userSubscribed ="";
        $userVideoList ="";

        $checkSession = false;
        if(isset($_SESSION['email'])) {
            $idUser = \App\Model\User::getIdUser($_SESSION['email']);
            $userVideoList = $video->getPurchasedVideos($idUser);
            

        }

        if(isset($_SESSION['email']) && \App\Model\User::isSubscribed($_SESSION['email'])) {
            $userSubscribed = "true";
        }
        else {
            $userSubscribed = "false";
        }

        if (!isset($_SESSION['con'])) {
            $showModal = "$('#connexionModal').modal('show'); return false;";
            $sessionExists = "false";
        } else {
            $showModal = "";
            $sessionExists = "true";
        }
        ?>

<div id="carouselHome" class="carousel slide" data-ride="carousel" data-interval="10000">
    <div class="carousel-inner" role="listbox">
        <?php
                for ($i = 0; $i < count($headList); $i++):
                    ?>
        <div class="carousel-item <?php if ($i == 0): ?>active<?php endif; ?>">
            <div class="row no-gutters">
                <div class="col-6 description_box">
                    <div class="parag">
                        <?= $headList[$i]->titleVideo ?>
                        
                    </div>
                    <br><div id="freeVid"> Vidéo gratuite</div>
                   
                </div>
                <div class="col ">
                    <a href="index.php?p=videos&idVideo=<?=$headList[$i]->idVideo?>" onclick="<?= $showModal ?>">
                        <img class="d-block img-fluid img-carousel-home"
                            src="<?= is_null($headList[$i]->urlVideo) ? $headList[$i]->getYoutubeVideoThumbnail($headList[$i]->idYoutube) : $headList[$i]->getDriveVideoThumbnail($headList[$i]->urlVideo); ?>"
                            alt="First slide">
                    </a>
                </div>
            </div>


        </div>

        <?php endfor; ?>

    </div>
    <a class="carousel-control-prev" href="#carouselHome" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselHome" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!--<div id="search-result"></div>-->
<div class="container">

    <div class="row" id="home-page-videos">

        <?php
                
                $videoList = $video->getLast(16);
                
                foreach ($videoList as $vid):
                    ?>
        <?php
//                    var_dump($videoList);  die();
                    $vidRateList = $video->getRating($vid->idVideo);
                    $vidRate = 0.0;
                    $nbTotalRate = 0.0;
                    if(count($vidRateList)>0)
                    {
                        for($i = 0; $i<count($vidRateList); $i++){
                            $vidRate+=$vidRateList[$i]->rating;
                            $nbTotalRate++;
                        }
                        $vidRate=$vidRate/$nbTotalRate;


                        switch(intval($vidRate)) {
                            case 1:
                            $vidRate = "&#9733;&#9734;&#9734;&#9734;&#9734;";
                            break;
                            case 2:
                            $vidRate = "&#9733;&#9733;&#9734;&#9734;&#9734;";
                            break;
                            case 3:
                            $vidRate = "&#9733;&#9733;&#9733;&#9734;&#9734;";
                            break;
                            case 4:
                            $vidRate = "&#9733;&#9733;&#9733;&#9733;&#9734;";
                            break;
                            case 5:
                            $vidRate = "&#9733;&#9733;&#9733;&#9733;&#9733;";
                            break;
                            default :
                            $vidRate = "&#9734;&#9734;&#9734;&#9734;&#9734;";
                            break;
                        }
                    }
                    else {
                        $vidRate = "";
                    }
                    
                    
                    
                    $linkToVideo = "index.php?p=videos&idVideo=" . $vid->idVideo;
                    

                    ?>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card h-100 shadow">
                <a href="<?= $linkToVideo ?>"><img class="card-img-top" src="<?= is_null($vid->urlVideo) ? $vid->getYoutubeVideoThumbnail($vid->idYoutube) : $vid->getDriveVideoThumbnail($vid->urlVideo); ?>
                                " alt="" onclick="<?= $showModal ?>"></a>
                <div class="card-body">
                    <h6 class="card-title">
                        <a href="<?= $linkToVideo ?>" onclick="<?= $showModal ?>"><b><?= $vid->titleVideo ?></b></a>
                    </h6>

                    <p class="card-text"> <?= $vid->descriptionVideo ?></p>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <h5 class="text-warning col"><?=$vidRate?></h5>

                        <div id="price col">
                            <h6>
                                <?php if ($vid->priceVideo == 0): ?>
                                Gratuit
                                <?php elseif (isset($_SESSION['email']) && \App\Model\User::isSubscribed($_SESSION['email'])): ?>
                                <div>accès abonné</div>
                                <?php elseif(isset($_SESSION['email']) && $video->verifyIfExistVideoUser($idUser,$vid->idVideo) > 0) : ?>
                                achetée
                                <?php else: ?>
                                <?= $vid->priceVideo ?>
                                €
                                <?php endif;?>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php endforeach; ?>

    </div>
    <div class="row" id="search-result"></div>

</div>



<div id="checkSession" style="display:none"><?=$sessionExists ?></div>
<div id="checkSubscription" style="display:none"><?=$userSubscribed ?></div>
<div id="userVideoList" style="display:none"><?=json_encode($userVideoList)?></div>