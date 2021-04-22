<?php
global $porto_settings, $porto_post_view, $porto_post_btn_style, $porto_post_btn_size, $porto_post_btn_color, $porto_post_image_size, $porto_post_author, $porto_post_excerpt_length;

$post_style = $porto_post_view ? $porto_post_view : $porto_settings['post-related-style'];
$post_author = $porto_post_author ? ($porto_post_author == 'show' ? true : false) : $porto_settings['post-related-author'];
$excerpt_length = $porto_settings['post-related-excerpt-length'];
if ($porto_post_excerpt_length)
    $excerpt_length = (int)$porto_post_excerpt_length;
$show_date = in_array('date', $porto_settings['post-metas']);

if ($post_style && 'style-3' == $post_style) {
    ?>
    <div class="post-item with-btn<?php echo ($porto_settings['post-title-style'] == 'without-icon') ? ' post-title-simple' : '' ?>">
        <?php if ($show_date) : ?>
        <div class="post-date">
            <?php
            porto_post_date();
            //porto_post_format();
            ?>
        </div>
        <?php
        endif;
        if ($post_author) : ?>
            <h4 class="title-short"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h4>
            <p class="author-name"><?php echo __('By', 'porto'); ?> <?php the_author_posts_link(); ?></p>
        <?php else : ?>
            <h4><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h4>
        <?php endif; ?>
        <?php echo porto_get_excerpt($excerpt_length, false); ?>
        <a href="<?php the_permalink(); ?>" class="btn <?php echo esc_attr($porto_post_btn_style ? $porto_post_btn_style : $porto_settings['post-related-btn-style']) ?> <?php echo esc_attr($porto_post_btn_color ? $porto_post_btn_color : $porto_settings['post-related-btn-color']) ?> <?php echo esc_attr($porto_post_btn_size ? $porto_post_btn_size : $porto_settings['post-related-btn-size']) ?> m-t-md m-b-md"><?php echo __('Read More', 'porto') ?></a>
    </div>
<?php } else if ('style-2' == $post_style) { ?>
    <div class="post-item style-2<?php echo ($porto_settings['post-title-style'] == 'without-icon') ? ' post-title-simple' : '' ?>">
        <h5>
            <a class="text-<?php echo $porto_settings['css-type'] == 'dark' ? 'light' : 'dark' ?>" href="<?php the_permalink(); ?>"><?php the_title() ?></a>
        </h5>
        <?php echo porto_get_excerpt($excerpt_length, false); ?>
        <div class="post-meta">
            <?php if (in_array('date', $porto_settings['post-metas'])) : ?><span class="meta-date"><i class="fa fa-calendar"></i> <?php echo get_the_date() ?></span><?php endif; ?>
            <?php if (in_array('author', $porto_settings['post-metas'])) : ?><span class="meta-author"><i class="fa fa-user"></i> <?php echo __('By', 'porto'); ?> <?php the_author_posts_link(); ?></span><?php endif; ?>
            <?php
            $cats_list = get_the_category_list(', ');
            if ($cats_list && in_array('cats', $porto_settings['post-metas'])) : ?>
                <span class="meta-cats"><i class="fa fa-folder-open"></i> <?php echo $cats_list ?></span>
            <?php endif; ?>
            <?php
            $tags_list = get_the_tag_list('', ', ');
            if ($tags_list && in_array('tags', $porto_settings['post-metas'])) : ?>
                <span class="meta-tags"><i class="fa fa-tag"></i> <?php echo $tags_list ?></span>
            <?php endif; ?>
            <?php if (in_array('comments', $porto_settings['post-metas'])) : ?><span class="meta-comments"><i class="fa fa-comments"></i> <?php comments_popup_link(__('0 Comments', 'porto'), __('1 Comment', 'porto'), '% '.__('Comments', 'porto')); ?></span><?php endif; ?>
            <?php
            if (function_exists('Post_Views_Counter') && Post_Views_Counter()->options['display']['position'] == 'manual' && in_array( 'post', (array) Post_Views_Counter()->options['general']['post_types_count'] )) {
                $post_count = do_shortcode('[post-views]');
                if ($post_count) {
                    echo $post_count;
                }
            }
            ?>
        </div>
    </div>
<?php } else if ('style-4' == $post_style) { ?>
    <div class="post-item style-4<?php echo ($porto_settings['post-title-style'] == 'without-icon') ? ' post-title-simple' : '' ?>">
    <span class="thumb-info">
        <span class="thumb-info-caption">
            <span class="thumb-info-caption-text">
                <a class="post-title" href="<?php the_permalink(); ?>"><h2 class="m-b-sm m-t-xs"><?php the_title() ?></h2></a>
                <div class="post-meta m-b-sm<?php echo (empty($porto_settings['post-metas']) ? ' d-none' : '') ?>">
                    <?php
                    $first = true;
                    if (in_array('date', $porto_settings['post-metas'])) : ?><?php if ($first) $first = false; else echo ' | ' ?><?php echo get_the_date() ?><?php endif; ?>
                    <?php if (in_array('author', $porto_settings['post-metas'])) : ?><?php if ($first) $first = false; else echo ' | ' ?><?php the_author_posts_link(); ?><?php endif; ?>
                    <?php
                    $cats_list = get_the_category_list(', ');
                    if ($cats_list && in_array('cats', $porto_settings['post-metas'])) : ?>
                        <?php if ($first) $first = false; else echo ' | ' ?><?php echo $cats_list ?>
                    <?php endif; ?>
                    <?php
                    $tags_list = get_the_tag_list('', ', ');
                    if ($tags_list && in_array('tags', $porto_settings['post-metas'])) : ?>
                        <?php if ($first) $first = false; else echo ' | ' ?><?php echo $tags_list ?>
                    <?php endif; ?>
                    <?php if (in_array('comments', $porto_settings['post-metas'])) : ?><?php if ($first) $first = false; else echo ' | ' ?><?php comments_popup_link(__('0 Comments', 'porto'), __('1 Comment', 'porto'), '% '.__('Comments', 'porto')); ?><?php endif; ?>
                    <?php
                    if (function_exists('Post_Views_Counter') && Post_Views_Counter()->options['display']['position'] == 'manual' && in_array( 'post', (array) Post_Views_Counter()->options['general']['post_types_count'] )) {
                        $post_count = do_shortcode('[post-views]');
                        if ($post_count) {
                            if ($first) $first = false; else echo ' | ';
                            echo $post_count;
                        }
                    }
                    ?>
                </div>
                <?php echo porto_get_excerpt($excerpt_length, true, true); ?>
            </span>
        </span>
    </span>
    </div>
<?php } else if ('style-5' == $post_style) { ?>
    <div class="post-item style-5<?php echo ($porto_settings['post-title-style'] == 'without-icon') ? ' post-title-simple' : '' ?>">
        <?php
        $cats_list = '';
        $cats = array();
        foreach (get_the_category() as $c) {
            $cat = get_category($c);
            array_push($cats, $cat->name);
        }
        if (sizeof($cats) > 0) {
            $cats_list = implode(', ', $cats);
        }
        if ($cats_list && in_array('cats', $porto_settings['post-metas'])) : ?>
            <span class="cat-names"><?php echo $cats_list ?></span>
        <?php endif; ?>
        <h3 class="m-b-lg">
            <a class="text-decoration-none text-<?php echo $porto_settings['css-type'] == 'dark' ? 'light' : 'dark' ?>" href="<?php the_permalink(); ?>"><?php the_title() ?></a>
        </h3>
        <?php echo porto_get_excerpt($excerpt_length, false); ?>
        <div class="post-meta clearfix m-t-lg">
            <?php if (in_array('date', $porto_settings['post-metas'])) : ?><span class="meta-date"><i class="fa fa-calendar"></i> <?php echo get_the_date() ?></span><?php endif; ?>
            <?php if (in_array('author', $porto_settings['post-metas'])) : ?><span class="meta-author"><i class="fa fa-user"></i> <?php echo __('By', 'porto'); ?> <?php the_author_posts_link(); ?></span><?php endif; ?>
            <?php
            $tags_list = get_the_tag_list('', ', ');
            if ($tags_list && in_array('tags', $porto_settings['post-metas'])) : ?>
                <span class="meta-tags"><i class="fa fa-tag"></i> <?php echo $tags_list ?></span>
            <?php endif; ?>
            <?php if (in_array('comments', $porto_settings['post-metas'])) : ?><span class="meta-comments"><i class="fa fa-comments"></i> <?php comments_popup_link(__('0 Comments', 'porto'), __('1 Comment', 'porto'), '% '.__('Comments', 'porto')); ?></span><?php endif; ?>
            <?php
            if (function_exists('Post_Views_Counter') && Post_Views_Counter()->options['display']['position'] == 'manual' && in_array( 'post', (array) Post_Views_Counter()->options['general']['post_types_count'] )) {
                $post_count = do_shortcode('[post-views]');
                if ($post_count) {
                    echo $post_count;
                }
            }
            ?>
        </div>
    </div>
<?php } else { ?>
    <div class="post-item<?php echo ($porto_settings['post-title-style'] == 'without-icon') ? ' post-title-simple' : '' ?>">
        <?php if ($show_date) : ?>
        <div class="post-date">
            <?php
            porto_post_date();
            //porto_post_format();
            ?>
        </div>
        <?php
        endif;
        if ($post_author) : ?>
            <h4 class="title-short"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h4>
            <p class="author-name"><?php echo __('By', 'porto'); ?> <?php the_author_posts_link(); ?></p>
        <?php else : ?>
            <h4><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h4>
        <?php endif; ?>
        <?php echo porto_get_excerpt($excerpt_length); ?>
    </div>
<?php }?>