<?php
/**
 * Element Name: Modal box
 *
 * @package elements/modal/view/template-1.php
 * @copyright Pluginbazar 2019
 */

$unique_id   = uniqid( 'eplus-modal-' );
$style       = eplus()->get_shortcode_atts( 'style' );
$box_title   = eplus()->get_shortcode_atts( 'box_title' );
$box_content = eplus()->get_shortcode_atts( 'content' );
$animation   = eplus()->get_shortcode_atts( 'animation' );
$options     = array_filter( explode( ',', eplus()->get_shortcode_atts( 'options', 'closeBtnInside, closeOnBgClick' ) ) );
$options     = array_map( 'trim', $options );
$listener_id = eplus()->get_shortcode_atts( 'listener_id' );
$listener_id = str_replace( '#', '', $listener_id );

?>

<div id="<?php echo esc_attr( $listener_id ) ?>"
     class="mfp-with-anim mfp-hide eplus-modal-<?php echo esc_attr( $style ); ?>">
	<?php if ( ! empty( $box_title ) ) {
		printf( '<h3 class="eplus-modal-title">%s</h3>', $box_title );
	} ?>
	<?php if ( ! empty( $box_content ) ) {
		printf( '<div class="eplus-modal-content">%s</div>', wpautop( $box_content ) );
	} ?>
</div>

<script>
    (function ($) {
        "use strict";

        $(document).on('click', '.eplus-btn, a', function (e) {

            let button = $(this),
                listener_id = '<?php printf( '#%s', $listener_id ); ?>',
                animation = '<?php echo $animation; ?>',
                buttonHref = button.attr('href');

            if (!button.hasClass('button-clicked')) {
                button.addClass('button-clicked');
                button.trigger('click');
                button.click();
                return;
            }

            if (listener_id === buttonHref) {

                button.attr('data-effect', animation);
                button.magnificPopup({
                    removalDelay: 500,
                    closeBtnInside: <?php echo esc_attr( in_array( 'closeBtnInside', $options ) ? 'true' : 'false' ); ?>,
                    showCloseBtn: <?php echo esc_attr( in_array( 'showCloseBtn', $options ) ? 'false' : 'true' ); ?>,
                    closeOnBgClick: <?php echo esc_attr( in_array( 'closeOnBgClick', $options ) ? 'true' : 'false' ); ?>,
                    closeMarkup: '<button title="%title%" type="button" class="mfp-close eplus-modal-close">&#215;</button>',
                    callbacks: {
                        beforeOpen: function () {
                            this.st.mainClass = this.st.el.attr('data-effect');
                        },
                    },
                });
            }
        });

    })(jQuery);
</script>

