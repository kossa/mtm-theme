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

})(jQuery);
