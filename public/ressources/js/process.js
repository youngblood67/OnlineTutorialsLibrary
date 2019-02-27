$(document).ready(function () {
    let pid = $('#id-pid').text();
    let idUser = $('#id-idUser').text();
    let payerID = $('#id-payerID').text();
    let paymentID = $('#id-paymentID').text();
    let token = $('#id-token').text();
    let amount = $('#id-amount').text();
    let subscription = $('#id-subscription').text();

    if(subscription === "no") {
        let basket = [];
        let tabIdVideo = [];
        if (localStorage && localStorage.getItem('basket')) {
            basket = JSON.parse(localStorage.getItem('basket'));
            for (let i = 0; i < basket.length; i++) {
                tabIdVideo.push(basket[i]["id"]);
            }
        }
        if (tabIdVideo.length > 0) {

            $.ajax({
                url: "http://localhost/onlinetutorialslibrary/treatment/ajax/orderWithPaypal.php",
                type: 'POST',
                data: "tabIdVideo=" + JSON.stringify(tabIdVideo),
                dataType: 'html',
                success: function (data, statut) {
                    $("#results").html(data);
                }

            });

            localStorage.removeItem('basket');
            $("#quantity-in-basket").text("0");
        }
    }else{
        $.ajax({
            url: "http://localhost/onlinetutorialslibrary/treatment/ajax/subscribeWithPaypal.php",
            type: 'POST',
            dataType: 'html',
            success: function (data, statut) {
                $("#results").html(data);
            }

        });

        localStorage.removeItem('basket');
        $("#btn-basket").hide();
    }
})