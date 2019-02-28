var rate ="";

function addRatingtWithAjax(rateValue) {
    
    dataRating = "idVideo=" + idVideo + "&idUser=" + idUser + "&rating=" + rateValue;
    $.ajax({
        url: "http://localhost/onlinetutorialslibrary/treatment/ajax/addRating.php",
        type: 'POST',
        data: dataRating,
        dataType: 'html',
        success: function () {
            getRatingWithAjax();
        }

    });
   
}

function getRatingWithAjax(){
    
    $.post(

        'http://localhost/onlinetutorialslibrary/treatment/ajax/getVideoRating.php', {
            q: idVideo
        }, // La ressource ciblée
    
        function(data) {
            //alert(data);
           //alert(data);
           let ratingHtmlContent =""; 
           var obj = JSON.parse(data);
           var videoRate = 0.0;
           var totalnb = 0.0;
           var eval ="";
           
            if(obj.length!=0)
            {
                
                
                for (var i = 0; i < obj.length; i++) {
                    videoRate += parseInt(obj[i].rating);
                    totalnb++;
                }
                videoRate = videoRate/parseInt(totalnb);
                if(parseInt(totalnb)>1) eval= " notes";
                else eval=" note";
                ratingHtmlContent = "<span class='text-warning starsR'>";
                switch(parseInt(videoRate)) {
                    case 1:
                    ratingHtmlContent += "&#9733;&#9734;&#9734;&#9734;&#9734;</span>";
                    break;
                    case 2:
                    ratingHtmlContent += "&#9733;&#9733;&#9734;&#9734;&#9734;</span>";
                    break;
                    case 3:
                    ratingHtmlContent += "&#9733;&#9733;&#9733;&#9734;&#9734;</span>";
                    break;
                    case 4:
                    ratingHtmlContent += "&#9733;&#9733;&#9733;&#9733;&#9734;</span>";
                    break;
                    case 5:
                    ratingHtmlContent += "&#9733;&#9733;&#9733;&#9733;&#9733;</span>";
                    break;
                    default :
                    ratingHtmlContent += "&#9734;&#9734;&#9734;&#9734;&#9734;</span>";
                    break;
                }

                ratingHtmlContent += "<span class='ml-3 rateNb'>"+videoRate+" <small class='ml-3'>("+parseInt(totalnb)+ eval+")</small> </span>";
            }
            else {
                ratingHtmlContent = "<h5 class='noRate'>Cette vidéo n'a pas encore été évaluée</h5>";
            }
            $('#stars').html(ratingHtmlContent);
        }
    );
}

$( document ).ready(function() {
    if($('#canRate').html()=="false") {
        
        $('#ratingModalBody').html("Vous devez acheter la vidéo ou disposer d'un abonnement pour pouvoir l'évaluer."+
        "<br><button type='button' class='btn btn-primary mt-3 mb-2' data-dismiss='modal'>Compris !</button>");
        $('#ratingModalTitle').html("Désolé...");
    }
    


    getCommentsListWithAjax();
    //alert ("iduser: " + idUser + " idvideo : " + idVideo);
    $('#stars').click(function() {
        $('#ratingModal').modal('show');
    });
});


$( document ).ready(function() {
    getRatingWithAjax();
    $('#stars').click(function () {
        $('#star0').html("&#9734;");
        $('#star1').html("&#9734;");
        $('#star2').html("&#9734;");
        $('#star3').html("&#9734;");
        $('#star4').html("&#9734;");
        rate = 0;
      });
    
    

    $('.star').click(function () {
        switch ($(this).attr('id')) {
            case 'star0':
                rate = 1;
                $('#star0').html("&#9733;");
                $('#star1').html("&#9734;");
                $('#star2').html("&#9734;");
                $('#star3').html("&#9734;");
                $('#star4').html("&#9734;");
                 break;
            case 'star1':
                rate = 2;
                $('#star0').html("&#9733;");
                $('#star1').html("&#9733;");
                $('#star2').html("&#9734;");
                $('#star3').html("&#9734;");
                $('#star4').html("&#9734;");
                
                 break;
            case 'star2':
                rate = 3;
                $('#star0').html("&#9733;");
                $('#star1').html("&#9733;");
                $('#star2').html("&#9733;");
                $('#star3').html("&#9734;");
                $('#star4').html("&#9734;");
               
                 break;
            case 'star3':
                rate = 4;
                $('#star0').html("&#9733;");
                $('#star1').html("&#9733;");
                $('#star2').html("&#9733;");
                $('#star3').html("&#9733;");
                $('#star4').html("&#9734;");
               
                 break;
            case 'star4':
                rate = 5;
                $('#star0').html("&#9733;");
                $('#star1').html("&#9733;");
                $('#star2').html("&#9733;");
                $('#star3').html("&#9733;");
                $('#star4').html("&#9733;");
                
                 break;
        }
        //alert(rate);
    });
    

});

$('#btn-rating').click(function () {
    addRatingtWithAjax(rate);
});






//rate = 0;
    /*$('#star0').html("&#9734;");
    $('#star1').html("&#9734;");
    $('#star2').html("&#9734;");
    $('#star3').html("&#9734;");
    $('#star4').html("&#9734;");*/

