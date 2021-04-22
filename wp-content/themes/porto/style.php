<?php
/**
 * @package Porto
 * @author SW-Theme
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
global $porto_is_dark, $porto_settings, $porto_save_settings_is_rtl;
$porto_settings_backup = $porto_settings;
$b = porto_check_theme_options();
$porto_settings = $porto_settings_backup;
$porto_is_dark = ( $b['css-type'] == 'dark' );
$dark = $porto_is_dark;

if ( ( isset( $porto_save_settings_is_rtl ) && $porto_save_settings_is_rtl ) || is_rtl() ) {
    $left = 'right';
    $right = 'left';
    $rtl = true;
} else {
    $left = 'left';
    $right = 'right';
    $rtl = false;
}

if ( !function_exists( 'if_dark' ) ) {
    function if_dark($if, $else = '') {
        global $porto_is_dark;
        if ( $porto_is_dark ) {
            return $if;
        }
        return $else;
    }
}
if ( !function_exists( 'if_light' ) ) {
    function if_light($if, $else = '') {
        global $porto_is_dark;
        if ( !$porto_is_dark ) {
            return $if;
        }
        return $else;
    }
}

require_once ( porto_lib . '/lib/color-lib.php' );
$portoColorLib = PortoColorLib::getInstance();

if ( $dark ) {
    $color_dark = $b['color-dark'];
} else {
    $color_dark = '#1d2127';
}
$color_dark_inverse = '#fff';
$color_dark_1 = $color_dark;
$color_dark_2 = $portoColorLib->lighten($color_dark_1, 2);
$color_dark_3 = $portoColorLib->lighten($color_dark_1, 5);
$color_dark_4 = $portoColorLib->lighten($color_dark_1, 8);
$color_dark_5 = $portoColorLib->lighten($color_dark_1, 3);
$color_darken_1 = $portoColorLib->darken($color_dark_1, 2);

$dark_bg = $color_dark;
$dark_default_text = '#808697';

if ( $dark ) {
    $color_price = '#eee';

    $widget_bg_color = $color_dark_3;
    $widget_title_bg_color = $color_dark_4;
    $widget_border_color = 'transparent';

    $input_border_color = $color_dark_3;
    $image_border_color = $color_dark_4;
    $color_widget_title = '#fff';

    $price_slide_bg_color = $color_dark;
    $panel_default_border = $color_dark_3;
} else {
    $color_price = '#465157';

    $widget_bg_color = '#fbfbfb';
    $widget_title_bg_color = '#f5f5f5';
    $widget_border_color = '#ddd';

    $input_border_color = '#ccc';
    $image_border_color = '#ddd';
    $color_widget_title = '#313131';
    $price_slide_bg_color = '#eee';
    $panel_default_border = '#ddd';
}

$screen_large = "(max-width: ". ( $b['container-width'] + $b['grid-gutter-width'] - 1 ) . "px)";
$input_lists = 'input[type="email"],
                input[type="number"],
                input[type="password"],
                input[type="search"],
                input[type="tel"],
                input[type="text"],
                input[type="url"],
                input[type="color"],
                input[type="date"],
                input[type="datetime"],
                input[type="datetime-local"],
                input[type="month"],
                input[type="time"],
                input[type="week"]';

/* plugins */
?>
<?php if ($b['border-radius']) : ?>
    .owl-carousel .owl-nav [class*='owl-'],
    .scrollbar-rail > .scroll-element .scroll-bar,
    .scrollbar-chrome > .scroll-element .scroll-bar { border-radius: 3px; }
    .resp-vtabs .resp-tabs-container,
    .fancybox-skin { border-radius: 4px; }
    .scrollbar-inner > .scroll-element .scroll-element_outer, .scrollbar-inner > .scroll-element .scroll-element_track, .scrollbar-inner > .scroll-element .scroll-bar,
    .scrollbar-outer > .scroll-element .scroll-element_outer, .scrollbar-outer > .scroll-element .scroll-element_track, .scrollbar-outer > .scroll-element .scroll-bar { border-radius: 8px; }
    .scrollbar-macosx > .scroll-element .scroll-bar,
    .scrollbar-dynamic > .scroll-element .scroll-bar { border-radius: 7px; }
    .scrollbar-light > .scroll-element .scroll-element_outer,
    .scrollbar-light > .scroll-element .scroll-element_size,
    .scrollbar-light > .scroll-element .scroll-bar { border-radius: 10px; }
    .scrollbar-dynamic > .scroll-element .scroll-element_outer,
    .scrollbar-dynamic > .scroll-element .scroll-element_size { border-radius: 12px; }
    .scrollbar-dynamic > .scroll-element:hover .scroll-element_outer .scroll-bar,
    .scrollbar-dynamic > .scroll-element.scroll-draggable .scroll-element_outer .scroll-bar { border-radius: 6px; }
<?php endif; ?>
<?php if ( $dark ) : ?>
    .fancybox-skin { background: <?php echo $b['color-dark']; ?>; }
<?php endif; ?>

<?php
/* theme */
?>
/*------------------ header ---------------------- */
/* menu */
<?php if ( !$b['header-top-menu-hide-sep']) : ?>
    #header .header-top .top-links > li.menu-item:first-child > a { padding-<?php echo $left; ?>: 0; }
    #header .header-top .top-links > li.menu-item:last-child:after { display: none; }
<?php endif; ?>
/* search form */
@media (min-width: 992px) and <?php echo $screen_large; ?> {
    #header .searchform { width: 368px; }
    #header.search-md .searchform { width: 338px; }
    #header.search-md .searchform input { width: 288px; }
    #header.search-md .searchform.searchform-cats input { width: 160px; }
    #header.search-sm .searchform { width: 288px; }
    #header.search-sm .searchform input { width: 238px; }
    #header.search-sm .searchform.searchform-cats input { width: 110px; }
}
/* header type */
<?php
    $header_type = porto_get_header_type();
?>
<?php if ( 1 == $header_type || 4 == $header_type || 9 == $header_type || 13 == $header_type || 14 == $header_type || 17 == $header_type ) : ?>
    @media (min-width: 992px) {
        #header.header-separate .header-main { -webkit-transition: none; transition: none; }
        #header.header-separate .header-main .logo img { -webkit-transition: none; transition: none; -webkit-transform: scale(1); -ms-transform: scale(1); transform: scale(1); }
    }
<?php endif; ?>
<?php if ( 1 == $header_type ) : ?>
    @media (max-width: 991px) {
        #header .header-contact { display: none; }
        #header .header-main .header-center { text-align: <?php echo $right; ?>; }
        #header .header-main .header-right { width: 1%; }
    }
    @media (max-width: 767px) {
        #header .header-top,
        #header .switcher-wrap { display: block; }
    }
    #header .mobile-toggle { font-size: 18px; }
<?php elseif ( 5 == $header_type ) : ?>
    @media (max-width: 991px) {
        #header.header-5 .header-main .container .header-left,
        #header.header-5 .header-main .container .header-center { display: inline-block; }
    }
<?php elseif ( 7 == $header_type ) : ?>
    @media (max-width: 991px) {
        #header.header-7 .header-main .container .header-left { display: none; }
    }
<?php elseif ( (int)$header_type >= 10 && (int)$header_type <= 17 ) : ?>
    @media (min-width:992px) {
        #header.header-corporate .header-main .header-right .searchform-popup { margin-<?php echo $right; ?>: 0; }
    }
    @media (min-width: 992px) {
        #header.header-corporate .searchform { box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset; width: auto; }
        #header.header-corporate .searchform select, #header.header-corporate .searchform button { height: 34px; line-height: 34px; }
        #header.header-corporate .searchform .selectric .label { height: 34px; line-height: 36px; }
        #header.header-corporate .searchform input { height: 34px; border: none; padding: 0 12px; width: 140px; }
        #header.header-corporate .searchform select { border-<?php echo $left; ?>: 1px solid #ccc; padding-<?php echo $left; ?>: 8px; margin-<?php echo $right; ?>: -3px; font-size: 13px; }
        #header.header-corporate .searchform .selectric { border-<?php echo $left; ?>: 1px solid #ccc; }
        #header.header-corporate .searchform .selectric .label { padding-<?php echo $left; ?>: 8px; margin-<?php echo $right; ?>: -3px; }
        #header.header-corporate .searchform button { padding: 0 12px; }
    }
    #header.header-corporate .share-links { margin-top: 0; margin-bottom: 0; }
    #header.header-corporate .share-links a { width: 30px; height: 30px; border-radius: 30px; margin: 0 2px; overflow: hidden; box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.3); -webkit-transition: all 0.2s ease 0s; -moz-transition: all 0.2s ease 0s; transition: all 0.2s ease 0s; font-size: 14px; color: #333; background-color: #fff; }
    #header.header-corporate .share-links a:hover { color: #fff; }
<?php endif; ?>
<?php if ( 10 == $header_type ) : ?>
    #header.header-10 .header-right-bottom { margin-top: 10px; }
    @media (max-width: 991px) {
        #header.header-10 .header-right-bottom { margin-top: 0; }
    }
    @media (max-width: 767px) {
        #header.header-10 .share-links { display: none; }
    }
    @media (min-width: 992px) {
        #header.header-10 .header-main .header-left, #header.header-10 .header-main header-center, #header.header-10 .header-main .header-right { padding-top: 15px; padding-bottom: 15px; }
        #header.header-10 .header-main.sticky .header-right-top { display: none; }
        #header.header-10 .header-main.sticky .container .header-right-bottom { margin-top: 0; }
        #header.header-10 .header-main.sticky .container .header-left, #header.header-10 .header-main.sticky .container .header-center, #header.header-10 .header-main.sticky .container .header-right { padding-top: 0; padding-bottom: 0; }
        #header.header-10 .header-contact { margin: 0 0 4px; }
        #header.header-10 .searchform { margin-bottom: 4px; margin-<?php echo $left; ?>: 15px; }
        #header.header-10 #mini-cart { margin: <?php echo $rtl ? "0 15px 0 0" : "0 0 0 15px"; ?>; }
    }
<?php endif; ?>
<?php if ( (int)$header_type >= 11 && (int)$header_type <= 17 ) : ?>
    #header.header-corporate .header-main .searchform-popup, #header.header-corporate .header-main #mini-cart { display: none; }
    @media (min-width: 768px) {
        #header.header-corporate .switcher-wrap { margin-<?php echo $right; ?>: 5px; }
        #header.header-corporate .block-inline { line-height: 50px; margin-bottom: 5px; }
        #header.header-corporate .header-left .block-inline { margin-<?php echo $right; ?>: 8px; }
        #header.header-corporate .header-left .block-inline > * { margin: <?php echo $rtl ? "0 0 0 7px" : "0 7px 0 0"; ?>; }
        #header.header-corporate .header-right .block-inline { margin-<?php echo $left; ?>: 8px; }
        #header.header-corporate .header-right .block-inline > * { margin: <?php echo $rtl ? "0 7px 0 0" : "0 0 0 7px"; ?>; }
        #header.header-corporate .share-links { line-height: 1; }
    }
    #header.header-corporate .header-top .welcome-msg { font-size: 1.15em; }
    #header.header-corporate .header-top #mini-cart.minicart-inline { font-size: 1em; }
    #header.header-corporate .header-top #mini-cart.minicart-inline:first-child { margin-left: 0; margin-right: 0; }
    @media (max-width: 991px) {
        #header.header-corporate .header-top .header-left > *, #header.header-corporate .header-top .header-right > * { display: none; }
        #header.header-corporate .header-top .header-left > .block-inline, #header.header-corporate .header-top .header-right > .block-inline { display: block; }
        #header.header-corporate .header-top .searchform-popup, #header.header-corporate .header-top #mini-cart { display: none; }
        #header.header-corporate .header-main .searchform-popup, #header.header-corporate .header-main #mini-cart { display: inline-block; }
    }
<?php endif; ?>
<?php if ( 11 == $header_type || 12 == $header_type ) : ?>
    @media (min-width: 992px) {
        #header.header-11 .header-main .header-left,
        #header.header-12 .header-main .header-left,
        #header.header-11 .header-main.sticky .header-left,
        #header.header-12 .header-main.sticky .header-left,
        #header.header-11 .header-main .header-center,
        #header.header-12 .header-main .header-center,
        #header.header-11 .header-main.sticky .header-center,
        #header.header-12 .header-main.sticky .header-center,
        #header.header-11 .header-main .header-right,
        #header.header-12 .header-main .header-right,
        #header.header-11 .header-main.sticky .header-right,
        #header.header-12 .header-main.sticky .header-right { padding-top: 0; padding-bottom: 0; }
        #header.header-11 .header-main.change-logo #main-menu .mega-menu > li.menu-item > a,
        #header.header-12 .header-main.change-logo #main-menu .mega-menu > li.menu-item > a { padding-top: 33px; padding-bottom: 24px; }
        #header.header-11 .header-main.change-logo #main-menu .mega-menu > li.menu-item > a .tip,
        #header.header-12 .header-main.change-logo #main-menu .mega-menu > li.menu-item > a .tip { top: 15px; }
        #header.header-11 .header-main #main-menu .mega-menu > li.menu-item,
        #header.header-12 .header-main #main-menu .mega-menu > li.menu-item { margin-top: 0; margin-bottom: 0; margin-<?php echo $right; ?>: 0; }
        #header.header-11 #main-menu .mega-menu > li.menu-item > a,
        #header.header-12 #main-menu .mega-menu > li.menu-item > a { border-radius: 0; padding-top: 38px; padding-bottom: 24px; margin-bottom: 0; }
        #header.header-11 #main-menu .mega-menu > li.menu-item > a .tip,
        #header.header-12 #main-menu .mega-menu > li.menu-item > a .tip { top: 20px; }
        #header.header-11 #main-menu .mega-menu .popup,
        #header.header-12 #main-menu .mega-menu .popup { margin-top: 0; }
        #header.header-11 #main-menu .mega-menu .wide .popup,
        #header.header-12 #main-menu .mega-menu .wide .popup { border-radius: 0; }
        #header.header-11 #main-menu .mega-menu .wide .popup > .inner,
        #header.header-12 #main-menu .mega-menu .wide .popup > .inner { border-radius: 0; }
        #header.header-11 #main-menu .mega-menu .wide.pos-left .popup,
        #header.header-12 #main-menu .mega-menu .wide.pos-left .popup,
        #header.header-11 #main-menu .mega-menu .wide.pos-right .popup,
        #header.header-12 #main-menu .mega-menu .wide.pos-right .popup,
        #header.header-11 #main-menu .mega-menu .wide.pos-left .popup > .inner,
        #header.header-12 #main-menu .mega-menu .wide.pos-left .popup > .inner,
        #header.header-11 #main-menu .mega-menu .wide.pos-right .popup > .inner,
        #header.header-12 #main-menu .mega-menu .wide.pos-right .popup > .inner { border-radius: 0; }
        #header.header-11 #main-menu .mega-menu .narrow .popup,
        #header.header-12 #main-menu .mega-menu .narrow .popup,
        #header.header-11 #main-menu .mega-menu .narrow.pos-left .popup,
        #header.header-12 #main-menu .mega-menu .narrow.pos-left .popup,
        #header.header-11 #main-menu .mega-menu .narrow.pos-right .popup,
        #header.header-12 #main-menu .mega-menu .narrow.pos-right .popup,
        #header.header-11 #main-menu .mega-menu .narrow .popup > .inner,
        #header.header-12 #main-menu .mega-menu .narrow .popup > .inner,
        #header.header-11 #main-menu .mega-menu .narrow.pos-left .popup > .inner,
        #header.header-12 #main-menu .mega-menu .narrow.pos-left .popup > .inner,
        #header.header-11 #main-menu .mega-menu .narrow.pos-right .popup > .inner,
        #header.header-12 #main-menu .mega-menu .narrow.pos-right .popup > .inner,
        #header.header-11 #main-menu .mega-menu .narrow .popup > .inner > ul.sub-menu,
        #header.header-12 #main-menu .mega-menu .narrow .popup > .inner > ul.sub-menu,
        #header.header-11 #main-menu .mega-menu .narrow.pos-left .popup > .inner > ul.sub-menu,
        #header.header-12 #main-menu .mega-menu .narrow.pos-left .popup > .inner > ul.sub-menu,
        #header.header-11 #main-menu .mega-menu .narrow.pos-right .popup > .inner > ul.sub-menu,
        #header.header-12 #main-menu .mega-menu .narrow.pos-right .popup > .inner > ul.sub-menu { border-radius: 0; }
        #header.header-11 #main-menu .mega-menu .narrow ul.sub-menu ul.sub-menu,
        #header.header-12 #main-menu .mega-menu .narrow ul.sub-menu ul.sub-menu { border-radius: 0; }
    }
<?php endif; ?>
<?php if ( 12 == $header_type ) : ?>
    @media (min-width: 992px) {
        #header.header-12 .header-main.change-logo .share-links { margin-top: 8px; }
    }
    @media (max-width: 991px) {
        #header.header-12 .header-main .share-links { margin-<?php echo $left; ?>: 0; }
    }
    @media (max-width: 575px) {
        #header.header-12 .header-main .share-links { display: none; }
    }
<?php endif; ?>
<?php if ( 11 == $header_type || 15 == $header_type || 16 == $header_type ) : ?>
    #header.header-11 .searchform, #header.header-15 .searchform, #header.header-16 .searchform { margin-<?php echo $left; ?>: 15px; }
    @media (max-width: 991px) {
        #header.header-11 .share-links, #header.header-15 .share-links, #header.header-16 .share-links { display: none; }
    }
<?php endif; ?>
<?php if ( 16 == $header_type ) : ?>
    @media (max-width: 991px) {
        #header.header-16 .share-links { display: none; }
    }
<?php elseif ( 11 == $header_type ) : ?>
    @media (min-width: 992px) {
        #header.header-11 .header-main.change-logo #main-menu .mega-menu > li.menu-item > a { padding-top: 36px; padding-bottom: 20px; }
        #header.header-11 .header-main.change-logo #main-menu .mega-menu > li.menu-item > a .tip { top: 18px; }
        #header.header-11 .header-main.change-logo #main-menu .mega-menu > li.menu-item,
        #header.header-11 .header-main.change-logo #main-menu .mega-menu > li.menu-item.active,
        #header.header-11 .header-main.change-logo #main-menu .mega-menu > li.menu-item:hover { margin-top: 0; }
        #header.header-11 .header-main.change-logo #main-menu .mega-menu > li.menu-item > a,
        #header.header-11 .header-main.change-logo #main-menu .mega-menu > li.menu-item.active > a,
        #header.header-11 .header-main.change-logo #main-menu .mega-menu > li.menu-item:hover > a { border-width: 0; }
        #header.header-11 .header-main.change-logo .share-links { margin-top: 13px; }
        #header.header-11 .header-main #main-menu .mega-menu > li.menu-item { margin-left: 0; margin-right: 0; }
        #header.header-11 .header-main #main-menu .mega-menu > li.menu-item > a { padding-top: 62px; }
        #header.header-11 .header-main #main-menu .mega-menu > li.menu-item > a .tip { top: 44px; }
        #header.header-11 .header-main #main-menu.show-header-top .mega-menu > li.menu-item,
        #header.header-11 .header-main #main-menu.show-header-top .mega-menu > li.menu-item.active,
        #header.header-11 .header-main #main-menu.show-header-top .mega-menu > li.menu-item:hover { margin-top: 0; }
        #header.header-11 .header-main #main-menu.show-header-top .mega-menu > li.menu-item > a,
        #header.header-11 .header-main #main-menu.show-header-top .mega-menu > li.menu-item.active > a,
        #header.header-11 .header-main #main-menu.show-header-top .mega-menu > li.menu-item:hover > a { border-width: 0; }
        #header.header-11 .share-links { margin-top: 36px; }
    }
<?php elseif ( 13 == $header_type ) : ?>
    @media (max-width: 991px) {
        #header.header-13 .header-main .container .header-left { display: none; }
    }
<?php elseif ( 17 == $header_type ) : ?>
    #header.header-17 .main-menu-wrap .menu-right { position: relative; top: auto; padding-<?php echo $left; ?>: 0; -webkit-transform: none; -ms-transform: none; transform: none; }
    #header.header-17 .main-menu-wrap .menu-right #mini-cart,
    #header.header-17 .main-menu-wrap .menu-right .searchform-popup { display: inline-block; }
    #header.header-17 .main-menu-wrap .menu-right .searchform-popup .search-toggle { display: none; }
    #header.header-17 .main-menu-wrap .menu-right .searchform-popup .searchform { position: static; display: block; border-width: 0; border-radius: 0; box-shadow: none; width: 249px; background: rgba(0, 0, 0, 0.07); }
    #header.header-17 .main-menu-wrap .menu-right .searchform-popup .searchform.searchform-cats { width: 369px; }
    @media <?php echo $screen_large; ?> {
        #header.header-17 .main-menu-wrap .menu-right .searchform-popup .searchform { width: 246px; }
        #header.header-17 .main-menu-wrap .menu-right .searchform-popup .searchform.searchform-cats { width: 366px; }
    }
    #header.header-17 .main-menu-wrap .menu-right .searchform-popup .searchform:before { display: none; }
    #header.header-17 .main-menu-wrap .menu-right .searchform-popup .searchform fieldset { margin-<?php echo $right; ?>: 0; }
    #header.header-17 .main-menu-wrap .menu-right .searchform-popup .searchform input,
    #header.header-17 .main-menu-wrap .menu-right .searchform-popup .searchform select,
    #header.header-17 .main-menu-wrap .menu-right .searchform-popup .searchform button { border-radius: 0; color: #fff; height: 60px; }
    #header.header-17 .main-menu-wrap .menu-right .searchform-popup .searchform input::-webkit-input-placeholder,
    #header.header-17 .main-menu-wrap .menu-right .searchform-popup .searchform select::-webkit-input-placeholder,
    #header.header-17 .main-menu-wrap .menu-right .searchform-popup .searchform button::-webkit-input-placeholder { color: #fff; opacity: 0.4; text-transform: uppercase; }
    #header.header-17 .main-menu-wrap .menu-right .searchform-popup .searchform input:-moz-placeholder,
    #header.header-17 .main-menu-wrap .menu-right .searchform-popup .searchform select:-moz-placeholder,
    #header.header-17 .main-menu-wrap .menu-right .searchform-popup .searchform button:-moz-placeholder,
    #header.header-17 .main-menu-wrap .menu-right .searchform-popup .searchform input::-moz-placeholder,
    #header.header-17 .main-menu-wrap .menu-right .searchform-popup .searchform select::-moz-placeholder,
    #header.header-17 .main-menu-wrap .menu-right .searchform-popup .searchform button::-moz-placeholder,
    #header.header-17 .main-menu-wrap .menu-right .searchform-popup .searchform input:-ms-input-placeholder,
    #header.header-17 .main-menu-wrap .menu-right .searchform-popup .searchform select:-ms-input-placeholder,
    #header.header-17 .main-menu-wrap .menu-right .searchform-popup .searchform button:-ms-input-placeholder { color: #fff; opacity: 0.4; text-transform: uppercase; }
    @media <?php echo $screen_large; ?> {
        #header.header-17 .main-menu-wrap .menu-right .searchform-popup .searchform input,
        #header.header-17 .main-menu-wrap .menu-right .searchform-popup .searchform select,
        #header.header-17 .main-menu-wrap .menu-right .searchform-popup .searchform button { height: 50px; }
    }
    #header.header-17 .main-menu-wrap .menu-right .searchform-popup .searchform .selectric .label { height: 60px; line-height: 62px; }
    @media <?php echo $screen_large; ?> {
        #header.header-17 .main-menu-wrap .menu-right .searchform-popup .searchform .selectric .label { height: 50px; line-height: 52px; }
    }
    #header.header-17 .main-menu-wrap .menu-right .searchform-popup .searchform input { font-weight: 700; width: 200px; padding: <?php echo $rtl ? '6px 22px 6px 12px' : '6px 12px 6px 22px'; ?>; box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset; }
    @media <?php echo $screen_large; ?> {
        #header.header-17 .main-menu-wrap .menu-right .searchform-popup .searchform input { width: 197px; }
    }
    #header.header-17 .main-menu-wrap .menu-right .searchform-popup .searchform select { font-weight: 700; width: 120px; padding: <?php echo $rtl ? "6px 22px 6px 12px" : "6px 12px 6px 22px"; ?>; box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset; }
    #header.header-17 .main-menu-wrap .menu-right .searchform-popup .searchform .selectric-cat { width: 120px; }
    #header.header-17 .main-menu-wrap .menu-right .searchform-popup .searchform .selectric .label { font-weight: 700; padding: <?php echo $rtl ? "6px 22px 6px 12px" : "6px 12px 6px 22px"; ?>; box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset; }
    #header.header-17 .main-menu-wrap .menu-right .searchform-popup .searchform button { margin-<?php echo $left; ?>: -1px; font-size: 20px; padding: 6px 15px; color: #fff; opacity: 0.4; }
    #header.header-17 .main-menu-wrap .menu-right .searchform-popup .searchform button:hover { color: #000; }
    #header.header-17 .main-menu-wrap .menu-right .searchform-popup .searchform button .fa { font-family: "Simple-Line-Icons"; }
    #header.header-17 .main-menu-wrap .menu-right .searchform-popup .searchform button .fa:before { content: "\e090"; font-family: inherit; }
    @media (min-width: 768px) {
        #header.header-17 .header-main .header-left,
        #header.header-17 .header-main .header-center,
        #header.header-17 .header-main .header-right { padding-top: 0; padding-bottom: 0; }
    }
    #header.header-17 .feature-box .feature-box-icon,
    #header.header-17 .feature-box .feature-box-info { float: <?php echo $left; ?>; padding-<?php echo $left; ?>: 0; }
    #header.header-17 .feature-box .feature-box-icon { height: auto; top: 0; margin-<?php echo $right; ?>: 0; }
    #header.header-17 .feature-box .feature-box-icon > i { margin: 0; }
    #header.header-17 .feature-box .feature-box-info > h4 { line-height: 110px; margin: 0; }
    #header.header-17 .header-contact { margin: 0; }
    #header.header-17 .header-extra-info li { padding-<?php echo $right; ?>: 32px; margin-<?php echo $left; ?>: 22px; border-<?php echo $right; ?>: 1px solid #e9e9e9; }
    @media <?php echo $screen_large; ?> {
        #header.header-17 .header-extra-info li { padding-<?php echo $right; ?>: 30px; margin-<?php echo $left; ?>: 20px; }
    }
    #header.header-17 .header-extra-info li:first-child { margin-<?php echo $left; ?>: 0; }
    #header.header-17 .header-extra-info li:last-child { padding-<?php echo $right; ?>: 0; border-<?php echo $right; ?>: medium none; }
    @media (max-width: 991px) {
        #header.header-17 .header-extra-info li { padding-<?php echo $right; ?>: 15px; margin-<?php echo $left; ?>: 0; border-<?php echo $right; ?>: medium none; }
        #header.header-17 .header-extra-info li:last-child { padding-<?php echo $right; ?>: 15px; }
    }

