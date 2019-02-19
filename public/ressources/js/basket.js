$(document).ready(function () {
    if (localStorage && localStorage.getItem('basket')) {
        let id = $("#video").data("id");
        if (verifyPresenceInBasket(id)) {
            $("#add-to-basket").text("Ajouté");
            $("#add-to-basket").prop("disabled", true);
        }
    } else {
        let basket = [];
        localStorage.setItem('basket', JSON.stringify(basket));
    }
});


function verifyPresenceInBasket(id) {
    let isPresent = false;
    if (localStorage && localStorage.getItem('basket')) {
        let basket = JSON.parse(localStorage.getItem('basket'));
        for (let i = 0; i < basket.length; i++) {
            if (id === basket[i]["id"]) {
                isPresent = true;
            }
        }
    }
    return isPresent;

}

$("#add-to-basket").click(function () {
    let video = {};
    video.id = $("#video").data("id");
    video.price = $("#video").data("price");
    video.name = $('#video').text();
    addToBasket(video);
    $(this).text("Ajouté");
    $("#add-to-basket").prop("disabled", true);

});

function addToBasket(video) {
    let isPresent = false;
    // Retrieve the cart object from local storage
    if (localStorage && localStorage.getItem('basket')) {
        let basket = JSON.parse(localStorage.getItem('basket'));
        for (let i = 0; i < basket.length; i++) {
            if (video["id"] === basket[i]["id"]) {
                isPresent = true;
            }
        }

        if (!isPresent) {
            basket.push(video);
        } else {
            console.log("Déjà au panier");
        }

        localStorage.setItem('basket', JSON.stringify(basket));
    } else {
        let basket = [];
        localStorage.setItem('basket', JSON.stringify(basket));
    }
}

$("#btn-basket").click(function () {
    $("#basketList").html("");
    let basket = JSON.parse(localStorage.getItem('basket'));
    if (basket.length === 0) {
        $("#basketList").append("vide");
    }
    for (let i = 0; i < basket.length; i++) {
        $("#basketList").append("<p>" + basket[i]["id"] + " - " + basket[i]["name"] + " : " + basket[i]["price"] + "€" + "</p>");
    }

});

$("#btn-clear-basket").click(function () {
    $("#add-to-basket").text("Ajouter au panier");
    $("#add-to-basket").removeClass("add-to-basket");
    let basket = [];
    localStorage.setItem('basket', JSON.stringify(basket));
    document.location.reload();

});