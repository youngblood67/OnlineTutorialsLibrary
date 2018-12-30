<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">TutosVideos</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../public/index.php?p=accueil">Accueil
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Recherche</a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-lg-3">

            <h1 class="my-4">Recherche</h1>
            <div class="list-group">
                <?php foreach (\App\Tables\Theme::getAll() as $theme): ?>
                    <a href="#" class="list-group-item"><?= $theme->title ?></a>
                <?php endforeach; ?>
            </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">
            <div id="listing" class="row justify-content-center">

                <?php foreach (\App\Tables\Video::getLast(3) as $vid): ?>
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

            </div>
        </div>

    </div>
    <!-- /.col-lg-9 -->

</div>
<!-- /.row -->

</div>
<!-- /.container -->