<?php elseif ( 9 == $header_type ) : ?>
    .sticky-header.header-9 .main-menu-wrap .menu-right { position: absolute; <?php echo $right; ?>: 10px; top: 0; bottom: 0; height: 40px; margin: auto; }
    .sticky-header.header-9 .main-menu-wrap .menu-right #mini-cart { top: auto; bottom: auto; padding-top: 2px; }
    .sticky-header.header-9 .main-menu-wrap .menu-right #mini-cart.minicart-inline { padding-top: 0; }
    .sticky-header.header-9 .main-menu-wrap .menu-right #mini-cart.minicart-box { height: 56px; margin: -38px auto -34px; }
    .sticky-header.header-9 .main-menu-wrap .menu-right #mini-cart.minicart-box .cart-head { margin-top: 9px; }
<?php elseif ( 'side' === $header_type ) : ?>
    .header-wrapper.header-side-nav #header .side-top { display: block; text-align: center; }
    .header-wrapper.header-side-nav #header .side-top:after { content: ''; display: block; clear: both; }
    .header-wrapper.header-side-nav #header .side-top > .container { display: block; min-height: 0 !important; position: static; padding-top: 0; padding-bottom: 0; }
    .header-wrapper.header-side-nav #header .side-top > .container > * { display: inline-block; padding: 0 !important; }
    .header-wrapper.header-side-nav #header .side-top > .container > *:first-child { margin-left: 0; margin-right: 0; }
    .header-wrapper.header-side-nav #header .share-links { margin: 0 0 8px; }
    .header-wrapper.header-side-nav #header .share-links a { width: 30px; height: 30px; margin: 5px; box-shadow: none; border-radius: 50px; }
    .header-wrapper.header-side-nav #header .share-links a:hover { color: #fff; }
    .header-wrapper.header-side-nav #header .share-links .share-twitter:hover { background: #1aa9e1; }
    .header-wrapper.header-side-nav #header .share-links .share-facebook:hover { background: #3b5a9a; }
    .header-wrapper.header-side-nav #header .share-links .share-linkedin:hover { background: #0073b2; }
    .header-wrapper.header-side-nav #header .share-links .share-rss:hover { background: #ff8201; }
    .header-wrapper.header-side-nav #header .share-links .share-googleplus:hover { background: #dd4b39; }
    .header-wrapper.header-side-nav #header .share-links .share-pinterest:hover { background: #cc2127; }
    .header-wrapper.header-side-nav #header .share-links .share-youtube:hover { background: #c3191e; }
    .header-wrapper.header-side-nav #header .share-links .share-instagram:hover { background: #7c4a3a; }
    .header-wrapper.header-side-nav #header .share-links .share-skype:hover { background: #00b0f6; }
    .header-wrapper.header-side-nav #header .share-links .share-email:hover { background: #dd4b39; }
    .header-wrapper.header-side-nav #header .share-links .share-vk:hover { background: #6383a8; }
    .header-wrapper.header-side-nav #header .share-links .share-xing:hover { background: #1a7576; }
    .header-wrapper.header-side-nav #header .share-links .share-tumblr:hover { background: #304e6c; }
    .header-wrapper.header-side-nav #header .share-links .share-reddit:hover { background: #ff4107; }
    .header-wrapper.header-side-nav #header .share-links .share-vimeo:hover { background: #52b8ea; }
    .header-wrapper.header-side-nav #header .share-links .share-telegram:hover { background: #0088cc; }
    .header-wrapper.header-side-nav #header .share-links .share-yelp:hover { background: #c41200; }
    .header-wrapper.header-side-nav #header .share-links .share-flickr:hover { background: #0063DC; }
    .header-wrapper.header-side-nav #header .share-links .share-whatsapp:hover { background: #3c8a38; }

    @media (min-width: 992px) {
        .admin-bar .header-wrapper.header-side-nav #header { min-height: calc(100vh - 32px); }
        .header-wrapper.header-side-nav { position: absolute; top: 0; bottom: 0; z-index: 1002; }
        .header-wrapper.header-side-nav #header { position: fixed; top: 0; <?php echo $left; ?>: 0; width: 256px; min-height: 100vh; padding: 10px 15px 145px; }
        .header-wrapper.header-side-nav #header.initialize { position: absolute; }
        .header-wrapper.header-side-nav #header.fixed-bottom { position: fixed; bottom: 0; top: auto; }
        .header-wrapper.header-side-nav #header .side-top > .container { padding: 0; width: 100%; }
        .header-wrapper.header-side-nav #header .header-main { position: static; background: transparent; }
        .header-wrapper.header-side-nav #header .header-main > .container { position: static; padding: 0; width: 100%; display: block; }
        .header-wrapper.header-side-nav #header .header-main > .container > * { position: static; display: block; padding: 0; }
        .header-wrapper.header-side-nav #header .logo { text-align: center; margin: 30px auto; }
        .header-wrapper.header-side-nav #header .searchform { margin-bottom: 20px; width: 226px; }
        .header-wrapper.header-side-nav #header .searchform input { padding: 0 10px; border-width: 0; width: 190px; }
        .header-wrapper.header-side-nav #header .searchform.searchform-cats input { width: 95px; }
        .header-wrapper.header-side-nav #header .searchform button { padding: <?php echo $rtl ? '0 8px 0 10px' : '0 10px 0 8px'; ?>; }
        .header-wrapper.header-side-nav #header .searchform select { border-width: 0;  padding: 0 5px; width: 93px; }
        .header-wrapper.header-side-nav #header .searchform .selectric-cat { width: 93px; }
        .header-wrapper.header-side-nav #header .searchform .selectric { border-width: 0; }
        .header-wrapper.header-side-nav #header .searchform .selectric .label { padding: 0 5px; }
        .header-wrapper.header-side-nav #header .searchform .autocomplete-suggestions { left: -1px; right: -1px; }
        .header-wrapper.header-side-nav #header .top-links { display: block; font-size: .8em; margin-bottom: 20px; }
        .header-wrapper.header-side-nav #header .top-links li.menu-item { display: block; float: none; margin: 0; }
        .header-wrapper.header-side-nav #header .top-links li.menu-item:after { display: none; }
        .header-wrapper.header-side-nav #header .top-links li.menu-item > a { margin: 0; padding-top: 5px; padding-bottom: 5px; border-radius: 0; border-top: 1px solid #ccc; border-color: rgba(128, 128, 128, .15) !important; }
        .header-wrapper.header-side-nav #header .top-links li.menu-item:first-child > a { border-top-width: 0; }
        .header-wrapper.header-side-nav #header .header-contact { margin: 0 0 8px; white-space: normal; }
        .header-wrapper.header-side-nav #header .header-copyright { font-size: .9em; }
        .header-wrapper.header-side-nav #mini-cart.minicart-inline .cart-popup { <?php echo $left; ?>: 0; <?php echo $right; ?>: auto; }
        .header-wrapper.header-side-nav #mini-cart.minicart-inline .cart-popup:before,
        .header-wrapper.header-side-nav #mini-cart.minicart-inline .cart-popup:after { <?php echo $right; ?>: auto; <?php echo $left; ?>: 10px; }
        .header-wrapper.header-side-nav .side-bottom { text-align: center; position: absolute; bottom: 0; left: 0; right: 0; margin: 20px 10px; }
        .page-wrapper.side-nav .page-top.fixed-pos { position: fixed; z-index: 1001; width: 100%; box-shadow: 0 1px 0 0 rgba(0, 0, 0, .1); }
    }

    .header-side-nav .sidebar-menu { margin-bottom: 20px; }
    .header-side-nav .sidebar-menu > li.menu-item > a { margin-left: 0; margin-right: 0; border-color: rgba(128, 128, 128, .18) !important; }
    .header-side-nav .sidebar-menu > li.menu-item > .arrow { <?php echo $right; ?>: -5px; }
    .header-side-nav .sidebar-menu > li.menu-item:last-child:hover { border-radius: 0; }
    .header-side-nav .sidebar-menu .menu-custom-block a { margin-left: 0; margin-right: 0; padding-left: 5px; padding-right: 5px; }
    .header-side-nav .sidebar-menu .menu-custom-block a:last-child:hover { border-radius: 0; }
    .header-side-nav .sidebar-menu .menu-custom-block .fa { width: 18px; text-align: center; }
    .header-side-nav .sidebar-menu .menu-custom-block .fa,
    .header-side-nav .sidebar-menu .menu-custom-block .avatar { margin-<?php echo $right; ?>: 5px; }
    .header-side-nav .sidebar-menu .menu-custom-block > .avatar img { margin-top: -5px; }

    @media (max-width: 991px) {
        .header-wrapper.header-side-nav #header .side-top { padding: 10px 0 0; }
        .header-wrapper.header-side-nav #header .side-top .porto-view-switcher { float: <?php echo $left; ?>; }
        .header-wrapper.header-side-nav #header .side-top .mini-cart { float: <?php echo $right; ?>; }
        .header-wrapper.header-side-nav #header .logo { margin-bottom: 5px; }
        .header-wrapper.header-side-nav #header .sidebar-menu { display: none; }
        .header-wrapper.header-side-nav #header .share-links { margin: <?php echo $rtl ? "0 10px 0 0" : "0 0 0 10px"; ?>; }
        .header-wrapper.header-side-nav #header .share-links a:last-child { margin-<?php echo $right; ?>: 0; }
        .header-wrapper.header-side-nav #header .header-copyright { display: none; }

        .header-wrapper.header-side-nav #header .side-top { padding-top: 0; }
        .header-wrapper.header-side-nav #header .side-top > .container > * { display: none !important; }
        .header-wrapper.header-side-nav #header .side-top > .container > .mini-cart { display: block !important; position: absolute !important; top: 50%; bottom: 50%; height: 26px; margin-top: -12px; <?php echo $right; ?>: 15px; z-index: 1001; }
        .header-wrapper.header-side-nav #header .logo { margin: 0; }
        .header-wrapper.header-side-nav #header .share-links { display: none; }
        .header-wrapper.header-side-nav #header .show-minicart .header-contact { margin-<?php echo $right; ?>: 80px; }
    }

    @media (min-width: 992px) {
        body.boxed.body-side .header-wrapper.header-side-nav { <?php echo $left; ?>: -276px; margin-top: -30px; }
        body.boxed.body-side .page-wrapper.side-nav { max-width: 100%; }
        body.boxed.body-side .page-wrapper.side-nav > * { padding-<?php echo $left; ?> : 0; }
        body.boxed.body-side .page-wrapper.side-nav .page-top.fixed-pos { width: auto; }
    }
<?php endif; ?>

/*------------------ footer ---------------------- */


/*------------------ theme ---------------------- */
/*------ Grid Gutter Width ------- */
/* footer */
#footer .logo { margin-<?php echo $right; ?>: <?php echo $b['grid-gutter-width'] / 2 + 10; ?>px; }
#footer .footer-bottom .footer-left .widget { margin-<?php echo $right; ?>: <?php echo $b['grid-gutter-width'] / 2 + 5; ?>px; }
#footer .footer-bottom .footer-right .widget { margin-<?php echo $left; ?>: <?php echo $b['grid-gutter-width'] / 2 + 5; ?>px; }

/* header side */
@media (min-width: 992px) {
    body.boxed.body-side { padding-<?php echo $left; ?>: <?php echo $b['grid-gutter-width'] + 256; ?>px; padding-<?php echo $right; ?>: <?php echo $b['grid-gutter-width']; ?>px; }
    body.boxed.body-side.modal-open { padding-<?php echo $left; ?>: <?php echo $b['grid-gutter-width'] + 256; ?>px !important; padding-<?php echo $right; ?>: <?php echo $b['grid-gutter-width']; ?>px !important; }
    body.boxed.body-side .page-wrapper.side-nav .container { padding-<?php echo $left; ?>: <?php echo $b['grid-gutter-width']; ?>px; padding-<?php echo $right; ?>: <?php echo $b['grid-gutter-width']; ?>px; }
    body.boxed.body-side .page-wrapper.side-nav .page-top.fixed-pos { <?php echo $left; ?>: <?php echo $b['grid-gutter-width'] + 256; ?>px; <?php echo $right; ?>: <?php echo $b['grid-gutter-width']; ?>px; }
}

/* header type */
@media (min-width: 992px) {
    #header.header-corporate .header-main .header-right { padding-<?php echo $left; ?>: <?php echo $b['grid-gutter-width']; ?>px; }
}
<?php if ( 9 == $header_type ) : ?>
.sticky-header.header-9 .main-menu-wrap .menu-right { <?php echo $right; ?>: <?php echo $b['grid-gutter-width'] / 2; ?>px; }
<?php endif; ?>
/* header */
@media (min-width: 768px) {
    #header-boxed #header.sticky-header .header-main.sticky { max-width: <?php echo $b['grid-gutter-width'] + 720; ?>px; }
}
@media (min-width: 992px) {
    #header-boxed #header.sticky-header .header-main.sticky,
    #header-boxed #header.sticky-header .main-menu-wrap { max-width: <?php echo $b['grid-gutter-width'] + 960; ?>px; }
}

/* page top */
.page-top .sort-source { <?php echo $right; ?>: <?php echo $b['grid-gutter-width'] / 2; ?>px; }

/* post */
.post-carousel .post-item,
.widget .row .post-item-small { margin: 0 <?php echo $b['grid-gutter-width'] / 2; ?>px; }

/* carousel */
.owl-carousel.show-nav-hover .owl-nav .owl-prev { <?php echo $left; ?>: <?php echo (-15 - (($b['grid-gutter-width'] - 20) / 2)); ?>px; }
.owl-carousel.show-nav-hover .owl-nav .owl-next { <?php echo $right; ?>: <?php echo (-15 - (($b['grid-gutter-width'] - 20) / 2)); ?>px; }
.owl-carousel.show-nav-title.post-carousel .owl-nav,
.owl-carousel.show-nav-title.portfolio-carousel .owl-nav,
.owl-carousel.show-nav-title.member-carousel .owl-nav,
.owl-carousel.show-nav-title.product-carousel .owl-nav { <?php echo $right; ?>: <?php echo $b['grid-gutter-width'] / 2; ?>px; }

/* featured box */
.featured-box .box-content { padding: 30px <?php echo $b['grid-gutter-width']; ?>px 10px <?php echo $b['grid-gutter-width']; ?>px; border-top-color: <?php echo if_dark( $color_dark_5, '#dfdfdf' ); ?>; }
@media (max-width: 767px) {
    .featured-box .box-content { padding: 25px <?php echo $b['grid-gutter-width'] / 2; ?>px 5px <?php echo $b['grid-gutter-width'] / 2; ?>px; }
}

/* navs */
.sticky-nav-wrapper { margin: 0 <?php echo (-( $b['grid-gutter-width'] / 2)); ?>px; }

/* pricing table */
.pricing-table { padding: 0 <?php echo $b['grid-gutter-width'] / 2; ?>px; }

/* sections */
.vc_row.section { margin-left: -<?php echo $b['grid-gutter-width'] / 2; ?>px; margin-right: -<?php echo $b['grid-gutter-width'] / 2; ?>px; }
.col-half-section { padding-left: <?php echo $b['grid-gutter-width'] / 2; ?>px; padding-right: <?php echo $b['grid-gutter-width'] / 2; ?>px; max-width: <?php echo ($b['container-width'] / 2) - ($b['grid-gutter-width'] / 2); ?>px; }
@media (min-width: 992px) and <?php echo $screen_large; ?> {
    .col-half-section { max-width: <?php echo (960 / 2) - ($b['grid-gutter-width'] / 2); ?>px; }
}
@media (max-width: 991px) {
    .col-half-section { max-width: <?php echo (720 / 2) - ($b['grid-gutter-width'] / 2); ?>px; }
    .col-half-section.col-fullwidth-md { max-width: 720px; float: none !important; margin-left: auto !important; margin-right: auto !important; -webkit-align-self: auto; -moz-align-self: auto; align-self: auto; -ms-flex-item-align: auto; }
}
@media (max-width: 767px) {
    .col-half-section { max-width: 540px; float: none !important; margin-left: auto !important; margin-right: auto !important; -webkit-align-self: auto; -moz-align-self: auto; align-self: auto; -ms-flex-item-align: auto; }
}
@media (max-width: 575px) {
    .col-half-section { padding-left: 0; padding-right: 0; }
}

/* shortcodes */
.porto-map-section { margin-left: -<?php echo $b['grid-gutter-width'] / 2; ?>px; margin-right: -<?php echo $b['grid-gutter-width'] / 2; ?>px; }
#main.main-boxed .porto-map-section .map-content { padding-left: <?php echo $b['grid-gutter-width']; ?>px; padding-right: <?php echo $b['grid-gutter-width']; ?>px; }
.porto-preview-image,
.porto-image-frame { margin-bottom: <?php echo $b['grid-gutter-width']; ?>px; }
@media (min-width: <?php echo $b['container-width'] + $b['grid-gutter-width']; ?>px) {
    .porto-diamonds > li:nth-child(3) { margin-<?php echo $right; ?>: 8px; }
    .porto-diamonds > li:nth-child(4) { <?php echo $right; ?>: 153px; top: 10px; position: absolute; }
    .porto-diamonds > li:nth-child(5) { margin-<?php echo $left; ?>: 500px; margin-top: -68px; }
    .porto-diamonds > li:nth-child(6) { position: absolute; margin: <?php echo $rtl ? "-7px -30px 0 0" : "-7px 0 0 -30px"; ?>; }
    .porto-diamonds > li:nth-child(7) { position: absolute; margin: <?php echo $rtl ? "92px -128px 0 0" : "92px 0 0 -128px"; ?>; }
    .porto-diamonds .diamond-sm,
    .porto-diamonds .diamond-sm .content { height: 123px; width: 123px; }
    .porto-diamonds .diamond-sm .content img { max-width: 195px; }
}
@media (max-width: <?php echo $b['container-width'] + $b['grid-gutter-width'] - 1; ?>px) {
    .csstransforms3d .porto-diamonds,
    .porto-diamonds { padding-<?php echo $left; ?>: 0; max-width: 935px; }
    .porto-diamonds > li:nth-child(2n+2) { margin-<?php echo $right; ?>: 0; margin-bottom: 130px; }
    .porto-diamonds > li:last-child { margin-bottom: 50px; margin-<?php echo $right; ?>: 36px; margin-top: -100px; padding-<?php echo $left; ?>: 35px; }
}

/* siders */
body.boxed #revolutionSliderCarouselContainer,
#main.main-boxed #revolutionSliderCarouselContainer,
.mfp-content .ajax-container #revolutionSliderCarouselContainer { margin-left: -<?php echo $b['grid-gutter-width']; ?>px; margin-right: -<?php echo $b['grid-gutter-width']; ?>px; }
@media (max-width: 767px) {
    body.boxed #revolutionSliderCarouselContainer,
    #main.main-boxed #revolutionSliderCarouselContainer,
    .mfp-content .ajax-container #revolutionSliderCarouselContainer { margin-left: -<?php echo $b['grid-gutter-width'] / 2; ?>px; margin-right: -<?php echo $b['grid-gutter-width'] / 2; ?>px; }
}

/* toggles */
.toggle > .toggle-content { padding-<?php echo $left; ?>: <?php echo $b['grid-gutter-width'] / 2 + 5; ?>px; }

/* visual composer */
.vc_row.wpb_row.vc_row-no-padding .vc_column_container.section { padding-left: <?php echo $b['grid-gutter-width']; ?>px; padding-right: <?php echo $b['grid-gutter-width']; ?>px; }
@media (max-width: 767px) {
    .vc_row.wpb_row.vc_row-no-padding .vc_column_container.section { padding-left: <?php echo $b['grid-gutter-width'] / 2; ?>px; padding-right: <?php echo $b['grid-gutter-width'] / 2; ?>px; }
}
body.vc_row { margin-left: -<?php echo $b['grid-gutter-width'] / 2; ?>px; margin-right: -<?php echo $b['grid-gutter-width'] / 2; ?>px; }

/* layouts boxed */
body.boxed .porto-container.container,
#main.main-boxed .porto-container.container { margin-left: -<?php echo $b['grid-gutter-width'] / 2; ?>px; margin-right: -<?php echo $b['grid-gutter-width'] / 2; ?>px; }
body.boxed .vc_row[data-vc-stretch-content].section,
#main.main-boxed .vc_row[data-vc-stretch-content].section { padding-left: <?php echo $b['grid-gutter-width'] / 2; ?>px; padding-right: <?php echo $b['grid-gutter-width'] / 2; ?>px; }
@media (min-width: 768px) {
    body.boxed .vc_row[data-vc-stretch-content],
    #main.main-boxed .vc_row[data-vc-stretch-content] { margin-left: -<?php echo $b['grid-gutter-width']; ?>px !important; margin-right: -<?php echo $b['grid-gutter-width']; ?>px !important; max-width: <?php echo 720 + $b['grid-gutter-width']; ?>px; }
}
@media (min-width: 992px) {
    body.boxed .vc_row[data-vc-stretch-content],
    #main.main-boxed .vc_row[data-vc-stretch-content] { max-width: <?php echo 960 + $b['grid-gutter-width']; ?>px; }
}
body.boxed #main.wide .vc_row[data-vc-stretch-content] .porto-wrap-container { padding-left: <?php echo $b['grid-gutter-width']; ?>px; padding-right: <?php echo $b['grid-gutter-width']; ?>px; }
@media (max-width: 767px) {
    body.boxed #main.wide .vc_row[data-vc-stretch-content] .porto-wrap-container { padding-left: <?php echo $b['grid-gutter-width'] / 2; ?>px; padding-right: <?php echo $b['grid-gutter-width'] / 2; ?>px; }
}
body.boxed #main.wide .container .vc_row { margin-left: -<?php echo $b['grid-gutter-width']; ?>px; margin-right: -<?php echo $b['grid-gutter-width']; ?>px; padding-left: <?php echo $b['grid-gutter-width']; ?>px; padding-right: <?php echo $b['grid-gutter-width']; ?>px; }
@media (max-width: 767px) {
    body.boxed #main.wide .container .vc_row { margin-left: -<?php echo $b['grid-gutter-width'] / 2; ?>px; margin-right: -<?php echo $b['grid-gutter-width'] / 2; ?>px; padding-left: <?php echo $b['grid-gutter-width'] / 2; ?>px; padding-right: <?php echo $b['grid-gutter-width'] / 2; ?>px; }
}
body.boxed #main.wide .container .vc_row .vc_row { margin-left: -<?php echo $b['grid-gutter-width'] / 2; ?>px; margin-right: -<?php echo $b['grid-gutter-width'] / 2; ?>px; }
@media (min-width: 768px) {
    body.boxed #header.sticky-header .header-main.sticky { max-width: <?php echo 720 + $b['grid-gutter-width']; ?>px; }
}
@media (min-width: 992px) {
    body.boxed #header.sticky-header .header-main.sticky,
    body.boxed #header.sticky-header .main-menu-wrap { max-width: <?php echo 960 + $b['grid-gutter-width']; ?>px; }
}

/* layouts defaults */
body.wide .container:not(.inner-container) { padding-left: <?php echo $b['grid-gutter-width']; ?>px; padding-right: <?php echo $b['grid-gutter-width']; ?>px; }
#main.wide .container .vc_row,
#main.wide > .container > .row { margin-left: -<?php echo $b['grid-gutter-width'] / 2; ?>px; margin-right: -<?php echo $b['grid-gutter-width'] / 2; ?>px; }

/* member */
.member-row { margin: 0 -<?php echo $b['grid-gutter-width'] / 2; ?>px; }
.member-row .member { padding: 0 <?php echo $b['grid-gutter-width'] / 2; ?>px; margin-bottom: <?php echo $b['grid-gutter-width']; ?>px; }
.member-carousel .member-item { margin-left: <?php echo $b['grid-gutter-width'] / 2; ?>px; margin-right: <?php echo $b['grid-gutter-width'] / 2; ?>px; }

/* home */
body .menu-ads-container { margin-left: -<?php echo 20 + $b['grid-gutter-width'] / 2; ?>px; margin-right: -<?php echo 20 + $b['grid-gutter-width'] / 2; ?>px; }
body .ads-container-blue,
body.boxed .ads-container-full,
#main.main-boxed .ads-container-full,
body.boxed #main.wide .ads-container-full { margin-left: -<?php echo $b['grid-gutter-width']; ?>px !important; margin-right: -<?php echo $b['grid-gutter-width']; ?>px !important; }
@media (max-width: 767px) {
    body.boxed .ads-container-full,
    #main.main-boxed .ads-container-full,
    body.boxed #main.wide .ads-container-full { margin-left: -<?php echo $b['grid-gutter-width'] / 2; ?>px !important; margin-right: -<?php echo $b['grid-gutter-width'] / 2; ?>px !important; }
}

