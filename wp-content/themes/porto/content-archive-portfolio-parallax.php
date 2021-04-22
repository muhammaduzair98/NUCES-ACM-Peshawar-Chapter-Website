<?php
global $global_tax, $porto_settings, $porto_layout, $post, $porto_portfolio_columns, $porto_portfolio_view, $porto_portfolio_thumb, $porto_portfolio_thumb_bg, $porto_portfolio_thumb_image, $porto_portfolio_ajax_load, $porto_portfolio_ajax_modal;
?>
<a href="<?php echo get_site_url() . '/portfolio_cat/' . $global_tax['slug']; ?>">
    <section class="portfolio-parallax parallax section section-text-light section-parallax m-none" data-plugin-parallax data-plugin-options='{"speed": 1.5}' data-image-src="<?php echo $global_tax['image']; ?>">
        <div class="container-fluid">
            <h2><?php echo $global_tax['name']; ?></h2>
                <?php if( $global_tax['image_counter'] == true )  { ?>
                    <span class="thumb-info-icons position-style-3 text-color-light">
                        <span class="thumb-info-icon pictures background-color-primary">
                            <?php echo $global_tax['count'] ?>
                            <i class="fa fa-picture-o"></i>
                        </span>
                    </span>
                <?php } ?>
            <span class="thumb-info-plus"></span>
        </div>
    </section>
</a>
