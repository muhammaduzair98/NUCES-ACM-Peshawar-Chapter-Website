<?php
/**
 * Element Name: Timeline - Horizontal
 *
 * @package elements/timeline-horizontal/view/template-1
 * @copyright Pluginbazar 2019
 */

$unique_id    = uniqid();
$style        = eplus()->get_shortcode_atts( 'style' );
$content_type = eplus()->get_shortcode_atts( 'content_type', 'by_posts' );
$excerpt_length  = eplus()->get_shortcode_atts( 'excerpt_length', 24 );
$primary_color   = eplus()->get_shortcode_atts( 'primary_color' );
$secondary_color = eplus()->get_shortcode_atts( 'secondary_color' );
$timeline_icons  = (array) vc_param_group_parse_atts( eplus()->get_shortcode_atts( 'timeline_icons' ) );
$post_ids        = array();

if ( $content_type == 'by_category' ) {
	foreach ( explode( ',', eplus()->get_shortcode_atts( 'category_ids' ) ) as $category_id ) {
		$query_string = sprintf( 'fields=ids&posts_per_page=-1&category=%s', $category_id );
		$post_ids     = array_merge( $post_ids, get_posts( $query_string ) );
	}
} elseif ( $content_type == 'by_tags' ) {
	$post_ids = get_posts( array(
		'post_type'      => 'post',
		'posts_per_page' => - 1,
		'fields'         => 'ids',
		'tax_query'      => array(
			array(
				'taxonomy' => 'post_tag',
				'field'    => 'term_id',
				'terms'    => explode( ',', eplus()->get_shortcode_atts( 'tag_ids' ) ),
			),
		)
	) );

} elseif ( $content_type == 'by_custom' ) {
	$post_ids = explode( ',', eplus()->get_shortcode_atts( 'custom_post_ids' ) );
} else {
	$post_ids = explode( ',', eplus()->get_shortcode_atts( 'post_ids' ) );
}

$post_ids = array_unique( $post_ids );
$length   = eplus()->get_shortcode_atts( 'posts_per_page', count( $post_ids ) );
$post_ids = array_slice( $post_ids, 0, $length );

?>


<div id="eplus-timeline-h-<?php echo esc_attr( $unique_id ); ?>" class="eplus-timeline-horizontal timeline">

	<?php if ( ! empty( $primary_color ) || ! empty( $secondary_color ) ) : ?>
        <style>
            #eplus-timeline-h-<?php echo esc_attr( $unique_id ); ?> .timeline__content,
            #eplus-timeline-h-<?php echo esc_attr( $unique_id ); ?> .timeline-divider,
            #eplus-timeline-h-<?php echo esc_attr( $unique_id ); ?>:not(.timeline--horizontal):before {
                background-color: <?php echo esc_attr( $primary_color ); ?>;
            }
            #eplus-timeline-h-<?php echo esc_attr( $unique_id ); ?>.timeline--horizontal .timeline__item--top .timeline__content:before {
                border-top-color: <?php echo esc_attr( $primary_color ); ?>;
            }
            #eplus-timeline-h-<?php echo esc_attr( $unique_id ); ?>.timeline--horizontal .timeline__item--bottom .timeline__content:before {
                border-bottom-color: <?php echo esc_attr( $primary_color ); ?>;
            }
            #eplus-timeline-h-<?php echo esc_attr( $unique_id ); ?> .timeline__item:after,
            #eplus-timeline-h-<?php echo esc_attr( $unique_id ); ?> .timeline-nav-button {
                border-color: <?php echo esc_attr( $primary_color ); ?>;
            }
            #eplus-timeline-h-<?php echo esc_attr( $unique_id ); ?> .timeline-nav-button:before {
                color: <?php echo esc_attr( $primary_color ); ?>;
            }
            #eplus-timeline-h-<?php echo esc_attr( $unique_id ); ?> .post-title a,
            #eplus-timeline-h-<?php echo esc_attr( $unique_id ); ?> .post-meta-date,
            #eplus-timeline-h-<?php echo esc_attr( $unique_id ); ?> .timeline__content p,
            #eplus-timeline-h-<?php echo esc_attr( $unique_id ); ?> .timeline-icon i {
                color: <?php echo esc_attr( $secondary_color ); ?>;
            }
        </style>
	<?php endif; ?>

    <div class="timeline__wrap">
        <div class="timeline__items">

	        <?php foreach ( $post_ids as $index => $post_id ) :

		        global $post;
		        $post = get_post( $post_id );
		        setup_postdata( $post );
		        $this_post    = get_post( $post_id );
		        $this_icon    = isset( $timeline_icons[ $index ] ) ? $timeline_icons[ $index ] : array();
		        $icon_type    = eplus()->get_shortcode_atts( 'icon_type', 'fontawesome', $this_icon );
		        $icon         = eplus()->get_shortcode_atts( 'icon_' . $icon_type, '', $this_icon );
		        vc_icon_element_fonts_enqueue( $icon_type );

		        ?>

                <div class="timeline__item">
                    <div class="timeline__content">
                        
                        <?php if( !empty( $icon ) ) : ?>
                        <div class="timeline-icon">
                            <i class="<?php echo esc_attr( $icon ); ?>"></i>
                        </div>
                        <?php endif; ?>
	                    <?php printf( '<span class="post-meta-date">%s</span>', get_the_date( 'M Y', $post_id ) ); ?>
                        <h3 class="post-title"><a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a></h3>
                        <?php printf( '<p>%s</p>', wpautop( wp_trim_words( get_the_content( null, false, $post_id ), $excerpt_length ) ) ) ?>
                    </div>
                </div>
				<?php wp_reset_postdata();
			endforeach; ?>

        </div>
    </div>
</div>

<script>
    (function ($) {
        "use strict";
        $(document).on('ready', function () {

            let $timeline_items_count = $('.timeline').find('.timeline__item').length;

            $('#eplus-timeline-h-<?php echo esc_attr( $unique_id ); ?>').timeline({

                forceVerticalMode: 991,
                mode: ($timeline_items_count < 3 && !empty($timeline_items_count)) ? 'vertical' : 'horizontal',
                visibleItems: 4
            });
        });
    })(jQuery);
</script>