/* portfolio */
.popup-inline-content hr.solid,
.mfp-content .ajax-container hr.solid,
body.boxed .portfolio .portfolio-image.wide,
body.boxed .portfolio hr.solid,
body.boxed #portfolioAjaxBox .portfolio-image.wide,
body.boxed #portfolioAjaxBox hr.solid,
#main.main-boxed .portfolio .portfolio-image.wide,
#main.main-boxed .portfolio hr.solid,
#main.main-boxed #portfolioAjaxBox .portfolio-image.wide,
#main.main-boxed #portfolioAjaxBox hr.solid,
body.boxed .portfolio-row.full { margin-left: -<?php echo $b['grid-gutter-width']; ?>px; margin-right: -<?php echo $b['grid-gutter-width']; ?>px; }
.popup-inline-content .portfolio-image.wide,
.mfp-content .ajax-container .portfolio-image.wide { margin-left: -<?php echo $b['grid-gutter-width'] / 2; ?>px; margin-right: -<?php echo $b['grid-gutter-width'] / 2; ?>px; }
@media (max-width: 767px) {
    .popup-inline-content .portfolio-image.wide,
    .mfp-content .ajax-container .portfolio-image.wide { margin-left: -<?php echo $b['grid-gutter-width'] / 4; ?>px; margin-right: -<?php echo $b['grid-gutter-width'] / 4; ?>px; }
    body.boxed .portfolio .portfolio-image.wide,
    body.boxed .portfolio hr.solid,
    body.boxed #portfolioAjaxBox .portfolio-image.wide,
    body.boxed #portfolioAjaxBox hr.solid,
    #main.main-boxed .portfolio .portfolio-image.wide,
    #main.main-boxed .portfolio hr.solid,
    #main.main-boxed #portfolioAjaxBox .portfolio-image.wide,
    #main.main-boxed #portfolioAjaxBox hr.solid,
    body.boxed .portfolio-row.full { margin-left: -<?php echo $b['grid-gutter-width'] / 2; ?>px; margin-right: -<?php echo $b['grid-gutter-width'] / 2; ?>px; }
}
.portfolio-carousel .portfolio-item { margin-left: <?php echo $b['grid-gutter-width'] / 2; ?>px; margin-right: <?php echo $b['grid-gutter-width'] / 2; ?>px; }
.portfolio-row { margin-left: -<?php echo $b['grid-gutter-width'] / 2; ?>px; margin-right: -<?php echo $b['grid-gutter-width'] / 2; ?>px; }
.portfolio-row .portfolio { padding-left: <?php echo $b['grid-gutter-width'] / 2; ?>px; padding-right: <?php echo $b['grid-gutter-width'] / 2; ?>px; margin-bottom: <?php echo $b['grid-gutter-width']; ?>px; }
.portfolio-modal .vc_row[data-vc-full-width],
body.boxed .portfolio-modal .vc_row[data-vc-full-width],
#main.main-boxed .portfolio-modal .vc_row[data-vc-full-width],
.portfolio-modal .vc_row[data-vc-stretch-content],
body.boxed .portfolio-modal .vc_row[data-vc-stretch-content],
#main.main-boxed .portfolio-modal .vc_row[data-vc-stretch-content],
.portfolio-ajax-modal .vc_row[data-vc-full-width],
body.boxed .portfolio-ajax-modal .vc_row[data-vc-full-width],
#main.main-boxed .portfolio-ajax-modal .vc_row[data-vc-full-width],
.portfolio-ajax-modal .vc_row[data-vc-stretch-content],
body.boxed .portfolio-ajax-modal .vc_row[data-vc-stretch-content],
#main.main-boxed .portfolio-ajax-modal .vc_row[data-vc-stretch-content] { padding-left: <?php echo $b['grid-gutter-width']; ?>px !important; padding-right: <?php echo $b['grid-gutter-width']; ?>px !important; }
@media (max-width: 767px) {
    .portfolio-modal .vc_row[data-vc-full-width],
    body.boxed .portfolio-modal .vc_row[data-vc-full-width],
    #main.main-boxed .portfolio-modal .vc_row[data-vc-full-width],
    .portfolio-modal .vc_row[data-vc-stretch-content],
    body.boxed .portfolio-modal .vc_row[data-vc-stretch-content],
    #main.main-boxed .portfolio-modal .vc_row[data-vc-stretch-content],
    .portfolio-ajax-modal .vc_row[data-vc-full-width],
    body.boxed .portfolio-ajax-modal .vc_row[data-vc-full-width],
    #main.main-boxed .portfolio-ajax-modal .vc_row[data-vc-full-width],
    .portfolio-ajax-modal .vc_row[data-vc-stretch-content],
    body.boxed .portfolio-ajax-modal .vc_row[data-vc-stretch-content],
    #main.main-boxed .portfolio-ajax-modal .vc_row[data-vc-stretch-content] { padding-left: <?php echo $b['grid-gutter-width'] / 2; ?>px !important; padding-right: <?php echo $b['grid-gutter-width'] / 2; ?>px !important; }
}

/* shop */
.cross-sells .slider-wrapper .products .product { padding-left: <?php echo $b['grid-gutter-width'] / 2; ?>px; padding-right: <?php echo $b['grid-gutter-width'] / 2; ?>px; }
.col2-set { margin-left: -<?php echo $b['grid-gutter-width'] / 2; ?>px; margin-right: -<?php echo $b['grid-gutter-width'] / 2; ?>px; }
.col2-set .col-1, .col2-set .col-2 { padding-left: <?php echo $b['grid-gutter-width'] / 2; ?>px; padding-right: <?php echo $b['grid-gutter-width'] / 2; ?>px; }
.product-carousel.owl-carousel .product { margin-left: <?php echo $b['grid-gutter-width'] / 2; ?>px; margin-right: <?php echo $b['grid-gutter-width'] / 2; ?>px; }
.single-product .variations:after { <?php echo $left; ?>: <?php echo $b['grid-gutter-width'] / 2; ?>px; width: calc(100% - <?php echo $b['grid-gutter-width']; ?>px); }

/*------ Screen Large Variable ------- */
@media <?php echo $screen_large; ?> {
    #header .header-top .porto-view-switcher > li.menu-item > a,
    #header .header-top .top-links > li.menu-item > a { padding-top: 3px !important; padding-bottom: 3px !important; }
    #header .searchform input { width: 318px; }
    #header .searchform.searchform-cats input { width: 190px; }
    #header .search-popup .searchform { width: 378px; }
    #header.search-md .search-popup .searchform { width: 348px; }
    #header.search-sm .search-popup .searchform { width: 298px; }
    #header .main-menu-wrap .menu-right .searchform-popup .searchform { width: 376px; }
    #header .main-menu-wrap .menu-right .searchform-popup .searchform input { width: 320px; }
    #header .main-menu-wrap .menu-right .searchform-popup .searchform.searchform-cats input { width: 190px; }
    #header.search-md .main-menu-wrap .menu-right .searchform-popup .searchform { width: 346px; }
    #header.search-md .main-menu-wrap .menu-right .searchform-popup .searchform input { width: 290px; }
    #header.search-md .main-menu-wrap .menu-right .searchform-popup .searchform.searchform-cats input { width: 160px; }
    #header.search-sm .main-menu-wrap .menu-right .searchform-popup .searchform { width: 296px; }
    #header.search-sm .main-menu-wrap .menu-right .searchform-popup .searchform input { width: 240px; }
    #header.search-sm .main-menu-wrap .menu-right .searchform-popup .searchform.searchform-cats input { width: 110px; }

    .mega-menu > li.menu-item > a { padding: 9px 9px 8px; }

    .widget_sidebar_menu .widget-title { font-size: 0.8571em; line-height: 13px; padding: 10px 15px; }

    .sidebar-menu > li.menu-item > a { font-size: 0.9286em; line-height: 17px; padding: 9px 5px; }
    .sidebar-menu .menu-custom-block a { font-size: 0.9286em; line-height: 16px; padding: 9px 5px; }

    .porto-links-block { font-size: 13px; }
    /*.porto-links-block .links-title { padding: 8px 12px 6px; }
    .porto-links-block li.porto-links-item > a,
    .porto-links-block li.porto-links-item > span { padding: 7px 5px; line-height: 19px; margin: 0 7px -1px; }*/

    body .sidebar-menu .menu-ads-container .vc_column_container .porto-sicon-box.left-icon { padding: 15px 0; }
    body .sidebar-menu .menu-ads-container .vc_column_container .left-icon .porto-sicon-left { display: block; }
    body .sidebar-menu .menu-ads-container .vc_column_container .left-icon .porto-sicon-left .porto-icon { font-size: 25px !important; margin-bottom: 10px; }
    body .sidebar-menu .menu-ads-container .vc_column_container .left-icon .porto-sicon-body { display: block; text-align: center; }


<?php if ( class_exists( 'Woocommerce' ) ) : ?>
    ul.pcols-md-6 { margin: 0 -3px; }
    ul.pcols-md-6 li.product-col { width: 16.6667%; padding: 0 3px; }
    ul.pwidth-md-6 .product-image { font-size: 0.8em; }
    ul.pwidth-md-6 .add-links { font-size: 0.85em; }
    ul.pcols-md-5 { margin: 0 -6px; }
    ul.pcols-md-5 li.product-col { width: 20%; padding: 0 6px; }
    ul.pwidth-md-5 .product-image { font-size: 0.9em; }
    ul.pwidth-md-5 .add-links { font-size: 0.95em; }
    ul.pcols-md-4 { margin: 0 -8px; }
    ul.pcols-md-4 li.product-col { width: 25%; padding: 0 8px; }
    ul.pwidth-md-4 .product-image { font-size: 1em; }
    ul.pwidth-md-4 .add-links { font-size: 1em; }
    ul.pcols-md-3 { margin: 0 -10px; }
    ul.pcols-md-3 li.product-col { width: 33.3333%; padding: 0 10px; }
    ul.pwidth-md-3 .product-image { font-size: 1.15em; }
    ul.pwidth-md-3 .add-links { font-size: 1em; }
    ul.pcols-md-2 { margin: 0 -12px; }
    ul.pcols-md-2 li.product-col { width: 50%; padding: 0 12px; }
    ul.pwidth-md-2 .product-image { font-size: 1.4em; }
    ul.pwidth-md-2 .add-links { font-size: 1em; }

    .column2 ul.pcols-md-5 { margin: 0 -3px; }
    .column2 ul.pcols-md-5 li.product-col { width: 20%; padding: 0 2px; }
    .column2 ul.pwidth-md-5 .product-image { font-size: 0.75em; }
    .column2 ul.pwidth-md-5 .add-links { font-size: 0.8em; }
    .column2 ul.pcols-md-4 { margin: 0 -5px; }
    .column2 ul.pcols-md-4 li.product-col { width: 25%; padding: 0 5px; }
    .column2 ul.pwidth-md-4 .product-image { font-size: 0.8em; }
    .column2 ul.pwidth-md-4 .add-links { font-size: 0.9em; }
    .column2 ul.pcols-md-3 { margin: 0 -7px; }
    .column2 ul.pcols-md-3 li.product-col { width: 33.3333%; padding: 0 7px; }
    .column2 ul.pwidth-md-3 .product-image { font-size: 0.9em; }
    .column2 ul.pwidth-md-3 .add-links { font-size: 1em; }
    .column2 ul.pcols-md-2 { margin: 0 -10px; }
    .column2 ul.pcols-md-2 li.product-col { width: 50%; padding: 0 10px; }
    .column2 ul.pwidth-md-2 .product-image { font-size: 1.1em; }
    .column2 ul.pwidth-md-2 .add-links { font-size: 1em; }

    ul.list.pcols-md-6 li.product .product-image { width: 17%; font-size: 0.75em; }
    ul.list.pcols-md-6 li.product .product-inner > * { padding-<?php echo $left; ?>: 18.8%; }
    ul.list.pcols-md-5 li.product .product-image { width: 20%; font-size: 0.8em; }
    ul.list.pcols-md-5 li.product .product-inner > * { padding-<?php echo $left; ?>: 21.8%; }
    ul.list.pcols-md-2 li.product .product-image,
    ul.list.pcols-md-3 li.product .product-image,
    ul.list.pcols-md-4 li.product .product-image { width: 20%; font-size: 0.8em; }
    ul.list.pcols-md-2 li.product .product-inner > *,
    ul.list.pcols-md-3 li.product .product-inner > *,
    ul.list.pcols-md-4 li.product .product-inner > * { padding-<?php echo $left; ?>: 21.8%; }

    .column2 ul.list.pcols-lg-6 li.product .product-image,
    .column2 ul.list.pcols-lg-5 li.product .product-image { width: 20%; font-size: 0.8em; }
    .column2 ul.list.pcols-lg-6 li.product .product-inner > *,
    .column2 ul.list.pcols-lg-5 li.product .product-inner > * { padding-<?php echo $left; ?>: 21.8%; }
    .column2 ul.list.pcols-lg-4 li.product .product-inner > *,
    .column2 ul.list.pcols-lg-3 li.product .product-inner > *,
    .column2 ul.list.pcols-lg-2 li.product .product-inner > * { padding-<?php echo $left; ?>: 24.3%; }
    .column2 ul.list.pcols-lg-4 li.product .product-image,
    .column2 ul.list.pcols-lg-3 li.product .product-image,
    .column2 ul.list.pcols-lg-2 li.product .product-image { width: 22.5%; font-size: 0.8em; }

    .column2 .shop-loop-before .woocommerce-pagination ul { margin-<?php echo $left; ?>: -5px; }
<?php endif; ?>
}

@media (min-width: 992px) and <?php echo $screen_large; ?> {
    .member-row .member-col-6 { width: 20%; }

    .portfolio-row .portfolio-col-6 { width: 20%; }
    .portfolio-row .portfolio-col-6.w2 { width: 40%; }

<?php if ( class_exists( 'Woocommerce' ) ) : ?>
	.quickview-wrap { width: 720px; }
<?php endif; ?>
}

@media (min-width: 768px) and <?php echo $screen_large; ?> {
    .column2 .member-row .member-col-4 { width: 33.33333333%; }
    .column2 .member-row .member-col-5,
    .column2 .member-row .member-col-6 { width: 25%; }

    .column2 .portfolio-row .portfolio-col-4 { width: 33.33333333%; }
    .column2 .portfolio-row .portfolio-col-4.w2 { width: 66.66666666%; }
    .column2 .portfolio-row .portfolio-col-5,
    .column2 .portfolio-row .portfolio-col-6 { width: 25%; }
    .column2 .portfolio-row .portfolio-col-5.w2,
    .column2 .portfolio-row .portfolio-col-6.w2 { width: 50%; }
}

<?php if ( class_exists( 'Woocommerce' ) ) : ?>
    @media (max-width: 767px) {
        ul.pcols-xs-3, .column2 ul.pcols-xs-3 { margin: 0 -3px; }
        ul.pcols-xs-3 li.product-col,
        .column2 ul.pcols-xs-3 li.product-col { width: 33.3333%; padding: 0 3px; }
        ul.pwidth-xs-3 .product-image,
        .column2 ul.pwidth-xs-3 .product-image { font-size: .85em; }
        ul.pwidth-xs-3 .add-links,
        .column2 ul.pwidth-xs-3 .add-links { font-size: .85em; }
        ul.pcols-xs-2, .column2 ul.pcols-xs-2 { margin: 0 -6px; }
        ul.pcols-xs-2 li.product-col,
        .column2 ul.pcols-xs-2 li.product-col { width: 50%; padding: 0 6px; }
        ul.pwidth-xs-2 .product-image,
        .column2 ul.pwidth-xs-2 .product-image { font-size: 1em; }
        ul.pwidth-xs-2 .add-links,
        .column2 ul.pwidth-xs-2 .add-links { font-size: 1em; }
        ul.pcols-xs-1,
        .column2 ul.pcols-xs-1 { margin: 0; }
        ul.pcols-xs-1 li.product-col,
        .column2 ul.pcols-xs-1 li.product-col { width: 100%; padding: 0; }
        ul.pwidth-xs-1 .product-image,
        .column2 ul.pwidth-xs-1 .product-image { font-size: 1.2em; }
        ul.pwidth-xs-1 .add-links,
        .column2 ul.pwidth-xs-1 .add-links { font-size: 1em; }

        ul.list.pcols-xs-3 li.product .product-inner > *,
        ul.list.pcols-xs-2 li.product .product-inner > *,
        ul.list.pcols-xs-1 li.product .product-inner > *,
        .column2 ul.list.pcols-xs-3 li.product .product-inner > *,
        .column2 ul.list.pcols-xs-2 li.product .product-inner > *,
        .column2 ul.list.pcols-xs-1 li.product .product-inner > * { padding-<?php echo $left; ?>: 0; }
        ul.list.pcols-xs-3 li.product .product-image,
        ul.list.pcols-xs-2 li.product .product-image,
        ul.list.pcols-xs-1 li.product .product-image,
        .column2 ul.list.pcols-xs-3 li.product .product-image,
        .column2 ul.list.pcols-xs-2 li.product .product-image,
        .column2 ul.list.pcols-xs-1 li.product .product-image { width: 30%; margin-<?php echo $right; ?>: 18px; font-size: .8em; }
        ul.list.pcols-xs-3 li.product.show-outimage-q-onimage-alt > div > *,
        ul.list.pcols-xs-2 li.product.show-outimage-q-onimage-alt > div > *,
        ul.list.pcols-xs-1 li.product.show-outimage-q-onimage-alt > div > *,
        .column2 ul.list.pcols-xs-3 li.product.show-outimage-q-onimage-alt > div > *,
        .column2 ul.list.pcols-xs-2 li.product.show-outimage-q-onimage-alt > div > *,
        .column2 ul.list.pcols-xs-1 li.product.show-outimage-q-onimage-alt > div > * { padding-<?php echo $left; ?>: 0; }
    }
    @media (max-width: 575px) {
        ul.pcols-ls-2,
        .column2 ul.pcols-ls-2 { margin: 0 -3px; }
        ul.pcols-ls-2 li.product-col,
        .column2 ul.pcols-ls-2 li.product-col { width: 50%; padding: 0 3px; }
        ul.pwidth-ls-2 .product-image,
        .column2 ul.pwidth-ls-2 .product-image { font-size: .8em; }
        ul.pwidth-ls-2 .add-links,
        .column2 ul.pwidth-ls-2 .add-links { font-size: .85em; }
        ul.pcols-ls-1,
        .column2 ul.pcols-ls-1 { margin: 0; }
        ul.pcols-ls-1 li.product-col,
        .column2 ul.pcols-ls-1 li.product-col { width: 100%; padding: 0; }
        ul.pwidth-ls-1 .product-image,
        .column2 ul.pwidth-ls-1 .product-image { font-size: 1.1em; }
        ul.pwidth-ls-1 .add-links,
        .column2 ul.pwidth-ls-1 .add-links { font-size: 1em; }

        ul.list.pcols-ls-2 li.product .product-image,
        ul.list.pcols-ls-1 li.product .product-image,
        .column2 ul.list.pcols-ls-2 li.product .product-image,
        .column2 ul.list.pcols-ls-1 li.product .product-image { width: 40%; margin-<?php echo $right; ?>: 15px; font-size: .75em; }
    }

    ul.list li.product, .column2 ul.list li.product { width: 100%; padding: 0; }
<?php endif; ?>

