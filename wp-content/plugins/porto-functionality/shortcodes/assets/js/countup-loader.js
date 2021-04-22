if (typeof portoInitStatCounter == 'undefined') {
    function portoInitStatCounter($elements) {
        if (typeof $elements == "undefined") {
            $elements = $("body");
        }
        var $stats = $elements.find( '.stats-block' );
        $stats.each(function() {
            $(this).appear(function() {
                var endNum = parseFloat($(this).find('.stats-number').data('counter-value'));
                var Num = ($(this).find('.stats-number').data('counter-value'))+' ';
                var speed = parseInt($(this).find('.stats-number').data('speed'));
                var ID = $(this).find('.stats-number').data('id');
                var sep = $(this).find('.stats-number').data('separator');
                var dec = $(this).find('.stats-number').data('decimal');
                var dec_count = Num.split(".");
                if(dec_count[1]){
                    dec_count = dec_count[1].length-1;
                } else {
                    dec_count = 0;
                }
                var grouping = true;
                if(dec == "none"){
                    dec = "";
                }
                if(sep == "none"){
                    grouping = false;
                } else {
                    grouping = true;
                }
                var settings = {
                    useEasing : true,
                    useGrouping : grouping,
                    separator : sep,
                    decimal : dec
                }
                var counter = new countUp(ID, 0, endNum, dec_count, speed, settings),
                    endTrigger = function() {
                        if ($('#' + ID).next('.counter_suffix').length > 0) {
                            $('#' + ID).next('.counter_suffix').css('display', 'inline');
                        }
                    };
                setTimeout(function(){
                    counter.start(endTrigger);
                },500);
            }, {
                accX: 0,
                accY: -150
            });
        });
    }
}

jQuery(document).ready(function($) {
    portoInitStatCounter();
    $(document.body).on('porto_refresh_vc_content', function(event, $elements) {
        portoInitStatCounter($elements);
    });
});