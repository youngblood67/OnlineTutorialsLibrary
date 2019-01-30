<div class="container">
    <div>

        <?php
        $video = new \App\Model\Video();
        $videoInfo = $video->getAllVideoInfoById($idVideo);
        


        ?>
        <div class="container">

            <div class="row">
                <div class="col">

                    <div class="card mt-4">
                        <img class="card-img-top img-fluid"
                            src="<?=$videoInfo->getVideoThumbnail($videoInfo->urlVideo)?>" alt="">
                        <div class="card-body">
                            <h3 class="card-title"><?=$videoInfo->titleVideo?></h3>
                            <h4>
                                <?php if($videoInfo->priceVideo == 0):?>
                                Gratuit
                                <?php else :?>
                                <?=$videoInfo->priceVideo?>
                                €
                                <?php endif;?>
                            </h4>
                            <p class="card-text"><?=$videoInfo->titleVideo?></p>
                            <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
                            4.0 stars
                        </div>
                    </div>
                    <!-- /.card -->

                    <div class="card card-outline-secondary my-4">
                        <div class="card-header">
                            Product Reviews
                        </div>
                        <div class="card-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam
                                inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam
                                aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
                            <small class="text-muted">Posted by Anonymous on 3/1/17</small>
                            <hr>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam
                                inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam
                                aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
                            <small class="text-muted">Posted by Anonymous on 3/1/17</small>
                            <hr>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam
                                inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam
                                aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
                            <small class="text-muted">Posted by Anonymous on 3/1/17</small>
                            <hr>
                            <button class="btn btn-success" data-toggle="modal" data-target="#commentModal">Laisser
                                un commentaire</button>
                        </div>
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col-lg-9 -->

            </div>

        </div>
        <!-- /.container -->

    </div>
</div>