/*------ Border Radius ------- */
<?php if ($b['border-radius']) : ?>
    .wcvashopswatchlabel { border-radius: 1px; }

    .accordion-menu .tip,
    #header .searchform .autocomplete-suggestion span.yith_wcas_result_on_sale,
    #header .searchform .autocomplete-suggestion span.yith_wcas_result_featured,
    #main-menu .menu-custom-block .tip,
    .mega-menu .tip,
    #nav-panel .menu-custom-block .tip,
    #side-nav-panel .menu-custom-block .tip,
    .sidebar-menu .tip,
    article.post .post-date .sticky,
    .post-item .post-date .sticky,
    article.post .post-date .format,
    .post-item .post-date .format,
    .thumb-info .thumb-info-type,
    .wcvaswatchinput.active .wcvashopswatchlabel { border-radius: 2px; }
    article.post .post-date .month,
    .post-item .post-date .month { border-radius: 0 0 2px 2px; }
    article.post .post-date .day,
    .post-item .post-date .day { border-radius: 2px 2px 0 0; }
    .pricing-table h3 { border-radius: 2px 2px 0 0; }

    .accordion-menu .arrow,
    #footer .thumbnail img,
    #footer .img-thumbnail img,
    .widget_sidebar_menu,
    .widget_sidebar_menu .widget-title .toggle,
    <?php if ( (class_exists('bbPress') && is_bbpress() ) || ( class_exists('BuddyPress') && is_buddypress() ) ) : ?>
        .bbp-pagination-links a,
        .bbp-pagination-links span.current,
        .bbp-topic-pagination a,
        #bbpress-forums #bbp-your-profile fieldset input,
        #bbpress-forums #bbp-your-profile fieldset textarea,
        #bbpress-forums p.bbp-topic-meta img.avatar,
        #bbpress-forums ul.bbp-reply-revision-log img.avatar,
        #bbpress-forums ul.bbp-topic-revision-log img.avatar,
        #bbpress-forums div.bbp-template-notice img.avatar,
        .widget_display_topics img.avatar,
        .widget_display_replies img.avatar,
        #buddypress div.pagination .pagination-links a,
        #buddypress div.pagination .pagination-links span.current,
        #buddypress form#whats-new-form textarea,
        #buddypress .activity-list .activity-content .activity-header img.avatar,
        #buddypress div.activity-comments form .ac-textarea,
    <?php endif; ?>
    .pagination > a,
    .pagination > span,
    .page-links > a,
    .page-links > span,
    .accordion .card-header,
    .progress-bar-tooltip,
    <?php echo $input_lists; ?>,
    textarea,
    select,
    input[type="submit"],
    .thumb-info img,
    .toggle-simple .toggle > label:after,
    body .btn-sm,
    body .btn-group-sm > .btn,
    body .btn-xs,
    body .btn-group-xs > .btn,
    .widget .tagcloud a,
    .tm-collapse .tm-section-label,
    body .ads-container,
    body .ads-container-light,
    body .ads-container-blue,
    .chosen-container-single .chosen-single,
    .woocommerce-checkout .form-row .chosen-container-single .chosen-single,
    .select2-container .select2-choice,
    .product-nav .product-popup .product-image img,
    div.quantity .minus,
    div.quantity .plus,
    .gridlist-toggle > a,
    .wcvaswatchlabel,
    .widget_product_categories .widget-title .toggle,
    .widget_price_filter .widget-title .toggle,
    .widget_layered_nav .widget-title .toggle,
    .widget_layered_nav_filters .widget-title .toggle,
    .widget_rating_filter .widget-title .toggle,
    ul.product_list_widget li .product-image img,
    .widget ul.product_list_widget li .product-image img,
    .woocommerce-password-strength { border-radius: 3px; }
    .carousel-areas .porto-carousel-wrapper .slick-prev,
    .carousel-areas .porto-carousel-wrapper .slick-next { border-radius: 3px !important; }
    .widget_sidebar_menu .widget-title,
    .member-item.member-item-3 .thumb-info-wrapper img { border-radius: 3px 3px 0 0; }
    body .menu-ads-container { border-radius: 0 0 3px 3px; }
    body .newsletter-banner .widget_wysija_cont .wysija-submit { border-radius: <?php echo $rtl ? "3px 0 0 3px" : "0 3px 3px 0"; ?>; }
    @media (max-width: 767px) {
        body .newsletter-banner .widget_wysija_cont .wysija-submit { border-radius: 3px; }
    }

    #header .porto-view-switcher > li.menu-item > a,
    #header .top-links > li.menu-item > a,
    #header .searchform .autocomplete-suggestion img,
    #mini-cart.minicart-inline,
    #mini-cart .cart-popup .widget_shopping_cart_content,
    #header .mobile-toggle,
    .mega-menu li.menu-item > a > .thumb-info-preview .thumb-info-wrapper,
    .mega-menu > li.menu-item.active > a,
    .mega-menu > li.menu-item:hover > a,
    .mega-menu .wide .popup,
    .mega-menu .wide .popup > .inner > ul.sub-menu > li.menu-item li.menu-item > a,
    .mega-menu .narrow .popup ul.sub-menu ul.sub-menu,
    #nav-panel .mobile-menu li > a,
    .sidebar-menu li.menu-item > a > .thumb-info-preview .thumb-info-wrapper,
    .sidebar-menu .wide .popup > .inner > ul.sub-menu > li.menu-item li.menu-item > a,
    #bbpress-forums div.bbp-forum-author img.avatar,
    #bbpress-forums div.bbp-topic-author img.avatar,
    #bbpress-forums div.bbp-reply-author img.avatar,
    div.bbp-template-notice,
    div.indicator-hint,
    <?php if ( (class_exists('bbPress') && is_bbpress() ) || ( class_exists('BuddyPress') && is_buddypress() ) ) : ?>
        #buddypress .activity-list li.load-more,
        #buddypress .activity-list li.load-newest,
        #buddypress .standard-form textarea,
        #buddypress .standard-form input[type=text],
        #buddypress .standard-form input[type=color],
        #buddypress .standard-form input[type=date],
        #buddypress .standard-form input[type=datetime],
        #buddypress .standard-form input[type=datetime-local],
        #buddypress .standard-form input[type=email],
        #buddypress .standard-form input[type=month],
        #buddypress .standard-form input[type=number],
        #buddypress .standard-form input[type=range],
        #buddypress .standard-form input[type=search],
        #buddypress .standard-form input[type=tel],
        #buddypress .standard-form input[type=time],
        #buddypress .standard-form input[type=url],
        #buddypress .standard-form input[type=week],
        #buddypress .standard-form select,
        #buddypress .standard-form input[type=password],
        #buddypress .dir-search input[type=search],
        #buddypress .dir-search input[type=text],
        #buddypress .groups-members-search input[type=search],
        #buddypress .groups-members-search input[type=text],
        #buddypress button,
        #buddypress a.button,
        #buddypress input[type=submit],
        #buddypress input[type=button],
        #buddypress input[type=reset],
        #buddypress ul.button-nav li a,
        #buddypress div.generic-button a,
        #buddypress .comment-reply-link,
        a.bp-title-button,
        #buddypress div.item-list-tabs ul li.selected a,
        #buddypress div.item-list-tabs ul li.current a,
    <?php endif; ?>
    .posts-grid .grid-box,
    .img-rounded, .rounded,
    .img-thumbnail,
    .img-thumbnail img,
    .img-thumbnail .inner,
    .page-wrapper .fdm-item-image,
    .share-links a,
    .tabs,
    .testimonial.testimonial-style-2 blockquote,
    .testimonial.testimonial-style-3 blockquote,
    .testimonial.testimonial-style-4 blockquote,
    .testimonial.testimonial-style-5 blockquote,
    .testimonial.testimonial-style-6 blockquote,
    .thumb-info,
    .thumb-info .thumb-info-wrapper,
    .thumb-info .thumb-info-wrapper:after,
    section.timeline .timeline-date,
    section.timeline .timeline-box,
    body .btn,
    body .btn-md,
    body .btn-group-md > .btn,
    div.wpb_single_image .vc_single_image-wrapper.vc_box_rounded,
    div.wpb_single_image .vc_single_image-wrapper.vc_box_shadow,
    div.wpb_single_image .vc_single_image-wrapper.vc_box_rounded img,
    div.wpb_single_image .vc_single_image-wrapper.vc_box_shadow img,
    div.wpb_single_image .vc_single_image-wrapper.vc_box_border,
    div.wpb_single_image .vc_single_image-wrapper.vc_box_outline,
    div.wpb_single_image .vc_single_image-wrapper.vc_box_shadow_border,
    div.wpb_single_image .vc_single_image-wrapper.vc_box_border img,
    div.wpb_single_image .vc_single_image-wrapper.vc_box_outline img,
    div.wpb_single_image .vc_single_image-wrapper.vc_box_shadow_border img,
    div.wpb_single_image .vc_single_image-wrapper.vc_box_shadow_3d img,
    div.wpb_single_image .porto-vc-zoom.porto-vc-zoom-hover-icon:before,
    div.wpb_single_image.vc_box_border,
    div.wpb_single_image.vc_box_outline,
    div.wpb_single_image.vc_box_shadow_border,
    div.wpb_single_image.vc_box_border img,
    div.wpb_single_image.vc_box_outline img,
    div.wpb_single_image.vc_box_shadow_border img,
    .flickr_badge_image,
    .wpb_content_element .flickr_badge_image,
    .tm-collapse,
    .tm-box,
    div.wpcf7-response-output,
    .success-message-container button { border-radius: 4px; }
    <?php if ( class_exists( 'Woocommerce' ) ) : ?>
        .product-image .labels .onhot,
        .product-image .labels .onsale,
        .yith-wcbm-badge,
        .summary-before .labels .onhot,
        .summary-before .labels .onsale,
        .woocommerce .yith-woo-ajax-navigation ul.yith-wcan-color li a,
        .woocommerce .yith-woo-ajax-navigation ul.yith-wcan-color li a:hover,
        .woocommerce .yith-woo-ajax-navigation ul.yith-wcan-color li span,
        .woocommerce .yith-woo-ajax-navigation ul.yith-wcan-color li span:hover,
        .woocommerce-page .yith-woo-ajax-navigation ul.yith-wcan-color li a,
        .woocommerce-page .yith-woo-ajax-navigation ul.yith-wcan-color li a:hover,
        .woocommerce-page .yith-woo-ajax-navigation ul.yith-wcan-color li span,
        .woocommerce-page .yith-woo-ajax-navigation ul.yith-wcan-color li span:hover,
        .woocommerce .yith-woo-ajax-navigation ul.yith-wcan-color li.chosen a,
        .woocommerce .yith-woo-ajax-navigation ul.yith-wcan-color li.chosen a:hover,
        .woocommerce .yith-woo-ajax-navigation ul.yith-wcan-color li.chosen span,
        .woocommerce .yith-woo-ajax-navigation ul.yith-wcan-color li.chosen span:hover,
        .woocommerce-page .yith-woo-ajax-navigation ul.yith-wcan-color li.chosen a,
        .woocommerce-page .yith-woo-ajax-navigation ul.yith-wcan-color li.chosen a:hover,
        .woocommerce-page .yith-woo-ajax-navigation ul.yith-wcan-color li.chosen span,
        .woocommerce-page .yith-woo-ajax-navigation ul.yith-wcan-color li.chosen span:hover,
        .woocommerce .yith-woo-ajax-navigation ul.yith-wcan-label li a,
        .woocommerce-page .yith-woo-ajax-navigation ul.yith-wcan-label li a,
        .woocommerce .yith-woo-ajax-navigation ul.yith-wcan-label li.chosen a,
        .woocommerce .yith-woo-ajax-navigation ul.yith-wcan-label li a:hover,
        .woocommerce-page .yith-woo-ajax-navigation ul.yith-wcan-label li.chosen a,
        .woocommerce-page .yith-woo-ajax-navigation ul.yith-wcan-label li a:hover,
        .shop_table.wishlist_table .add_to_cart { border-radius: 4px; }
    <?php endif; ?>
    #header .porto-view-switcher > li.menu-item:hover > a,
    #header .top-links > li.menu-item:hover > a,
    .mega-menu > li.menu-item.has-sub:hover > a,
    html #topcontrol,
    .tabs.tabs-bottom .tab-content,
    .member-item.member-item-3 .thumb-info,
    .member-item.member-item-3 .thumb-info-wrapper { border-radius: 4px 4px 0 0; }
    .mega-menu .wide .popup > .inner,
    .resp-tab-content,
    .tab-content { border-radius: 0 0 4px 4px; }
    .mega-menu .wide.pos-left .popup,
    .mega-menu .narrow.pos-left .popup > .inner > ul.sub-menu { border-radius: <?php echo $rtl ? '4px 0 4px 4px' : '0 4px 4px 4px'; ?>; }
    .mega-menu .wide.pos-right .popup,
    .mega-menu .narrow.pos-right .popup > .inner > ul.sub-menu { border-radius: <?php echo $rtl ? '0 4px 4px 4px' : '4px 0 4px 4px'; ?>; }
    .mega-menu .narrow .popup > .inner > ul.sub-menu { border-radius: <?php echo $rtl ? "4px 0 4px 4px" : "0 4px 4px 4px"; ?>; }
    .owl-carousel.full-width .owl-nav .owl-prev,
    .owl-carousel.big-nav .owl-nav .owl-prev,
    .resp-vtabs .resp-tabs-container { border-radius: <?php echo $rtl ? "4px 0 0 4px" : "0 4px 4px 0"; ?>; }
    .owl-carousel.full-width .owl-nav .owl-next,
    .owl-carousel.big-nav .owl-nav .owl-next { border-radius: <?php echo $rtl ? "0 4px 4px 0" : "4px 0 0 4px"; ?>; }

    @media (min-width: 992px) {
        .header-wrapper.header-side-nav #header .searchform { border-radius: 5px; }
        .header-wrapper.header-side-nav #header .searchform input { border-radius: <?php echo $rtl ? "0 5px 5px 0" : "5px 0 0 5px"; ?>; }
        .header-wrapper.header-side-nav #header .searchform button { border-radius: <?php echo $rtl ? "5px 0 0 5px" : "0 5px 5px 0"; ?>; }
    }
    <?php if ( (class_exists('bbPress') && is_bbpress() ) || ( class_exists('BuddyPress') && is_buddypress() ) ) : ?>
        #buddypress form#whats-new-form #whats-new-avatar img.avatar,
        #buddypress .activity-list li.mini .activity-avatar img.avatar,
        #buddypress .activity-list li.mini .activity-avatar img.FB_profile_pic,
        #buddypress .activity-permalink .activity-list li.mini .activity-avatar img.avatar,
        #buddypress .activity-permalink .activity-list li.mini .activity-avatar img.FB_profile_pic,
        #buddypress div#message p,
        #sitewide-notice p,
        #bp-uploader-warning,
        #bp-webcam-message p.warning,
        #buddypress table.forum td img.avatar,
        #buddypress div#item-header ul img.avatar,
        #buddypress div#item-header ul.avatars img.avatar,
        #buddypress ul.item-list li img.avatar,
        #buddypress div#message-thread img.avatar,
        #buddypress #message-threads img.avatar,
        .widget.buddypress div.item-avatar img.avatar,
        .widget.buddypress ul.item-list img.avatar,
        .bp-login-widget-user-avatar img.avatar { border-radius: 5px; }
        @media only screen and (max-width: 240px) {
            #buddypress ul.item-list li img.avatar { border-radius: 5px; }
        }
    <?php endif; ?>
    @media (max-width: 767px) {
        ul.comments ul.children > li .comment-body,
        ul.comments > li .comment-body { border-radius: 5px; }
    }
    ul.comments .comment-block,
    .pricing-table .plan,
    .tabs-navigation,
    .toggle > label,
    body.boxed .page-wrapper { border-radius: 5px; }
    <?php if ( class_exists( 'Woocommerce' ) ) : ?>
        .add-links .add_to_cart_button,
        .add-links .add_to_cart_read_more,
        .add-links .add_to_cart_button.loading.viewcart-style-1:after,
        .yith-wcwl-add-to-wishlist span.ajax-loading,
        .add-links .quickview.loading:after,
        .commentlist li .comment-text,
        .product-image img,
        .shop_table,
        .product-nav .product-popup .product-image,
        .product-summary-wrap .yith-wcwl-add-to-wishlist a:before,
        .product-summary-wrap .yith-wcwl-add-to-wishlist span:not(.ajax-loading):before,
        ul.product_list_widget li .product-image,
        .widget ul.product_list_widget li .product-image,
        .widget_recent_reviews .product_list_widget li img,
        .widget.widget_recent_reviews .product_list_widget li img { border-radius: 5px; }
        .shop_table thead tr:first-child th:first-child,
        .shop_table thead tr:first-child td:first-child { border-radius: <?php echo $rtl ? "0 5px 0 0" : "5px 0 0 0"; ?>; }
        .shop_table thead tr:first-child th:last-child,
        .shop_table thead tr:first-child td:last-child { border-radius: <?php echo $rtl ? "5px 0 0 0" : "0 5px 0 0"; ?>; }
        .shop_table thead tr:first-child th:only-child,
        .shop_table thead tr:first-child td:only-child { border-radius: 5px 5px 0 0; }
        .shop_table tfoot tr:last-child th:first-child,
        .shop_table tfoot tr:last-child td:first-child { border-radius: <?php echo $rtl ? "0 0 5px 0" : "0 0 0 5px"; ?>; }
        .shop_table tfoot tr:last-child th:last-child,
        .shop_table tfoot tr:last-child td:last-child { border-radius: <?php echo $rtl ? "0 0 0 5px" : "0 0 5px 0"; ?>; }
        .shop_table tfoot tr:last-child th:only-child,
        .shop_table tfoot tr:last-child td:only-child { border-radius: 0 0 5px 5px; }
        @media (max-width: 575px) {
            .commentlist li .comment_container { border-radius: 5px; }
        }
        .add-links .add_to_cart_read_more,
        .add-links .add_to_cart_button,
        .yith-wcwl-add-to-wishlist a,
        .yith-wcwl-add-to-wishlist span,
        .add-links .quickview,
        ul.products li.product-col .links-on-image .add-links-wrap .add-links .add_to_cart_button,
        ul.products li.product-col .links-on-image .add-links-wrap .add-links .add_to_cart_read_more,
        ul.products li.product-col .links-on-image .add-links-wrap .add-links .yith-wcwl-add-to-wishlist > div,
        ul.products li.product-col .links-on-image .add-links-wrap .add-links .quickview { border-radius: 5px !important; }
    <?php endif; ?>
    .br-normal { border-radius: 5px !important; }
    .resp-tabs-list li,
    .nav-tabs li .nav-link,
    .tabs-navigation .nav-tabs > li:first-child .nav-link { border-radius: 5px 5px 0 0; }
    .tabs.tabs-bottom .nav-tabs li .nav-link,
    .tabs-navigation .nav-tabs > li:last-child .nav-link { border-radius: 0 0 5px 5px; }
    .tabs-left .tab-content { border-radius: 0 5px 5px 5px; }
    .tabs-left .nav-tabs > li:first-child .nav-link { border-radius: 5px 0 0 0; }
    .tabs-left .nav-tabs > li:last-child .nav-link { border-radius: 0 0 0 5px; }
    .tabs-right .tab-content { border-radius: 5px 0 5px 5px; }
    .tabs-right .nav-tabs > li:first-child .nav-link { border-radius: 0 5px 0 0; }
    .tabs-right .nav-tabs > li:last-child .nav-link { border-radius: 0 0 5px 0; }
    .resp-tabs-list li:first-child,
    .nav-tabs.nav-justified li:first-child .nav-link,
    .nav-tabs.nav-justified li:first-child .nav-link:hover { border-radius: <?php echo $rtl ? "0 5px 0 0" : "5px 0 0 0"; ?>; }
    .nav-tabs.nav-justified li:last-child .nav-link,
    .nav-tabs.nav-justified li:last-child .nav-link:hover { border-radius: <?php echo $rtl ? "5px 0 0 0" : "0 5px 0 0"; ?>; }
    .resp-tabs-list li:last-child,
    .tabs.tabs-bottom .nav.nav-tabs.nav-justified li:first-child .nav-link { border-radius: <?php echo $rtl ? "0 0 5px 0" : "0 0 0 5px"; ?>; }
    .tabs.tabs-bottom .nav.nav-tabs.nav-justified li:last-child .nav-link { border-radius: <?php echo $rtl ? "0 0 0 5px" : "0 0 5px 0"; ?>; }
    @media (max-width: 575px) {
        .tabs .nav.nav-tabs.nav-justified li:first-child .nav-link,
        .tabs .nav.nav-tabs.nav-justified li:first-child .nav-link:hover { border-radius: 5px 5px 0 0; }
        .tabs.tabs-bottom .nav.nav-tabs.nav-justified li:last-child .nav-link,
        .tabs.tabs-bottom .nav.nav-tabs.nav-justified li:last-child .nav-link:hover { border-radius: 0 0 5px 5px; }
    }

    #mini-cart .cart-popup,
    #main-menu .mega-menu,
    .sidebar-menu .narrow .popup ul.sub-menu,
    article .comment-respond input[type="submit"],
    .btn-3d,
    .carousel-areas,
    .stats-block.counter-with-border,
    .gmap-rounded,
    .gmap-rounded .porto_google_map,
    blockquote.with-borders,
    .tparrows,
    .testimonial.testimonial-style-4,
    body .cart-actions .button,
    body .checkout-button,
    body #place_order,
    body .btn-lg,
    body .btn-group-lg > .btn,
    body input.submit.btn-lg,
    body input.btn.btn-lg[type="submit"], 
    body input.button.btn-lg[type="submit"],
    body .return-to-shop .button { border-radius: 6px; }
    #header .porto-view-switcher .narrow .popup > .inner > ul.sub-menu,
    #header .top-links .narrow .popup > .inner > ul.sub-menu { border-radius: 0 0 6px 6px; }
    .mobile-sidebar .sidebar-toggle { border-radius: <?php echo $rtl ? "6px 0 0 6px" : "0 6px 6px 0"; ?>; }
    .sidebar-menu .wide .popup,
    .sidebar-menu .wide .popup > .inner,
    .sidebar-menu .narrow .popup > .inner > ul.sub-menu { border-radius: <?php echo $rtl ? "6px 0 6px 6px" : "0 6px 6px 6px"; ?>; }
    .right-sidebar .sidebar-menu .wide .popup,
    .right-sidebar .sidebar-menu .wide .popup > .inner,
    .right-sidebar .sidebar-menu .narrow .popup > .inner > ul.sub-menu { border-radius: <?php echo $rtl ? "0 6px 6px 6px" : "6px 0 6px 6px"; ?>; }
    <?php if ( class_exists( 'Woocommerce' ) ) : ?>
        .widget_product_categories .widget-title,
        .widget_price_filter .widget-title,
        .widget_layered_nav .widget-title,
        .widget_layered_nav_filters .widget-title,
        .widget_rating_filter .widget-title { border-radius: 6px 6px 0 0; }
        .category-image,
        .widget_product_categories.closed .widget-title,
        .widget_price_filter.closed .widget-title,
        .widget_layered_nav.closed .widget-title,
        .widget_layered_nav_filters.closed .widget-title,
        .widget_rating_filter.closed .widget-title { border-radius: 6px; }
        .shop_table.responsive.cart-total tbody tr:first-child th,
        .shop_table.shop_table_responsive.cart-total tbody tr:first-child th { border-radius: <?php echo $rtl ? "0 6px 0 0" : "6px 0 0 0"; ?>; }
        .shop_table.responsive.cart-total tbody tr:last-child th,
        .shop_table.shop_table_responsive.cart-total tbody tr:last-child th { border-radius: <?php echo $rtl ? "0 0 6px 0" : "0 0 0 6px"; ?>; }
    <?php endif; ?>

    .widget_sidebar_menu.closed .widget-title,
    .img-opacity-effect a img,
    #content .master-slider,
    #content-inner-top .master-slider,
    #content-inner-bottom .master-slider,
    #content .master-slider .ms-slide .ms-slide-bgcont,
    #content-inner-top .master-slider .ms-slide .ms-slide-bgcont,
    #content-inner-bottom .master-slider .ms-slide .ms-slide-bgcont,
    #content .master-slider .ms-slide .ms-slide-bgvideocont,
    #content-inner-top .master-slider .ms-slide .ms-slide-bgvideocont,
    #content-inner-bottom .master-slider .ms-slide .ms-slide-bgvideocont,
    #content .rev_slider_wrapper,
    #content-inner-top .rev_slider_wrapper,
    #content-inner-bottom .rev_slider_wrapper,
    #content .rev_slider_wrapper li.tp-revslider-slidesli,
    #content-inner-top .rev_slider_wrapper li.tp-revslider-slidesli,
    #content-inner-bottom .rev_slider_wrapper li.tp-revslider-slidesli,
    .porto-links-block { border-radius: 7px; }
    .sidebar-menu > li.menu-item:last-child:hover,
    .sidebar-menu .menu-custom-block a:last-child:hover { border-radius: 0 0 7px 7px; }
    .porto-links-block .links-title { border-radius: 7px 7px 0 0; }
    .sidebar-menu > li.menu-item:last-child.menu-item-has-children:hover { border-radius: <?php echo $rtl ? "0 0 7px 0" : "0 0 0 7px"; ?>; }
    .right-sidebar .sidebar-menu > li.menu-item:last-child.menu-item-has-children:hover { border-radius: <?php echo $rtl ? "0 0 0 7px" : "0 0 7px 0"; ?>; }
    .br-thick { border-radius: 7px !important; }
    <?php if ( class_exists( 'Woocommerce' ) ) : ?>
        ul.products li.product-col .links-on-image .add-links-wrap .add-links .quickview { border-radius: <?php echo $rtl ? "7px 0 7px 0" : "0 7px 0 7px"; ?> !important; }
        ul.products li.product-col.show-outimage-q-onimage-alt > div,
        .product-image,
        .widget_product_categories,
        .widget_price_filter,
        .widget_layered_nav,
        .widget_layered_nav_filters,
        .widget_rating_filter,
        .widget_layered_nav .yith-wcan-select-wrapper { border-radius: 7px; }
        ul.products li.product-col.show-outimage-q-onimage .links-on-image .add-links-wrap .add-links .quickview { border-radius: 0 0 7px 7px !important; }
    <?php endif; ?>

    .featured-box,
    .featured-box .box-content,
    .testimonial blockquote { border-radius: 8px; }

    <?php if ( (class_exists('bbPress') && is_bbpress() ) || ( class_exists('BuddyPress') && is_buddypress() ) ) : ?>
        #bbpress-forums #bbp-single-user-details #bbp-user-avatar img.avatar,
        #buddypress div#item-header img.avatar { border-radius: 16px; }
    <?php endif; ?>

    .vc_progress_bar .vc_single_bar.progress,
    .progress,
    .vc_progress_bar .vc_single_bar.progress .vc_bar,
    .progress-bar { border-radius: 25px; }
<?php else : ?>
    <?php if ( class_exists( 'Woocommerce' ) ): ?>
        .wishlist_table .add_to_cart.button,
        .yith-wcwl-add-button a.add_to_wishlist,
        .yith-wcwl-popup-button a.add_to_wishlist,
        .wishlist_table a.ask-an-estimate-button,
        .wishlist-title a.show-title-form,
        .hidden-title-form a.hide-title-form,
        .woocommerce .yith-wcwl-wishlist-new button,
        .wishlist_manage_table a.create-new-wishlist,
        .wishlist_manage_table button.submit-wishlist-changes,
        .yith-wcwl-wishlist-search-form button.wishlist-search-button { border-radius: 0; }
    <?php endif; ?>
<?php endif; ?>

/*------ Search Border Radius ------- */
<?php if( $b['search-border-radius'] ): ?>
    #header .searchform { border-radius: 20px; line-height: 40px; }
    #header .searchform input, 
    #header .searchform select, 
    #header .searchform button { height: 40px; }
    #header .searchform input { border-radius: <?php echo $rtl ? "0 20px 20px 0" : "20px 0 0 20px"; ?>; }
    #header .searchform button { border-radius: <?php echo $rtl ? "20px 0 0 20px" : "0 20px 20px 0"; ?>; }
    #header .searchform .autocomplete-suggestions { left: 15px; right: 15px; } 
    #header .header-left.search-popup .searchform { top: -5px; }
    #header .header-left.search-popup .searchform:before { top: 9px; }
    @media (max-width: 991px) {
        #header .header-left .searchform { top: -5px; }
        #header .header-left .searchform:before { top: 9px; }
        #header .searchform { border-radius: 25px; }
    }
    #header .search-popup .searchform,
    #header .main-menu-wrap .menu-right .searchform-popup .searchform { border-radius: 25px; }
    ul.products li.product-col.show-outimage-q-onimage-alt .product-image .labels .onhot,
    ul.products li.product-col.show-outimage-q-onimage-alt .product-image .labels .onsale { border-radius: 20px; }

    #header .searchform select,
    #header .searchform .selectric .label,
    #header .main-menu-wrap .menu-right .searchform-popup .searchform select,
    #header .main-menu-wrap .menu-right .searchform-popup .searchform .selectric .label { padding: <?php echo $rtl ? "0 10px 0 15px" : "0 15px 0 10px"; ?>; }

    #header .searchform input,
    #header .main-menu-wrap .menu-right .searchform-popup .searchform input { padding: <?php echo $rtl ? "0 20px 0 15px" : "0 15px 0 20px"; ?>; }

    #header .searchform button,
    #header .main-menu-wrap .menu-right .searchform-popup .searchform button { padding: <?php echo $rtl ? "0 13px 0 16px" : "0 16px 0 13px"; ?>; }
<?php endif; ?>

/*------ Thumb Padding ------- */
<?php if ($b['thumb-padding']) : ?>
    .mega-menu li.menu-item > a > .thumb-info-preview .thumb-info-wrapper,
    .sidebar-menu li.menu-item > a > .thumb-info-preview .thumb-info-wrapper,
    .page-wrapper .fdm-item-image,
    .thumb-info-side-image .thumb-info-side-image-wrapper,
    .flickr_badge_image,
    .wpb_content_element .flickr_badge_image { padding: 4px; }
    .img-thumbnail .zoom { <?php echo $right; ?>: 8px; bottom: 8px; }
    .thumb-info .thumb-info-wrapper { margin: 4px; }
    .thumb-info .thumb-info-wrapper:after { bottom: -4px; top: -4px; left: -4px; right: -4px; }

    .flickr_badge_image,
    .wpb_content_element .flickr_badge_image { border: 1px solid <?php echo $dark ? $color_dark_3 : "#ddd"; ?>; }

    .owl-carousel .img-thumbnail { max-width: 99.5%; }
    <?php if ( class_exists( 'Woocommerce' ) ) : ?>
        .yith-wcbm-badge { margin: 5px; }
        .yith-wcbm-badge img { margin: -5px !important; }
        .product-images .zoom { <?php echo $right; ?>: 8px; bottom: 8px; }

        .product-image-slider.owl-carousel .img-thumbnail { width: 99.5%; padding: 3px; }
        .product-thumbs-slider.owl-carousel .img-thumbnail { width: 99.5%; padding: 3px; }

        ul.list li.product .product-image,
        .column2 ul.list li.product .product-image { padding-<?php echo $left; ?>: 0.2381em !important; }
        .product-image { padding: 0.2381em; }

        ul.products li.product-col .links-on-image .add-links-wrap .add-links .quickview { top: -1px; <?php echo $right; ?>: -1px; }

        .widget_recent_reviews .product_list_widget li img,
        .widget.widget_recent_reviews .product_list_widget li img { border: 1px solid <?php echo $dark ? $color_dark_3 : "#ddd"; ?>; padding: 3px; }

        .product-nav .product-popup .product-image,
        ul.product_list_widget li .product-image,
        .widget ul.product_list_widget li .product-image { padding: 3px; }
    <?php endif; ?>
<?php else : ?>
    .page-wrapper .fdm-item-image,
    .thumb-info { border-width: 0; }
<?php endif; ?>

