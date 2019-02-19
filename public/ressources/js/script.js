function $_GET(param) {
    var vars = {};
    window.location.href.replace(location.hash, '').replace(
        /[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
        function (m, key, value) { // callback
            vars[key] = value !== undefined ? value : '';
        }
    );

    if (param) {
        return vars[param] ? vars[param] : null;
    }
    return vars;
}

/////////////////////////////Sécurité : vider le panier du localstorage avant chaque connexion ou après chaque deconnexion////////////////////////////////////////////
$("#btn-deconnexion").click(function () {
    localStorage.removeItem("basket");
});
$("#btn-connexion").click(function () {
    localStorage.removeItem("basket");
});



/////////////////////////////////////////////////////////////////////////////////////////////////////////

$(document).ready(function() {
   // $('#search-result').hide();
    $('#searchInput').keyup(function() {
        var value = $(this).val();
        if (value.length > 2) {
            
            $('#carouselHome').slideUp("slow");
            $('#home-page-videos').hide();
            $('#search-result').show();
            //$('#search-result').text(value);
            $.post(

                'http://localhost/onlinetutorialslibrary/treatment/trtSearch.php', {
                    q: value
                }, // La ressource ciblée

                function(data) {
                    var htmlContent = "";
                    var prix_video = "";
                    var url = "";
                    var launchModal = "alert($('#checkSession').html().toString());"; 
                    if($('#checkSession').html().toString()=="false") 
                        launchModal ="$('#connexionModal').modal('show'); return false;";
                    else
                        launchModal = "";
                    
                    var obj = JSON.parse(data);
                    if(obj.length!=0)
                    {
                        
                        for (var i = 0; i < obj.length; i++) {
                            
                        // htmlContent +=obj[i].titleVideo + "<br>";
                        if(obj[i].priceVideo==0) prix_video = "Gratuit";
                        else prix_video = obj[i].priceVideo + " €";

                        if(obj[i].urlVideo == null) url= "http://img.youtube.com/vi/"+obj[i].idYoutube+"/hqdefault.jpg"; 
                        else url= "http://localhost/onlinetutorialslibrary/videos/"+obj[i].urlVideo+".PNG";

                        htmlContent += 
                        
                            '<div class="col-lg-3 col-md-6 mb-4">'+
                                '<div class="card h-100">'+
                                    '<a href="index.php?p=videos&idVideo='+obj[i].idVideo+'"><img class="card-img-top"'+
                                        'src="'+ url + 
                                            '" alt="" onclick="'+launchModal+'"></a>'+
                                            '<div class="card-body">'+
                                            '<h4 class="card-title">'+
                                            '<a href="index.php?p=videos&idVideo='+obj[i].idVideo+'" onclick="'+launchModal+'">'+
                                            obj[i].titleVideo +'</a>'+
                                        '</h4>'+
                                    '<p class="card-text">'+ obj[i].descriptionVideo +'</p>'+
                                    '</div>'+
                                    '<div class="card-footer">'+
                                        '<div class="row">'+
                                            
                                            '<div id="price col">' + prix_video +                                                 
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>';

                        }
                        
                    }
                    else
                    htmlContent = "Aucune valeur trouvée...";
                    $('#search-result').html(htmlContent);
                }
            );
        } else {
            $('#search-result').hide();
            $('#carouselHome').slideDown("slow");
            $('#home-page-videos').show();
        }

    })
});