<div id="paypal-button-container"></div>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>

    paypal.Button.render({
        env: 'sandbox',
        client: {
            sandbox: '<?php echo \App\Config::getInstance()->get('Paypal_CLIENT_ID')  ?>'
        },
        commit: true,
        payment: function(data, actions){
            return actions.payment.create({
                payment:{
                    transactions: [
                        {
                            amount : {
                                total : parseInt($("#total").text()),
                                currency : "EUR"
                            }
                        }
                    ]
                }
            })
        },
        onAuthorize: function (data, actions) {
            return actions.payment.execute().then(function () {
                console.log("Payment complete");
                window.location = "http://localhost/onlinetutorialslibrary/public/index.php?p=process&paymentID="+data.paymentID+"&payerID="+data.payerID+"&token="+data.paymentToken+"&pid="+makeid()+"&amount="+parseInt($("#total").text());
            })
        }
    },'#paypal-button-container');


   function makeid() {
       var text = "";
       var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

       for (var i = 0; i < 20; i++)
           text += possible.charAt(Math.floor(Math.random() * possible.length));

       return text;
   }

</script>