/*------ Colors ------- */
<?php if ( (class_exists('bbPress') && is_bbpress() ) || ( class_exists('BuddyPress') && is_buddypress() ) ) : ?>
    .bbp-pagination-links a:hover,
    .bbp-pagination-links span.current:hover { background: <?php echo if_dark( $color_dark_3, '#eee' ); ?>; border: 1px solid <?php echo if_dark( $color_dark_4, '#ddd' ); ?>; }
    #bbpress-forums div.wp-editor-container { border: 1px solid <?php echo if_dark( $color_dark_3, '#dedede' ); ?>; }
    #bbpress-forums #bbp-single-user-details #bbp-user-navigation li.current a { background: <?php echo if_dark( $color_dark_3, '#eee' ); ?>; }
    #buddypress div.pagination .pagination-links a:hover,
    #buddypress div.pagination .pagination-links span.current:hover { background: <?php echo if_dark( $color_dark_3, '#eee' ); ?>; border: 1px solid <?php echo if_dark( $color_dark_4, '#ddd' ); ?>; }
    #buddypress form#whats-new-form textarea { background: <?php echo if_dark( $color_dark_3, '#fff' ); ?>; color: <?php echo if_dark( '#999', '#777' ); ?>; }
    #buddypress .activity-list li.load-more a:hover,
    #buddypress .activity-list li.load-newest a:hover { color: <?php echo if_dark( '#999', '#333' ); ?>; }
    #buddypress a.bp-primary-action span,
    #buddypress #reply-title small a span { background: <?php echo if_dark( '#555', '#fff' ); ?>; <?php echo if_dark( '', 'color: #999;' ); ?> }
    #buddypress a.bp-primary-action:hover span,
    #buddypress #reply-title small a:hover span { background: <?php echo if_dark( '#777', '#fff' ); ?>; <?php echo if_dark( '', 'color: #999;' ); ?> }
    #buddypress div.activity-comments ul li { border-top: 1px solid <?php echo if_dark( $color_dark_3, '#eee' ); ?>; }
    #buddypress div.activity-comments form .ac-textarea { background: <?php echo if_dark( $color_dark_3, '#fff' ); ?>; color: <?php echo if_dark( '#999', '#777' ); ?>; border: 1px solid <?php echo if_dark( $color_dark_3, '#ccc' ); ?>; }
    #buddypress div.activity-comments form textarea { color: <?php echo if_dark( '#999', '#777' ); ?>; }
    #buddypress #pass-strength-result { border-color: <?php echo if_dark( $color_dark_4, '#ddd' ); ?>; }
    #buddypress .standard-form textarea,
    #buddypress .standard-form input[type=text],
    #buddypress .standard-form input[type=color],
    #buddypress .standard-form input[type=date],
    #buddypress .standard-form input[type=datetime],
    #buddypress .standard-form input[type=datetime-local],
    #buddypress .standard-form input[type=email],
    #buddypress .standard-form input[type=month],
    #buddypress .standard-form input[type=number],
    #buddypress .standard-form input[type=range],
    #buddypress .standard-form input[type=search],
    #buddypress .standard-form input[type=tel],
    #buddypress .standard-form input[type=time],
    #buddypress .standard-form input[type=url],
    #buddypress .standard-form input[type=week],
    #buddypress .standard-form select,
    #buddypress .standard-form input[type=password],
    #buddypress .dir-search input[type=search],
    #buddypress .dir-search input[type=text],
    #buddypress .groups-members-search input[type=search],
    #buddypress .groups-members-search input[type=text] {
    <?php if ( $dark ) : ?>
        border: 1px solid <?php echo $color_dark_3; ?>;
        background: <?php echo $color_dark_3; ?>;
        color: #999;
    <?php endif; ?>
        color: <?php echo if_dark( '#999', '#777' ); ?>;
    }
    #buddypress .standard-form input:focus,
    #buddypress .standard-form textarea:focus,
    #buddypress .standard-form select:focus {
    <?php if ( $dark ) : ?>
        background: $color-dark-3;
    <?php endif; ?>
        color: <?php echo if_dark( '#999', '#777' ); ?>;
    }
    #buddypress table.forum tr td.label {
    <?php if ( $dark ) : ?>
        border-<?php echo $right; ?>-width: 0;
    <?php endif; ?>
        color: <?php echo if_dark( '#fff', '#777' ); ?>;
    }
    #buddypress div.item-list-tabs ul li.selected a span,
    #buddypress div.item-list-tabs ul li.current a span {
        border-color: <?php echo if_dark( $color_dark_3, '#fff' ); ?>;
    <?php if ( $dark ) : ?>
        background-color: <?php echo $color_dark_3; ?>;
    <?php endif; ?>
    }
    <?php if ( $dark ) : ?>
        #buddypress div.pagination .pagination-links a,
        #buddypress div.pagination .pagination-links span.current { background: <?php echo $color_dark_3; ?>; }
        #buddypress div.pagination .pagination-links a.dots,
        #buddypress div.pagination .pagination-links span.current.dots { background: transparent; }
        #buddypress .activity-list li.load-more a,
        #buddypress .activity-list li.load-newest a { color: #777; }
        #buddypress .activity-list li.new_forum_post .activity-content .activity-inner,
        #buddypress .activity-list li.new_forum_topic .activity-content .activity-inner { border-<?php echo $left; ?>: 2px solid <?php echo $color_dark_3; ?>; }
        #buddypress .activity-list .activity-content img.thumbnail { border: 2px solid <?php echo $color_dark_3; ?>; }
        #buddypress .activity-list li.load-more,
        #buddypress .activity-list li.load-newest { background: <?php echo $color_dark_3; ?>; }
        #buddypress div.ac-reply-avatar img { border: 1px solid <?php echo $color_dark_3; ?>; }
        #buddypress #pass-strength-result { background-color: <?php echo $color_dark_3; ?>; }
        #buddypress div#invite-list { background: transparent; }
        #buddypress table.notifications tr.alt td,
        #buddypress table.notifications-settings tr.alt td,
        #buddypress table.profile-settings tr.alt td,
        #buddypress table.profile-fields tr.alt td,
        #buddypress table.wp-profile-fields tr.alt td,
        #buddypress table.messages-notices tr.alt td,
        #buddypress table.forum tr.alt td { background: transparent; }
        #buddypress ul.item-list { border-top: 1px solid <?php echo $color_dark_3; ?>; }
        #buddypress ul.item-list li { border-bottom: 1px solid <?php echo $color_dark_3; ?> }
        #buddypress div.item-list-tabs ul li a span { background: <?php echo $color_dark_3; ?>; border: 1px solid <?php echo $color_dark_3; ?>; }
        #buddypress div.item-list-tabs ul li.selected a span,
        #buddypress div.item-list-tabs ul li.current a span,
        #buddypress div.item-list-tabs ul li a:hover span { background-color: <?php echo $color_dark_3; ?>; border-color: <?php echo $color_dark_3; ?>; }
        #buddypress div#message-thread div.alt { background: <?php echo $color_dark_3; ?>; }
        .bp-avatar-nav ul.avatar-nav-items li.current { border-color: <?php echo $color_dark_4; ?>; }
        .bp-avatar-nav ul { border-color: <?php echo $color_dark_4; ?>; }
        #drag-drop-area { border-color: <?php echo $color_dark_4; ?>; }
        #buddypress input[type="submit"].pending:hover,
        #buddypress input[type="button"].pending:hover,
        #buddypress input[type="reset"].pending:hover,
        #buddypress input[type="submit"].disabled:hover,
        #buddypress input[type="button"].disabled:hover,
        #buddypress input[type="reset"].disabled:hover,
        #buddypress button.pending:hover,
        #buddypress button.disabled:hover,
        #buddypress div.pending a:hover,
        #buddypress a.disabled:hover { border-color: <?php echo $color_dark_3; ?>; }
        #buddypress ul#topic-post-list li.alt { background: transparent; }
        #buddypress table.notifications thead tr,
        #buddypress table.notifications-settings thead tr,
        #buddypress table.profile-settings thead tr,
        #buddypress table.profile-fields thead tr,
        #buddypress table.wp-profile-fields thead tr,
        #buddypress table.messages-notices thead tr,
        #buddypress table.forum thead tr { background: <?php echo $color_dark_3; ?>; }

        #bbpress-forums div.even, #bbpress-forums ul.even { background-color: <?php echo $color_dark; ?>; }
        #bbpress-forums div.odd, #bbpress-forums ul.odd { background-color: <?php echo $color_dark_2; ?>; }
        #bbpress-forums div.bbp-forum-header,
        #bbpress-forums div.bbp-topic-header,
        #bbpress-forums div.bbp-reply-header { background-color: <?php echo $color_dark_5; ?>; }
        #bbpress-forums .status-trash.even, #bbpress-forums .status-spam.even { background-color: <?php echo $color_dark; ?>; }
        #bbpress-forums .status-trash.odd, #bbpress-forums .status-spam.odd { background-color: <?php echo $color_dark_2; ?>; }
        #bbpress-forums ul.bbp-lead-topic,
        #bbpress-forums ul.bbp-topics,
        #bbpress-forums ul.bbp-forums,
        #bbpress-forums ul.bbp-replies,
        #bbpress-forums ul.bbp-search-results { border: 1px solid <?php echo $color_dark_3; ?>; }
        #bbpress-forums li.bbp-header,
        #bbpress-forums li.bbp-footer { background: <?php echo $color_dark_3; ?>; border-top: <?php echo $color_dark_3; ?>; }
        #bbpress-forums li.bbp-header { background: <?php echo $color_dark_4; ?>; }
        #bbpress-forums .bbp-forums-list { border-<?php echo $left; ?>: 1px solid <?php echo $color_dark_4; ?>; }
        #bbpress-forums li.bbp-body ul.forum,
        #bbpress-forums li.bbp-body ul.topic { border-top: 1px solid <?php echo $color_dark_3; ?>; }
        div.bbp-forum-header,
        div.bbp-topic-header,
        div.bbp-reply-header { border-top: 1px solid <?php echo $color_dark_4; ?>; }
        #bbpress-forums div.bbp-topic-content code,
        #bbpress-forums div.bbp-topic-content pre,
        #bbpress-forums div.bbp-reply-content code,
        #bbpress-forums div.bbp-reply-content pre  { background-color: <?php echo $color_dark_4; ?>; border: 1px solid <?php echo $color_dark_4; ?>; }
        .bbp-pagination-links a,
        .bbp-pagination-links span.current,
        .bbp-topic-pagination a { background: <?php echo $color_dark_3; ?>; }
        .bbp-pagination-links a.dots,
        .bbp-pagination-links span.current.dots,
        .bbp-topic-pagination a.dots { background: transparent; }
        #bbpress-forums fieldset.bbp-form { border: 1px solid <?php echo $color_dark_3; ?>; }
        body.topic-edit .bbp-topic-form div.avatar img,
        body.reply-edit .bbp-reply-form div.avatar img,
        body.single-forum .bbp-topic-form div.avatar img,
        body.single-reply .bbp-reply-form div.avatar img { border: 1px solid <?php echo $color_dark_4; ?>; background-color: <?php echo $color_dark_4; ?>; }
        #bbpress-forums  div.bbp-the-content-wrapper div.quicktags-toolbar { background: <?php echo $color_dark_4; ?>; border-bottom-color: <?php echo $color_dark_3; ?>; }
        #bbpress-forums #bbp-your-profile fieldset input,
        #bbpress-forums #bbp-your-profile fieldset textarea { background: <?php echo $color_dark_3; ?>; border: 1px solid <?php echo $color_dark_3; ?>; }
        #bbpress-forums #bbp-your-profile fieldset input:focus,
        #bbpress-forums #bbp-your-profile fieldset textarea:focus { border: 1px solid <?php echo $color_dark_3; ?>; }
        #bbpress-forums #bbp-your-profile fieldset span.description { border: transparent 1px solid; background-color: transparent; }
        .bbp-topics-front ul.super-sticky,
        .bbp-topics ul.super-sticky,
        .bbp-topics ul.sticky,
        .bbp-forum-content ul.sticky { background-color: <?php echo $color_dark_3; ?> !important; }
        #bbpress-forums .bbp-topic-content ul.bbp-topic-revision-log,
        #bbpress-forums .bbp-reply-content ul.bbp-topic-revision-log,
        #bbpress-forums .bbp-reply-content ul.bbp-reply-revision-log { border-top: 1px dotted <?php echo $color_dark_4; ?>; }
        .activity-list li.bbp_topic_create .activity-content .activity-inner,
        .activity-list li.bbp_reply_create .activity-content .activity-inner { border-<?php echo $left; ?>: 2px solid <?php echo $color_dark_4; ?>; }
    <?php endif; ?>
<?php endif; ?>
<?php if ( $dark ) : ?>
    .pagination > a,
    .pagination > span,
    .page-links > a,
    .page-links > span { background: <?php echo $color_dark_3; ?>; }
    .pagination > a.dots,
    .pagination > span.dots,
    .page-links > a.dots,
    .page-links > span.dots { background: transparent; }
    .dir-arrow { background: transparent url(<?php echo porto_uri; ?>/images/arrows-dark.png) no-repeat 0 0; }
    .dir-arrow.arrow-light { background: transparent url(<?php echo porto_uri; ?>/images/arrows.png) no-repeat 0 0; }
    hr, .divider { background-image:- webkit-linear-gradient(<?php echo $left; ?>, transparent, rgba(255, 255, 255, 0.15), transparent); background-image: linear-gradient(to <?php echo $right; ?>, transparent, rgba(255, 255, 255, 0.15), transparent); }
    hr.light { background-image:- webkit-linear-gradient(<?php echo $left; ?>, transparent, rgba(0, 0, 0, 0.15), transparent); background-image:linear-gradient(to <?php echo $right; ?>, transparent, rgba(0, 0, 0, 0.15), transparent); }
    .featured-boxes-style-6 .featured-box .icon-featured { background: <?php echo $color_dark_3; ?>; }
    .featured-boxes-style-7 .featured-box .icon-featured { background: <?php echo $color_dark_3; ?>; }
    .featured-boxes-style-7 .featured-box .icon-featured:after { box-shadow: 3px 3px <?php echo $portoColorLib->darken($color_dark, 3); ?>; }
    .porto-concept { background: transparent url(<?php echo porto_uri; ?>/images/concept-dark.png) no-repeat center 0; }
    .porto-concept .process-image { background: transparent url(<?php echo porto_uri; ?>/images/concept-item-dark.png) no-repeat 0 0; }
    .porto-concept .project-image { background: transparent url(<?php echo porto_uri; ?>/images/concept-item-dark.png) no-repeat 100% 0; }
    .porto-concept .sun { background: transparent url(<?php echo porto_uri; ?>/images/concept-icons-dark.png) no-repeat 0 0; }
    .porto-concept .cloud { background: transparent url(<?php echo porto_uri; ?>/images/concept-icons-dark.png) no-repeat 100% 0; }
    .porto-map-section { background: transparent url(<?php echo porto_uri; ?>/images/map-dark.png) center 0 no-repeat; }
    .slider-title .line { background-image:- webkit-linear-gradient(<?php echo $left; ?>, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0.15) 70%, rgba(255, 255, 255, 0) 100%); background-image:linear-gradient(to <?php echo $right; ?>, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0.15) 70%, rgba(255, 255, 255, 0) 100%); }
    @media (max-width: 767px) {
        .resp-tab-content:last-child,
        .resp-vtabs .resp-tab-content:last-child { border-bottom: 1px solid <?php echo $color_dark_4; ?> !important; }
    }
    .resp-easy-accordion h2.resp-tab-active { background: <?php echo $color_dark_4; ?> !important; }
    .vc_separator .vc_sep_holder.vc_sep_holder_l .vc_sep_line { background-image:- webkit-linear-gradient(<?php echo $left; ?>, transparent, rgba(255, 255, 255, 0.15));background-image:linear-gradient(to <?php echo $right; ?>, transparent, rgba(255, 255, 255, 0.15)); }
    .vc_separator .vc_sep_holder.vc_sep_holder_r .vc_sep_line { background-image:- webkit-linear-gradient(<?php echo $right; ?>, transparent, rgba(255, 255, 255, 0.15));background-image:linear-gradient(to <?php echo $left; ?>, transparent, rgba(255, 255, 255, 0.15)); }
    .card > .card-header { background-color: <?php echo $color_dark_4; ?>; }
    .btn-default { background-color: <?php echo $color_dark_2; ?> !important; border-color: <?php echo $color_dark_2; ?> !important; }
    .porto-history .thumb { background: transparent url(<?php echo porto_uri; ?>/images/history-thumb-dark.png) no-repeat 0 <?php echo $rtl ? '-200px' : '0'; ?>; }
<?php else: ?>
    .dir-arrow { background: transparent url(<?php echo porto_uri; ?>/images/arrows.png) no-repeat 0 0; }
    .dir-arrow.arrow-light { background: transparent url(<?php echo porto_uri; ?>/images/arrows-dark.png) no-repeat 0 0; }
    hr, .divider { background-image:- webkit-linear-gradient(<?php echo $left; ?>, transparent, rgba(0, 0, 0, 0.15), transparent); background-image:linear-gradient(to <?php echo $right; ?>, transparent, rgba(0, 0, 0, 0.15), transparent); }
    hr.light { background-image:- webkit-linear-gradient(<?php echo $left; ?>, transparent, rgba(255, 255, 255, 0.15), transparent); background-image:linear-gradient(to <?php echo $right; ?>, transparent, rgba(255, 255, 255, 0.15), transparent); }
    .porto-concept { background: transparent url(<?php echo porto_uri; ?>/images/concept.png) no-repeat center 0; }
    .porto-concept .process-image { background: transparent url(<?php echo porto_uri; ?>/images/concept-item.png) no-repeat 0 0; }
    .porto-concept .project-image { background: transparent url(<?php echo porto_uri; ?>/images/concept-item.png) no-repeat 100% 0; }
    .porto-concept .sun { background: transparent url(<?php echo porto_uri; ?>/images/concept-icons.png) no-repeat 0 0; }
    .porto-concept .cloud { background: transparent url(<?php echo porto_uri; ?>/images/concept-icons.png) no-repeat 100% 0; }
    .porto-map-section { background: transparent url(<?php echo porto_uri; ?>/images/map.png) center 0 no-repeat; }
    .slider-title .line { background-image:- webkit-linear-gradient(<?php echo $left; ?>, rgba(0, 0, 0, 0.15), rgba(0, 0, 0, 0.15) 70%, rgba(0, 0, 0, 0) 100%); background-image: linear-gradient(to <?php echo $right; ?>, rgba(0, 0, 0, 0.15), rgba(0, 0, 0, 0.15) 70%, rgba(0, 0, 0, 0) 100%); }
    .vc_separator .vc_sep_holder.vc_sep_holder_l .vc_sep_line { background-image:- webkit-linear-gradient(<?php echo $left; ?>, transparent, rgba(0, 0, 0, 0.15));background-image:linear-gradient(to <?php echo $right; ?>, transparent, rgba(0, 0, 0, 0.15)); }
    .vc_separator .vc_sep_holder.vc_sep_holder_r .vc_sep_line { background-image:- webkit-linear-gradient(<?php echo $right; ?>, transparent, rgba(0, 0, 0, 0.15));background-image:linear-gradient(to <?php echo $left; ?>, transparent, rgba(0, 0, 0, 0.15)); }
    .porto-history .thumb { background: transparent url(<?php echo porto_uri; ?>/images/history-thumb.png) no-repeat 0 <?php echo $rtl ? '-200px' : '0'; ?>; }
