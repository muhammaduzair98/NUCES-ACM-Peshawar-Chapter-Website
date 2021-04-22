<?php
/**
 * Element Name: Marquee
 *
 * @package elements/marquee/view/template-1
 * @copyright Pluginbazar 2019
 */

$unique_id    = uniqid();
$style        = eplus()->get_shortcode_atts( 'style' );
$content_type = eplus()->get_shortcode_atts( 'content_type', 'by_posts' );
$label        = eplus()->get_shortcode_atts( 'label', esc_html__('Latest News', 'element-plus' ) );
$post_ids     = array();

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

?>

<div id="eplus-marquee<?php echo esc_attr( $unique_id ); ?>" class="eplus-marquee eplus-marquee-<?php echo esc_attr( $style ); ?>">
    <span class="eplus-marquee-label"><?php echo esc_html( $label ); ?></span>
    <ul class="eplus-marquee-wrap">
	    <?php foreach ( $post_ids as $post_id ) : ?>
            <li class="eplus-marquee-single">
                <a href="<?php echo esc_url( get_the_permalink( $post_id ) ); ?>"><?php echo esc_html( get_the_title( $post_id ) ); ?></a>
            </li>
	    <?php endforeach; ?>
    </ul>
</div>

<script>
        jQuery('#eplus-marquee<?php echo esc_attr( $unique_id ); ?>').jConveyorTicker({reverse_elm: true});
</script>

