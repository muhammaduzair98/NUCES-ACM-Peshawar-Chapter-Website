<?php
global $porto_settings;

$post_layout = 'full-alt';

$show_date = in_array('date', $porto_settings['post-metas']);
$show_format = $porto_settings['post-format'] && get_post_format();
$post_class = array();
$post_class[] = 'post-' . $post_layout;
if (!($show_date || $show_format))
    $post_class[] = 'hide-post-date';

if ($porto_settings['post-title-style'] == 'without-icon')
    $post_class[] = 'post-title-simple';
?>

<article <?php post_class($post_class); ?>>

    <?php
    // Post Slideshow
    $slideshow_type = get_post_meta($post->ID, 'slideshow_type', true);

    if (!$slideshow_type)
        $slideshow_type = 'images';

    if ($slideshow_type != 'none' && $porto_settings['post-slideshow']) : ?>
        <?php if ($slideshow_type == 'images') :
            $featured_images = porto_get_featured_images();
            $image_count = count($featured_images);

            if ($image_count) : ?>
            <div class="post-image<?php if ($image_count == 1) echo ' single'; ?>">
                <div class="post-slideshow porto-carousel owl-carousel">
                    <?php
                    foreach ($featured_images as $featured_image) {
                        $attachment = porto_get_attachment($featured_image['attachment_id']);
                        if ($attachment) {
                            ?>
                            <div>
                                <div class="img-thumbnail">
                                    <img class="owl-lazy img-responsive" width="<?php echo $attachment['width'] ?>" height="<?php echo $attachment['height'] ?>" data-src="<?php echo $attachment['src'] ?>" alt="<?php echo $attachment['alt'] ?>" />
                                    <?php if ($porto_settings['post-zoom']) : ?>
                                        <span class="zoom" data-src="<?php echo $attachment['src'] ?>" data-title="<?php echo $attachment['caption']; ?>"><i class="fa fa-search"></i></span>
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
        endif;
        ?>

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
    <div class="post-content">
		<div>						
			<?php if (in_array('author', $porto_settings['post-metas'])) : ?>
				<span>
					<?php echo __('Posted by: ', 'porto'); ?>
					<span class="text-color-dark font-weight-semibold"><?php the_author(); ?></span>
				</span>
			<?php endif; ?>
					
			<?php
			$cats_list = get_the_category_list(', ');
			if ($cats_list && in_array('cats', $porto_settings['post-metas'])) : ?>
				<span class="meta-cats m-l-lg"><?php echo __('Category: ', 'porto'); ?> <?php echo $cats_list ?></span>
			<?php endif; ?>
			
			<?php
			$tags_list = get_the_tag_list('', ', ');
			if ($tags_list && in_array('tags', $porto_settings['post-metas'])) : ?>
				<span class="meta-tags m-l-lg"><?php echo __('Tags: ', 'porto'); ?> <?php echo $tags_list ?></span>
			<?php endif; ?>
			
			
			<?php if (in_array('comments', $porto_settings['post-metas'])) : ?>
				<span class="m-l-lg"><?php echo __('Comments: ', 'porto'); ?>
					<span class="text-color-primary font-weight-semibold"><?php printf( _nx( 'One Comment', '%1$s', get_comments_number(), 'comments title', 'textdomain' ), number_format_i18n( get_comments_number() ) ); ?></span>
				
				</span>
			<?php endif; ?>
			
			<?php if (in_array('like', $porto_settings['post-metas'])) : ?>
                <span class="m-l-lg meta-like">
                    <?php echo porto_blog_like() ?>
                </span>
            <?php endif; ?>
			
			<?php 
			if (function_exists('Post_Views_Counter') && Post_Views_Counter()->options['display']['position'] == 'manual' && in_array( 'post', (array) Post_Views_Counter()->options['general']['post_types_count'] )) {
				$post_count = do_shortcode('[post-views]');
				if ($post_count) {
					echo $post_count;
				}
			}
			?>
			
			<?php if ($show_date || $show_format) : ?>		
				<?php if (in_array('date', $porto_settings['post-metas'])) : ?>
					<span class="m-l-lg">
						<?php echo __('Post Date: ', 'porto'); ?><span class="font-weight-semibold"><?php echo get_the_date() ?></span>
					</span>
				<?php endif; ?>
			<?php endif; ?>
		</div>
		<hr class="solid">		
        <?php if ($porto_settings['post-title']) : ?>
            <h2 class="entry-title"><?php the_title(); ?></h2>
        <?php endif; ?>
        <?php porto_render_rich_snippets( false ); ?>
        <div class="entry-content">
            <?php
            the_content();
            wp_link_pages( array(
                'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'porto' ) . '</span>',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
                'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'porto' ) . ' </span>%',
                'separator'   => '<span class="screen-reader-text">, </span>',
            ) );
            ?>
        </div>

    </div>

    <div class="post-gap"></div>

    <?php
    $share = porto_get_meta_value('post_share');
    if ($porto_settings['share-enable'] && 'no' !== $share && ('yes' === $share || ('yes' !== $share && $porto_settings['post-share']))) : ?>
        <div class="post-block post-share">
            <?php if ($porto_settings['post-title-style'] == 'without-icon') : ?>

            <?php else : ?>
                <h3><i class="fa fa-share"></i><?php _e('Share this post', 'porto') ?></h3>
            <?php endif; ?>
            <?php get_template_part('share') ?>
        </div>
    <?php endif; ?>

    <?php if ($porto_settings['post-author']) : ?>
        <div class="post-block post-author clearfix">
            <?php if ($porto_settings['post-title-style'] == 'without-icon') : ?>
                <h4><?php _e('Author', 'porto') ?></h4>
            <?php else : ?>
                <h3><i class="fa fa-user"></i><?php _e('Author', 'porto') ?></h3>
            <?php endif; ?>
            <div class="img-thumbnail">
                <?php echo get_avatar(get_the_author_meta('email'), '80'); ?>
            </div>
            <p><strong class="name"><?php the_author_posts_link(); ?></strong></p>
            <p><?php the_author_meta("description"); ?></p>
        </div>
    <?php endif; ?>

    <?php if ($porto_settings['post-comments']) : ?>
        <div class="post-gap-small"></div>
        <?php
        wp_reset_postdata();
        comments_template();
        ?>
    <?php endif; ?>

</article>