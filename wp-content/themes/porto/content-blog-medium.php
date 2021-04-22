<?php

global $porto_settings;

$post_layout = 'medium';
$featured_images = porto_get_featured_images();

$post_class = array();
$post_class[] = 'post post-' . $post_layout;
if ($porto_settings['post-title-style'] == 'without-icon')
    $post_class[] = 'post-title-simple';
$post_meta = '';
$post_meta .= '<div class="post-meta ' . (empty($porto_settings['post-metas']) ? ' d-none' : '') . '">';
	if (in_array('date', $porto_settings['post-metas'])){
		$post_meta .= '<span class="meta-date"><i class="fa fa-calendar"></i>'.get_the_date( esc_attr( $porto_settings['blog-date-format'] ) ).'</span>';
	} 
	if (in_array('author', $porto_settings['post-metas'])) {
		$post_meta .= '<span class="meta-author"><i class="fa fa-user"></i> '. __('By ', 'porto') . get_the_author_posts_link().'</span>';
	}
	$cats_list = get_the_category_list(', ');
	if ($cats_list && in_array('cats', $porto_settings['post-metas'])) {
		$post_meta .= '<span class="meta-cats"><i class="fa fa-folder-open"></i> '.$cats_list.'</span>';
	}
	$tags_list = get_the_tag_list('', ', ');
	if ($tags_list && in_array('tags', $porto_settings['post-metas'])) {
		$post_meta .= '<span class="meta-tags"><i class="fa fa-tag"></i> '. $tags_list.'</span>';
	}
	if (in_array('comments', $porto_settings['post-metas'])) {
		$post_meta .= '<span class="meta-comments"><i class="fa fa-comments"></i> '. get_comments_popup_link(__('0 Comments', 'porto'), __('1 Comment', 'porto'), '% '.__('Comments', 'porto')).'</span>';
	}
    if (function_exists('Post_Views_Counter') && Post_Views_Counter()->options['display']['position'] == 'manual' && in_array( 'post', (array) Post_Views_Counter()->options['general']['post_types_count'] )) {
		$post_count = do_shortcode('[post-views]');
		if ($post_count) {
			$post_meta .= $post_count;
		}
	}
	if (in_array('like', $porto_settings['post-metas'])) {
		$post_meta .= '<span class="meta-like">'.porto_blog_like().'</span>';
    }
$post_meta .= '</div>';
	
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($post_class); ?>>
	<!-- Post meta before content -->
    <?php if( 'before' === $porto_settings['post-meta-position'] ) echo '<div class="row"><div class="col-12">'.$post_meta.'</div></div>';?>
    <div class="row">
        <?php if (count($featured_images)) : ?>
        <div class="col-lg-5">
            <?php
            // Post Slideshow
            $slideshow_type = get_post_meta($post->ID, 'slideshow_type', true);

            if (!$slideshow_type)
                $slideshow_type = 'images';

            if ($slideshow_type != 'none') : ?>
                <?php if ($slideshow_type == 'images') :
                    $featured_images = porto_get_featured_images();
                    $image_count = count($featured_images);

                    if ($image_count) :
                    ?>
                    <div class="post-image<?php if ($image_count == 1) echo ' single'; ?>">
                        <div class="post-slideshow porto-carousel owl-carousel">
                            <?php
                            foreach ($featured_images as $featured_image) {
                                $attachment_medium = porto_get_attachment($featured_image['attachment_id'], 'blog-medium');
                                $attachment = porto_get_attachment($featured_image['attachment_id']);
                                if ($attachment) {
                                    ?>
                                    <div>
                                        <div class="img-thumbnail">
                                            <img class="owl-lazy img-responsive" width="<?php echo $attachment_medium['width'] ?>" height="<?php echo $attachment_medium['height'] ?>" data-src="<?php echo $attachment_medium['src'] ?>" alt="<?php echo $attachment_medium['alt'] ?>" />
                                            <?php if ($porto_settings['post-zoom']) : ?>
                                                <span class="zoom" data-src="<?php echo $attachment['src'] ?>" data-title="<?php echo $attachment_medium['caption']; ?>"><i class="fa fa-search"></i></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                    endif;
                endif; ?>

                <?php
                if ($slideshow_type == 'video') {
                    $video_code = get_post_meta($post->ID, 'video_code', true);
                    if ($video_code) {
                        ?>
                        <div class="post-image single">
                            <div class="img-thumbnail fit-video">
                                <?php echo do_shortcode($video_code) ?>
                            </div>
                        </div>
                    <?php
                    }
                }
            endif;
            ?>
        </div>
        <div class="col-lg-7">
            <?php else : ?>
            <div class="col-lg-12">
                <?php endif; ?>

                <div class="post-content">

                    <h2 class="entry-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>

                    <?php
                    porto_render_rich_snippets( false );
                    if ($porto_settings['blog-excerpt']) {
                        echo porto_get_excerpt( $porto_settings['blog-excerpt-length'], false );
                    } else {
                        echo '<div class="entry-content">';
                        the_content();
                        wp_link_pages( array(
                            'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'porto' ) . '</span>',
                            'after'       => '</div>',
                            'link_before' => '<span>',
                            'link_after'  => '</span>',
                            'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'porto' ) . ' </span>%',
                            'separator'   => '<span class="screen-reader-text">, </span>',
                        ) );
                        echo '</div>';
                    }
                    ?>

                </div>
            </div>
        </div>
		
		<!-- Post meta after content -->
        <?php if( 'before' !== $porto_settings['post-meta-position'] ) echo $post_meta; ?>
        <a class="btn btn-xs btn-primary pt-right" href="<?php echo esc_url( apply_filters( 'the_permalink', get_permalink() ) ) ?>"><?php _e('Read more...', 'porto') ?></a>

</article>