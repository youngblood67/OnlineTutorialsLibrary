<div class="row">
    <div class="col" style="margin-top:0px;">

        <?php
                
                $video = new \App\Model\Video();
                $headList = $video->getLast(3);
                $showModal="";
                //var_dump($headList[0]->getVideoThumbnail($headList[0]->urlVideo));
            ?>

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">


            <div class="carousel-inner" role="listbox">
                <?php
                        for($i=0; $i<count($headList); $i++):
                    ?>
                <div class="carousel-item <?php if($i==0):?>active<?php endif;?>">
                    <div class="row no-gutters">
                        <div class="col-6 description_box">
                            <div class="parag">
                                <h1><?=$headList[$i]->titleVideo?></h1><br>
                                <?=$headList[$i]->descriptionVideo?>
                            </div>
                        </div>
                        <div class="col ">
                            <img class="d-block img-fluid img-carousel-home"
                                src="<?=$headList[$i]->getVideoThumbnail($headList[$i]->urlVideo)?>" alt="First slide">
                        </div>
                    </div>


                </div>

                <?php endfor;?>

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

        <div class="container">
                        <?php var_dump($showModal);  ?>
            <div class="row">
                <?php 
                if(isset($_GET['searchInput'])){
                    $videoList = $video->getSearchContent($_GET['searchInput']);
                }
                else {
                    $videoList = $video->getAll();
                };
                   foreach ($videoList as $vid): 
                ?>
                <?php
                    $linkToVideo = "index.php?p=videos&idVideo=".$vid->idVideo;
                    if(!isset($_SESSION['con'])){
                        $showModal = "$('#connexionModal').modal('show'); return false;";
                    }
                    else{
                        $showModal = "";
                    }
                    
                ?>

                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card h-100">
                        <a href="<?= $linkToVideo ?>"><img class="card-img-top"
                                src="<?= $vid->getVideoThumbnail($vid->urlVideo)?>" alt="" onclick="<?= $showModal ?>"></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="<?= $linkToVideo ?>"><?= $vid->titleVideo ?></a>
                            </h4>

                            <p class="card-text"> <?=$vid->descriptionVideo?></p>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <small class="text-muted col">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                <div id="price col">
                                    <?php if($vid->priceVideo == 0):?>
                                    Gratuit
                                    <?php else :?>
                                    <?=$vid->priceVideo?>
                                    €
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php endforeach;?>

            </div>


        </div>


    </div>


</div>