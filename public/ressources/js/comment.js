let idVideo;
let idUser;
let commentContent;
let commentRating;
let dataComment;

$("#btn-comment").click(function () {
    idVideo = $("#idVideo").text();
    idUser = $("#idUser").text();
    commentContent = $("#comment").val();
    commentRating = $("#rating").val();
    dataComment = "idVideo=" + idVideo + "&idUser=" + idUser + "&commentContent=" + commentContent + "&commentRating=" + commentRating;
    $.ajax({
        url: "http://localhost/onlinetutorialslibrary/treatment/ajax/addComment.php",
        type: 'POST',
        data: dataComment,
        dataType: 'html',
        success: function (data, statut) {
            $("#list-comments").append("<li class='list-group-item'>"+data+"</li>");
        }

    });
});

//($idVideo, $idUser, $commentContent, $commentRating)