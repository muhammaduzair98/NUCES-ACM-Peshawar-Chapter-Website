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
$readmore_style = eplus()->get_shortcode_atts( 'readmore_style', '1' );
$excerpt_length = eplus()->get_shortcode_atts( 'excerpt_length', 24 );

$post_ids = array();

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

			$post_img_url   = get_the_post_thumbnail_url( $post_id );
			$categories     = get_the_category( $post_id );
			$category       = reset( $categories );
			$has_post_thumb = empty( $post_img_url ) ? 'no-post-thumbnail' : '';

			?>

            <div class="pb-col-lg-<?php echo esc_attr( $items_per_row ); ?> pb-col-md-6">
                <div class="post-item <?php echo esc_attr( $has_post_thumb ); ?>">

					<?php if ( ! empty( $post_img_url ) ) : ?>
                        <div class="post-image">
                            <a href="<?php echo esc_url( get_the_permalink() ); ?>">
                                <img src="<?php echo esc_url( $post_img_url ); ?>"
                                     alt="<?php echo esc_attr( get_the_title() ); ?>">
                            </a>
                        </div>
					<?php endif; ?>

                    <div class="post-body">

                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="370"
                             height="222" viewBox="0 0 370 222">
                            <defs>
                                <linearGradient id="gradient-<?php echo esc_attr( $unique_id . $post_id ); ?>" x1="1"
                                                x2="0.007" y2="1" gradientUnits="objectBoundingBox">
                                    <stop offset="0" stop-color="#ad2c2a"></stop>
                                    <stop offset="1" stop-color="#fbb446"></stop>
                                </linearGradient>
                            </defs>
                            <path d="M2365,721.339s9.7-91.2,138.986-106.254S2691.2,593.285,2735,499.34c-.706-.519,0,222,0,222Z"
                                  transform="translate(-2365 -499.339)" opacity="0.04"
                                  fill="url(#gradient-<?php echo esc_attr( $unique_id . $post_id ); ?>)"></path>
                        </svg>

                        <div class="post-meta">
                            <div class="post-categories">
                                <i class="fa fa-folder-open-o" aria-hidden="true"></i>
                                <a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"><?php echo esc_html( $category->name ); ?></a>

								<?php if ( count( $categories ) > 1 ) : ?>
                                    <div class="post-categories-all">
                                        <span>+<?php echo esc_html( count( $categories ) - 1 ); ?></span>
                                        <div class="post-categories-dropdown">
											<?php foreach ( $categories as $category_id => $category ) :
												if ( $category_id == 0 ) {
													continue;
												}
												?>
                                                <a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"><?php echo esc_html( $category->name ); ?></a>
											<?php endforeach; ?>
                                        </div>
                                    </div>
								<?php endif; ?>

                            </div>
							<?php printf( '<span class="post-meta-date"><span class="day">%s</span><span class="month">%s</span></span>', get_the_date( 'd', $post_id ), get_the_date( 'M', $post_id ) ); ?>
                        </div>

                        <h3 class="post-title">
                            <a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a>
                        </h3>

                        <div class="post-content">
							<?php echo wp_kses_post( wpautop( wp_trim_words( get_the_content( null, false, $post_id ), $excerpt_length ) ) ); ?>
                        </div>

                        <div class="post-footer">

                            <div class="post-author">
                                <div class="author-img">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         width="70" height="70" viewBox="0 0 70 70">
                                        <defs>
                                            <pattern id="author_img<?php echo esc_attr( $unique_id . $post_id ); ?>"
                                                     width="1" height="1" viewBox="0 6.383 68.979 68.979">
                                                <image preserveAspectRatio="xMidYMid slice" width="70" height="105"
                                                       xlink:href="<?php echo esc_url( get_avatar_url( get_the_author_meta( 'ID' ) ) ) ?>"></image>
                                            </pattern>
                                        </defs>
                                        <path d="M54.137,26.852c22.955,0,14.246,52.462,4.478,65.781S14.336,84.659,1.149,71.339,31.182,26.852,54.137,26.852Z"
                                              transform="translate(1.303 -26.852)"
                                              fill="url(#author_img<?php echo esc_attr( $unique_id . $post_id ); ?>)"></path>
                                    </svg>
                                </div>

                                <div class="author-info">
                                    <span class="author-by"><?php esc_html_e( 'Story By', 'element-plus' ) ?></span>
									<?php printf( '<h4 class="author-name"><a href="%s">%s</a></h4>', get_author_posts_url( get_the_author_meta( 'ID' ) ), get_the_author_meta( 'display_name' ) ); ?>
                                </div>
                            </div>

                            <div class="post-read-more">

								<?php if ( $readmore_style == '2' ) : ?>
                                    <a href="<?php echo esc_url( get_the_permalink() ); ?>"
                                       class="post-btn-2">
                                        <i class="fa fa-long-arrow-right"></i>
                                    </a>
								<?php else : ?>
                                    <a href="<?php echo esc_url( get_the_permalink() ); ?>"
                                       class="post-btn"><?php echo esc_html( $btn_text ); ?> <i
                                                class="fa fa-arrow-right"></i></a>
								<?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

			<?php wp_reset_postdata();
		endforeach; ?>
    </div>
</div>