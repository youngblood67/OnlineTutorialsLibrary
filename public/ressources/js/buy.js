$(document).ready(function () {
    $("#search-input").hide();
    let total = 0;
    let basket = [];
    if (localStorage && localStorage.getItem('basket')) {
        basket = JSON.parse(localStorage.getItem('basket'));

        if (basket.length >= 1) {
            for (let i = 0; i < basket.length; i++) {
                $("#videos-buy-list").append("<li class='li-video list-group-item'>" + basket[i]["name"] + "   " + basket[i]["price"] + "€" + "</li>");
                total += basket[i]["price"];
            }
        }
    }


    $("#total").append(total);


   


});



