<?php
global $porto_settings;

$featured_images = porto_get_featured_images();
$show_date = in_array('date', $porto_settings['post-metas']);
?>
<div class="post-item-small">
    <?php if (count($featured_images)) :
        $attachment_id = $featured_images[0]['attachment_id'];
        $attachment_thumb = porto_get_attachment($attachment_id, 'widget-thumb-medium');
        ?>
        <div class="post-image img-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <img width="<?php echo $attachment_thumb['width'] ?>" height="<?php echo $attachment_thumb['height'] ?>" src="<?php echo $attachment_thumb['src'] ?>" alt="<?php echo $attachment_thumb['alt'] ?>" />
            </a>
        </div>
    <?php endif; ?>
    <a href="<?php the_permalink(); ?>"><?php the_title() ?></a>
    <?php if ($show_date) : ?><span class="post-date"><?php echo get_the_date(); ?></span><?php endif; ?>
</div>