$(document).ready(function () {
    $("#search-input").hide();
    let total = 0;
    if (localStorage && localStorage.getItem('basket')) {
        let basket = JSON.parse(localStorage.getItem('basket'));

        if (basket.length >= 1) {
            for (let i = 0; i < basket.length; i++) {
                $("#videos-buy-list").append("<li class='li-video'>" + basket[i]["name"] + "   " + basket[i]["price"] + "€" + "</li>");
                total += basket[i]["price"];
            }
        }
    }


    $("#span-total-achat").append("TOTAL : " + total + " €");

});