<?php

$subscription = new \App\Model\Subscription();
$subscriptions = $subscription->getAll();
?>
<div class="jumbotron">
    <div id="main-subscription" class="container-fluid">
        <h4 class="margin">Choisissez une formule d'abonnement</h4>
        <div id="form-subscribe" class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="form-group">
                    <?php foreach ($subscriptions as $sub) : ?>
                        <div class="radio list-group-item">
                            <label data-price="<?= $sub->priceSubscription; ?>"><input type="radio" name="optradio"
                                          value="<?= $sub->typeSubscription ?>"> <?= $sub->titleSubscription; ?></label>
                            <div class="valeur">Prix : <span class="total"> <?= $sub->priceSubscription; ?></span> €</div>
                        </div>
                    <?php endforeach; ?>

                    <div id="btn-paypal-subscription">
                        <?php require "../view/videos/paypalSubscriptionButton.php" ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>