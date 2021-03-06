<div class="container">
    <div>

        <?php
        if ($_SESSION['con'] != 'loggedOn') {
            header('Location: http://localhost/onlinetutorialslibrary/public/index.php?p=accueil' . $error);
        }

        $urlVideo = "";
        $canRate = "false";
        $video = new \App\Model\Video();
        $videoInfo = $video->getAllVideoInfoById($idVideo);
        $idUser = \App\Model\User::getIdUser($_SESSION['email']);
        ?>
        <div class="hidden">
            <span id="idVideo"><?= $idVideo ?></span>
            <span id="idUser"><?= $idUser ?></span>
        </div>
        <div class="container">


            <div class="row">
                <div class="col">
                    <div class="title-vid">
                        <h3 class="item_name"><?= $videoInfo->titleVideo ?></h3>
                    </div>
                    <div class="card mt-4">

                        <?php if ($videoInfo->urlVideo == null): ?>
                            <!-- 1. The <iframe> (and video player) will replace this <div> tag. -->
                            <div id="player"></div>

                            <script>
                                // 2. This code loads the IFrame Player API code asynchronously.
                                var tag = document.createElement('script');

                                tag.src = "https://www.youtube.com/iframe_api";
                                var firstScriptTag = document.getElementsByTagName('script')[0];
                                firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

                                // 3. This function creates an <iframe> (and YouTube player)
                                //    after the API code downloads.
                                var player;

                                function onYouTubeIframeAPIReady() {
                                    player = new YT.Player('player', {
                                        height: '500vh',
                                        width: '100%',
                                        videoId: '<?=$videoInfo->idYoutube?>',
                                        events: {
                                            'onReady': onPlayerReady,
                                            'onStateChange': onPlayerStateChange
                                        }
                                    });
                                }

                                // 4. The API will call this function when the video player is ready.
                                function onPlayerReady(event) {
                                    event.target.playVideo();
                                }

                                // 5. The API calls this function when the player's state changes.
                                //    The function indicates that when playing a video (state=1),
                                //    the player should play for six seconds and then stop.
                                var done = false;

                                function onPlayerStateChange(event) {
                                    if (event.data == YT.PlayerState.PLAYING && !done) {
                                        setTimeout(stopVideo, 6000);
                                        done = true;
                                    }
                                }

                                function stopVideo() {
                                    player.stopVideo();
                                }
                            </script>

                        <?php else: ?>
                        <?php if (\App\Model\User::isSubscribed($_SESSION['email']) || $video->verifyIfExistVideoUser($idUser, $videoInfo->idVideo) == 1) {
                            $urlVideo = "http://localhost/onlinetutorialslibrary/videos/" . $videoInfo->urlVideo . ".mp4";
                        } ?>
                            <video controls preload="metadata" width="100%"
                                   poster="<?= "http://localhost/onlinetutorialslibrary/videos/" . $videoInfo->urlVideo . ".PNG" ?>">
                                <source src="<?= $urlVideo ?>"
                                        type="video/mp4"/>
                            </video>

                        <?php endif; ?>


                        <div class="simpleCart_shelfItem">
                            <h4 id="video" class="item_name margin" data-id="<?= $videoInfo->idVideo ?>"
                                data-price="<?= $videoInfo->priceVideo ?>"><?= $videoInfo->titleVideo ?></h4>
                            <h4 class="margin">
                                <?php if ($videoInfo->priceVideo == 0): ?>
                                    Gratuit
                                <?php else : ?>
                                    <span id="video-price" class="item_price"> <?= $videoInfo->priceVideo ?></span>
                                    €
                                <?php endif; ?>
                            </h4>
                            <!--                            <p class="card-text">  description ???  </p>-->
                            <div class="margin" id="starsRating"><span
                                         id="stars"> </span>
                                
                            </div>

                            <?php if ($videoInfo->priceVideo > 0): ?>
                                <?php if ($video->verifyIfExistVideoUser($idUser, $videoInfo->idVideo) == 0): ?>
                                    <button data-id="<?= $videoInfo->idVideo ?>" id="add-to-basket"
                                            class="btn btn-info margin">Ajouter au panier
                                    </button>
                                <?php else: ?>
                                    <button class="btn btn-info margin" disabled>achetée
                                    </button>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- /.card -->

                    <div class="card card-outline-secondary my-4">
                        <div class="card-header">
                            Commentaires :

                        </div>
                        <div class="card-body">
                            <?php if (\App\Model\User::isSubscribed($_SESSION['email']) || $videoInfo->priceVideo == 0 || $video->verifyIfExistVideoUser($idUser, $videoInfo->idVideo) == 1): ?>
                            <?php $canRate="true";?>
                                <div id="user-comment">

                                    <textarea id="comment" class="form-control" rows="3"
                                              placeholder="Votre commentaire"></textarea>
                                    <button id="btn-comment" class="btn btn-success mt-2">Laisser un commentaire</button>
                                    <div id="list-comments" class="margin-bottom"></div>
                                </div>
                            <?php endif; ?>
                            <div id="comments-list"></div>
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
<?php 
if (\App\Model\User::isSubscribed($_SESSION['email']) || $videoInfo->priceVideo == 0 || $video->verifyIfExistVideoUser($idUser, $videoInfo->idVideo) == 1)
$canRate="true";
 ?>
                            
<div id="canRate" style="display:none;"><?=$canRate?></div>
