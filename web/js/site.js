jQuery(document).ready(function ($) {

    // Window Scroll
    $(window).scroll( function() {
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

    // Toggle Features
    $('.bmb4-row-title').click(function(){
        $('.bmb4-left-block').removeClass('bmb4-row-active');
        $('.bmb4-right-block').removeClass('bmb4-row-active');
        $('.bmb4-row-img').removeClass('bmb4-row-active');
        var  tid = this.id.split('_');
        $('#bmb4_lb_'+tid[2]).addClass('bmb4-row-active');
        $('#bmb4_rb_'+tid[2]).addClass('bmb4-row-active');
        $('#bmb4_pbi_'+tid[2]).addClass('bmb4-row-active');
    });

    //$('.about-images').gpGallery('img', {row_max_height: 180});
    //$('.about-images').kirpi4i(); // из-за этого плагина глючит fancybox на iPhone Portrait, что-то с рекурсией связано
    if(jQuery().kirpi4i && jQuery().fancybox) {
        $('.about-images').kirpi4i();

        $(".fancybox").fancybox({
            helpers: {
                overlay: {
                    locked: false
                }
            }
        });
    }

    // Scroll Up
    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('#scrollup').fadeIn();
        } else {
            $('#scrollup').fadeOut();
        }
    });

    $('#scrollup').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });
});
