(function ($, window, document) {
    "use strict";

    $(document).on('input', '.eplus-range-slider-wrap > input[type="range"]', function () {

        let rangeSlider = $(this).parent(),
            sliderValue = $(this).val(),
            valueDisplay = rangeSlider.find('.slider-val'),
            valueSuffix = rangeSlider.data('suffix');

        sliderValue += valueSuffix;

        valueDisplay.html(sliderValue);

        console.log( sliderValue );

    });

})(jQuery, window, document);

