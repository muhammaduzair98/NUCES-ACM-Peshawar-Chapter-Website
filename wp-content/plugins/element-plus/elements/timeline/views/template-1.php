<?php
/**
 * Element Name: Timeline
 *
 * @package elements/timeline/view/template-1
 * @copyright Pluginbazar 2019
 */

$unique_id    = uniqid();
$style        = eplus()->get_shortcode_atts( 'style' );
$content_type = eplus()->get_shortcode_atts( 'content_type', 'by_posts' );
$btn_text     = eplus()->get_shortcode_atts( 'btn_text', esc_html__( 'Read More', 'element-plus' ) );;
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

<?php if ( ! empty( $primary_color ) || ! empty( $secondary_color ) ) : ?>
    <style>
        #eplus-timeline-<?php echo esc_attr( $unique_id ); ?> .post-btn {
            background-color: <?php echo esc_attr( $primary_color ); ?>;
        }

        #eplus-timeline-<?php echo esc_attr( $unique_id ); ?> .timeline-single:after {
            border-color: <?php echo esc_attr( $primary_color ); ?>;
        }

        #eplus-timeline-<?php echo esc_attr( $unique_id ); ?> .post-meta i,
        #eplus-timeline-<?php echo esc_attr( $unique_id ); ?> .post-title a:hover,
        #eplus-timeline-<?php echo esc_attr( $unique_id ); ?> .post-title a:focus,
        #eplus-timeline-<?php echo esc_attr( $unique_id ); ?> .post-meta a:hover,
        #eplus-timeline-<?php echo esc_attr( $unique_id ); ?> .post-meta a:focus {
            color: <?php echo esc_attr( $primary_color ); ?>;
        }

        <?php if( $style == '4' && !empty( $primary_color ) ): ?>
        #eplus-timeline-<?php echo esc_attr( $unique_id . ':after' ); ?> {
            background-color: <?php echo esc_attr( $primary_color ); ?>;
        }
        <?php endif; ?>

        <?php if ( !empty( $secondary_color ) ) : ?>
        #eplus-timeline-<?php echo esc_attr( $unique_id . ':after' ); ?> {
            background-color: <?php echo esc_attr( $secondary_color ); ?>;
        }

        @media (min-width: 992px) {
            #eplus-timeline-<?php echo esc_attr( $unique_id ); ?> .post-meta-date {
                color: <?php echo esc_attr( $secondary_color ); ?>;
            }
        }

        <?php endif; ?>
    </style>
<?php endif; ?>

<div id="eplus-timeline-<?php echo esc_attr( $unique_id ); ?>" class="eplus-timeline-<?php echo esc_attr( $style ); ?>">

	<?php foreach ( $post_ids as $index => $post_id ) :

		global $post;

		$post = get_post( $post_id );

		setup_postdata( $post );

		$post_img_url = get_the_post_thumbnail_url( $post_id );
		$this_post    = get_post( $post_id );
		$post_author  = get_user_by( 'ID', $this_post->post_author );
		$this_icon    = isset( $timeline_icons[ $index ] ) ? $timeline_icons[ $index ] : array();
		$icon_type    = eplus()->get_shortcode_atts( 'icon_type', 'fontawesome', $this_icon );
		$icon         = eplus()->get_shortcode_atts( 'icon_' . $icon_type, '', $this_icon );

		vc_icon_element_fonts_enqueue( $icon_type );


		?>

        <div class="timeline-single">

            <?php if ( $style == '4' ) : ?>
            <div class="timeline-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 60 60">
                    <path d="M29.007,60C43.3,60,64.733,22.105,57.588,9.474S7.571-3.158.426,9.474,14.716,60,29.007,60Z" transform="translate(0.993)" fill="<?php echo esc_attr( !empty( $primary_color ) ? $primary_color : '#9c88ff' ); ?>"></path>
                </svg>
                <i class="<?php echo esc_attr( $icon ); ?>"></i>
            </div>
            <?php endif; ?>

            <div class="timeline-content">
				<?php if ( ! empty( $post_img_url ) ) : ?>
                    <div class="post-image">
                        <a href="<?php echo esc_url( get_the_permalink() ); ?>">
                            <img src="<?php echo esc_url( $post_img_url ); ?>"
                                 alt="<?php echo esc_attr( get_the_title() ); ?>">
                        </a>
                    </div>
				<?php endif; ?>

                <div class="post-body">
                    <div class="post-meta">
						<?php printf( '<span class="post-author"><i class="fa fa-user"></i> <a href="%s">%s</a></span>', get_author_posts_url( $post_author->ID ), ucwords( $post_author->display_name ) ); ?>
						<?php printf( '<span class="post-meta-date">%s</span>', get_the_date( 'M Y', $post_id ) ); ?>
                    </div>
                    <h3 class="post-title">
                        <a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a>
                    </h3>
                    <div class="post-content">
						<?php echo wp_kses_post( wpautop( wp_trim_words( get_the_content( null, false, $post_id ), $excerpt_length ) ) ); ?>
                    </div>
                    <div class="post-footer">
                        <a href="<?php echo esc_url( get_the_permalink() ); ?>"
                           class="post-btn"><?php echo esc_html( $btn_text ); ?> <i
                                    class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>

		<?php wp_reset_postdata();
	endforeach; ?>

</div>