<?php endif; ?>
<?php if ( class_exists( 'Woocommerce' ) ) : ?>
    <?php if ( $dark ) : ?>
        .add-links .add_to_cart_button.loading.viewcart-style-1:after,
        .yith-wcwl-add-to-wishlist span.ajax-loading,
        .add-links .quickview.loading:after,
        .wcml-switcher li.loading,
        ul.product_list_widget li .ajax-loading,
        .widget ul.product_list_widget li .ajax-loading { background-color: <?php echo $color_dark_3; ?>; }
        .select2-drop, .select2-drop-active,
        .gridlist-toggle > a,
        .woocommerce-pagination ul li a,
        .woocommerce-pagination ul li span { background: <?php echo $color_dark_3; ?>; }
        .select2-drop input, .select2-drop-active input,
        .select2-drop .select2-results .select2-highlighted,
        .select2-drop-active .select2-results .select2-highlighted { background: <?php echo $color_dark_2; ?>; }
        .woocommerce-pagination ul li a.dots,
        .woocommerce-pagination ul li span.dots { background: transparent; }
        .woocommerce .yith-woo-ajax-navigation ul.yith-wcan-color li a,
        .woocommerce .yith-woo-ajax-navigation ul.yith-wcan-color li a:hover,
        .woocommerce .yith-woo-ajax-navigation ul.yith-wcan-color li span,
        .woocommerce .yith-woo-ajax-navigation ul.yith-wcan-color li span:hover,
        .woocommerce-page .yith-woo-ajax-navigation ul.yith-wcan-color li a,
        .woocommerce-page .yith-woo-ajax-navigation ul.yith-wcan-color li a:hover,
        .woocommerce-page .yith-woo-ajax-navigation ul.yith-wcan-color li span,
        .woocommerce-page .yith-woo-ajax-navigation ul.yith-wcan-color li span:hover,
        .woocommerce .yith-woo-ajax-navigation ul.yith-wcan-color li.chosen a,
        .woocommerce .yith-woo-ajax-navigation ul.yith-wcan-color li.chosen a:hover,
        .woocommerce .yith-woo-ajax-navigation ul.yith-wcan-color li.chosen span,
        .woocommerce .yith-woo-ajax-navigation ul.yith-wcan-color li.chosen span:hover,
        .woocommerce-page .yith-woo-ajax-navigation ul.yith-wcan-color li.chosen a,
        .woocommerce-page .yith-woo-ajax-navigation ul.yith-wcan-color li.chosen a:hover,
        .woocommerce-page .yith-woo-ajax-navigation ul.yith-wcan-color li.chosen span,
        .woocommerce-page .yith-woo-ajax-navigation ul.yith-wcan-color li.chosen span:hover { border-color: #ccc; }
    <?php else : ?>
        .add-links .add_to_cart_button.loading.viewcart-style-1:after,
        .yith-wcwl-add-to-wishlist span.ajax-loading,
        .add-links .quickview.loading:after,
        .wcml-switcher li.loading,
        ul.product_list_widget li .ajax-loading,
        .widget ul.product_list_widget li .ajax-loading { background-color: #fff; }
    <?php endif; ?>
<?php endif; ?>

#header.sticky-header .header-main.sticky,
#header.sticky-header .main-menu-wrap,
.fixed-header #header.sticky-header .main-menu-wrap { box-shadow: 0 1px 0 0 <?php echo $dark ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)'; ?>; }
#mini-cart .cart-popup .widget_shopping_cart_content { background: <?php echo if_dark( $color_dark_3, '#fff' ); ?>; }
.mega-menu li.menu-item > a > .thumb-info-preview .thumb-info-wrapper,
.sidebar-menu li.menu-item > a > .thumb-info-preview .thumb-info-wrapper { background: <?php echo if_dark( $color_dark_4, '#fff' ); ?>; }
.mega-menu .wide .popup > .inner,
.sidebar-menu .wide .popup > .inner { background: <?php echo if_dark( $color_dark_3, '#fff' ); ?>; }
.mega-menu .wide .popup > .inner > ul.sub-menu > li.menu-item > a,
.sidebar-menu .wide .popup > .inner > ul.sub-menu > li.menu-item > a { color: <?php echo if_dark( '#fff', '#333' ); ?>; }
.mega-menu .wide .popup > .inner > ul.sub-menu > li.menu-item li.menu-item > a:hover { background: <?php echo if_dark( $portoColorLib->lighten($color_dark_3, 5), '#f4f4f4' ); ?>; }
@media (max-width: 991px) {
    .mobile-sidebar,
    .mobile-sidebar .sidebar-toggle { background: <?php echo if_dark( $dark_bg, '#fff' ); ?>; }
}
.widget_sidebar_menu .widget-title .toggle { color: <?php echo if_dark( '#999', '#ccc' ); ?>; background: <?php echo if_dark( $color_dark, '#fff' ); ?>; border: 1px solid <?php echo $dark ? $color_dark_3 : 'ccc'; ?>; }
.sidebar-menu > li.menu-item > a,
.sidebar-menu .menu-custom-block a { border-top: 1px solid <?php echo if_dark( $portoColorLib->lighten( $dark_bg, 12 ), '#ddd' ); ?>; }
.blog-posts article { border-bottom: 1px solid <?php echo if_dark( $color_dark_3, '#ddd' ); ?>; }
.posts-grid .grid-box { border: 1px solid <?php echo if_dark( $color_dark_3, '#e5e5e5' ); ?>; background: <?php echo if_dark( $color_dark_3, '#fff' ); ?>; }
article.post .post-date .day,
.post-item .post-date .day,
ul.comments .comment-block { background: <?php echo if_dark( $color_dark_3, '#f4f4f4' ); ?>; }
.post-item-small { border-top: 1px solid <?php echo if_dark( $color_dark_3, '#ececec' ); ?>; }
.post-block,
.post-share,
article.post .comment-respond,
article.portfolio .comment-respond { border-top: 1px solid <?php echo if_dark( $color_dark_3, '#ddd' ); ?>; }
ul.comments .comment-arrow { border-<?php echo $right; ?>: 15px solid <?php echo if_dark( $color_dark_3, '#f4f4f4' ); ?>; }
@media (max-width: 767px) {
    ul.comments ul.children { border-<?php echo $left; ?>: 8px solid <?php echo if_dark( $color_dark_3, '#ddd' ); ?>; }
}
.vc_progress_bar .vc_single_bar.progress,
.progress { background: <?php echo if_dark( $color_dark_4, '#fafafa' ); ?>; }
.btn-default { color: <?php echo if_dark( '#777', '#666' ); ?>; }
input[type="submit"].btn-default { color: <?php echo if_dark( '#666', '#333' ); ?>; }
.btn-default.btn:hover { color: <?php echo if_dark( '#777', '#333' ); ?>; }
.owl-carousel.top-border { border-top: 1px solid <?php echo if_dark( '#3F4247', '#dbdbdb' ); ?>; }
.slick-slider .slick-dots li i { color: <?php echo if_dark( $color_dark_4.'!important', '#d6d6d6' ); ?>; }
.porto-ajax-loading:after { background-color: <?php echo if_dark( $dark_bg, '#fff' ); ?>; }
hr.solid,
.divider.divider-solid,
.vc_separator .vc_sep_holder.vc_sep_holder_l .vc_sep_line.solid,
.vc_separator .vc_sep_holder.vc_sep_holder_r .vc_sep_line.solid { background: <?php echo if_dark( 'rgba(255, 255, 255, 0.15)', 'rgba(0, 0, 0, 0.15)' ); ?>; }
.divider i { background: <?php echo if_dark( $color_dark, '#fff' ); ?>; }
.divider.divider-style-2 i { background: <?php echo if_dark( $color_dark_2, '#f4f4f4' ); ?>; }
.divider.divider-style-3 i,
.divider.divider-style-4 i { border: 1px solid <?php echo if_dark( '#3f4247', '#cecece' ); ?>; }
.divider.divider-style-4 i:after { border: 3px solid <?php echo if_dark( $color_dark_2, '#f4f4f4' ); ?>; }
.divider.divider-small hr { background: <?php echo if_dark( '#3f4247', '#555' ); ?>; }
.divider.divider-small.divider-light hr { background: <?php echo if_dark( '#3f4247', '#ddd' ); ?>; }
hr.dashed:after,
.divider.dashed:after,
.vc_separator .vc_sep_holder.vc_sep_holder_l .vc_sep_line.dashed:after,
.vc_separator .vc_sep_holder.vc_sep_holder_r .vc_sep_line.dashed:after { border: 1px dashed <?php echo if_dark( 'rgba(255, 255, 255, 0.15)', 'rgba(0, 0, 0, 0.15)' ); ?>; }
.stats-block.counter-with-border,
blockquote.with-borders,
.vc_general.vc_cta3.vc_cta3-style-custom { border-top: 1px solid <?php echo if_dark( $color_dark_4, '#dfdfdf' ); ?>; border-bottom: 1px solid <?php echo if_dark( $color_dark_4, '#dfdfdf' ); ?>; border-left: 1px solid <?php echo if_dark( $color_dark_3, '#ececec' ); ?>; border-right: 1px solid <?php echo if_dark( $color_dark_3, '#ececec' ); ?>; }
.featured-box { background: <?php echo if_dark( $color_dark_4, '#f5f5f5' ); ?>; border-bottom: 1px solid <?php echo if_dark( $color_dark_4, '#dfdfdf' ); ?>; border-left: 1px solid <?php echo if_dark( $color_dark_4, '#ececec' ); ?>; border-right: 1px solid <?php echo if_dark( $color_dark_4, '#ececec' ); ?>; }
<?php if ( !$dark ) : ?>
    .featured-box { background:- webkit-linear-gradient(top, #fff 1%, #f9f9f9 98%) repeat scroll 0 0 #f5f5f5;background:linear-gradient(to bottom, #fff 1%, #f9f9f9 98%) repeat scroll 0 0 #f5f5f5; }
<?php endif; ?>
.resp-tab-content { border: 1px solid <?php echo $dark ? $color_dark_4 : '#eee'; ?>; }
.featured-boxes-style-6 .featured-box .icon-featured,
.feature-box.feature-box-style-6 .feature-box-icon,
.aio-icon-component.featured-icon .aio-icon { border: 1px solid <?php echo $dark ? $color_dark_4 : '#cecece'; ?>; }
.featured-boxes-style-6 .featured-box .icon-featured:after { border: 5px solid <?php echo $dark ? $color_dark_4 : '#f4f4f4'; ?>; }
.featured-boxes-flat .featured-box .box-content,
.featured-boxes-style-8 .featured-box .icon-featured { background: <?php echo if_dark( $color_dark_4, '#fff' ); ?>; }
.featured-boxes-style-3 .featured-box .icon-featured,
body #wp-link-wrap { background: <?php echo if_dark( $color_dark, '#fff' ); ?>; }
.featured-boxes-style-5 .featured-box .box-content h4,
.featured-boxes-style-6 .featured-box .box-content h4,
.featured-boxes-style-7 .featured-box .box-content h4 { color: <?php echo if_dark( '#fff', $color_dark_4 ); ?>; }
.featured-boxes-style-5 .featured-box .icon-featured,
.featured-boxes-style-6 .featured-box .icon-featured,
.featured-boxes-style-7 .featured-box .icon-featured { background: <?php echo if_dark( $color_dark_3, '#fff' ); ?>; border: 1px solid <?php echo if_dark( $color_dark_4, '#dfdfdf' ); ?>; }
.featured-box-effect-1 .icon-featured:after { box-shadow: 0 0 0 3px <?php echo if_dark( $color_dark_4, '#fff' ); ?>; }
.feature-box.feature-box-style-2 h4,
.feature-box.feature-box-style-3 h4,
.feature-box.feature-box-style-4 h4 { color: <?php echo if_dark( '#fff', $color_dark ); ?>; }
.feature-box.feature-box-style-6 .feature-box-icon:after,
.aio-icon-component.featured-icon .aio-icon:after { border: 3px solid <?php echo $dark ? $color_dark_4 : '#f4f4f4'; ?>; }
<?php echo $input_lists; ?>,
textarea,
.form-control,
select { background: <?php echo if_dark( $color_dark_3, '#fff' ); ?>; color: <?php echo if_dark( '#999', '#777' ); ?>; border-color: <?php echo if_dark( $color_dark_3, '#ccc' ); ?>; }
.form-control:focus { border-color: <?php echo if_dark( $color_dark_4, '#ccc' ); ?>; }
body #wp-link-wrap #link-modal-title { background: <?php echo if_dark( $color_dark_4, '#fcfcfc' ); ?>; border-bottom: 1px solid <?php echo if_dark( $color_dark_4, '#dfdfdf' ); ?>; }
body #wp-link-wrap .submitbox { background: <?php echo if_dark( $color_dark_4, '#fcfcfc' ); ?>; border-top: 1px solid <?php echo if_dark( $color_dark_4, '#dfdfdf' ); ?>; }
.heading.heading-bottom-border h1 { border-bottom: 5px solid <?php echo if_dark( '#3f4247', '#dbdbdb' ); ?>; padding-bottom: 10px; }
.heading.heading-bottom-border h2,
.heading.heading-bottom-border h3 { border-bottom: 2px solid <?php echo if_dark( '#3f4247', '#dbdbdb' ); ?>; padding-bottom: 10px; }
.heading.heading-bottom-border h4,
.heading.heading-bottom-border h5,
.heading.heading-bottom-border h6 { border-bottom: 1px solid <?php echo if_dark( '#3f4247', '#dbdbdb' ); ?>; padding-bottom: 5px; }
.heading.heading-bottom-double-border h1,
.heading.heading-bottom-double-border h2,
.heading.heading-bottom-double-border h3 { border-bottom: 3px double <?php echo if_dark( '#3f4247', '#dbdbdb' ); ?>; padding-bottom: 10px; }
.heading.heading-bottom-double-border h4,
.heading.heading-bottom-double-border h5,
.heading.heading-bottom-double-border h6 { border-bottom: 3px double <?php echo if_dark( '#3f4247', '#dbdbdb' ); ?>; padding-bottom: 5px; }
.heading.heading-middle-border:before { border-top: 1px solid <?php echo if_dark( '#3f4247', '#dbdbdb' ); ?>; }
.heading.heading-middle-border h1,
.heading.heading-middle-border h2,
.heading.heading-middle-border h3,
.heading.heading-middle-border h4,
.heading.heading-middle-border h5,
.heading.heading-middle-border h6,
.dialog { background: <?php echo if_dark( $color_dark, '#fff' ); ?>; }
h1, h2, h3, h4, h5, h6 { color: <?php echo if_dark( '#fff', $color_dark ); ?>; }
.popup-inline-content,
.mfp-content .ajax-container,
.loading-overlay { background: <?php echo if_dark( $dark_bg, '#fff' ); ?>; }
.fontawesome-icon-list > div,
.sample-icon-list > div { color: <?php echo if_dark( '#ddd', '#222' ); ?>; }
.content-grid .content-grid-item:before { border-left: 1px solid <?php echo if_dark( $color_dark_4, '#dadada' ); ?>; }
.content-grid .content-grid-item:after { border-bottom: 1px solid <?php echo if_dark( $color_dark_4, '#dadada' ); ?>; }
.content-grid.content-grid-dashed .content-grid-item:before { border-left: 1px dashed <?php echo if_dark( $color_dark_4, '#dadada' ); ?>; }
.content-grid.content-grid-dashed .content-grid-item:after { border-bottom: 1px dashed <?php echo if_dark( $color_dark_4, '#dadada' ); ?>; }
ul.nav-list li a, ul[class^="wsp-"] li a { border-bottom: 1px solid <?php echo if_dark( $color_dark_3, '#ededde' ); ?>; }
ul.nav-list li a:before, ul[class^="wsp-"] li a:before { border-<?php echo $left; ?>-color: <?php echo if_light( '#333', '#555' ); ?>; }
ul.nav-list li a:hover, ul[class^="wsp-"] li a:hover { background-color: <?php echo if_dark( $color_dark_3, '#eee' ); ?>; text-decoration: none; }
ul.nav-list.show-bg-active .active > a,
ul.nav-list.show-bg-active a.active,
ul[class^="wsp-"].show-bg-active .active > a,
ul[class^="wsp-"].show-bg-active a.active { background-color: <?php echo if_light( '#f5f5f5', $color_dark_4 ); ?>; }
ul.nav-list.show-bg-active .active > a:hover,
ul.nav-list.show-bg-active a.active:hover,
ul[class^="wsp-"].show-bg-active .active > a:hover,
ul[class^="wsp-"].show-bg-active a.active:hover { background-color: <?php echo if_light( '#eee', $color_dark_3 ); ?>; }
.page-wrapper .fdm-item-image { background-color: <?php echo if_light( '#fff', $color_dark_3 ); ?>; border: 1px solid <?php echo if_light( '#ddd', $color_dark_3 ); ?>; padding: 0; }
.pricing-table li { border-top: 1px solid <?php echo if_light( '#ddd', $color_dark_2 ); ?>; }
.pricing-table h3 { background-color: <?php echo if_light( '#eee', $color_dark_2 ); ?>; }
.pricing-table h3 span { background: <?php echo if_light( '#fff', $color_dark_3 ); ?>; border: 5px solid <?php echo if_light( '#fff', $color_dark_5 ); ?>; box-shadow: 0 5px 20px <?php echo if_light( '#ddd', $color_dark_5 ); ?> inset, 0 3px 0 <?php echo if_light( '#999', $color_dark_3 ); ?> inset; }
.pricing-table .most-popular { border: 3px solid <?php echo if_light( '#ccc', $color_dark_3 ); ?>; }
.pricing-table .most-popular h3 { background-color: <?php echo if_light( '#666', $color_dark_3 ); ?>; text-shadow: <?php echo if_light( '0 1px #555', 'none' ); ?>; }
.pricing-table .plan-ribbon { background-color: <?php echo if_light( '#bfdc7a', $color_dark_3 ); ?>; }
.pricing-table .plan { background: <?php echo if_light( '#fff', $color_dark_3 ); ?>; border: 1px solid <?php echo if_light( '#ddd', $color_dark_3 ); ?>; text-shadow: <?php echo if_light( '0 1px rgba(255, 255, 255, 0.8)', 'none' ); ?>; }
.pricing-table.pricing-table-sm h3 span { border: 3px solid <?php echo if_light( '#fff', $color_dark_5 ); ?>; box-shadow: 0 5px 20px <?php echo if_light( '#ddd', $color_dark_5 ); ?> inset, 0 3px 0 <?php echo if_light( '#999', $color_dark_3 ); ?> inset; }
.pricing-table.pricing-table-flat .plan-btn-bottom li:last-child { border-bottom: 1px solid <?php echo if_light( '#ddd', $color_dark_2 ); ?>; }
.section { background-color: <?php echo if_light( '#f4f4f4', $color_dark_2 ); ?>; border-top: 5px solid <?php echo if_light( '#f1f1f1', $color_dark_3 ); ?>; }
.porto-map-section .map-content { background-color: <?php echo if_light( 'rgba(244, 244, 244, 0.8)', 'rgba(33, 38, 45, 0.8)' ); ?>; border-top: 5px solid <?php echo if_light( 'rgba(241, 241, 241, 0.8)', 'rgba(40, 45, 54, 0.8)' ); ?>; }
#revolutionSliderCarousel { border-top: 1px solid <?php echo if_light( 'rgba(0, 0, 0, 0.15)', 'rgba(255, 255, 255, 0.15)' ); ?>; border-bottom: 1px solid <?php echo if_light( 'rgba(0, 0, 0, 0.15)', 'rgba(255, 255, 255, 0.15)' ); ?>; }
@media (max-width: 767px) {
    .resp-tab-content,
    .resp-vtabs .resp-tab-content { border-color: <?php echo if_light( '#ddd', $color_dark_4 ); ?>; }
}
.resp-tabs-list { border-bottom: 1px solid <?php echo if_light( '#eee', $color_dark_4 ); ?>; }
.resp-tabs-list li,
.resp-tabs-list li:hover,
.nav-tabs li .nav-link,
.nav-tabs li .nav-link:hover { background: <?php echo if_light( '#f4f4f4', $color_dark_3 ); ?>; border-left: 1px solid <?php echo if_light( '#eee', $color_dark_3 ); ?>; border-right: 1px solid <?php echo if_light( '#eee', $color_dark_3 ); ?>; border-top: 3px solid <?php echo if_light( '#eee', $color_dark_3 ); ?>; }
.resp-tabs-list li.resp-tab-active { background: <?php echo if_light( '#fff', $color_dark_4 ); ?>; border-left: 1px solid <?php echo if_light( '#eee', $color_dark_4 ); ?>; border-right: 1px solid <?php echo if_light( '#eee', $color_dark_4 ); ?>; }
.resp-vtabs .resp-tabs-container { border: 1px solid <?php echo if_light( '#eee', $color_dark_4 ); ?>; background: <?php echo if_light( '#fff', $color_dark_4 ); ?>; }
.resp-vtabs .resp-tabs-list li:first-child { border-top: 1px solid <?php echo if_light( '#eee', $color_dark_4 ); ?> !important; }
.resp-vtabs .resp-tabs-list li:last-child { border-bottom: 1px solid <?php echo if_light( '#eee', $color_dark_4 ); ?> !important; }
.resp-vtabs .resp-tabs-list li,
.resp-vtabs .resp-tabs-list li:hover { border-<?php echo $left; ?>: 3px solid <?php echo if_light( '#eee', $color_dark_4 ); ?>; }
.resp-vtabs .resp-tabs-list li.resp-tab-active { background: <?php echo if_light( '#fff', $color_dark_4 ); ?>; }
h2.resp-accordion { background: <?php echo if_light( '#f5f5f5', $color_dark_3 ); ?> !important; border-color: <?php echo if_light( '#ddd', $color_dark_4 ); ?>; }
h2.resp-accordion:first-child { border-top-color: <?php echo if_light( '#ddd', $color_dark_4 ); ?> !important; }
h2.resp-tab-active { background: <?php echo if_light( '#f5f5f5', $color_dark_3 ); ?> !important; border-bottom: 1px solid <?php echo if_light( '#ddd', $color_dark_3 ); ?> !important; }
.resp-easy-accordion .resp-tab-content { border-color: <?php echo if_light( '#ddd', $color_dark_4 ); ?>; background: <?php echo if_light( '#fff', $color_dark_4 ); ?>; }
.resp-easy-accordion .resp-tab-content:last-child { border-color: <?php echo if_light( '#ddd', $color_dark_3 ); ?> !important; }
.nav-tabs { border-bottom-color: <?php echo if_light( '#eee', $color_dark_3 ); ?>; }
.nav-tabs li .nav-link:hover { border-top-color: <?php echo if_light( '#ccc', '#808697' ); ?>; }
.nav-tabs li.active a,
.nav-tabs li.active a:hover,
.nav-tabs li.active a:focus { background: <?php echo if_light( '#fff', $color_dark_4 ); ?>; border-left-color: <?php echo if_light( '#eee', $color_dark_4 ); ?>; border-right-color: <?php echo if_light( '#eee', $color_dark_4 ); ?>; border-top: 3px solid <?php echo if_light( '#ccc', '#808697' ); ?>; }
.tab-content { background: <?php echo if_light( '#fff', $color_dark_4 ); ?>; border-color: <?php echo if_light( '#eee', $color_dark_4 ); ?>; }
.tabs.tabs-bottom .tab-content,
.tabs.tabs-bottom .nav-tabs { border-bottom: none; border-top: 1px solid <?php echo if_light( '#eee', $color_dark_4 ); ?>; }
.tabs.tabs-bottom .nav-tabs li .nav-link { border-bottom-color: <?php echo if_light( '#eee', $color_dark_3 ); ?>; border-top: 1px solid <?php echo if_light( '#eee', $color_dark_4 ); ?> !important; }
.tabs.tabs-bottom .nav-tabs li .nav-link:hover { border-bottom-color: <?php echo if_light( '#ccc', '#808697' ); ?>; }
.tabs.tabs-bottom .nav-tabs li.active a,
.tabs.tabs-bottom .nav-tabs li.active a:hover,
.tabs.tabs-bottom .nav-tabs li.active a:focus { border-bottom: 3px solid <?php echo if_light( '#ccc', '#808697' ); ?>; border-top-color: transparent !important; }
.tabs-vertical { border-top-color: <?php echo if_light( '#eee', $color_dark_4 ); ?>; }
.tabs-left .nav-tabs > li:last-child .nav-link,
.tabs-right .nav-tabs > li:last-child .nav-link,
.nav-tabs.nav-justified li .nav-link,
.nav-tabs.nav-justified li .nav-link:hover,
.nav-tabs.nav-justified li .nav-link:focus { border-bottom: 1px solid <?php echo if_light( '#eee', $color_dark_3 ); ?>; }
.tabs-left .nav-tabs > li .nav-link { border-<?php echo $right; ?>: 1px solid <?php echo if_light( '#eee', $color_dark_3 ); ?>; border-<?php echo $left; ?>: 3px solid <?php echo if_light( '#eee', $color_dark_3 ); ?>; }
.tabs-left .nav-tabs > li.active .nav-link,
.tabs-left .nav-tabs > li.active .nav-link:hover,
.tabs-left .nav-tabs > li.active .nav-link:focus { border-<?php echo $right; ?>-color: <?php echo if_light( '#fff', $color_dark_4 ); ?>; }
.tabs-right .nav-tabs > li .nav-link { border-<?php echo $right; ?>: 3px solid <?php echo if_light( '#eee', $color_dark_3 ); ?>; border-<?php echo $left; ?>: 1px solid <?php echo if_light( '#eee', $color_dark_3 ); ?>; }
.tabs-right .nav-tabs > li.active .nav-link,
.tabs-right .nav-tabs > li.active .nav-link:hover,
.tabs-right .nav-tabs > li.active .nav-link:focus { border-<?php echo $left; ?>-color: <?php echo if_light( '#fff', $color_dark_4 ); ?>; }
.nav-tabs.nav-justified li.active .nav-link,
.nav-tabs.nav-justified li.active .nav-link:hover,
.nav-tabs.nav-justified li.active .nav-link:focus { background: <?php echo if_light( '#fff', $color_dark_4 ); ?>; border-left-color: <?php echo if_light( '#eee', $color_dark_4 ); ?>; border-right-color: <?php echo if_light( '#eee', $color_dark_4 ); ?>; border-top-width: 3px; border-bottom: 1px solid <?php echo if_light( '#fff', $color_dark_4 ); ?>; }
.tabs.tabs-bottom .nav.nav-tabs.nav-justified li .nav-link { border-top: 1px solid <?php echo if_light( '#eee', $color_dark_3 ); ?>; }
.tabs.tabs-bottom .nav.nav-tabs.nav-justified li.active .nav-link,
.tabs.tabs-bottom .nav.nav-tabs.nav-justified li.active .nav-link:hover,
.tabs.tabs-bottom .nav.nav-tabs.nav-justified li.active .nav-link:focus { border-top: 1px solid <?php echo if_light( '#fff', $color_dark_4 ); ?>; }
.tabs-navigation .nav-tabs > li:first-child .nav-link { border-top: 1px solid <?php echo if_light( '#eee', $color_dark_4 ); ?> !important; }
.tabs-navigation .nav-tabs > li.active .nav-link,
.tabs-navigation .nav-tabs > li.active .nav-link:hover,
.tabs-navigation .nav-tabs > li.active .nav-link:focus { border-left-color: <?php echo if_light( '#eee', $color_dark_4 ); ?>; border-right-color: <?php echo if_light( '#eee', $color_dark_4 ); ?>; }
.tabs.tabs-simple .nav-tabs > li .nav-link,
.tabs.tabs-simple .nav-tabs > li .nav-link:hover,
.tabs.tabs-simple .nav-tabs > li .nav-link:focus { border-bottom-color: <?php echo if_light( '#eee', $color_dark_4 ); ?>; }
.testimonial .testimonial-author strong { color: <?php echo if_light( '#111', '#fff' ); ?>; }
.testimonial.testimonial-style-3 blockquote { background: <?php echo if_light( '#f2f2f2', $color_dark_4 ); ?>; }
.testimonial.testimonial-style-3 .testimonial-arrow-down { border-top: 10px solid <?php echo if_light( '#f2f2f2', $color_dark_4 ); ?> !important; }
.testimonial.testimonial-style-4 { border-top-color: <?php echo if_light( '#dfdfdf', $color_dark_4 ); ?>; border-bottom-color: <?php echo if_light( '#dfdfdf', $color_dark_4 ); ?>; border-left-color: <?php echo if_light( '#ececec', $color_dark_4 ); ?>; border-right-color: <?php echo if_light( '#ececec', $color_dark_4 ); ?>; }
.testimonial.testimonial-style-5 .testimonial-author { border-top: 1px solid <?php echo if_light( '#f2f2f2', $color_dark_4 ); ?>; }
.thumb-info { background-color: <?php echo if_light( '#fff', $color_dark_3 ); ?>; border-color: <?php echo if_light( '#ddd', $color_dark_3 ); ?>; }
.thumb-info .thumb-info-wrapper:after { background: <?php echo if_light( 'rgba(23, 23, 23, 0.8)', 'rgba('. $portoColorLib->hexToRGB( $color_dark ) .', 0.9)' ); ?>; }
.thumb-info.thumb-info-bottom-info:not(.thumb-info-bottom-info-dark) .thumb-info-title { background: <?php echo if_light( '#fff', $color_dark ); ?>; }
.thumb-info-side-image { border: 1px solid <?php echo if_light( '#ddd', $color_dark_3 ); ?>; }
.thumb-info-social-icons { border-top: <?php echo if_light( '1px dotted #ddd', '1px solid ' . $portoColorLib->lighten( $dark_bg, 12 ) ); ?>; }
section.timeline .timeline-date { border: 1px solid <?php echo if_light( '#e5e5e5', $color_dark_3 ); ?>; background: <?php echo if_light( '#fff', $color_dark_3 ); ?>; text-shadow: <?php echo if_light( '0 1px 1px #fff', 'none' ); ?>; }
section.timeline .timeline-title { background: <?php echo if_light( '#f4f4f4', $color_dark_3 ); ?>; }
section.timeline .timeline-box { border: 1px solid <?php echo if_light( '#e5e5e5', $color_dark_3 ); ?>; background: <?php echo if_light( '#fff', $color_dark_3 ); ?>; }
section.timeline .timeline-box.left:before,
section.timeline .timeline-box.right:before { box-shadow: <?php echo if_light( '0 0 0 3px #fff, 0 0 0 6px #e5e5e5', '0 0 0 3px '. $color_dark_3 .', 0 0 0 6px '. $color_dark_3 .' !important' ); ?>; background: <?php echo if_light( '#e5e5e5', $color_dark_3 ); ?>; }
section.timeline .timeline-box.left:after { background: <?php echo if_light( '#fff', $color_dark_3 ); ?>; border-<?php echo $right; ?>: 1px solid <?php echo if_light( '#e5e5e5', $color_dark_3 ); ?>; border-top: 1px solid <?php echo if_light( '#e5e5e5', $color_dark_3 ); ?>; }
section.timeline .timeline-box.right:after { background: <?php echo if_light( '#fff', $color_dark_3 ); ?>; border-<?php echo $left; ?>: 1px solid <?php echo if_light( '#e5e5e5', $color_dark_3 ); ?>; border-bottom: 1px solid <?php echo if_light( '#e5e5e5', $color_dark_3 ); ?>; }
section.exp-timeline .timeline-box.right:after { border: none; }
.toggle > label { background: <?php echo if_light( '#f4f4f4', $color_dark_4 ); ?>; }
.toggle > label:hover { background: <?php echo if_light( '#f5f5f5', $color_dark_3 ); ?>; }
.toggle.active > label { background: <?php echo if_light( '#f4f4f4', $color_dark_3 ); ?>; }
.toggle-simple .toggle > label,
.toggle-simple .toggle.active > label { color: <?php echo if_light( $color_dark, '#fff' ); ?>; }
div.wpb_single_image .vc_single_image-wrapper.vc_box_shadow_border,
div.wpb_single_image .vc_single_image-wrapper.vc_box_shadow_border_circle,
.product-image,
.product-image .viewcart,
.product-image .stock { background: <?php echo if_light( '#fff', $color_dark_3 ); ?>; }
div.wpb_single_image .vc_single_image-wrapper.vc_box_outline.vc_box_border_grey,
div.wpb_single_image .vc_single_image-wrapper.vc_box_outline_circle.vc_box_border_grey { background: <?php echo if_light( '#fff', $color_dark_3 ); ?>; border-color: <?php echo if_light( '#ddd', $color_dark_3 ); ?>; }
.toggle-simple .toggle.active > label { color: <?php echo if_light( $color_dark, '#fff' ); ?>; }
.porto-links-block .links-title { color: <?php echo if_light( '#465157', '#fff' ); ?>; }
.porto-links-block li.porto-links-item > a,
.porto-links-block li.porto-links-item > span { border-top: 1px solid <?php echo if_light( '#ddd', $portoColorLib->lighten( $dark_bg, 12 ) ); ?>; }
.widget > div > ul,
.widget > ul { border-bottom-color: <?php echo if_light( '#ededed', $color_dark_3 ); ?>; }
.widget > div > ul li,
.widget > ul li { border-top-color: <?php echo if_light( '#ededed', $color_dark_3 ); ?>; }
.widget_recent_entries > ul li:before,
.widget_recent_comments > ul li:before,
.widget_pages > ul li:before,
.widget_meta > ul li:before,
.widget_nav_menu > div > ul li:before,
.widget_archive > ul li:before,
.widget_categories > ul li:before,
.widget_rss > ul li:before { border-<?php echo $left; ?>: 4px solid <?php echo if_light( '#333', '#555' ); ?>; }
.widget .tagcloud a { border: 1px solid <?php echo if_light( '#ccc', $color_dark_4 ); ?>; background: <?php echo if_light( '#efefef', $color_dark_4 ); ?>; }
.flickr_badge_image,
.wpb_content_element .flickr_badge_image { background: <?php echo if_light( '#fff', $color_dark_3 ); ?>; }
.sidebar-content .widget.widget_wysija, .sidebar-content .wpcf7-form .widget_wysija { background: <?php echo if_light( '#f4f4f4', $color_dark_4 ); ?>; }
.tm-collapse .tm-section-label { background: <?php echo if_light( '#f5f5f5', $color_dark_3 ); ?>; }
.tm-box { border: 1px solid <?php echo if_light( '#ddd', $color_dark_3 ); ?>; }
body.boxed .page-wrapper,
#content-top,
#content-bottom,
.member-item.member-item-3 .thumb-info-caption { background: <?php echo if_light( '#fff', $color_dark ); ?>; }
body { background: <?php echo if_light( '#fff', '#000' ); ?>; }
#main { background: <?php echo if_light( '#fff', $dark_bg ); ?>; }
.member-share-links { border-top: 1px solid <?php echo if_light( '#ddd', $portoColorLib->lighten( $color_dark, 12 ) ); ?>; }
body .menu-ads-container { background: <?php echo if_light( '#f6f6f6', $color_dark_4 ); ?>; border: 2px solid <?php echo if_light( '#fff', $color_dark_3 ); ?>; }
body .menu-ads-container .vc_column_container { border-<?php echo $left; ?>: 2px solid <?php echo if_light( '#fff', $color_dark_3 ); ?>; }
.portfolio-info ul li { border-<?php echo $right; ?>: 1px solid <?php echo if_light( '#e6e6e6', $color_dark_4 ); ?>; }
<?php if ( class_exists( 'Woocommerce' ) ) : ?>
    .add-links .add_to_cart_button,
    .add-links .add_to_cart_read_more { border: 1px solid <?php echo if_light( '#ccc', '#777' ); ?>; color: <?php echo if_light( '#2b2b2b', '#ddd' ); ?>; }
    @media (max-width: 575px) {
        .commentlist li .comment_container { background: <?php echo if_light( '#f5f7f7', $color_dark_3 ); ?>; }
    }
    .commentlist li .comment-text { background: <?php echo if_light( '#f5f7f7', $color_dark_3 ); ?>; }
    .product-image .stock { background: <?php echo if_light( 'rgba(255, 255, 255, .9)', 'rgba(0, 0, 0, .9)' ); ?>; }
    .shop_table { border: 1px solid <?php echo if_light( '#dcdcdc', $color_dark_3 ); ?>; }
    .shop_table td,
    .shop_table tbody th,
    .shop_table tfoot th { border-<?php echo $left; ?>: 1px solid <?php echo if_light( '#dcdcdc', $color_dark_3 ); ?>; border-top: 1px solid <?php echo if_light( '#ddd', $color_dark_3 ); ?>; }
    .shop_table th { background: <?php echo if_light( '#f6f6f6', $color_dark_3 ); ?>; }
    @media (max-width: 767px) {
        .shop_table.shop_table_responsive tr,
        .shop_table.responsive tr,
        .shop_table.shop_table_responsive tfoot tr:first-child,
        .shop_table.responsive tfoot tr:first-child { border-top: 1px solid <?php echo if_light( '#ddd', $color_dark_3 ); ?>; }
    }
    .featured-box .shop_table .quantity input.qty { border-color: <?php echo if_light( '#c8bfc6', 'transparent' ); ?>; }
    .featured-box .shop_table .quantity .minus,
    .featured-box .shop_table .quantity .plus { background: <?php echo if_light( '#f4f4f4', $color_dark_2 ); ?>; border-color: <?php echo if_light( '#c8bfc6', 'transparent' ); ?>; }
    .chosen-container-single .chosen-single,
    .woocommerce-checkout .form-row .chosen-container-single .chosen-single,
    .select2-container .select2-choice { background: <?php echo if_light( '#fff', $color_dark_3 ); ?>; border-color: <?php echo if_light( '#ccc', $color_dark_3 ); ?>; }
    .chosen-container-active.chosen-with-drop .chosen-single,
    .select2-container-active .select2-choice,
    .select2-drop,
    .select2-drop-active { border-color: <?php echo if_light( '#ccc', $color_dark_3 ); ?>; }
    .select2-drop .select2-results,
    .select2-drop-active .select2-results,
    .form-row input[type="email"], .form-row input[type="number"], .form-row input[type="password"], .form-row input[type="search"], .form-row input[type="tel"], .form-row input[type="text"], .form-row input[type="url"], .form-row input[type="color"], .form-row input[type="date"], .form-row input[type="datetime"], .form-row input[type="datetime-local"], .form-row input[type="month"], .form-row input[type="time"], .form-row input[type="week"], .form-row select, .form-row textarea { background: <?php echo if_light( '#fff', $color_dark_3 ); ?>; }
    .woocommerce-account .woocommerce-MyAccount-navigation ul li a { border-bottom: 1px solid <?php echo if_light( '#ededde', $color_dark_3 ); ?>; }
    .woocommerce-account .woocommerce-MyAccount-navigation ul li a:before { border-<?php echo $left; ?>: 4px solid <?php echo if_light( '#333', '#555' ); ?>; }
    .woocommerce-account .woocommerce-MyAccount-navigation ul li.is-active > a { background-color: <?php echo if_light( '#f5f5f5', $color_dark_4 ); ?>; }
    .woocommerce-account .woocommerce-MyAccount-navigation ul li a:hover,
    .woocommerce-account .woocommerce-MyAccount-navigation ul li.is-active > a:hover { background-color: <?php echo if_light( '#eee', $color_dark_3 ); ?>; }
    .order-info mark { color: <?php echo if_light( '#000', '#fff' ); ?>; }
    #yith-wcwl-popup-message { background: <?php echo if_light( '#fff', $dark_bg ); ?>; }
    .product_title,
    .product_title a { color: <?php echo if_light( '#555', '#fff' ); ?>; }
    #reviews .commentlist li .comment-text:before { border-<?php echo $right; ?>: 15px solid <?php echo if_light( '#f5f7f7', $color_dark_3 ); ?>; }
    div.quantity .minus,
    div.quantity .plus { background: <?php echo if_light( 'transparent', $color_dark_3 ); ?>; border-color: <?php echo if_light( $input_border_color, $color_dark_3 ); ?>; }
    .star-rating:before { color: <?php echo if_light( 'rgba(0,0,0,0.16)', 'rgba(255,255,255,0.13)' ); ?>; }
    .wcvashopswatchlabel { border: 1px solid <?php echo if_light( '#fff', $color_dark_3 ); ?>; box-shadow: 0 0 0 1px <?php echo if_light( '#ccc', '#444' ); ?>; }
    .wcvaswatchinput.active .wcvashopswatchlabel { border: 1px solid <?php echo if_light( '#000', '#ccc' ); ?>; }
    .wcvaswatchlabel { border: 2px solid <?php echo if_light( '#fff', $color_dark_3 ); ?>; box-shadow: 0 0 0 1px <?php echo if_light( '#ccc', '#444' ); ?>; }
    .wcvaswatch input:checked + .wcvaswatchlabel { border: 2px solid <?php echo if_light( '#000', '#ccc' ); ?>; box-shadow: 0 0 0 0 <?php echo if_light( '#000', '#ccc' ); ?>; }
    .widget_product_categories .widget-title .toggle,
    .widget_price_filter .widget-title .toggle,
    .widget_layered_nav .widget-title .toggle,
    .widget_layered_nav_filters .widget-title .toggle,
    .widget_rating_filter .widget-title .toggle { color: <?php echo if_light( $input_border_color, '#999' ); ?>; }
    .woocommerce .yith-woo-ajax-navigation ul.yith-wcan-label li a,
    .woocommerce-page .yith-woo-ajax-navigation ul.yith-wcan-label li a { border: 1px solid <?php echo if_light( '#e9e9e9', $color_dark ); ?>; background: <?php echo if_light( '#fff', $color_dark ); ?>; }
    .widget_recent_reviews .product_list_widget li img,
    .widget.widget_recent_reviews .product_list_widget li img { background: <?php echo if_light( '#fff', $color_dark_3 ); ?>; }
    .woocommerce table.shop_table.wishlist_table tbody td,
    .woocommerce table.shop_table.wishlist_table tfoot td { border-color: <?php echo if_light( '#ddd', $color_dark_3 ); ?>; }

    <?php if ( isset( $porto_settings['woo-show-product-border'] ) && $porto_settings['woo-show-product-border'] ) : ?>
    .product-image { border: 1px solid <?php echo $dark ? $color_dark_3 : "#ddd"; ?>; }
    <?php endif; ?>
    <?php if ( !$porto_settings['thumb-padding'] ) : ?>
    .product-images .img-thumbnail .inner { border: 1px solid <?php echo $dark ? $color_dark_3 : "#ddd"; ?>; }
    <?php endif; ?>
    .product-thumbs-slider.owl-carousel .img-thumbnail { border-color: <?php echo $dark ? $color_dark_3 : "#ddd"; ?>; }
<?php endif; ?>

.mobile-sidebar .sidebar-toggle:hover,
.feature-box.feature-box-style-5 h4,
.feature-box.feature-box-style-6 h4,
h1.dark,
h2.dark,
h3.dark,
h4.dark,
h5.dark { color: <?php echo $color_dark; ?>; }
.text-dark,
.text-dark.wpb_text_column p { color: <?php echo $color_dark; ?> !important; }
.alert.alert-dark { background-color: <?php echo $portoColorLib->lighten($color_dark, 10); ?>; border-color: <?php echo $portoColorLib->darken($color_dark, 10); ?>; color: <?php echo $portoColorLib->lighten($color_dark, 70); ?>; }
.alert.alert-dark .alert-link { color: <?php echo $portoColorLib->lighten($color_dark, 85); ?>; }
.section.section-text-dark,
.section.section-text-dark h1,
.section.section-text-dark h2,
.section.section-text-dark h3,
.section.section-text-dark h4,
.section.section-text-dark h5,
.section.section-text-dark h6,
.vc_general.vc_cta3 h2,
.vc_general.vc_cta3 h4,
.vc_general.vc_cta3.vc_cta3-style-flat .vc_cta3-content-header h2,
.vc_general.vc_cta3.vc_cta3-style-flat .vc_cta3-content-header h4 { color: <?php echo $color_dark; ?>; }
.section.section-text-dark p { color: <?php echo $portoColorLib->lighten($color_dark, 10); ?>; }
body.boxed .page-wrapper { border-bottom-color: <?php echo $color_dark; ?>; }

html.dark .text-muted { color: <?php echo $portoColorLib->darken( $dark_default_text, 20 ); ?> !important; }

<?php if ( class_exists( 'Woocommerce' ) ) : ?>
    .price,
    td.product-price,
    td.product-subtotal,
    td.product-total,
    td.order-total,
    tr.cart-subtotal,
    .product-nav .product-popup .product-details .amount,
    ul.product_list_widget li .product-details .amount,
    .widget ul.product_list_widget li .product-details .amount { color: <?php echo $color_price; ?>; }

    .widget_price_filter .price_slider { background: <?php echo $price_slide_bg_color; ?>; }
<?php endif; ?>

.porto-links-block { border-color: <?php echo $widget_border_color; ?>; background: <?php echo $widget_bg_color; ?>; }

.widget_sidebar_menu .widget-title,
.porto-links-block .links-title { background: <?php echo $widget_title_bg_color; ?>; border-bottom-color: <?php echo $widget_border_color; ?>; }

.widget_sidebar_menu,
.tm-collapse,
.widget_layered_nav .yith-wcan-select-wrapper { border-color: <?php echo $widget_border_color; ?>; }

.mobile-sidebar .sidebar-toggle,
.pagination > a,
.pagination > span,
.page-links > a,
.page-links > span { border-color: <?php echo $input_border_color; ?>; }
<?php if ( (class_exists('bbPress') && is_bbpress() ) || ( class_exists('BuddyPress') && is_buddypress() ) ) : ?>
    .bbp-pagination-links a,
    .bbp-pagination-links span.current,
    .bbp-topic-pagination a,
    #buddypress div.pagination .pagination-links a,
    #buddypress div.pagination .pagination-links span.current { border-color: <?php echo $input_border_color; ?>; }
    #buddypress #whats-new:focus { border-color: <?php echo $input_border_color; ?> !important; outline-color: <?php echo $input_border_color; ?>; }
<?php endif; ?>

.section-title,
.slider-title,
.widget .widgettitle,
.widget .widget-title,
.widget .widgettitle a,
.widget .widget-title a,
.widget_calendar caption { color: <?php echo $color_widget_title; ?>; }

.accordion.without-borders .card { border-bottom-color: <?php echo $panel_default_border; ?>; }


/*------------------ Colors ---------------------- */
<?php
    $bodyColor = $b['body-font']['color'];
    $skinColor = $b['skin-color'];

    $bg_gradient_arr = array(
        array( 'body', 'body-bg-gradient', 'body-bg-gcolor' ),
        array( '.header-wrapper', 'header-wrap-bg-gradient', 'header-wrap-bg-gcolor' ),
        array( '#header .header-main', 'header-bg-gradient', 'header-bg-gcolor' ),
        array( '#main', 'content-bg-gradient', 'content-bg-gcolor' ),
        array( '#main .content-bottom-wrapper', 'content-bottom-bg-gradient', 'content-bottom-bg-gcolor' ),
        array( '.page-top', 'breadcrumbs-bg-gradient', 'breadcrumbs-bg-gcolor' ),
        array( '#footer', 'footer-bg-gradient', 'footer-bg-gcolor' ),
        array( '#footer .footer-main', 'footer-main-bg-gradient', 'footer-main-bg-gcolor' ),
        array( '.footer-top', 'footer-top-bg-gradient', 'footer-top-bg-gcolor' ),
        array( '#footer .footer-bottom', 'footer-bottom-bg-gradient', 'footer-bottom-bg-gcolor' ),
    );
?>
<?php foreach ( $bg_gradient_arr as $bg_gradient ) : ?>
    <?php if ($b[$bg_gradient[1]] && $b[$bg_gradient[2]]['from'] && $b[$bg_gradient[2]]['to']) : ?>
        <?php echo $bg_gradient[0]; ?> {
            background-image: -moz-linear-gradient(top, <?php echo $b[$bg_gradient[2]]['from']; ?>, <?php echo $b[$bg_gradient[2]]['to']; ?>);
            background-image: -webkit-gradient(linear, 0 0, 0 100%, from(<?php echo $b[$bg_gradient[2]]['from']; ?>), to(<?php echo $b[$bg_gradient[2]]['to']; ?>));
            background-image: -webkit-linear-gradient(top, <?php echo $b[$bg_gradient[2]]['from']; ?>, <?php echo $b[$bg_gradient[2]]['to']; ?>);
            background-image: linear-gradient(to bottom, <?php echo $b[$bg_gradient[2]]['from']; ?>, <?php echo $b[$bg_gradient[2]]['to']; ?>);
            background-repeat: repeat-x;
        }
    <?php endif; ?>
<?php endforeach; ?>
@media (min-width: 992px) {
    .header-wrapper.header-side-nav:not(.fixed-header) #header {
        background-color: <?php echo $b['header-bg']['background-color']; ?>;
        <?php if ( !empty( $b['header-bg']['background-repeat'] ) ) { ?> background-repeat: <?php echo $b['header-bg']['background-repeat'] ?>; <?php } ?>
        <?php if ( !empty( $b['header-bg']['background-size'] ) ) { ?> background-size: <?php echo $b['header-bg']['background-size'] ?>; <?php } ?>
        <?php if ( !empty( $b['header-bg']['background-attachment'] ) ) { ?> background-attachment: <?php echo $b['header-bg']['background-attachment'] ?>; <?php } ?>
        <?php if ( !empty( $b['header-bg']['background-position'] ) ) { ?> background-position: <?php echo $b['header-bg']['background-position'] ?>; <?php } ?>
        <?php if ( !empty( $b['header-bg']['background-image'] ) ) { ?> background-image: <?php echo str_replace(array('http://', 'https://'), array('//', '//'), $b['header-bg']['background-image']); ?>; <?php } ?>
    <?php if ($b['header-bg-gradient'] && $b['header-bg-gcolor']['from'] && $b['header-bg-gcolor']['to']) : ?>
        background-image: -moz-linear-gradient(top, <?php echo $b['header-bg-gcolor']['from']; ?>, <?php echo $b['header-bg-gcolor']['to']; ?>);
        background-image: -webkit-gradient(linear, 0 0, 0 100%, from(<?php echo $b['header-bg-gcolor']['from']; ?>), to(<?php echo $b['header-bg-gcolor']['to']; ?>));
        background-image: -webkit-linear-gradient(top, <?php echo $b['header-bg-gcolor']['from']; ?>, <?php echo $b['header-bg-gcolor']['to']; ?>);
        background-image: linear-gradient(to bottom, <?php echo $b['header-bg-gcolor']['from']; ?>, <?php echo $b['header-bg-gcolor']['to']; ?>);
        background-repeat: repeat-x;
    <?php endif; ?>
    }
}

<?php if ( isset( $b['content-bottom-padding'] ) && ( !empty( $b['content-bottom-padding']['padding-top'] ) || !empty( $b['content-bottom-padding']['padding-bottom'] ) ) ) : ?>
    #main .content-bottom-wrapper {
        <?php if ( !empty( $b['content-bottom-padding']['padding-top'] ) ) : ?> padding-top: <?php echo $b['content-bottom-padding']['padding-top']; ?>px; <?php endif; ?>
        <?php if ( !empty( $b['content-bottom-padding']['padding-bottom'] ) ) : ?> padding-bottom: <?php echo $b['content-bottom-padding']['padding-bottom']; ?>px; <?php endif; ?>
    }
<?php endif; ?>
<?php if ( isset( $b['footer-top-padding'] ) && ( !empty( $b['footer-top-padding']['padding-top'] ) || !empty( $b['footer-top-padding']['padding-bottom'] ) ) ) : ?>
    .footer-top {
        <?php if ( !empty( $b['footer-top-padding']['padding-top'] ) ) : ?> padding-top: <?php echo $b['footer-top-padding']['padding-top']; ?>px; <?php endif; ?>
        <?php if ( !empty( $b['footer-top-padding']['padding-bottom'] ) ) : ?> padding-bottom: <?php echo $b['footer-top-padding']['padding-bottom']; ?>px; <?php endif; ?>
    }
<?php endif; ?>

<?php
    $header_bg_color = $b['header-bg']['background-color'];
    $header_opacity = ((int)$b['header-opacity']) ? (int)$b['header-opacity'] : 80;
    $header_opacity = (float)$header_opacity / 100;

    $footer_opacity = ((int)$b['footer-opacity']) ? (int)$b['footer-opacity'] : 80;
    $footer_opacity = (float)$footer_opacity / 100;
?>
#mini-cart .cart-popup { color: <?php echo $bodyColor; ?> }
.fixed-header #header .header-main {
<?php if ( 'transparent' == $header_bg_color ) : ?>
    box-shadow: none;
<?php else: ?>
    background-color: rgba(<?php echo $portoColorLib->hexToRGB( $header_bg_color ); ?>, <?php echo $header_opacity; ?>);
<?php endif; ?>
}
@media (min-width: 992px) {
    .header-wrapper.header-side-nav.fixed-header #header {
        <?php if ( 'transparent' == $header_bg_color ) : ?>
            box-shadow: none;
        <?php else: ?>
            background-color: rgba(<?php echo $portoColorLib->hexToRGB( $header_bg_color ); ?>, <?php echo $header_opacity; ?>);
        <?php endif; ?>
    }
}

