(function ($, window, document) {
    "use strict";

    $(document).on('click', 'ul.eplus-vc-image-select > li', function () {
        let thisItem = $(this);
        if (thisItem.hasClass('active')) {
            thisItem.removeClass('active').parent().find('input[type="text"]').val('');
        } else {
            thisItem.parent().find('li').removeClass('active');
            thisItem.addClass('active').parent().find('input[type="text"]').val(thisItem.find('img').attr('alt'));
        }
    });
})(jQuery, window, document,);