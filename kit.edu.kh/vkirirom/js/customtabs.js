/**
 * Created by Ro Vinei on 12/2/2015.
 * Student at Kirirom Institute Of Technology, Cambodia
 */
function imglightbox(){
    var contents = $('.tab-content');
    for(var i=0;i<contents.length;i++){
        var imggroup = contents[i].getAttribute("id");
        $('#'+imggroup+' '+'.img-lightbox').lightBox();
    };
};

function customTab(){
    $('ul.tab li').click(function(){
        var temp = $('#overlayOffer').hasClass('active-overlay');
        if(temp){
            $('.two-column .left-nav').removeClass('active-overlay').slideUp();
        }
        var tab_id = $(this).attr('data-tab');
        $('ul.tab li').removeClass('current');
        $('.tab-content').removeClass('current').fadeOut();

        $(this).addClass('current');
        $("#"+tab_id).addClass('current').fadeIn();
    });
};

function specialOfferOverlay(){
    $('#overlayicon').click(function(){
        $('.two-column .left-nav').addClass('active-overlay').slideToggle();
    });

    $(window).resize(function(){
        if($(window).width()>480){
            $('#overlayOffer').css("display","block");
        }
    });
};

function roomLightbox(){
    var accomm = $('.specials');
    for(var i=0;i<accomm.length;i++){
        var imggroups = accomm[i].getAttribute("id");
        $('#'+imggroups+' '+'.img-lightbox').lightBox();
    };
};

$(document).ready(function(){
    roomLightbox();
    customTab();
    specialOfferOverlay();
    imglightbox();
});

(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=456971241144972";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));





