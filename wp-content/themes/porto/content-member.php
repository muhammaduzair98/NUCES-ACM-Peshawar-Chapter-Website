<?php
global $porto_settings, $porto_layout;
$member_advance_layout = $porto_settings['member-page-style'];
?>
<article <?php post_class(); ?>>

<?php
if(isset($porto_settings['single-member-social-link-style']) && $porto_settings['single-member-social-link-style'] == 'advance')
	$social_links_adv_pos = true;
else
	$social_links_adv_pos = false;

	$share_links = '';
	// Social Share
	$member_id = $post->ID;
	$share_facebook = get_post_meta($member_id, 'member_facebook', true);
	$share_twitter = get_post_meta($member_id, 'member_twitter', true);
	$share_linkedin = get_post_meta($member_id, 'member_linkedin', true);
	$share_googleplus = get_post_meta($member_id, 'member_googleplus', true);
	$share_pinterest= get_post_meta($member_id, 'member_pinterest', true);
	$share_email = get_post_meta($member_id, 'member_email', true);
	$share_phone = get_post_meta($member_id, 'member_phone', true);
	$share_vk = get_post_meta($member_id, 'member_vk', true);
	$share_xing = get_post_meta($member_id, 'member_xing', true);
	$share_tumblr = get_post_meta($member_id, 'member_tumblr', true);
	$share_reddit = get_post_meta($member_id, 'member_reddit', true);
	$share_vimeo = get_post_meta($member_id, 'member_vimeo', true);
	$share_instagram = get_post_meta($member_id, 'member_instagram', true);
	$share_whatsapp = get_post_meta($member_id, 'member_whatsapp', true);
	$target = (isset($porto_settings['member-social-target']) && $porto_settings['member-social-target']) ? ' target="_blank"' : '';
	
	if ($share_facebook || $share_twitter || $share_linkedin || $share_googleplus || $share_pinterest || $share_email || $share_vk || $share_xing || $share_tumblr || $share_reddit || $share_vimeo || $share_instagram || $share_whatsapp) :
            
            $share_links .= '<div class="member-share-links share-links">';
               
 			if ($share_facebook) :
                $share_links .= '<a href="'.esc_url($share_facebook).'"'. $target . ' data-tooltip data-placement="bottom" title="'. __('Facebook', 'porto') .'" class="share-facebook">'. __('Facebook', 'porto') .'</a>';
            endif;
            if ($share_twitter) :
                $share_links .= '<a href="'. esc_url($share_twitter) .'"'. $target .' data-tooltip data-placement="bottom" title="'. __('Twitter', 'porto') .'" class="share-twitter">'. __('Twitter', 'porto') .'</a>';
            endif;
            if ($share_linkedin) :
                $share_links .= '<a href="'. esc_url($share_linkedin) .'" '. $target .' data-tooltip data-placement="bottom" title="'. __('LinkedIn', 'porto') .'" class="share-linkedin">'. __('LinkedIn', 'porto').'</a>';
            endif;
            if ($share_googleplus) :
                $share_links .= '<a href="'. esc_url($share_googleplus) .'"'. $target . ' data-tooltip data-placement="bottom" title="'. __('Google +', 'porto') .'" class="share-googleplus">'. __('Google +', 'porto') .'</a>';
            endif;
            if ($share_pinterest) :
                $share_links .= '<a href="'. esc_url($share_pinterest) .'"'. $target . ' data-tooltip data-placement="bottom" title="'. __('Pinterest', 'porto') .'" class="share-pinterest">'. __('Pinterest', 'porto') .'</a>';
            endif;
            if ($share_email) :
                $share_links .= '<a href="mailto:'. esc_attr($share_email) .'"'. $target . ' data-tooltip data-placement="bottom" title="'. __('Email', 'porto') .'" class="share-email">'. esc_attr($share_email) .'</a>';
            endif;
            if ($share_vk) :
                $share_links .= '<a  href="'. esc_url($share_vk) .'"'. $target . ' data-tooltip data-placement="bottom" title="'. __('VK', 'porto') .'" class="share-vk">'. __('VK', 'porto') .'</a>';
            endif;
            if ($share_xing) :
                $share_links .= '<a  href="'. esc_url($share_xing) .'"'. $target . ' data-tooltip data-placement="bottom" title="'. __('Xing', 'porto') .'" class="share-xing">'. __('Xing', 'porto') .'</a>';
            endif;
            if ($share_tumblr) :
                $share_links .= '<a  href="'. esc_url($share_tumblr) .'"'. $target . ' data-tooltip data-placement="bottom" title="'. __('Tumblr', 'porto') .'" class="share-tumblr">'. __('Tumblr', 'porto') .'</a>';
            endif;
            if ($share_reddit) :
                $share_links .= '<a  href="'. esc_url($share_reddit) .'"'. $target . ' data-tooltip data-placement="bottom" title="'. __('Reddit', 'porto') .'" class="share-reddit">'. __('Reddit', 'porto') .'</a>';
            endif;
            if ($share_vimeo) :
                $share_links .= '<a  href="'. esc_url($share_vimeo) .'"'. $target . ' data-tooltip data-placement="bottom" title="'. __('Vimeo', 'porto') .'" class="share-vimeo">'. __('Vimeo', 'porto') .'</a>';
            endif;
            if ($share_instagram) :
                $share_links .= '<a  href="'. esc_url($share_instagram) .'"'. $target . ' data-tooltip data-placement="bottom" title="'. __('Instagram', 'porto') .'" class="share-instagram">'. __('Instagram', 'porto') .'</a>';
            endif;
            if ($share_whatsapp) :
                $share_links .= '<a href="whatsapp://send?text='. esc_url($share_whatsapp) .'"'. $target . ' data-tooltip data-placement="bottom" title="'. __('WhatsApp', 'porto') .'" class="share-whatsapp" style="display:none">'. __('WhatsApp', 'porto') .'</a>';
            endif;
			if ($share_phone) :
                $share_links .= '<div data-tooltip data-placement="bottom" title="'. __('Phone', 'porto') .'" class="share-phone"><i class="Simple-Line-Icons-call-out"></i>'. esc_html( $share_phone ) .'</div>';
			endif;
            $share_links .= '</div>';
 endif; ?>

	
  <?php if( !$member_advance_layout ): ?>

    
    <?php if ($porto_layout === 'widewidth') echo '<div class="container m-t-lg">' ?>
    <div class="row">
        <?php
        // Member Slideshow
        $slideshow_type = get_post_meta($post->ID, 'slideshow_type', true);
        $video_code = get_post_meta($post->ID, 'video_code', true);
        if (!$slideshow_type)
            $slideshow_type = 'images';
        $featured_images = porto_get_featured_images();
        $image_count = count($featured_images);
        if (($slideshow_type == 'images' && $image_count) || ($slideshow_type == 'video' && $video_code)) : ?>
        <div class="col-lg-4">
            <?php if ($slideshow_type == 'images' && $image_count) : ?>
                <div class="member-image<?php if ($image_count == 1) echo ' single'; ?>">
                	<?php if(isset( $social_links_adv_pos) && $social_links_adv_pos): ?>
                        <div class="share-links post-share-advance member-share-advance">
                            <div class="post-share-advance-bg">

                                <?php echo $share_links; ?>

                                <i class="fa fa-share-alt"></i>

                            </div>
                    </div>
                    <?php endif; ?>
                    <div class="member-slideshow porto-carousel owl-carousel">
                        <?php
                        foreach ($featured_images as $featured_image) {
                            $attachment = porto_get_attachment($featured_image['attachment_id']);
                            if ($attachment) {
                                ?>
                                <div>
                                    <div class="img-thumbnail">
                                        <img class="owl-lazy img-responsive" width="<?php echo $attachment['width'] ?>" height="<?php echo $attachment['height'] ?>" data-src="<?php echo $attachment['src'] ?>" alt="<?php echo $attachment['alt'] ?>" />
                                        <?php if ($porto_settings['member-zoom']) : ?>
                                            <span class="zoom" data-src="<?php echo $attachment['src']; ?>" data-title="<?php echo $attachment['caption']; ?>"><i class="fa fa-search"></i></span>
                                            <?php if (!is_singular('member')) : ?><a class="link" href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a><?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php
                            }
                        }
                        ?>
                    </div>
                    
                </div>
            <?php endif; ?>
            <?php
            if ($slideshow_type == 'video' && $video_code) :
                ?>
                <div class="member-image single">
                    <div class="img-thumbnail fit-video">
                        <?php echo do_shortcode($video_code) ?>
                    </div>
                </div>
            <?php
            endif;
			
			if( $porto_settings['member-socials-pos'] == 'below_thumb' ) echo $share_links;
			
            ?>
        </div>
        <div class="col-lg-8">
        <?php else : ?>
        <div class="col-lg-12">
        <?php endif; ?>
            <?php
            $member_id = $post->ID;
            $firstname = get_post_meta($member_id, 'member_firstname', true);
            $lastname = get_post_meta($member_id, 'member_lastname', true);
            $role = get_post_meta($member_id, 'member_role', true);
            ?>
            <h2 class="entry-title<?php echo ($role?' shorter':'') ?>"><?php echo esc_html($firstname) ?><?php echo ($lastname?' <strong>'.esc_html($lastname).'</strong>':'') ?></h2>
            <?php porto_render_rich_snippets( false ); ?>
            <?php echo ($role?'<h4 class="member-role">'.esc_html($role).'</h4>':'') ?>
            <?php
            if ($porto_settings['member-socials-pos'] == 'after' || $porto_settings['member-socials-pos'] == 'below_thumb')
                echo do_shortcode(wpautop(get_post_meta($post->ID, 'member_overview', true)));
            ?>
    		<?php 
				// social links
				if( $porto_settings['member-socials-pos'] != 'below_thumb' )
				if( isset($social_links_adv_pos) && !$social_links_adv_pos ) echo $share_links; 
			?>
            <?php
            if ($porto_settings['member-socials-pos'] == '')
                echo do_shortcode(wpautop(get_post_meta($post->ID, 'member_overview', true)));
            ?>
            <?php
            $member_link = get_post_meta($post->ID, 'member_link', true);
            if ($member_link) :
                ?>
                <div class="post-gap-small"></div>
                <a<?php echo $target ?> class="btn btn-primary btn-icon" href="<?php echo esc_url($member_link) ?>">
                    <i class="fa fa-external-link"></i><?php _e('More Info', 'porto') ?>
                </a>
                <span data-appear-animation-delay="800" data-appear-animation="rotateInUpLeft" class="dir-arrow <?php echo 'hlb' ?>"></span>
                <div class="post-gap-small"></div>
            <?php endif; ?>
        </div>
    </div>
    <?php if ($porto_layout === 'widewidth') echo '</div>' ?>
<?php endif; ?>
    <?php if (get_the_content()) : ?>
       <?php if( !$member_advance_layout ): ?>
		<?php if ($porto_layout === 'widewidth') echo '<div class="container">' ?>
        <hr class="tall"/>
        <?php if ($porto_layout === 'widewidth') echo '</div>' ?>
       <?php endif; ?>
        <div class="post-content">
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
            <div class="post-gap-small"></div>
        </div>
    <?php endif; ?>
</article>