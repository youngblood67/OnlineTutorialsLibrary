$("#btn-subscribe").click(function () {
    window.location.href = "http://localhost/onlinetutorialslibrary/public/index.php?p=subscribe";
});


$("input[name='optradio']").click(function () {
    localStorage.clear();
    localStorage.setItem("subscription", $("input[name='optradio']:checked").val());
    localStorage.setItem("priceSubscription", $(this).data("price"));
    $("#btn-paypal-subscription").show();
});