<?php
    if ($b['mainmenu-wrap-bg-color-sticky'] && $b['mainmenu-wrap-bg-color-sticky'] != 'transparent') {
        $sticky_menu_bg_color = $b['mainmenu-wrap-bg-color-sticky'];
    } else if ($b['mainmenu-bg-color'] && $b['mainmenu-bg-color'] != 'transparent') {
        $sticky_menu_bg_color = $b['mainmenu-bg-color'];
    } else if ($b['mainmenu-wrap-bg-color'] && $b['mainmenu-wrap-bg-color'] != 'transparent') {
        $sticky_menu_bg_color = $b['mainmenu-wrap-bg-color'];
    } else {
        $sticky_menu_bg_color = $b['sticky-header-bg']['background-color'];
    }
?>
#header.sticky-header .header-main,
.fixed-header #header.sticky-header .header-main
<?php echo 'transparent' == $sticky_menu_bg_color ? ', #header.sticky-header .main-menu-wrap, .fixed-header #header.sticky-header .main-menu-wrap' : ''; ?> {
    <?php if ( !empty( $b['sticky-header-bg']['background-color'] ) ) { ?> background-color: rgba(<?php echo $portoColorLib->hexToRGB($b['sticky-header-bg']['background-color']); ?>, <?php echo (float)str_replace( '%', '', $b['sticky-header-opacity'] ) / 100; ?>); <?php } ?>
    <?php if ( !empty( $b['sticky-header-bg']['background-repeat'] ) ) { ?> background-repeat: <?php echo $b['sticky-header-bg']['background-repeat'] ?>; <?php } ?>
    <?php if ( !empty( $b['sticky-header-bg']['background-size'] ) ) { ?> background-size: <?php echo $b['sticky-header-bg']['background-size'] ?>; <?php } ?>
    <?php if ( !empty( $b['sticky-header-bg']['background-attachment'] ) ) { ?> background-attachment: <?php echo $b['sticky-header-bg']['background-attachment'] ?>; <?php } ?>
    <?php if ( !empty( $b['sticky-header-bg']['background-position'] ) ) { ?> background-position: <?php echo $b['sticky-header-bg']['background-position'] ?>; <?php } ?>
    <?php if ( !empty( $b['sticky-header-bg']['background-image'] ) ) { ?> background-image: <?php echo str_replace(array('http://', 'https://'), array('//', '//'), $b['sticky-header-bg']['background-image']); ?>; <?php } ?>
<?php if ($b['sticky-header-bg-gradient'] && $b['sticky-header-bg-gcolor']['from'] && $b['sticky-header-bg-gcolor']['to']) : ?>
    background-image: -moz-linear-gradient(top, rgba(<?php echo $portoColorLib->hexToRGB($b['sticky-header-bg-gcolor']['from']); ?>, <?php echo (float)str_replace( '%', '', $b['sticky-header-opacity'] ) / 100; ?>), rgba(<?php echo $portoColorLib->hexToRGB($b['sticky-header-bg-gcolor']['to']); ?>, <?php echo (float)str_replace( '%', '', $b['sticky-header-opacity'] ) / 100; ?>));
    background-image: -webkit-gradient(linear, 0 0, 0 100%, from(rgba(<?php echo $portoColorLib->hexToRGB($b['sticky-header-bg-gcolor']['from']); ?>, <?php echo (float)str_replace( '%', '', $b['sticky-header-opacity'] ) / 100; ?>)), to(rgba(<?php echo $portoColorLib->hexToRGB($b['sticky-header-bg-gcolor']['to']); ?>, <?php echo (float)str_replace( '%', '', $b['sticky-header-opacity'] ) / 100; ?>)));
    background-image: -webkit-linear-gradient(top, rgba(<?php echo $portoColorLib->hexToRGB($b['sticky-header-bg-gcolor']['from']); ?>, <?php echo (float)str_replace( '%', '', $b['sticky-header-opacity'] ) / 100; ?>), rgba(<?php echo $portoColorLib->hexToRGB($b['sticky-header-bg-gcolor']['to']); ?>, <?php echo (float)str_replace( '%', '', $b['sticky-header-opacity'] ) / 100; ?>));
    background-image: linear-gradient(to bottom, rgba(<?php echo $portoColorLib->hexToRGB($b['sticky-header-bg-gcolor']['from']); ?>, <?php echo (float)str_replace( '%', '', $b['sticky-header-opacity'] ) / 100; ?>), rgba(<?php echo $portoColorLib->hexToRGB($b['sticky-header-bg-gcolor']['to']); ?>, <?php echo (float)str_replace( '%', '', $b['sticky-header-opacity'] ) / 100; ?>));
    background-repeat: repeat-x;
<?php endif; ?>
}
<?php if ( 'transparent' != $sticky_menu_bg_color ) : ?>
#header.sticky-header .main-menu-wrap,
.fixed-header #header.sticky-header .main-menu-wrap {
    background-color: rgba(<?php echo $portoColorLib->hexToRGB($sticky_menu_bg_color); ?>, <?php echo (float)str_replace( '%', '', $b['sticky-header-opacity'] ) / 100; ?>);
}
<?php endif; ?>
<?php if ( !empty( $b['sticky-header-bg']['background-image'] ) ) { ?>
    #header .header-main { transition: none; }
<?php } ?>


