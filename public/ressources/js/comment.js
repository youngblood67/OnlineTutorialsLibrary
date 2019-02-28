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
        success: function () {
            getCommentsListWithAjax();
            $("#comment").val("");
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
                
                
                for (var i = 0; i < obj.length; i++) {
                    let dateAndTime = obj[i].dateComment.split(" ");
                    let dateSplit = dateAndTime[0].split("-");
                    let dateComment = dateSplit[2] + "/" + dateSplit[1] +"/" +dateSplit[0];  
                    let timeComment = dateAndTime[1];
                    
                    htmlContent += 
                    `<div><b>${obj[i].firstname}</b> le ${dateComment} à ${timeComment}</div>
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
    addCommentWithAjax(commentContent);
    
});



