<div id="container">

    <form method="post" action="../treatment/trtChooseSubscription.php">

        <div class="form-check">
            <input class="form-check-input" type="radio" name="subscriptions" id="subscription1" value="1"
                checked>
            <label class="form-check-label" for="subscription1">
                <h5>ON'DAY</h5>
                Profitez d'un accès visionnage illimité pendant 24h
            </label>
        </div>
        <br>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="subscriptions" id="subscription2" value="2">
            <label class="form-check-label" for="subscription2">
                <h5>ON'WEEK</h5>
                Profitez d'un accès visionnage illimité pendant 7 jours
            </label>
        </div>
        <br>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="subscriptions" id="subscription3" value="3">
            <label class="form-check-label" for="subscription3">
                <h5>ON'MONTH</h5>
                Profitez d'un accès visionnage illimité pendant 1 mois avec 7 jours d'essai
            </label>
        </div>

        <div id="buy_it" class="form-check">
            <input class="form-check-input" type="radio" name="subscriptions" id="subscription3" value="0">
            <label class="form-check-label" for="subscription3">
                <h5>ON'IT</h5>
                Visionnage et téléchargement libre de la vidéo.

            </label>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="form-group ">
                <button type="submit" class="btn btn-primary">Valider</button>
            </div>
        </div>
    </form>


</div>