<?php
/**
 * Element Name: Post Grid
 *
 * @package elements/post-grid/view/template-1
 * @copyright Pluginbazar 2019
 */

$unique_id    = uniqid();
$style        = eplus()->get_shortcode_atts( 'style' );
$content_type = eplus()->get_shortcode_atts( 'content_type', 'by_posts' );
$btn_text     = eplus()->get_shortcode_atts( 'btn_text', esc_html__( 'Read More', 'element-plus' ) );;
$items_per_row  = eplus()->get_shortcode_atts( 'items_per_row', '12' );
$excerpt_length = eplus()->get_shortcode_atts( 'excerpt_length', 24 );
$post_ids       = array();

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

} elseif ( $content_type == 'by_latest_posts' ) {
	$post_ids = get_posts( array(
		'posts_per_page' => - 1,
		'offset'      => 0,
		'orderby'     => 'post_date',
		'fields'      => 'ids',
		'order'       => 'DESC',
		'post_type'   => 'post',
		'post_status' => 'publish'
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

<div id="eplus-post-grid-<?php echo esc_attr( $unique_id ); ?>"
     class="eplus-post-grid-<?php echo esc_attr( $style ); ?>">

    <div class="pb-row">
		<?php foreach ( $post_ids as $index => $post_id ) :

			global $post;

			$post = get_post( $post_id );

			setup_postdata( $post );

			$post_img_url = get_the_post_thumbnail_url( $post_id );
			$this_post    = get_post( $post_id );
			$post_author  = get_user_by( 'ID', $this_post->post_author );

			?>

            <div class="pb-col-lg-<?php echo esc_attr( $items_per_row ); ?> pb-col-md-6">
                <div class="post-item">

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
							<?php printf( '<span class="post-meta-date"><i class="fa fa-calendar"></i> %s</span>', get_the_date( 'M jS, Y', $post_id ) ); ?>
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
</div>