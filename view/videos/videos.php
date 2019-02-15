<div class="container">
    <div>

        <?php
        if($_SESSION['con']!='loggedOn') {
            header('Location: http://localhost/onlinetutorialslibrary/public/index.php?p=accueil' . $error);
        }
       
        $urlVideo = "";
        $video = new \App\Model\Video();
        //$vid = $video->getVideoById($idVideo);
        $videoInfo = $video->getAllVideoInfoById($idVideo); /*var_dump($video->getAllVideoInfoById($idVideo));*/?>

        <div class="container">


            <div class="row">
                <div class="col">

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
                            <?php if(\App\Model\User::isSubscribed($_SESSION['email'])){
                                $urlVideo =  "http://localhost/onlinetutorialslibrary/videos/" . $videoInfo->urlVideo . ".mp4";
                             } ?>
                             <video controls preload="metadata" width="100%"
                                   poster="<?= "http://localhost/onlinetutorialslibrary/videos/" . $videoInfo->urlVideo . ".PNG" ?>">
                                <source src="<?= $urlVideo ?>"
                                        type="video/mp4"/>
                            </video>
                            
                        <?php endif; ?>


                        <div class="card-body">
                            <h3 class="card-title"><?= $videoInfo->titleVideo ?></h3>
                            <h4>
                                <?php if ($videoInfo->priceVideo == 0): ?>
                                    Gratuit
                                <?php else : ?>
                                    <?= $videoInfo->priceVideo ?>
                                    €
                                <?php endif; ?>
                            </h4>
                            <p class="card-text"><?= $videoInfo->titleVideo ?></p>
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
                                un commentaire
                            </button>
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