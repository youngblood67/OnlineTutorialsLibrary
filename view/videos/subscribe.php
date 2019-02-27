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
                            <div class="row">
                                <div class="col-md-6">

                                    <label><input type="radio"
                                                  name="optradio"
                                                  data-price="<?= $sub->priceSubscription; ?>"
                                                  value="<?= $sub->typeSubscription ?>"> <?= $sub->titleSubscription; ?>
                                    </label>

                                </div>
                                <div class="col-md-6">
                                    <div class="subscription-description">
                                        "<?= $sub->descriptionSubscription ?>"
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="valeur">Prix : <span
                                                class="total"> <?= $sub->priceSubscription; ?></span> €
                                    </div>
                                </div>
                            </div>
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