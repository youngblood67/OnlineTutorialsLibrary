
<span id="id-idUser" class="d-none"><?= $idUser ?></span>
<span id="id-pid" class="d-none"><?= $pid ?></span>
<span id="id-payerID" class="d-none"><?= $payerID ?></span>
<span id="id-paymentID" class="d-none"><?= $paymentID ?></span>
<span id="id-token" class="d-none"><?= $token ?></span>
<span id="id-amount" class="d-none"><?= $amount ?></span>


<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h4 id="title">Récapitulatif de la commande d'un montant de <?= $amount ?> € </h4>
            <div id="results">


            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<!---->
<!--var_dump($idUser);-->
<!---->
<!--$paypal = new \App\Model\PaypalPayment();-->
<!--$res = $paypal->order($pid,$idUser,$payerID,$paymentID,$token);-->
<!--var_dump($res);-->
<!---->
<!---->
