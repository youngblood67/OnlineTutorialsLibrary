$("#btn-abort").click(function () {
    let idSubscription = $(".val").text();
    localStorage.setItem("idSubscription",idSubscription);
    $.ajax({
        url: "http://localhost/onlinetutorialslibrary/treatment/ajax/abortSubscription.php",
        type: 'POST',
        data: "idSubscription="+idSubscription,
        dataType: 'html',
        success: function (data) {
           $("#content-subscription").html(" <li class=\"list-group-item\">"+data+"</li>");
        }

    });
});