function getCommentsListWithAjax(){
    var idVideo = $('#idVideo').text();
    $.post(

        'http://localhost/onlinetutorialslibrary/treatment/trtGetComments.php', {
            q: idVideo
        }, // La ressource ciblée
    
        function(data) {
            alert(data);
        }
    );
}

$( document ).ready(function() {
    getCommentsListWithAjax();
});
