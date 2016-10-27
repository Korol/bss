jQuery(document).ready(function ($) {
    $(window).scroll( function() {
        console.log('Scroll!');
        var value = $(this).scrollTop();
        if ( value > 10 ){
            $("#top_logo").hide(400);
            //$("#top_logo").addClass('blb-hide');
            $('#blb_title').addClass('blb-yellow-title');
        }
        else{
            $('#blb_title').removeClass('blb-yellow-title');
            //$("#top_logo").removeClass('blb-hide');
            $("#top_logo").show(400);
        }
    });
});