/* skin color */
article.post .post-title,
<?php if ( empty( $b['mobile-panel-type'] ) ) : ?>
    #nav-panel .accordion-menu > li.menu-item > a,
    #nav-panel .accordion-menu > li.menu-item > .arrow
<?php endif; ?>
 { color: <?php echo $skinColor ?>; }

article.post .post-date .month,
article.post .post-date .format,
.post-item .post-date .month,
.post-item .post-date .format,
<?php if ( empty( $b['mobile-panel-type'] ) ) : ?>
    #nav-panel .accordion-menu li.menu-item.active > a
<?php endif; ?>
 { background-color: <?php echo $skinColor ?>; }


/* mobile panel */
<?php
    $panel_link_color = empty( $b['panel-link-color']['regular'] ) ? ( 'side' == $b['mobile-panel-type'] ? '#fff' : '#333' ) : $b['panel-link-color']['regular'];
?>
<?php if ( !empty( $b['panel-bg-color'] ) ) : ?>
    <?php if ( 'side' == $b['mobile-panel-type'] ) :
        echo '#side-nav-panel';
    else:
        echo '#nav-panel .mobile-nav-wrap';
    endif; ?> { background-color: <?php echo $b['panel-bg-color']; ?>; }
    <?php if ( 'side' == $b['mobile-panel-type'] ) :
        echo '#side-nav-panel .accordion-menu li.menu-item.active > a,';
        echo '#side-nav-panel .menu-custom-block a:hover';
    else:
        echo '#nav-panel .menu-custom-block a:hover';
    endif; ?> { background-color: <?php echo $portoColorLib->lighten( $b['panel-bg-color'], 5 ); ?>; }
<?php endif; ?>
<?php if ( !empty( $b['panel-text-color'] ) ) : ?>
    <?php if ( 'side' == $b['mobile-panel-type'] ) :
        echo '#side-nav-panel, #side-nav-panel .welcome-msg, #side-nav-panel .accordion-menu, #side-nav-panel .menu-custom-block, #side-nav-panel .menu-custom-block span';
    else:
        echo '#nav-panel, #nav-panel .welcome-msg, #nav-panel .accordion-menu, #nav-panel .menu-custom-block, #nav-panel .menu-custom-block span';
    endif; ?> { color: <?php echo $b['panel-text-color']; ?>; }
<?php endif; ?>
<?php if ( 'side' == $b['mobile-panel-type'] ) :
    echo '#side-nav-panel .accordion-menu li';
else:
    echo '#nav-panel .mobile-menu li';
endif; ?> { border-bottom-color: <?php echo $b['panel-border-color']; ?>; }
<?php if ( empty( $b['mobile-panel-type'] ) ) : ?>
    #nav-panel .accordion-menu .sub-menu li:hover > a { background: <?php echo $b['panel-link-hbgcolor']; ?>; }
    #nav-panel .accordion-menu li.menu-item > a,
    #nav-panel .accordion-menu .arrow,
    #nav-panel .menu-custom-block a { color: <?php echo $panel_link_color; ?>; }
<?php else: ?>
    #side-nav-panel .accordion-menu li.menu-item > a,
    #side-nav-panel .menu-custom-block a { color: <?php echo $panel_link_color; ?>; }
<?php endif; ?>
<?php if ( !empty( $b['panel-link-color']['hover'] ) ) : ?>
    <?php if ( empty( $b['mobile-panel-type'] ) ) : ?>
        #nav-panel .accordion-menu li.menu-item:hover > a,
        #nav-panel .accordion-menu .arrow:hover,
        #nav-panel .menu-custom-block a:hover { color: <?php echo $b['panel-link-color']['hover']; ?>; }
    <?php else: ?>
        #side-nav-panel .accordion-menu li.menu-item.active > a,
        #side-nav-panel .menu-custom-block a:hover { color: <?php echo $b['panel-link-color']['hover']; ?>; }
    <?php endif; ?>
<?php endif; ?>

/* footer */
.footer-wrapper.fixed #footer .footer-bottom {
<?php if ( empty( $b['footer-bottom-bg']['background-color'] ) ) : ?>
<?php elseif ( 'transparent' == $b['footer-bottom-bg']['background-color'] ) : ?>
    box-shadow: none;
<?php else: ?>
    background-color: rgba(<?php echo $portoColorLib->hexToRGB( $b['footer-bottom-bg']['background-color'] ); ?>, <?php echo $footer_opacity; ?>);
<?php endif; ?>
}

/*------------------ Fonts ---------------------- */
<?php if ( class_exists( 'Woocommerce' ) && isset( $b['add-to-cart-font'] ) && !empty( $b['add-to-cart-font']['font-family'] ) ) : ?>
    #mini-cart .buttons a,
    .quantity .qty,
    .single_add_to_cart_button,
    .shop_table.wishlist_table .add_to_cart.button,
    .woocommerce table.wishlist_table .add_to_cart.button,
    ul.products li.product-col .add_to_cart_button,
    ul.products li.product-col.show-outimage-q-onimage-alt .price { font-family: <?php echo $b['add-to-cart-font']['font-family']; ?>; }
<?php endif; ?>

/*------------------ bbPress ---------------------- */
<?php if ( (class_exists('bbPress') && is_bbpress() ) || ( class_exists('BuddyPress') && is_buddypress() ) ) : ?>
    #bbpress-forums .bbp-topic-pagination a:hover,
    #bbpress-forums .bbp-topic-pagination a:focus,
    #bbpress-forums .bbp-topic-pagination span.current,
    #bbpress-forums .bbp-pagination a:hover,
    #bbpress-forums .bbp-pagination a:focus,
    #bbpress-forums .bbp-pagination span.current,
    #buddypress button,
    #buddypress a.button,
    #buddypress input[type="submit"],
    #buddypress input[type="button"],
    #buddypress input[type="reset"],
    #buddypress ul.button-nav li a,
    #buddypress div.generic-button a,
    #buddypress .comment-reply-link,
    a.bp-title-button {
        background-color: <?php echo $skinColor; ?>;
        border-color: <?php echo $skinColor; ?>;
    }

    #buddypress div.item-list-tabs ul li.selected a,
    #buddypress div.item-list-tabs ul li.current a {
        background-color: <?php echo $skinColor; ?>;
        color: <?php echo $b['skin-color-inverse'] ?>;
    }

    #buddypress button:hover,
    #buddypress a.button:hover,
    #buddypress input[type="submit"]:hover,
    #buddypress input[type="button"]:hover,
    #buddypress input[type="reset"]:hover,
    #buddypress ul.button-nav li a:hover,
    #buddypress div.generic-button a:hover,
    #buddypress .comment-reply-link:hover,
    a.bp-title-button:hover,
    #buddypress button:focus,
    #buddypress a.button:focus,
    #buddypress input[type="submit"]:focus,
    #buddypress input[type="button"]:focus,
    #buddypress input[type="reset"]:focus,
    #buddypress ul.button-nav li a:focus,
    #buddypress div.generic-button a:focus,
    #buddypress .comment-reply-link:focus,
    a.bp-title-button:focus,
    #buddypress .comment-reply-link:hover,
    #buddypress a.button:focus,
    #buddypress a.button:hover,
    #buddypress button:hover,
    #buddypress div.generic-button a:hover
    #buddypress input[type="button"]:hover,
    #buddypress input[type="reset"]:hover,
    #buddypress input[type="submit"]:hover,
    #buddypress ul.button-nav li a:hover,
    #buddypress ul.button-nav li.current a,
    #buddypress input.pending[type="submit"],
    #buddypress input.pending[type="button"],
    #buddypress input.pending[type="reset"],
    #buddypress input.disabled[type="submit"],
    #buddypress input.disabled[type="button"],
    #buddypress input.disabled[type="reset"],
    #buddypress input[type="submit"][disabled="disabled"],
    #buddypress button.pending,
    #buddypress button.disabled,
    #buddypress div.pending a,
    #buddypress a.disabled {
        background: <?php echo $portoColorLib->darken($skinColor, 5); ?>;
        border-color: <?php echo $portoColorLib->darken($skinColor, 5); ?>;
    }

    @-webkit-keyframes loader-pulsate {
        from {
            background: <?php echo $skinColor; ?>;
            border-color: <?php echo $skinColor; ?>;
            -webkit-box-shadow: none;
            box-shadow: none;
        }
        to {
            background: darken(<?php echo $skinColor; ?>, 5%);
            border-color: darken(<?php echo $skinColor; ?>, 5%);
            -webkit-box-shadow: none;
            box-shadow: none;
        }
    }
    @-moz-keyframes loader-pulsate {
        from {
            background: <?php echo $skinColor; ?>;
            border-color: <?php echo $skinColor; ?>;
            -webkit-box-shadow: none;
            box-shadow: none;
        }
        to {
            background: <?php echo $portoColorLib->darken($skinColor, 5); ?>;
            border-color: <?php echo $portoColorLib->darken($skinColor, 5); ?>;
            -webkit-box-shadow: none;
            box-shadow: none;
        }
    }
    #buddypress div.pagination .pagination-links a:hover,
    #buddypress div.pagination .pagination-links a:focus,
    #buddypress div.pagination .pagination-links a:active,
    #buddypress div.pagination .pagination-links span.current,
    #buddypress div.pagination .pagination-links span.current:hover {
        background: <?php echo $skinColor; ?>;
        border-color: <?php echo $skinColor; ?>;
    }
<?php endif; ?>

/*------------------ Theme Shop ---------------------- */
<?php if ( class_exists( 'Woocommerce' ) ) : ?>
    .product-layout-grid .product-images .img-thumbnail { margin-bottom: <?php echo $b['grid-gutter-width']; ?>px; }

    ul.products li.product-col .product-loop-title,
    ul.products li.product-col h3,
    ul.products li.product-col.show-outimage-q-onimage .product-loop-title:hover,
    ul.products li.product-col.show-outimage-q-onimage .product-loop-title:focus,
    ul.products li.product-col.show-outimage-q-onimage .product-loop-title:active,
    ul.products li.product-col.show-outimage-q-onimage .product-loop-title:hover > *,
    ul.products li.product-col.show-outimage-q-onimage .product-loop-title:focus > *,
    ul.products li.product-col.show-outimage-q-onimage .product-loop-title:active > *,
    #yith-wcwl-popup-message,
    .widget_product_categories ul li > a,
    .widget_price_filter ul li > a,
    .widget_layered_nav ul li > a,
    .widget_layered_nav_filters ul li > a,
    .widget_rating_filter ul li > a,
    .widget_price_filter ol li > a,
    .widget_layered_nav_filters ol li > a,
    .widget_rating_filter ol li > a,
    .woocommerce .widget_layered_nav ul.yith-wcan-label li a,
    .woocommerce-page .widget_layered_nav ul.yith-wcan-label li a,
    ul.product_list_widget li .product-details a,
    .widget ul.product_list_widget li .product-details a,
    .widget_recent_reviews .product_list_widget li a,
    .widget.widget_recent_reviews .product_list_widget li a,
    .widget_shopping_cart .product-details .remove-product,
    .shop_table dl.variation,
    .select2-container .select2-choice,
    .select2-drop,
    .select2-drop-active,
    .form-row input[type="email"],
    .form-row input[type="number"],
    .form-row input[type="password"],
    .form-row input[type="search"],
    .form-row input[type="tel"],
    .form-row input[type="text"],
    .form-row input[type="url"],
    .form-row input[type="color"],
    .form-row input[type="date"],
    .form-row input[type="datetime"],
    .form-row input[type="datetime-local"],
    .form-row input[type="month"],
    .form-row input[type="time"],
    .form-row input[type="week"],
    .form-row select,
    .form-row textarea { color: <?php echo $bodyColor; ?>; }

    .quantity .qty,
    .quantity .minus:hover,
    .quantity .plus:hover,
    .stock,
    .product-image .viewcart,
    .widget_product_categories ul li > a:hover,
    .widget_price_filter ul li > a:hover,
    .widget_layered_nav ul li > a:hover,
    .widget_layered_nav_filters ul li > a:hover,
    .widget_rating_filter ul li > a:hover,
    .widget_price_filter ol li > a:hover,
    .widget_layered_nav_filters ol li > a:hover,
    .widget_rating_filter ol li > a:hover,
    .widget_product_categories ul li > a:focus,
    .widget_price_filter ul li > a:focus,
    .widget_layered_nav ul li > a:focus,
    .widget_layered_nav_filters ul li > a:focus,
    .widget_rating_filter ul li > a:focus,
    .widget_price_filter ol li > a:focus,
    .widget_layered_nav_filters ol li > a:focus,
    .widget_rating_filter ol li > a:focus,
    .widget_product_categories ul li .toggle,
    .widget_price_filter ul li .toggle,
    .widget_layered_nav ul li .toggle,
    .widget_layered_nav_filters ul li .toggle,
    .widget_rating_filter ul li .toggle,
    .widget_price_filter ol li .toggle,
    .widget_layered_nav_filters ol li .toggle,
    .widget_rating_filter ol li .toggle,
    .widget_product_categories ul li.current > a,
    .widget_price_filter ul li.current > a,
    .widget_layered_nav ul li.current > a,
    .widget_layered_nav_filters ul li.current > a,
    .widget_rating_filter ul li.current > a,
    .widget_price_filter ol li.current > a,
    .widget_layered_nav_filters ol li.current > a,
    .widget_rating_filter ol li.current > a,
    .widget_product_categories ul li.chosen > a,
    .widget_price_filter ul li.chosen > a,
    .widget_layered_nav ul li.chosen > a,
    .widget_layered_nav_filters ul li.chosen > a,
    .widget_rating_filter ul li.chosen > a,
    .widget_price_filter ol li.chosen > a,
    .widget_layered_nav_filters ol li.chosen > a,
    .widget_rating_filter ol li.chosen > a,
    .widget_layered_nav_filters ul li a:before,
    .widget_layered_nav .yith-wcan-select-wrapper ul.yith-wcan-select.yith-wcan li:hover a,
    .widget_layered_nav .yith-wcan-select-wrapper ul.yith-wcan-select.yith-wcan li.chosen a,
    ul.cart_list li .product-details a:hover,
    ul.product_list_widget li .product-details a:hover,
    ul.cart_list li a:hover,
    ul.product_list_widget li a:hover,
    .widget_shopping_cart .total .amount,
    .shipping_calculator h2,
    .cart_totals h2,
    .review-order.shop_table h2,
    .shipping_calculator h2 a,
    .cart_totals h2 a,
    .review-order.shop_table h2 a,
    .shop_table td.product-name,
    .product-subtotal .woocommerce-Price-amount { color: <?php echo $skinColor; ?>; }

    ul.products li.product .links-on-image .add-links .add_to_cart_button:hover,
    ul.products li.product .links-on-image .add-links .add_to_cart_read_more:hover,
    .product-image .viewcart:hover,
    .widget_price_filter .ui-slider .ui-slider-handle { background-color: <?php echo $skinColor; ?>; }

    .sidebar #yith-ajaxsearchform .btn { background: <?php echo $skinColor; ?>; }

    #yith-wcwl-popup-message,
    .woocommerce-cart .cart-form form,
    .yith-wcan-loading:before,
    .loader-container i.porto-ajax-loader,
    .product-layout-full_width .product-thumbnails-inner .img-thumbnail.selected,
    .product-layout-wide_grid .product-thumbnails-inner .img-thumbnail.selected { border-color: <?php echo $skinColor; ?>; }

    .yith-wcwl-add-to-wishlist a,
    .yith-wcwl-add-to-wishlist span { border-color: <?php echo $b['wishlist-border-color']; ?>; color: <?php echo $b['wishlist-color'] ?>; }
    .show-outimage-q-onimage .yith-wcwl-add-to-wishlist a,
    .show-outimage-q-onimage .yith-wcwl-add-to-wishlist span,
    .show-outimage-q-onimage-alt .yith-wcwl-add-to-wishlist a,
    .show-outimage-q-onimage-alt .yith-wcwl-add-to-wishlist span,
    .show-outimage-q-onimage .yith-wcwl-add-to-wishlist a:hover,
    .show-outimage-q-onimage .yith-wcwl-add-to-wishlist span:hover,
    .show-outimage-q-onimage-alt .yith-wcwl-add-to-wishlist a:hover,
    .show-outimage-q-onimage-alt .yith-wcwl-add-to-wishlist span:hover,
    .show-outimage-q-onimage .yith-wcwl-add-to-wishlist a:hover:before,
    .show-outimage-q-onimage .yith-wcwl-add-to-wishlist span:hover:before,
    .show-outimage-q-onimage-alt .yith-wcwl-add-to-wishlist a:hover:before,
    .show-outimage-q-onimage-alt .yith-wcwl-add-to-wishlist span:hover:before { color: <?php echo $b['wishlist-color'] ?>; }
    .yith-wcwl-add-to-wishlist span.ajax-loading { border-color: <?php echo $b['wishlist-color'] ?>; }
    .yith-wcwl-add-to-wishlist span.ajax-loading:hover { background-color: <?php echo $b['wishlist-color'] ?>; }
    .add-links .quickview { border-color: <?php echo $b['quickview-border-color'] ?>; color: <?php echo $b['quickview-color'] ?>; }
    .summary-before .ms-lightbox-btn,
    .product-images .zoom { background-color: <?php echo $skinColor; ?>; }
    .summary-before .ms-lightbox-btn:hover { background-color: <?php echo $portoColorLib->lighten($skinColor, 5); ?>; }
    .summary-before .ms-nav-next:before,
    .summary-before .ms-nav-prev:before,
    .summary-before .ms-thumblist-fwd:before,
    .summary-before .ms-thumblist-bwd:before,
    .product-summary-wrap .price { color: <?php echo $skinColor; ?>; }
    .product-summary-wrap .yith-wcwl-add-to-wishlist a,
    .product-summary-wrap .yith-wcwl-add-to-wishlist span { color: inherit; }
    .product-summary-wrap .yith-wcwl-add-to-wishlist a:before,
    .product-summary-wrap .yith-wcwl-add-to-wishlist span:before { border-color: <?php echo $b['wishlist-color'] ?>; color: <?php echo $b['wishlist-color'] ?>; }
    .product-summary-wrap .yith-wcwl-add-to-wishlist a:hover,
    .product-summary-wrap .yith-wcwl-add-to-wishlist span:hover,
    .product-summary-wrap .yith-wcwl-add-to-wishlist a:focus,
    .product-summary-wrap .yith-wcwl-add-to-wishlist span:focus { background: transparent; color: <?php echo $b['wishlist-color'] ?>; }
    .product-summary-wrap .yith-wcwl-add-to-wishlist a:hover:before,
    .product-summary-wrap .yith-wcwl-add-to-wishlist span:hover:before,
    .product-summary-wrap .yith-wcwl-add-to-wishlist a:focus:before,
    .product-summary-wrap .yith-wcwl-add-to-wishlist span:focus:before { color: <?php echo $b['wishlist-color-inverse']; ?>; /*background-color: <?php echo $b['wishlist-color'] ?>;*/ }

    .woocommerce-pagination a:hover,
    .woocommerce-pagination a:focus,
    .woocommerce-pagination span.current { border-color: <?php echo $skinColor; ?>; background-color: transparent; }

    ul.products li.product-col .product-loop-title:hover,
    ul.products li.product-col .product-loop-title:focus,
    ul.products li.product-col .product-loop-title:hover h3,
    ul.products li.product-col .product-loop-title:focus h3 { color: <?php echo $skinColor; ?>; }
    ul.products li.product-col .links-on-image .add-links-wrap .add-links .quickview { background-color: <?php echo $b['quickview-color'] ?>; color: <?php echo $b['quickview-color-inverse'] ?>; }
    ul.products li.product-col .links-on-image .add-links-wrap .add-links .quickview:hover { background-color: <?php echo $portoColorLib->lighten($b['quickview-color'], 5); ?>; }
    ul.products li.product-col.show-outimage-q-onimage .links-on-image .add-links-wrap .add-links .quickview { background-color: rgba(0, 0, 0, 0.6); }

    ul.products.list li.product-col.show-outimage-q-onimage .add_to_cart_button,
    ul.products.list li.product-col.show-outimage-q-onimage .add_to_cart_read_more,
    ul.products.list li.product-col.show-outimage-q-onimage-alt .add_to_cart_button,
    ul.products.list li.product-col.show-outimage-q-onimage-alt .add_to_cart_read_more,
    .woocommerce .widget_layered_nav ul.yith-wcan-label li a:hover,
    .woocommerce-page .widget_layered_nav ul.yith-wcan-label li a:hover,
    .woocommerce .widget_layered_nav ul.yith-wcan-label li.chosen a,
    .woocommerce-page .widget_layered_nav ul.yith-wcan-label li.chosen a { background-color: <?php echo $skinColor; ?>; border-color: <?php echo $skinColor; ?>; }
    ul.products.list li.product-col.show-outimage-q-onimage .add-links-wrap .add-links .quickview:hover,
    ul.products.list li.product-col.show-outimage-q-onimage-alt .add-links-wrap .add-links .quickview:hover { color: <?php echo $b['quickview-color'] ?>; }

    .product_title a:hover,
    .product_title a:focus { color: <?php echo $skinColor; ?>; }
    .add_to_cart_button:hover,
    .add_to_cart_read_more:hover,
    .add_to_cart_button:focus,
    .add_to_cart_read_more:focus,
    .add-links .add_to_cart_button:hover,
    .add-links .add_to_cart_read_more:hover,
    .add-links .add_to_cart_button:focus,
    .add-links .add_to_cart_read_more:focus,
    ul.products li.product:hover .add_to_cart_button,
    ul.products li.product:hover .add_to_cart_read_more,
    ul.list li.product .add_to_cart_button,
    ul.list li.product .add_to_cart_read_more { background-color: <?php echo $skinColor; ?>; border-color: <?php echo $skinColor; ?>; color: #fff; }
    ul.products li.product .links-on-image .add-links .add_to_cart_button,
    ul.products li.product .links-on-image .add-links .add_to_cart_read_more { border-color: <?php echo $skinColor; ?>; color: <?php echo $skinColor; ?>; }

    .widget_product_categories ul li .toggle:hover,
    .widget_price_filter ul li .toggle:hover,
    .widget_layered_nav ul li .toggle:hover,
    .widget_layered_nav_filters ul li .toggle:hover,
    .widget_rating_filter ul li .toggle:hover,
    .widget_price_filter ol li .toggle:hover,
    .widget_layered_nav_filters ol li .toggle:hover,
    .widget_rating_filter ol li .toggle:hover { color: <?php echo $portoColorLib->lighten($skinColor, 5); ?>; }
    .widget_layered_nav ul li .count,
    .widget_product_categories ul li .count,
    .widget_rating_filter .wc-layered-nav-rating a { color: <?php echo if_light($portoColorLib->lighten($bodyColor, 5), $portoColorLib->darken($bodyColor, 5)); ?>; }
    .widget_layered_nav_filters ul li a:hover:before { color: <?php echo $portoColorLib->lighten($skinColor, 5); ?>; }
    .woocommerce .widget_layered_nav ul.yith-wcan-label li.chosen a:hover,
    .woocommerce-page .widget_layered_nav ul.yith-wcan-label li.chosen a:hover { background-color: <?php echo $portoColorLib->lighten($skinColor, 5); ?>; border-color: <?php echo $portoColorLib->lighten($skinColor, 5); ?>; }
    .woocommerce #content table.shop_table.wishlist_table.cart a.remove { color: <?php echo $skinColor; ?>; }
    .woocommerce #content table.shop_table.wishlist_table.cart a.remove:hover { color: <?php echo $portoColorLib->lighten($skinColor, 5); ?>; }
    .woocommerce #content table.shop_table.wishlist_table.cart a.remove:active { color: <?php echo $portoColorLib->darken($skinColor, 5); ?>; }

    .product-image .labels .onhot,
    .summary-before .labels .onhot { background: <?php echo $b['hot-color'] ?>; color: <?php echo $b['hot-color-inverse'] ?>; }
    .product-image .labels .onsale,
    .summary-before .labels .onsale { background: <?php echo $b['sale-color'] ?>; color: <?php echo $b['sale-color-inverse'] ?>; }
    .success-message-container { border-top: 4px solid <?php echo $skinColor; ?>; }

    .woocommerce-tabs .resp-tabs-list li.resp-tab-active,
    .woocommerce-tabs .resp-tabs-list li:hover { border-color: <?php echo $skinColor; ?> !important; }
    .woocommerce-tabs h2.resp-tab-active { border-bottom-color: <?php echo $skinColor; ?> !important; }
    .resp-vtabs.style-2 .resp-tabs-list li.resp-tab-active { border-bottom: 2px solid <?php echo $skinColor; ?> !important; }
    .product-categories li a:hover { color: #7b858a !important; text-decoration: underline; }
    .featured-box.porto-user-box { border-top-color: <?php echo $skinColor; ?>; }
    .woocommerce-widget-layered-nav-list .chosen a:not(.filter-color),
    .filter-item-list .active .filter-item { background: <?php echo $skinColor; ?>; color: #fff; border-color: <?php echo $skinColor; ?>; }
    .porto-related-products { background: #f4f4f4; }
<?php endif; ?>