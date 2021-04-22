<?php
global $porto_settings, $page_share;

$post_layout = 'grid';

$columns = $porto_settings['grid-columns'];

global $porto_blog_columns, $porto_post_style;
if ($porto_blog_columns)
    $columns = $porto_blog_columns;

$post_style = $porto_post_style ? $porto_post_style : $porto_settings['post-style'];
$post_class = array();
$post_class[] = 'post post-' . $post_layout;
switch ($columns) {
    case '1': $post_class[] = ' col-md-12'; break;
    case '2': $post_class[] = ' col-md-6'; break;
    case '3': $post_class[] = ' col-md-6 col-lg-4'; break;
    case '4': $post_class[] = ' col-md-6 col-lg-4 col-xl-3'; break;
    default: $post_class[] = ' col-md-6 col-lg-4'; break;
}
if ($porto_settings['post-title-style'] == 'without-icon')
    $post_class[] = 'post-title-simple';

$post_share = get_post_meta($post->ID, 'post_share', true);

$social_share = true;
if( !$porto_settings['share-enable'] ){
    $social_share = false;
}
elseif( isset($post_share) && $post_share == 'no' ){
    $social_share = false;
}
elseif( isset($page_share) && ( $page_share == 'no' || ( $page_share == '' && !$porto_settings['blog-post-share'] ) ) ){
    $social_share = false;
}

$post_meta = '';

if (in_array('date', $porto_settings['post-metas'])){
    $post_meta .= '<div class="post-meta"><span class="meta-date"><i class="fa fa-calendar"></i>'.get_the_date( esc_attr( $porto_settings['blog-date-format'] ) ).'</span></div>';
} $post_meta .= '<div class="post-meta">';

    if (in_array('author', $porto_settings['post-metas'])) {
        $post_meta .= '<span class="meta-author"><i class="fa fa-user"></i>'. __('By ', 'porto') . get_the_author_posts_link().'</span>';
    }

    $cats_list = get_the_category_list(', ');
    if ($cats_list && in_array('cats', $porto_settings['post-metas'])) {
        $post_meta .= '<span class="meta-cats"><i class="fa fa-folder-open"></i>'.$cats_list.'</span>';
    }

    $tags_list = get_the_tag_list('', ', ');
    if ($tags_list && in_array('tags', $porto_settings['post-metas'])) {
        $post_meta .= '<span class="meta-tags"><i class="fa fa-tag"></i>'. $tags_list.'</span>';
    }
    if (in_array('comments', $porto_settings['post-metas'])) {
        $post_meta .= '<span class="meta-comments"><i class="fa fa-comments"></i>'. get_comments_popup_link(__('0 Comments', 'porto'), __('1 Comment', 'porto'), '% '.__('Comments', 'porto')).'</span>';
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

<article <?php post_class($post_class); ?>>

    <?php
    if ($post_style == 'related') :
        get_template_part('content', 'post-item');
    else :
    ?>
        <div class="grid-box">
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
                                $attachment = porto_get_attachment($featured_image['attachment_id']);
                                if ($attachment) {
                                    ?>
                                    <div>
                                        <div class="img-thumbnail">
                                            <?php echo $porto_settings['post-link'] ? '<a href="'.get_the_permalink().'">' : '' ?>
                                            <img class="owl-lazy img-responsive" width="<?php echo $attachment['width'] ?>" height="<?php echo $attachment['height'] ?>" data-src="<?php echo $attachment['src'] ?>" alt="<?php echo $attachment['alt'] ?>" />
                                            <?php echo $porto_settings['post-link'] ? '</a>' : '' ?>
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
                        
                        <?php
                            if ( $porto_settings['blog-post-share-position'] === 'advance' && $social_share ) : ?>
                                <div class="post-block post-share post-share-advance">
                                    <div class="post-share-advance-bg">
                                        <?php get_template_part('share') ?>
                                        <i class="fa fa-share-alt"></i>
                                    </div>
                                </div>
                        <?php endif; ?>
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
            <!-- Post meta before content -->
            <?php if( 'before' === $porto_settings['post-meta-position'] ) echo $post_meta;?>
            <div class="post-content">

                <h4 class="entry-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>
                <?php
                porto_render_rich_snippets( false );
                if ($porto_settings['blog-excerpt']) {
                    echo $porto_settings['post-link'] ? '<a href="'.get_the_permalink().'">' : '';
                    echo porto_get_excerpt( $porto_settings['blog-excerpt-length'], false );
                    echo $porto_settings['post-link'] ? '</a>' : '';
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
                <?php
                    $share = get_post_meta($post->ID, 'post_share', true);
                    if ( $porto_settings['blog-post-share-position'] === '' && $social_share ) :
                ?>
                    <?php if('advance' !== $porto_settings['blog-post-share-position']): ?>
                        <div class="post-block post-share">
                            <?php get_template_part('share') ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <!-- Post meta after content -->
            <?php 
               if( 'before' !== $porto_settings['post-meta-position'] )
                echo $post_meta;
            ?>
            <div class="clearfix">
                <a class="btn btn-xs btn-primary pt-right" href="<?php echo esc_url( apply_filters( 'the_permalink', get_permalink() ) ) ?>"><?php _e('Read more...', 'porto') ?></a>
            </div>
        </div>
    <?php endif; ?>
</article>