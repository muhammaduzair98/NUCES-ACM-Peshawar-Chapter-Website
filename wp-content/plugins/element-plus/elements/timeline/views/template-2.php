<?php
/**
 * Element Name: Timeline
 *
 * @package elements/timeline/view/template-2
 * @copyright Pluginbazar 2019
 */

$unique_id    = uniqid();
$style        = eplus()->get_shortcode_atts( 'style' );
$content_type = eplus()->get_shortcode_atts( 'content_type', 'by_posts' );
$btn_text     = eplus()->get_shortcode_atts( 'btn_text', esc_html__( 'Read More', 'element-plus' ) );;
$excerpt_length  = eplus()->get_shortcode_atts( 'excerpt_length', 24 );
$primary_color   = eplus()->get_shortcode_atts( 'primary_color' );
$secondary_color = eplus()->get_shortcode_atts( 'secondary_color' );
$author_info_color = eplus()->get_shortcode_atts( 'author_info_color' );
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

<?php if ( ! empty( $primary_color ) || ! empty( $secondary_color ) || ! empty( $author_info_color ) ) : ?>
    <style>
        #eplus-timeline-<?php echo esc_attr( $unique_id ); ?> .timeline-info {
            background-color: <?php echo esc_attr( $primary_color ); ?>;
            background-image: linear-gradient( 69.5deg, <?php echo esc_attr( $primary_color ); ?> 18.6%, <?php echo esc_attr( $secondary_color ); ?> 85.9% );
        }
        #eplus-timeline-<?php echo esc_attr( $unique_id . ':after'); ?>,
        #eplus-timeline-<?php echo esc_attr( $unique_id ); ?> .post-btn  {
            background-color: <?php echo esc_attr( $primary_color ); ?>;
        }

        #eplus-timeline-<?php echo esc_attr( $unique_id ); ?> .post-btn:hover,
        #eplus-timeline-<?php echo esc_attr( $unique_id ); ?> .post-btn:focus  {
            background-color: <?php echo esc_attr( $secondary_color ); ?>;
        }

        #eplus-timeline-<?php echo esc_attr( $unique_id ); ?> .post-title a:hover,
        #eplus-timeline-<?php echo esc_attr( $unique_id ); ?> .post-title a:focus {
            color: <?php echo esc_attr( $primary_color ); ?>;
        }
    </style>
<?php endif; ?>

<div id="eplus-timeline-<?php echo esc_attr( $unique_id ); ?>" class="eplus-timeline-<?php echo esc_attr( $style ); ?>">

	<?php foreach ( $post_ids as $index => $post_id ) :

		global $post;

		$post = get_post( $post_id );

		setup_postdata( $post );

		$post_img_url = get_the_post_thumbnail_url( $post_id );
		$this_post    = get_post( $post_id );
		$categories   = get_the_category( $post_id );
		$category     = reset( $categories );
		?>

        <div class="timeline-single pb-row">

            <div class="pb-col-lg-3">
                <div class="timeline-info">
                    <div class="author">
                        <img src="<?php echo esc_url( get_avatar_url( get_the_author_meta( 'ID' ) ) ) ?>"
                             alt="<?php echo esc_attr( get_the_author_meta( 'display_name' ) ); ?>">
                        <div class="author-info">
                            <h4 class="author-name"><?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?></h4>
                            <a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"><?php echo esc_html( $category->name ); ?></a>
                        </div>
                    </div>
					<?php printf( '<p class="post-meta-date">%s</p>', get_the_date( 'M jS, Y', $post_id ) ); ?>
                </div>
            </div>

            <div class="pb-col-lg-9">
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
        </div>

		<?php wp_reset_postdata();
	endforeach; ?>

</div>
