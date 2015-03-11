(function($){

    $('#slide-artwork').carousel({
      interval: 0
    })

    window.onload = function(){
        $('#foo4').carouFredSel({
            responsive: true,
            width: '100%',
            swipe: {
                onMouse: true,
                onTouch: true
            },
            scroll : {
                items           : 1,
                easing          : "elastic",
                duration        : 1000,                         
                pauseOnHover    : true
            },
            items: {
                width: 400,
            //  height: '30%',  //  optionally resize item-height
                visible: {
                    min: 1,
                    max: 3
                }
            }
        });

        $('#foo1').carouFredSel({
            responsive: true,
            width: '100%',
            swipe: {
                onMouse: true,
                onTouch: true
            },
            scroll : {
                items           : 1,
                easing          : "elastic",
                duration        : 1000,                         
                pauseOnHover    : true
            },
            items: {
                width: 140,
            //  height: '30%',  //  optionally resize item-height
                visible: {
                    min: 1,
                    max: 6
                }
            }
        });
    }

    $('#audio_modal').on('show.bs.modal', function (e) {
      $('#play_audio').get(0).play();
    }) 

    $('#audio_modal').on('hide.bs.modal', function (e) {
      $('#play_audio').get(0).pause();
    })   

    // Hide sub-menu empty
    nb = $('section.submenu.widget_nav_menu').find('.current_page_ancestor').length;;
    if (!nb) {
        $("section.submenu.widget_nav_menu").hide();
    };

})(jQuery);
