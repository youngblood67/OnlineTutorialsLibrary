<!-- Page Content -->
<div class="container">

    <div class="row">
        <!--<div class="col-lg-3">
            <?php
            $theme = new \App\Model\Theme();
            ?>
            <h1 class="my-4">Accueil</h1>

            <div class="list-group">
                <?php foreach ($theme->getAll() as $theme): ?>
                <a href="../public/index.php?p=recherche&idTheme=<?= $theme->idTheme ?>"
                    class="list-group-item"><?= $theme->titleTheme ?></a>
                <?php endforeach; ?>
            </div>

        </div>-->

        <!-- /.col-lg-3 -->

        <div class="col">

            <?php
                $video = new \App\Model\Video();
                $headList = $video->getLast(3);
            ?>

            <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>

                <div class="carousel-inner" role="listbox">
                    <?php
                        //for($i=0; $i<count($headList); $i++):
                    ?>
                    <div class="carousel-item active">
                        <img class="d-block img-fluid" src="<?=$headList[0]->thumbnailVideo?>" alt="First slide">
                    </div>

                    <?php //endfor;?>

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

            <div class="row">
                <?php 
                   //$video = new \App\Model\Video();
                   //var_dump($video->getAll());
                   foreach ($video->getAll() as $vid): 
                ?>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <a href="#"><img class="card-img-top" src="<?= $vid->thumbnailVideo?>" alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#"><?= $vid->titleVideo ?></a>
                            </h4>

                            <h5>
                                <?php if($vid->priceVideo == 0):?>
                                video gratuite
                                <?php else :?>
                                <?=$vid->priceVideo?>
                                euros
                                <?php endif;?>

                            </h5>

                            <p class="card-text"> <?=$vid->descriptionVideo?></p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                        </div>
                    </div>
                </div>

                <?php endforeach;?>

            </div>


        </div>


    </div>


</div>