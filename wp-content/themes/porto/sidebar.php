<?php
global $porto_settings, $porto_layout, $porto_sidebar;
wp_reset_postdata();
$content_bottom = porto_get_meta_value('content_bottom');
$content_inner_bottom = porto_get_meta_value('content_inner_bottom');
$wrapper = porto_get_wrapper_type();
?>

<?php
do_action('porto_before_content_inner_bottom');
if ($content_inner_bottom) : ?>
    <div id="content-inner-bottom"><!-- begin content inner bottom -->
        <?php foreach (explode(',', $content_inner_bottom) as $block) {
            echo do_shortcode('[porto_block name="'.$block.'"]');
        } ?>
    </div><!-- begin content inner bottom -->
<?php endif;
do_action('porto_after_content_inner_bottom');
?>

</div><!-- end main content -->

<?php
$mobile_sidebar = porto_get_meta_value('mobile_sidebar');
if ( 'yes' == $mobile_sidebar ) {
    $mobile_sidebar = true;
} else if ( 'no' == $mobile_sidebar ) {
    $mobile_sidebar = false;
} else {
    $mobile_sidebar = $porto_settings['show-mobile-sidebar'];
}
if ( $mobile_sidebar ) {
    echo '<div class="sidebar-overlay"></div>';
}
$sticky_sidebar = porto_meta_sticky_sidebar();
if ($porto_layout == 'wide-left-sidebar' || $porto_layout == 'wide-right-sidebar' || $porto_layout == 'left-sidebar' || $porto_layout == 'right-sidebar') : ?>
    <div class="col-lg-3 sidebar <?php echo str_replace('wide-', '', $porto_layout) ?><?php echo $mobile_sidebar ? ' mobile-sidebar' : '' ?>"><!-- main sidebar -->
        <?php if ($sticky_sidebar) : ?>
        <div data-plugin-sticky data-plugin-options="<?php echo esc_attr('{"autoInit": true, "minWidth": 991, "containerSelector": ".main-content-wrap","autoFit":true, "paddingOffsetBottom": 10}') ?>">
        <?php endif; ?>
        <?php if ( $mobile_sidebar ) : ?>
        <div class="sidebar-toggle"><i class="fa"></i></div>
        <?php endif; ?>
        <div class="sidebar-content">
            <?php
            // show sidebar
            do_action('porto_before_sidebar');
            $sidebar_menu = porto_sidebar_menu();
            if ($sidebar_menu) : ?>
                <div id="main-sidebar-menu" class="widget_sidebar_menu">
                    <?php if ($porto_settings['menu-sidebar-title']) : ?>
                        <div class="widget-title">
                            <?php echo force_balance_tags($porto_settings['menu-sidebar-title']) ?>
                            <?php if ($porto_settings['menu-sidebar-toggle']) : ?>
                                <div class="toggle"></div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <div class="sidebar-menu-wrap">
                        <?php echo $sidebar_menu ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php dynamic_sidebar( $porto_sidebar );
            do_action('porto_after_sidebar');
            ?>
        </div>
        <?php
        if ($sticky_sidebar) : ?>
        </div>
        <?php endif; ?>
    </div><!-- end main sidebar -->
<?php endif; ?>

    </div>
    <?php do_action('porto_after_content'); ?>
</div>

<?php
do_action('porto_before_content_bottom');
if ($content_bottom) : ?>
    <div id="content-bottom"><!-- begin content bottom -->
        <?php foreach (explode(',', $content_bottom) as $block) {
            echo do_shortcode('[porto_block name="'.$block.'"]');
        } ?>
    </div><!-- begin content bottom -->
<?php endif;
do_action('porto_after_content_bottom');
?>
