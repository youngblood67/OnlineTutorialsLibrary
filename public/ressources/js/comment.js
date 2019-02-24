let idVideo = $('#idVideo').text();
let idUser = $('#idUser').text();
let dataComment ="";
let commentContent = "";

function addCommentWithAjax(commentContent) {
    
    dataComment = "idVideo=" + idVideo + "&idUser=" + idUser + "&commentContent=" + commentContent;
    $.ajax({
        url: "http://localhost/onlinetutorialslibrary/treatment/ajax/addComment.php",
        type: 'POST',
        data: dataComment,
        dataType: 'html',
        success: function (data) {
            //alert(data);
        }

    });
   
}

function getCommentsListWithAjax(){
    
    $.post(

        'http://localhost/onlinetutorialslibrary/treatment/ajax/getComment.php', {
            q: idVideo
        }, // La ressource ciblée
    
        function(data) {
           //alert(data);
           let htmlContent =""; 
           var obj = JSON.parse(data);
            if(obj.length!=0)
            {
            
                
                for (var i = obj.length-1; i >=0; i--) {
                    
                    htmlContent += 
                    `<div><b>${obj[i].firstname}</b> ${obj[i].dateComment}</div>
                    <div>${obj[i].contentComment}</div>
                    <hr>`
                }
            }
            else {
                htmlContent = "Aucun commentaire...";
            }
            $('#comments-list').html(htmlContent);
        }
    );
}

$("#btn-comment").click(function () {
    commentContent = $("#comment").val();
    $.ajax({
        url:addCommentWithAjax(commentContent),
        success:function(){
            getCommentsListWithAjax();
     }
     });
    
    $("#comment").val("");
});


$( document ).ready(function() {
    
    getCommentsListWithAjax();
    //alert ("iduser: " + idUser + " idvideo : " + idVideo);
});
