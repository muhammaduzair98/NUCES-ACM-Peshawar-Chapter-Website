<?php
/**
 * @package Porto
 * @author SW-Theme
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $porto_settings, $porto_product_layout;

$porto_settings_backup = $porto_settings;
$b = porto_check_theme_options();
$porto_settings = $porto_settings_backup;

if ( is_rtl() ) {
    $left = 'right';
    $right = 'left';
    $rtl = true;
} else {
    $left = 'left';
    $right = 'right';
    $rtl = false;
}

/* logo css */
if ($porto_settings['logo-type'] !== 'text') {
    $logo_width = (isset($porto_settings['logo-width']) && (int)$porto_settings['logo-width']) ? (int)$porto_settings['logo-width'] : 170;
    $logo_width_wide = (isset($porto_settings['logo-width-wide']) && (int)$porto_settings['logo-width-wide']) ? (int)$porto_settings['logo-width-wide'] : 250;
    $logo_width_tablet = (isset($porto_settings['logo-width-tablet']) && (int)$porto_settings['logo-width-tablet']) ? (int)$porto_settings['logo-width-tablet'] : 110;
    $logo_width_mobile = (isset($porto_settings['logo-width-mobile']) && (int)$porto_settings['logo-width-mobile']) ? (int)$porto_settings['logo-width-mobile'] : 110;
    $logo_width_sticky = (isset($porto_settings['logo-width-sticky']) && (int)$porto_settings['logo-width-sticky']) ? (int)$porto_settings['logo-width-sticky'] : 80;
?>
    .ms-loading-container .ms-loading, .ms-slide .ms-slide-loading { background-image: none !important; background-color: transparent !important; box-shadow: none !important; } #header .logo { max-width: <?php
    echo $logo_width ?>px; } @media (min-width: <?php echo ($porto_settings['container-width'] + $porto_settings['grid-gutter-width']) ?>px) { #header .logo { max-width: <?php
    echo $logo_width_wide ?>px; } } @media (max-width: 991px) { #header .logo { max-width: <?php
    echo $logo_width_tablet ?>px; } } @media (max-width: 767px) { #header .logo { max-width: <?php
    echo $logo_width_mobile ?>px; } } <?php if ($porto_settings['change-header-logo']) : ?>#header.sticky-header .logo { width: <?php
    echo $logo_width_sticky * 1.25 ?>px; }<?php endif; ?>
<?php }

/* woocommerce single product */
if ( is_singular( 'product' ) ) : ?>
.product-images .img-thumbnail .inner,
.product-images .img-thumbnail .inner img { -ms-transform: none; -webkit-transform: none; transform: none; }
<?php endif;
if ( is_singular( 'product' ) && isset( $porto_product_layout ) && $porto_product_layout ) : ?>
    <?php if ( 'default' === $porto_product_layout || 'extended' === $porto_product_layout || 'grid' === $porto_product_layout || 'sticky_both_info' === $porto_product_layout || 'transparent' === $porto_product_layout || 'left_sidebar' === $porto_product_layout ) : ?>
        .single-product .product-summary-wrap .share-links a { background: #4c4c4c; }
    <?php endif; ?>
    <?php if ( 'default' === $porto_product_layout ) : ?>
        .product-layout-default .variations { display: block; }
        .product-layout-default .variations:after { content: ''; position: absolute; border-top: 1px solid #ebebeb; }
        .product-layout-default .variations tr:last-child td { padding-bottom: 20px; }
    <?php elseif ( 'extended' === $porto_product_layout ) : ?>
        @media (min-width: 992px) {
            .single-product .product_title { font-size: 38px; letter-spacing: -0.01em; }
        }
        @media (min-width: 768px) {
            .product-summary-images .product-image-slider .active + .active .inner:before { content: ''; position: absolute; left: 0; top: 0; width: 100%; height: 100%; z-index: 1; background: rgba(0, 0, 0, 0.07); }
            .product-summary-images .product-image-slider .active + .active .zoomContainer { z-index: 2; }
            .product-summary-images .product-image-slider .active + .active + .active .inner:before { display: none; }
        }
        @media (max-width: 767px) {
            .product-summary-images .product-image-slider .active .inner:before { content: ''; position: absolute; left: 0; top: 0; width: 100%; height: 100%; z-index: 1; background: rgba(0, 0, 0, 0.07); }
            .product-summary-images .product-image-slider .active .zoomContainer { z-index: 2; }
        }
        .product-summary-images .product-images .img-thumbnail .inner { border: none; }
        .product-layout-extended .product_title { display: inline-block; width: auto; }
        .product-layout-extended .woocommerce-product-rating { margin-bottom: 20px; }
        .product-layout-extended .product-summary-wrap .price { font-size: 30px; line-height: 1; }
        .product-layout-extended .product-summary-wrap .product-share { margin-top: 0; }
        @media (min-width: 992px) {
            .product-layout-extended .product-summary-wrap .product-share { float: <?php echo $right; ?>; }
            .share-links a { margin-top: 0; margin-bottom: 0; }
            p.price { display: inline-block; }
            .single-product-custom-block { float: <?php echo $right; ?>; }
            .product-layout-extended form.cart { text-align: <?php echo $right; ?> }
        }
        .product-layout-extended .product-summary-wrap .description { clear: both; padding-top: 25px; border-top: 1px solid #ebebeb; }
        .product-layout-extended .product-nav { position: relative; float: <?php echo $right; ?>; margin-<?php echo $right; ?>: 20px; margin-top: 4px; }
        .product-layout-extended .single_variation_wrap { padding-top: 0; }
        @media (min-width: 576px) {
            .product-layout-extended .single_variation_wrap { vertical-align: middle; margin-bottom: 5px; }
            .product-layout-extended .single_variation_wrap > div { display: inline-block; vertical-align: middle; }
        }
        .product-layout-extended .product_meta { margin-bottom: 20px; }
        .product-layout-extended .single-variation-msg { margin-bottom: 10px; line-height: 1.4; }
        .product-layout-extended form.cart { position: relative; }
        .product-layout-extended .entry-summary .quantity { vertical-align: middle; position: relative; margin-<?php echo $right; ?>: 20px; color: #8798a1; }
        .product-layout-extended .entry-summary .quantity .minus, 
        .product-layout-extended .entry-summary .quantity .qty,
        .product-layout-extended .entry-summary .quantity .plus { height: 24px; }
        .product-layout-extended .entry-summary .quantity .minus,
        .product-layout-extended .entry-summary .quantity .plus { border: none; position: relative; z-index: 2; left: 0; }
        .product-layout-extended .entry-summary .quantity .qty { width: 36px; border-width: 1px 1px 1px 1px; font-size: 13px; background: #f4f4f4; }
        .product-layout-extended .entry-summary .quantity:before { content: 'QTY:'; font-size: 15px; font-weight: 600; color: #21293c; }
        .product-layout-extended .product-summary-wrap .summary-before { margin-bottom: 1em; }
        @media (min-width: 576px) {
            .product-layout-extended .variations { display: inline-block; vertical-align: middle; margin-bottom: 5px; }
            .product-layout-extended .variations tr { display: inline-block; margin-<?php echo $right; ?>: 15px; }
            .product-layout-extended .variations td { padding-top: 0; padding-bottom: 0; }
            .product-layout-extended .variations .label { padding-top: 4px; padding-bottom: 4px; }
            .product-layout-extended .variations .reset_variations { display: none !important; }
            .product-layout-extended .variations .filter-item-list { margin-top: 0; }
            .product-layout-extended .product-summary-wrap .quantity,
            .product-layout-extended .product-summary-wrap .single_add_to_cart_button { margin-bottom: 0; }
        }
        @media (max-width: 991px) {
            .product-summary-images { max-width: none; }
            .product-layout-extended .woocommerce-product-rating { margin-top: 15px; }
            .product-layout-extended .product-summary-wrap .price { margin-bottom: 40px; }
            .product-layout-extended .product-nav { display: none; }
        }
        @media (max-width: 575px) {
            .product-layout-extended .product-summary-wrap .single_add_to_cart_button { padding: 0 35px; }
            .product-layout-extended .entry-summary .quantity { display: -webkit-flex; display: -moz-flex; display: -ms-flexbox; display: flex; margin-bottom: 20px; margin-top: 10px; }
            .product-layout-extended .entry-summary .quantity:before { margin-<?php echo $right; ?>: 28px; }
        }
    <?php elseif ( 'grid' === $porto_product_layout ) : ?>
        .main-content { padding-bottom: 20px; }
        .porto-related-products { background: none; padding-top: 0; }
        .product-images:hover .zoom { opacity: 0; }
        .product-images .img-thumbnail:hover .zoom { opacity: 1; background: none; }
        .product-images .img-thumbnail .inner { border: none; }
        .product-summary-wrap .description { margin-bottom: 20px; }
        .product-summary-wrap .product_meta { margin-bottom: 0; padding-bottom: 0; border-bottom: none; }
        .single-product .product-summary-wrap .price { margin-bottom: 0; margin-top: 30px; font-size: 25px; letter-spacing: 0; line-height: 1; }
        .single-product .variations { width: 100%; }
        .single-product .variations tr { border-bottom: 1px solid #dae2e6; }
        .variations tr td { padding-top: 15px; padding-bottom: 15px; }
        .single-product .variations .label { width: 75px; }
        .filter-item-list .filter-color { width: 28px; height: 28px; }
        .woocommerce-widget-layered-nav-list a:not(.filter-color), .filter-item-list .filter-item { line-height: 26px; font-size: 13px; color: #21293c; background: #f4f4f4; }
        .product-nav .product-link { width: 20px; font-size: 20px; }
        .product-nav .product-link:before { line-height: 32px; }
    <?php elseif ( 'full_width' === $porto_product_layout ) : ?>
        @media (max-width: 991px) {
            .summary-before { max-width: none; }
        }
        .product-layout-full_width { margin-left: 0 !important; margin-right: 0 !important; margin-bottom: 0 !important; }
        .product-layout-full_width > div:not(.product-summary-wrap),
        .porto-related-products .container-fluid { padding-left: 50px; padding-right: 50px; }
        body.boxed .porto-related-products .container-fluid,
        .main-boxed .porto-related-products .container-fluid { padding-left: 20px; padding-right: 20px; }
        .product-summary-wrap { padding-<?php echo $right; ?>: 50px; }
        @media (max-width: 1199px) {
            .product-layout-full_width > div:not(.product-summary-wrap),
            .porto-related-products .container-fluid { padding-left: 30px; padding-right: 30px; }
            .product-summary-wrap { padding-<?php echo $right; ?>: 30px; }
        }
        @media (max-width: 992px) {
            .product-summary-wrap { padding-<?php echo $left; ?>: 30px; }
        }
        .single-product .product-thumbnails { position: absolute; top: 30px; <?php echo $left; ?>: 30px; z-index: 2; }
        .single-product .main-boxed .product-thumbnails,
        .single-product.boxed .product-thumbnails { top: 20px; <?php echo $left; ?>: 20px; }
        .single-product .product-thumbnails .img-thumbnail { width: 100px; border: 1px solid rgba(0, 0, 0, 0.1); cursor: pointer; margin-bottom: 10px; background-color: rgba(244, 244, 244, 0.5); }
        .single-product.boxed .product-thumbnails .img-thumbnail { width: 80px; }
        .single-product .product-thumbnails .img-thumbnail img { opacity: 0.5; }
        @media (max-width: 1679px) {
            .single-product .product-thumbnails { <?php echo $left; ?>: 30px; top: 20px; }
            .single-product .product-thumbnails .img-thumbnail { width: 80px; }
            .single-product.boxed .product-thumbnails .img-thumbnail { width: 70px; }
        }
        @media (max-width: 575px) {
            .single-product .product-thumbnails { <?php echo $left; ?>: 30px; top: 20px; }
            .single-product .product-thumbnails .img-thumbnail { width: 60px; }
        }
        .single-product .product-summary-wrap .product-share { display: block; position: absolute; top: 0; <?php echo $right; ?>: -20px; margin-top: 0; }
        .single-product .product-summary-wrap .product-share label { margin: 0; font-size: 9px; letter-spacing: 0.05em; color: #c6c6c6; }
        .single-product .product-summary-wrap .share-links a { display: block; margin: 0 auto 2px; border-radius: 0; }
        .product-nav { <?php echo $right; ?>: 30px; }
        .single-product-custom-block { margin-bottom: 20px; }
        .single-product .product_title { font-size: 40px; line-height: 1; }
        .single-product .main-boxed .product_title,
        .single-product.boxed .product_title { font-size: 28px; }
        @media (max-width: 1680px) {
            .single-product .product_title { font-size: 30px; }
        }
        .single-product .product-summary-wrap .price { font-size: 25px; line-height: 1; letter-spacing: 0; }
        @media (min-width: 576px) {
            .single-product .variations tr { display: inline-block; margin-<?php echo $right; ?>: 15px; }
            .single-product .variations td { padding-top: 0; padding-bottom: 0; }
            .single-product .variations .label { padding-top: 4px; padding-bottom: 4px; }
            .single-product .variations .reset_variations { display: none !important; }
            .single-product .variations .filter-item-list { margin-top: 0; }
        }
        .single-product form.cart { margin-bottom: 40px; }
        @media (min-width: 576px) {
            .single-product .entry-summary .add_to_wishlist:before { border: none; color: <?php echo $b['skin-color']; ?> !important; }
        }
        .single-product .entry-summary .quantity { margin-<?php echo $right; ?>: 10px; }
        .single-product .entry-summary .quantity .plus { font-family: inherit; font-size: 20px; line-height: 23px; font-weight: 200; }
        #main.wide .vc_row { margin-left: -<?php echo $porto_settings['grid-gutter-width'] / 2; ?>px; margin-right: -<?php echo $porto_settings['grid-gutter-width'] / 2; ?>px; }
        <?php if ( $porto_settings['border-radius'] ) { ?>
            .single-product .product-thumbnails .img-thumbnail,
            .single-product .product-thumbnails .img-thumbnail img,
            .product-summary-wrap .single_add_to_cart_button { border-radius: 3px; }
            .single-product .entry-summary .quantity .minus { border-radius: <?php echo $rtl ? '0 2px 2px 0' : '2px 0 0 2px'; ?>; }
            .single-product .entry-summary .quantity .plus { border-radius: <?php echo $rtl ? '2px 0 0 2px' : '0 2px 2px 0'; ?>; }
            .single-product .product-summary-wrap .share-links a { border-radius: 2px; }
        <?php } ?>
        .filter-item-list .filter-color { width: 28px; height: 28px; }
        .woocommerce-widget-layered-nav-list a:not(.filter-color), .filter-item-list .filter-item { line-height: 26px; font-size: 13px; color: #21293c; background: #f4f4f4; }
    <?php elseif ( 'sticky_info' === $porto_product_layout ) : ?>
        div#main { overflow: hidden; }
        .porto-related-products { background: none; padding-top: 0; }
        .product-images .img-thumbnail { margin-bottom: 4px; }
        .product-images .img-thumbnail .inner { cursor: resize; }
        .product-images .img-thumbnail img { width: 100%; height: auto; }
        .product-images:hover .zoom { opacity: 0; }
        .product-images .img-thumbnail:hover .zoom { opacity: 1; background: none; }
        .single-product .variations .filter-item-list { margin-top: 0; }
        .filter-item-list .filter-color { width: 28px; height: 28px; }
        .woocommerce-widget-layered-nav-list a:not(.filter-color), .filter-item-list .filter-item { line-height: 26px; font-size: 13px; color: #21293c; background: #f4f4f4; }
        .product-nav:before { line-height: 32px; }
        .single-product .share-links a { border-radius: 20px; background: #4c4c4c; margin-<?php echo $right; ?>: 0.2em; }
        .single-product .product-share > * { display: inline-block; }
        .product-share label { margin-<?php echo $right; ?>: 15px; }
        .woocommerce-tabs { clear: both; background: #f4f4f4; padding-top: 70px; padding-bottom: 50px; position: relative; }
        body.boxed .woocommerce-tabs,
        .main-boxed .woocommerce-tabs { background: none; padding-top: 20px; padding-bottom: 0; }
        .woocommerce-tabs .tab-content { background: none; }
        .woocommerce-tabs:before, .woocommerce-tabs:after { content: ''; position: absolute; width: 30vw; height: 100%; top: 0; background: inherit; }
        .woocommerce-tabs:before { right: 100%; }
        .woocommerce-tabs:after { left: 100%; }
        .product-share { margin-bottom: 40px; }
        @media (min-width: 992px) {
            .product-share { float: <?php echo $right; ?>; }
            .single-product-custom-block { float: <?php echo $left; ?>; }
            .single-product-custom-block { width: 50%; padding-<?php echo $right; ?>: <?php echo $porto_settings['grid-gutter-width'] / 2; ?>px; }
            .woocommerce-tabs .resp-tabs-list li { font-size: 18px; margin-<?php echo $right; ?>: 50px; }
        }
        .woocommerce-tabs .resp-tabs-list { text-align: center; }
        .woocommerce-tabs .resp-tabs-list li { position: relative; bottom: -1px; border-bottom-color: transparent !important; }
    <?php elseif ( 'sticky_both_info' === $porto_product_layout ) : ?>
        @media (min-width: 1200px) {
            .single-product .product_title { font-size: 32px; }
        }
        .single-product .product-summary-wrap .product-share { margin-top: 0; margin-bottom: 20px; }
        .product-nav { top: 30px; }
        @media (min-width: 768px) {
            .single-product .product_title { float: <?php echo $left; ?>; width: auto; margin-<?php echo $right; ?>: 20px; }
            .product-nav { position: relative; float: <?php echo $left; ?>; <?php echo $right ;?>: auto; top: 2px; }
            .single-product .product-summary-wrap .product-share { float: <?php echo $right; ?>; margin-top: 0; margin-bottom: 0; }
        }
        .single-product .woocommerce-product-rating { clear: both; }
        .product-layout-sticky_both_info { padding-top: 30px; }
        .product-summary-wrap .summary-before { -webkit-order: 2; -moz-order: 2; order: 2; -ms-flex-order: 2; }
        .product-summary-wrap .summary:last-child { -webkit-order: 3; -moz-order: 3; order: 3; -ms-flex-order: 3; }
        .product-images .img-thumbnail { margin-bottom: 4px; text-align: }
        .product-images .img-thumbnail img { width: 100%; height: auto; }
        .entry-summary .quantity:before { content: 'QTY:'; font-size: 15px; font-weight: 600; color: #21293c; margin-<?php echo $right; ?>: 10px; line-height: 24px; }
        .single-product .entry-summary .quantity { display: -webkit-flex; display: -moz-flex; display: -ms-flexbox; display: flex; -webkit-align-items: center; -moz-align-items: center; -ms-align-items: center; -ms-flex-align: center; margin-bottom: 20px; }
        .single_add_to_cart_button { margin-<?php echo $right; ?>: 0; width: 100%; }
        .single_variation_wrap { padding-top: 0; }
        .single-product .product-summary-wrap .price { margin-top: 25px; }
        .single-product .variations { width: 100%; }
        .single-product .variations tr { border-bottom: 1px solid #dae2e6; }
        .single-product .variations .label { width: 75px; }
        .variations tr td { padding-top: 15px; padding-bottom: 15px; }
        .variations tr:first-child td { padding-top: 0; }
        .product_meta { text-transform: uppercase; }
        .product_meta span span,
        .product_meta span a,
        .product-summary-wrap .stock { color: #4c4c4c; font-size: 14px; font-weight: 700; }
        .product-summary-wrap .product_meta { margin-top: 30px; padding-bottom: 0; border-bottom: none; }
        .single-product .variations .filter-item-list { margin-top: 0; }
        .filter-item-list .filter-color { width: 28px; height: 28px; }
        .woocommerce-widget-layered-nav-list a:not(.filter-color), .filter-item-list .filter-item { line-height: 26px; font-size: 13px; color: #21293c; background: #f4f4f4; }
        @media (min-width: 992px) {
            .woocommerce-tabs .resp-tabs-list li { font-size: 18px; margin-<?php echo $right; ?>: 50px; }
        }
        .porto-related-products { background: none; }
    <?php elseif ( 'transparent' === $porto_product_layout ) : ?>
        div#main { overflow: hidden; }
        .product-summary-wrap,
        .img-thumbnail,
        .product-summary-wrap:before,
        .product-summary-wrap:after,
        .product-summary-wrap .zoomContainer .zoomWindow { background-color: #f4f4f4; }
        .product-summary-wrap { position: relative; padding-top: 40px; margin-bottom: 40px; }
        .product-summary-wrap:before,
        .product-summary-wrap:after { content: ''; position: absolute; top: 0; width: 30vw; height: 100%; }
        .product-summary-wrap:before { right: 100%; }
        .product-summary-wrap:after { left: 100%; }
        .single-product .entry-summary .quantity .qty { background: none; }
        .product-summary-wrap .summary-before, .product-summary-wrap .summary { margin-bottom: 40px; }
        .product-summary-wrap .summary-before:after { content: ''; display: table; clear: both; }
        .product-summary-wrap .summary-before .product-images { width: 80%; float: <?php echo $right; ?>; padding-<?php echo $left; ?>: 10px; }
        .product-summary-wrap .summary-before .product-thumbnails { width: 20%; float: <?php echo $right; ?>; }
        body.boxed .product-summary-wrap .summary-before .product-thumbnails { padding-left: 10px; }
        .woocommerce-tabs .resp-tabs-list { display: none; }
        .woocommerce-tabs h2.resp-accordion { display: block; }
        .woocommerce-tabs h2.resp-accordion:before { font-size: 20px; font-weight: 400; position: relative; top: -4px; }
        .woocommerce-tabs .tab-content { border-top: none; }
        .porto-related-products { background: none; padding-top: 0; }

        .product-thumbs-vertical-slider .slick-arrow { text-indent: -9999px; width: 40px; height: 30px; display: block; margin-left: auto; margin-right: auto; position: relative; text-shadow: none; background: none; font-size: 30px; color: #21293c; cursor: pointer; }
        .product-thumbs-vertical-slider .slick-arrow:before { content: '\e81b'; font-family: Porto; text-indent: 0; position: absolute; left: 0; width: 100%; line-height: 25px; top: 0; }
        .product-thumbs-vertical-slider .slick-next:before { content: '\e81c'; }
        .product-thumbs-vertical-slider .slick-next { margin-top: 10px; }
        .product-thumbs-vertical-slider .slick-prev { margin-bottom: 0; margin-top: -10px; }
        .product-thumbs-vertical-slider .img-thumbnail { border: 1px solid #ddd; margin-bottom: 10px; }
        .product-thumbs-vertical-slider .img-thumbnail img { width: 100%; height: auto; -webkit-transform: none; transform: none; }
        @media (max-width: 767px) {
            .product-thumbs-vertical-slider .slick-prev, .product-thumbs-vertical-slider .slick-next { display: block !important; }
        }
        .single-product .woocommerce-tabs .tab-content { background: none; }
    <?php elseif ( 'wide_grid' === $porto_product_layout ) : ?>
        @media (min-width: 576px) {
            .page-top .container,
            div#main > .container,
            .porto-related-products .container { max-width: none; }
        }
        @media (min-width: <?php echo $porto_settings['container-width'] + $porto_settings['grid-gutter-width']; ?>px) {
            .page-top .container,
            div#main > .container,
            .porto-related-products .container { max-width: calc(<?php echo $porto_settings['container-width']; ?>px + 15vw); }
        }
        @media (max-width: 991px) {
            .summary-before { max-width: none; }
        }
        .product-summary-wrap { margin-top: 20px; }
        .product-summary-wrap .summary-before { display: -webkit-flex; display: -moz-flex; display: -ms-flexbox; display: flex; }
        .product-summary-wrap .summary-before .product-images { width: calc(100% - 110px); -webkit-order: 2; -moz-order: 2; order: 2; -ms-flex-order: 2; }
        .summary-before .labels .onhot { <?php echo $left; ?>: calc(110px + 0.8em); }
        .product-summary-wrap .summary-before .product-thumbnails { width: 110px; }
        .single-product .product-thumbnails .img-thumbnail { width: 100px; border: 1px solid rgba(0, 0, 0, 0.1); cursor: pointer; margin-bottom: 10px; }
        @media (max-width: 1679px) {
            .single-product .product-thumbnails .img-thumbnail { width: 80px; }
            .product-summary-wrap .summary-before .product-images { width: calc(100% - 90px); }
            .product-summary-wrap .summary-before .product-thumbnails { width: 90px; }
            .summary-before .labels .onhot { <?php echo $left; ?>: calc(90px + 0.8em); }
        }
        @media (max-width: 575px) {
            .single-product .product-thumbnails .img-thumbnail { width: 60px; }
            .product-summary-wrap .summary-before .product-images { width: calc(100% - 60px); }
            .product-summary-wrap .summary-before .product-thumbnails { width: 80px; }
        }
        .product-summary-wrap .summary-before { -webkit-order: 2; -moz-order: 2; order: 2; -ms-flex-order: 2; }
        .product-summary-wrap .summary:last-child { -webkit-order: 3; -moz-order: 3; order: 3; -ms-flex-order: 3; }
        .product_title.show-product-nav { width: calc(100% - 42px); }
        .product-nav { <?php echo $right; ?>: 0; }
        .product-summary-wrap .product_meta { text-transform: uppercase; padding-bottom: 0; border-bottom: none; }
        .product_meta span span,
        .product_meta span a,
        .product-summary-wrap .stock { color: #4c4c4c; font-size: 14px; font-weight: 700; }
        .single-product .woocommerce-product-rating { margin-bottom: 30px; }
        .single-product .variations .filter-item-list { margin-top: 0; }
        .filter-item-list .filter-color { width: 28px; height: 28px; }
        .woocommerce-widget-layered-nav-list a:not(.filter-color), .filter-item-list .filter-item { line-height: 26px; font-size: 13px; color: #21293c; background: #f4f4f4; }
        .single-product .variations { width: 100%; }
        .single-product .variations tr { border-bottom: 1px solid #dae2e6; }
        .variations tr td { padding-top: 15px; padding-bottom: 15px; }
        .variations tr:first-child td { padding-top: 0; }
        .single-product .variations .label { width: 75px; }
        .single_variation_wrap { padding-top: 0; }
        .single-product .product-summary-wrap .price { margin-top: 25px; }
        .single-product .product-summary-wrap .product-share { display: block; position: fixed; top: 50%; <?php echo $right; ?>: 15px; margin-top: -100px; z-index: 99; }
        .single-product .product-summary-wrap .product-share label { margin: 0; font-size: 9px; letter-spacing: 0.05em; color: #c6c6c6; }
        .single-product .product-summary-wrap .share-links a { display: block; margin: 0 auto 2px; border-radius: 0; }
        @media (min-width: 768px) {
            .woocommerce-tabs .resp-tabs-list li { margin-<?php echo $right; ?>: 0; display: block; float: <?php echo $left; ?>; clear: both; padding: 3px 0 10px !important; margin-bottom: 13px !important; position: relative; }
            .woocommerce-tabs .resp-tabs-list li:after { content: ''; position: absolute; width: 30vw; bottom: -2px; border-bottom: 1px solid #dae2e6; z-index: 0; <?php echo $left; ?>: 0; }
            .woocommerce-tabs .resp-tabs-list li:hover:before,
            .woocommerce-tabs .resp-tabs-list .resp-tab-active:before { content: ''; position: absolute; width: 100%; bottom: -2px; border-bottom: 1px solid #dae2e6; z-index: 1; border-bottom-color: inherit; }
            .woocommerce-tabs { display: table !important; width: 100%; }
            .woocommerce-tabs .resp-tabs-list,
            .woocommerce-tabs .resp-tabs-container { display: table-cell; vertical-align: top; }
            .woocommerce-tabs .resp-tabs-list { width: 20%; overflow: hidden; }
            .woocommerce-tabs .tab-content { padding-top: 0; border-top: none; padding-<?php echo $left; ?>: 30px; }
        }
        .porto-related-products { background: none; padding-top: 0; }
    <?php elseif ( 'left_sidebar' === $porto_product_layout ) : ?>
        @media (min-width: 1200px) {
            .product-summary-wrap .summary-before { -webkit-flex: 0 0 54%; -moz-flex: 0 0 54%; -ms-flex: 0 0 54%; flex: 0 0 54%; max-width: 54%; }
            .product-summary-wrap .summary { -webkit-flex: 0 0 46%; -moz-flex: 0 0 46%; -ms-flex: 0 0 46%; flex: 0 0 46%; max-width: 46%; }
        }
        .woocommerce-tabs .resp-tabs-list { display: none; }
        .woocommerce-tabs h2.resp-accordion { display: block; }
        .woocommerce-tabs h2.resp-accordion:before { font-size: 20px; font-weight: 400; position: relative; top: -4px; }
        .woocommerce-tabs .tab-content { border-top: none; }
        .porto-related-products { background: none; }
        .left-sidebar .widget_product_categories { border: 1px solid #dae2e6; padding: 15px 30px; }
        .left-sidebar .widget_product_categories .current > a { color: #21293c; text-transform: uppercase; }
        .left-sidebar .widget_product_categories li .toggle { font-size: 14px; }
        .left-sidebar .widget_product_categories li > .toggle:before { font-family: 'Porto'; content: '\e81c'; font-weight: 700; }
        .left-sidebar .widget_product_categories li.current >.toggle:before,
        .left-sidebar .widget_product_categories li.open >.toggle:before { content: '\e81b'; }
        .left-sidebar .widget_product_categories li.closed > .toggle:before { content: '\e81c'; }
        .sidebar .product-categories li>a { color: #7a7d82; font-weight: 600; }
        .product-images .zoom { opacity: 1; }
        .product-layout-left_sidebar .section.porto-related-products > .container { padding-left: 0; padding-right: 0; }
    <?php endif;
endif;

/* skin options */
$body_bg_color = porto_get_meta_value('body_bg_color');
$body_bg_image = porto_get_meta_value('body_bg_image');
$body_bg_repeat = porto_get_meta_value('body_bg_repeat');
$body_bg_size = porto_get_meta_value('body_bg_size');
$body_bg_attachment = porto_get_meta_value('body_bg_attachment');
$body_bg_position = porto_get_meta_value('body_bg_position');

$page_bg_color = porto_get_meta_value('page_bg_color');
$page_bg_image = porto_get_meta_value('page_bg_image');
$page_bg_repeat = porto_get_meta_value('page_bg_repeat');
$page_bg_size = porto_get_meta_value('page_bg_size');
$page_bg_attachment = porto_get_meta_value('page_bg_attachment');
$page_bg_position = porto_get_meta_value('page_bg_position');

$content_bottom_bg_color = porto_get_meta_value('content_bottom_bg_color');
$content_bottom_bg_image = porto_get_meta_value('content_bottom_bg_image');
$content_bottom_bg_repeat = porto_get_meta_value('content_bottom_bg_repeat');
$content_bottom_bg_size = porto_get_meta_value('content_bottom_bg_size');
$content_bottom_bg_attachment = porto_get_meta_value('content_bottom_bg_attachment');
$content_bottom_bg_position = porto_get_meta_value('content_bottom_bg_position');

$header_bg_color = porto_get_meta_value('header_bg_color');
$header_bg_image = porto_get_meta_value('header_bg_image');
$header_bg_repeat = porto_get_meta_value('header_bg_repeat');
$header_bg_size = porto_get_meta_value('header_bg_size');
$header_bg_attachment = porto_get_meta_value('header_bg_attachment');
$header_bg_position = porto_get_meta_value('header_bg_position');

$sticky_header_bg_color = porto_get_meta_value('sticky_header_bg_color');
$sticky_header_bg_image = porto_get_meta_value('sticky_header_bg_image');
$sticky_header_bg_repeat = porto_get_meta_value('sticky_header_bg_repeat');
$sticky_header_bg_size = porto_get_meta_value('sticky_header_bg_size');
$sticky_header_bg_attachment = porto_get_meta_value('sticky_header_bg_attachment');
$sticky_header_bg_position = porto_get_meta_value('sticky_header_bg_position');

$footer_top_bg_color = porto_get_meta_value('footer_top_bg_color');
$footer_top_bg_image = porto_get_meta_value('footer_top_bg_image');
$footer_top_bg_repeat = porto_get_meta_value('footer_top_bg_repeat');
$footer_top_bg_size = porto_get_meta_value('footer_top_bg_size');
$footer_top_bg_attachment = porto_get_meta_value('footer_top_bg_attachment');
$footer_top_bg_position = porto_get_meta_value('footer_top_bg_position');

$footer_bg_color = porto_get_meta_value('footer_bg_color');
$footer_bg_image = porto_get_meta_value('footer_bg_image');
$footer_bg_repeat = porto_get_meta_value('footer_bg_repeat');
$footer_bg_size = porto_get_meta_value('footer_bg_size');
$footer_bg_attachment = porto_get_meta_value('footer_bg_attachment');
$footer_bg_position = porto_get_meta_value('footer_bg_position');

$footer_main_bg_color = porto_get_meta_value('footer_main_bg_color');
$footer_main_bg_image = porto_get_meta_value('footer_main_bg_image');
$footer_main_bg_repeat = porto_get_meta_value('footer_main_bg_repeat');
$footer_main_bg_size = porto_get_meta_value('footer_main_bg_size');
$footer_main_bg_attachment = porto_get_meta_value('footer_main_bg_attachment');
$footer_main_bg_position = porto_get_meta_value('footer_main_bg_position');

$footer_bottom_bg_color = porto_get_meta_value('footer_bottom_bg_color');
$footer_bottom_bg_image = porto_get_meta_value('footer_bottom_bg_image');
$footer_bottom_bg_repeat = porto_get_meta_value('footer_bottom_bg_repeat');
$footer_bottom_bg_size = porto_get_meta_value('footer_bottom_bg_size');
$footer_bottom_bg_attachment = porto_get_meta_value('footer_bottom_bg_attachment');
$footer_bottom_bg_position = porto_get_meta_value('footer_bottom_bg_position');

$breadcrumbs_bg_color = porto_get_meta_value('breadcrumbs_bg_color');
$breadcrumbs_bg_image = porto_get_meta_value('breadcrumbs_bg_image');
$breadcrumbs_bg_repeat = porto_get_meta_value('breadcrumbs_bg_repeat');
$breadcrumbs_bg_size = porto_get_meta_value('breadcrumbs_bg_size');
$breadcrumbs_bg_attachment = porto_get_meta_value('breadcrumbs_bg_attachment');
$breadcrumbs_bg_position = porto_get_meta_value('breadcrumbs_bg_position');

if ( $body_bg_color || $body_bg_image || $body_bg_repeat || $body_bg_size || $body_bg_attachment || $body_bg_position
    || $page_bg_color || $page_bg_image || $page_bg_repeat || $page_bg_size || $page_bg_attachment || $page_bg_position
    || $content_bottom_bg_color || $content_bottom_bg_image || $content_bottom_bg_repeat || $content_bottom_bg_size || $content_bottom_bg_attachment || $content_bottom_bg_position
    || $header_bg_color || $header_bg_image || $header_bg_repeat || $header_bg_size || $header_bg_attachment || $header_bg_position
    || $sticky_header_bg_color || $sticky_header_bg_image || $sticky_header_bg_repeat || $sticky_header_bg_size || $sticky_header_bg_attachment || $sticky_header_bg_position
    || $footer_top_bg_color || $footer_top_bg_image || $footer_top_bg_repeat || $footer_top_bg_size || $footer_top_bg_attachment || $footer_top_bg_position
    || $footer_bg_color || $footer_bg_image || $footer_bg_repeat || $footer_bg_size || $footer_bg_attachment || $footer_bg_position
    || $footer_main_bg_color || $footer_main_bg_image || $footer_main_bg_repeat || $footer_main_bg_size || $footer_main_bg_attachment || $footer_main_bg_position
    || $footer_bottom_bg_color || $footer_bottom_bg_image || $footer_bottom_bg_repeat || $footer_bottom_bg_size || $footer_bottom_bg_attachment || $footer_bottom_bg_position
    || $breadcrumbs_bg_color || $breadcrumbs_bg_image || $breadcrumbs_bg_repeat || $breadcrumbs_bg_size || $breadcrumbs_bg_attachment || $breadcrumbs_bg_position) :
    ?><?php
    if ($body_bg_color || $body_bg_image || $body_bg_repeat || $body_bg_size || $body_bg_attachment || $body_bg_position) :
    ?>body {<?php
        if ($body_bg_color) : ?>background-color: <?php echo $body_bg_color ?> !important;<?php endif;
        if ($body_bg_image == 'none') : echo 'background-image: none !important'; else : if ($body_bg_image) : ?>background-image: url('<?php echo esc_url(str_replace(array('http://', 'https://'), array('//', '//'), $body_bg_image)) ?>') !important;<?php endif; endif;
        if ($body_bg_repeat) : ?>background-repeat: <?php echo $body_bg_repeat ?> !important;<?php endif;
        if ($body_bg_size) : ?>background-size: <?php echo $body_bg_size ?> !important;<?php endif;
        if ($body_bg_attachment) : ?>background-attachment: <?php echo $body_bg_attachment ?> !important;<?php endif;
        if ($body_bg_position) : ?>background-position: <?php echo $body_bg_position ?> !important;<?php endif;
    ?>}<?php
    endif;
    if ($page_bg_color || $page_bg_image || $page_bg_repeat || $page_bg_size || $page_bg_attachment || $page_bg_position) :
    ?>#main {<?php
        if ($page_bg_color) : ?>background-color: <?php echo $page_bg_color ?> !important;<?php endif;
        if ($page_bg_image == 'none') : echo 'background-image: none !important'; else : if ($page_bg_image) : ?>background-image: url('<?php echo esc_url(str_replace(array('http://', 'https://'), array('//', '//'), $page_bg_image)) ?>') !important;<?php endif; endif;
        if ($page_bg_repeat) : ?>background-repeat: <?php echo $page_bg_repeat ?> !important;<?php endif;
        if ($page_bg_size) : ?>background-size: <?php echo $page_bg_size ?> !important;<?php endif;
        if ($page_bg_attachment) : ?>background-attachment: <?php echo $page_bg_attachment ?> !important;<?php endif;
        if ($page_bg_position) : ?>background-position: <?php echo $page_bg_position ?> !important;<?php endif;
    ?>}<?php
        if ($page_bg_color == 'transparent') :
        ?>.page-content { margin-left: -<?php echo $porto_settings['grid-gutter-width'] / 2 ?>px; margin-right: -<?php echo $porto_settings['grid-gutter-width'] / 2 ?>px;} .main-content { padding-bottom: 0 !important; } .left-sidebar, .right-sidebar, .wide-left-sidebar, .wide-right-sidebar { padding-top: 0 !important; padding-bottom: 0 !important; margin: 0; }<?php
        endif;
    endif;
    if ($content_bottom_bg_color || $content_bottom_bg_image || $content_bottom_bg_repeat || $content_bottom_bg_size || $content_bottom_bg_attachment || $content_bottom_bg_position) :
    ?>#main .content-bottom-wrapper {<?php
        if ($content_bottom_bg_color) : ?>background-color: <?php echo $content_bottom_bg_color ?> !important;<?php endif;
        if ($content_bottom_bg_image == 'none') : echo 'background-image: none !important'; else : if ($content_bottom_bg_image) : ?>background-image: url('<?php echo esc_url(str_replace(array('http://', 'https://'), array('//', '//'), $content_bottom_bg_image)) ?>') !important;<?php endif; endif;
        if ($content_bottom_bg_repeat) : ?>background-repeat: <?php echo $content_bottom_bg_repeat ?> !important;<?php endif;
        if ($content_bottom_bg_size) : ?>background-size: <?php echo $content_bottom_bg_size ?> !important;<?php endif;
        if ($content_bottom_bg_attachment) : ?>background-attachment: <?php echo $content_bottom_bg_attachment ?> !important;<?php endif;
        if ($content_bottom_bg_position) : ?>background-position: <?php echo $content_bottom_bg_position ?> !important;<?php endif;
    ?>}<?php
    endif;
    if ($header_bg_color || $header_bg_image || $header_bg_repeat || $header_bg_size || $header_bg_attachment || $header_bg_position) :
    ?>#header, .fixed-header #header {<?php
        if ($header_bg_color) : ?>background-color: <?php echo $header_bg_color ?> !important;<?php endif;
        if ($header_bg_image == 'none') : echo 'background-image: none !important'; else : if ($header_bg_image) : ?>background-image: url('<?php echo esc_url(str_replace(array('http://', 'https://'), array('//', '//'), $header_bg_image)) ?>') !important;<?php endif; endif;
        if ($header_bg_repeat) : ?>background-repeat: <?php echo $header_bg_repeat ?> !important;<?php endif;
        if ($header_bg_size) : ?>background-size: <?php echo $header_bg_size ?> !important;<?php endif;
        if ($header_bg_attachment) : ?>background-attachment: <?php echo $header_bg_attachment ?> !important;<?php endif;
        if ($header_bg_position) : ?>background-position: <?php echo $header_bg_position ?> !important;<?php endif;
    ?>}<?php
    endif;
    if ($sticky_header_bg_color || $sticky_header_bg_image || $sticky_header_bg_repeat || $sticky_header_bg_size || $sticky_header_bg_attachment || $sticky_header_bg_position) :
    ?>#header.sticky-header, .fixed-header #header.sticky-header {<?php
        if ($sticky_header_bg_color) : ?>background-color: <?php echo $sticky_header_bg_color ?> !important;<?php endif;
        if ($sticky_header_bg_image == 'none') : echo 'background-image: none !important'; else : if ($sticky_header_bg_image) : ?>background-image: url('<?php echo esc_url(str_replace(array('http://', 'https://'), array('//', '//'), $sticky_header_bg_image)) ?>') !important;<?php endif; endif;
        if ($sticky_header_bg_repeat) : ?>background-repeat: <?php echo $sticky_header_bg_repeat ?> !important;<?php endif;
        if ($sticky_header_bg_size) : ?>background-size: <?php echo $sticky_header_bg_size ?> !important;<?php endif;
        if ($sticky_header_bg_attachment) : ?>background-attachment: <?php echo $sticky_header_bg_attachment ?> !important;<?php endif;
        if ($sticky_header_bg_position) : ?>background-position: <?php echo $sticky_header_bg_position ?> !important;<?php endif;
    ?>}<?php
    endif;
    if ($footer_top_bg_color || $footer_top_bg_image || $footer_top_bg_repeat || $footer_top_bg_size || $footer_top_bg_attachment || $footer_top_bg_position) :
    ?>.footer-top {<?php
        if ($footer_top_bg_color) : ?>background-color: <?php echo $footer_top_bg_color ?> !important;<?php endif;
        if ($footer_top_bg_image == 'none') : echo 'background-image: none !important'; else : if ($footer_top_bg_image) : ?>background-image: url('<?php echo esc_url(str_replace(array('http://', 'https://'), array('//', '//'), $footer_top_bg_image)) ?>') !important;<?php endif; endif;
        if ($footer_top_bg_repeat) : ?>background-repeat: <?php echo $footer_top_bg_repeat ?> !important;<?php endif;
        if ($footer_top_bg_size) : ?>background-size: <?php echo $footer_top_bg_size ?> !important;<?php endif;
        if ($footer_top_bg_attachment) : ?>background-attachment: <?php echo $footer_top_bg_attachment ?> !important;<?php endif;
        if ($footer_top_bg_position) : ?>background-position: <?php echo $footer_top_bg_position ?> !important;<?php endif;
    ?>}<?php
    endif;
    if ($footer_bg_color || $footer_bg_image || $footer_bg_repeat || $footer_bg_size || $footer_bg_attachment || $footer_bg_position) :
    ?>#footer {<?php
        if ($footer_bg_color) : ?>background-color: <?php echo $footer_bg_color ?> !important;<?php endif;
        if ($footer_bg_image == 'none') : echo 'background-image: none !important'; else : if ($footer_bg_image) : ?>background-image: url('<?php echo esc_url(str_replace(array('http://', 'https://'), array('//', '//'), $footer_bg_image)) ?>') !important;<?php endif; endif;
        if ($footer_bg_repeat) : ?>background-repeat: <?php echo $footer_bg_repeat ?> !important;<?php endif;
        if ($footer_bg_size) : ?>background-size: <?php echo $footer_bg_size ?> !important;<?php endif;
        if ($footer_bg_attachment) : ?>background-attachment: <?php echo $footer_bg_attachment ?> !important;<?php endif;
        if ($footer_bg_position) : ?>background-position: <?php echo $footer_bg_position ?> !important;<?php endif;
    ?>}<?php
    endif;
    if ($footer_main_bg_color || $footer_main_bg_image || $footer_main_bg_repeat || $footer_main_bg_size || $footer_main_bg_attachment || $footer_main_bg_position) :
    ?>#footer .footer-main {<?php
        if ($footer_main_bg_color) : ?>background-color: <?php echo $footer_main_bg_color ?> !important;<?php endif;
        if ($footer_main_bg_image == 'none') : echo 'background-image: none !important'; else : if ($footer_main_bg_image) : ?>background-image: url('<?php echo esc_url(str_replace(array('http://', 'https://'), array('//', '//'), $footer_main_bg_image)) ?>') !important;<?php endif; endif;
        if ($footer_main_bg_repeat) : ?>background-repeat: <?php echo $footer_main_bg_repeat ?> !important;<?php endif;
        if ($footer_main_bg_size) : ?>background-size: <?php echo $footer_main_bg_size ?> !important;<?php endif;
        if ($footer_main_bg_attachment) : ?>background-attachment: <?php echo $footer_main_bg_attachment ?> !important;<?php endif;
        if ($footer_main_bg_position) : ?>background-position: <?php echo $footer_main_bg_position ?> !important;<?php endif;
    ?>}<?php
    endif;
    if ($footer_bottom_bg_color || $footer_bottom_bg_image || $footer_bottom_bg_repeat || $footer_bottom_bg_size || $footer_bottom_bg_attachment || $footer_bottom_bg_position) :
    ?>#footer .footer-bottom, .footer-wrapper.fixed #footer .footer-bottom {<?php
        if ($footer_bottom_bg_color) : ?>background-color: <?php echo $footer_bottom_bg_color ?> !important;<?php endif;
        if ($footer_bottom_bg_image == 'none') : echo 'background-image: none !important'; else : if ($footer_bottom_bg_image) : ?>background-image: url('<?php echo esc_url(str_replace(array('http://', 'https://'), array('//', '//'), $footer_bottom_bg_image)) ?>') !important;<?php endif; endif;
        if ($footer_bottom_bg_repeat) : ?>background-repeat: <?php echo $footer_bottom_bg_repeat ?> !important;<?php endif;
        if ($footer_bottom_bg_size) : ?>background-size: <?php echo $footer_bottom_bg_size ?> !important;<?php endif;
        if ($footer_bottom_bg_attachment) : ?>background-attachment: <?php echo $footer_bottom_bg_attachment ?> !important;<?php endif;
        if ($footer_bottom_bg_position) : ?>background-position: <?php echo $footer_bottom_bg_position ?> !important;<?php endif;
    ?>}<?php
    endif;
    if ($breadcrumbs_bg_color || $breadcrumbs_bg_image || $breadcrumbs_bg_repeat || $breadcrumbs_bg_size || $breadcrumbs_bg_attachment || $breadcrumbs_bg_position) :
    ?>.page-top {<?php
        if ($breadcrumbs_bg_color) : ?>background-color: <?php echo $breadcrumbs_bg_color ?> !important;<?php endif;
        if ($breadcrumbs_bg_image == 'none') : echo 'background-image: none !important'; else : if ($breadcrumbs_bg_image) : ?>background-image: url('<?php echo esc_url(str_replace(array('http://', 'https://'), array('//', '//'), $breadcrumbs_bg_image)) ?>') !important;<?php endif; endif;
        if ($breadcrumbs_bg_repeat) : ?>background-repeat: <?php echo $breadcrumbs_bg_repeat ?> !important;<?php endif;
        if ($breadcrumbs_bg_size) : ?>background-size: <?php echo $breadcrumbs_bg_size ?> !important;<?php endif;
        if ($breadcrumbs_bg_attachment) : ?>background-attachment: <?php echo $breadcrumbs_bg_attachment ?> !important;<?php endif;
        if ($breadcrumbs_bg_position) : ?>background-position: <?php echo $breadcrumbs_bg_position ?> !important;<?php endif;
    ?>}<?php endif;
endif;

/* post type woocommerce */
$post_layout = $porto_settings['post-layout'];
if ( 'woocommerce' === $post_layout && !is_woocommerce() && ( is_home() || is_archive() || is_singular('post') ) ) :
?>
    article.post-woocommerce .post-date,
    article.post-woocommerce > .read-more,
    .pagination>a, .pagination>span,
    .pagination .prev, .pagination .next,
    .sidebar-content .widget-title,
    .widget .tagcloud,
    input[type="submit"], .btn,
    .related-posts .read-more { font-family: 'Oswald', <?php echo $b['h2-font']['font-family']; ?>, <?php echo $b['h3-font']['font-family']; ?>; }
    article.post-full > .btn,
    .pagination>.dots { color: <?php echo $b['skin-color']; ?> !important; }
    .pagination>a:hover, .pagination>a:focus, .pagination>span.current { background-color: <?php echo $b['skin-color']; ?>; }

    .post.format-video .mejs-container .mejs-controls { opacity: 0; transition: opacity 0.25s ease; }
    .post.format-video .img-thumbnail:hover .mejs-container .mejs-controls { opacity: 1; }
    article.post-woocommerce { margin-<?php echo $left; ?>: 90px; }
    article.post-woocommerce:after { content: ''; display: block; clear: both; }
    article.post-woocommerce h2.entry-title { color: #21293c; font-size: 22px; font-weight: 600; letter-spacing: normal; line-height: 1.2; margin-bottom: 15px; }
    article.post-woocommerce h2.entry-title a { color: inherit; }
    article.post-woocommerce .post-image,
    article.post-woocommerce .post-date { margin-<?php echo $left; ?>: -90px; }
    article.post-woocommerce .post-date { width: 60px; }
    article.post-woocommerce .post-date .day { font-size: 28px; color: #21293c; font-weight: 400; border: 1px solid #e3e3e3; border-bottom: none; }
    body article.post-woocommerce .post-date .day { color: #21293c; background: none; }
    article.post-woocommerce .post-date .month { font-size: 14px; text-transform: uppercase; }
    article.post-woocommerce .post-meta { float: <?php echo $left; ?>; }
    article.post-woocommerce > .read-more { font-size: 13px; text-transform: uppercase; letter-spacing: 0.05em; float: <?php echo $right; ?>; }
    article.post-woocommerce > .read-more:after { content: '\f04b'; font-family: FontAwesome; margin-<?php echo $left; ?>: 3px; position: relative; top: -1px; }
    article.post-woocommerce .post-content { padding-bottom: 20px; border-bottom: 1px solid #ddd; margin-bottom: 15px; }
    article.post-woocommerce .post-meta { font-size: 13px; text-transform: uppercase; font-weight: 600; letter-spacing: 0; }
    article.post-woocommerce .post-meta a { color: #7b858a; }
    article.post-woocommerce .post-meta i,
    article.post-woocommerce .post-meta .post-views-icon.dashicons { font-size: 16px !important; }
    article.post-woocommerce .post-excerpt { font-size: 15px; line-height: 27px; color: #7b858a; }
    article.post-woocommerce .owl-carousel .owl-nav [class*="owl-"] { background: none; border: none; color: #9a9996; font-size: 30px; }
    article.post-woocommerce .owl-carousel .owl-nav .owl-prev { <?php echo $left; ?>: 20px; }
    article.post-woocommerce .owl-carousel .owl-nav .owl-next { <?php echo $right; ?>: 20px; }
    article.post-woocommerce .owl-carousel .owl-nav .owl-prev:before { content: '\e829'; }
    article.post-woocommerce .owl-carousel .owl-nav .owl-next:before { content: '\e828'; }

    .pagination>a, .pagination>span { padding: 0; min-width: 2.6em; width: auto; height: 2.8em; background: #d1f0ff; border: none; line-height: 2.8em; font-size: 15px; padding: 0 1em; }
    .pagination-wrap .pagination>a, .pagination-wrap .pagination>span { margin: 0 4px 8px; }
    .pagination>.dots { background: none; }
    .pagination .prev,
    .pagination .next { text-indent: 0; text-transform: uppercase; background: #272723; color: #fff; width: auto; }
    .pagination .prev:before,
    .pagination .next:before { display: none; }
    .pagination .prev i,
    .pagination .next i { font-size: 18px; }
    .pagination .prev i:before { content: '\f104'; }
    .pagination .next i:before { content: '\f105'; }
    .pagination span.dots { min-width: 1.8em; font-size: 15px; }

    /* sidebar */
    .widget .tagcloud a { font-size: 14px !important; text-transform: uppercase; color: #fff; background: #272723; padding: 12px 22px; border: none; border-radius: 3px; letter-spacing: 0.05em; }
    .sidebar-content { border: 1px solid #e1e1e1; padding: 20px; }
    .sidebar-content .widget:last-child { margin-bottom: 0; }
    .sidebar-content .widget .widget-title { font-size: 17px; font-weight: 400; }
    .widget-recent-posts { line-height: 1.25; }
    .widget-recent-posts a { color: #21293c; font-size: 16px; font-weight: 600; line-height: 1.25; }
    .post-item-small .post-date { margin-top: 10px; }
    .post-item-small .post-image img { width: 60px; margin-<?php echo $right; ?>: 5px; margin-bottom: 5px; }
    .widget_categories>ul li { padding: <?php echo $rtl ? '10px 15px 10px 0' : '10px 0 10px 15px'; ?>; }
    .widget>ul li>ul { margin-top: 10px; }
    .widget>ul { font-size: 14px; }
    .widget_categories > ul li:before { border: none; content: '\f105'; font-family: FontAwesome; font-size: 15px; color: #21293c; margin-<?php echo $right; ?>: 15px; width: auto; height: auto; }
    .widget>ul { border-bottom: none; }
<?php
endif;

/* single post */
if ( is_singular( 'post' ) ) :
    $post_layout = get_post_meta(get_the_ID(), 'post_layout', true);
    $post_layout = ($post_layout == 'default' || !$post_layout) ? $porto_settings['post-content-layout'] : $post_layout;
    if ( 'woocommerce' === $post_layout ) : ?>
        article.post-woocommerce { margin-<?php echo $left; ?>: 0; }
        article.post-woocommerce .post-image, article.post-woocommerce .post-date { margin-<?php echo $left; ?>: 0; }
        article.post-woocommerce .post-date { margin-<?php echo $right; ?>: 30px; }
        .single-post article.post-woocommerce .post-content { border-bottom: none; padding-bottom: 0; margin-bottom: 0; }
        .single-post #content hr { display: none; }
        .entry-content { padding-bottom: 30px; border-bottom: 1px solid #ddd; padding-<?php echo $left; ?>: 90px; margin-bottom: 20px; }
        @media (min-width: 1200px) {
            .entry-content { padding-<?php echo $right; ?>: 80px; }
        }
        .post-share { border-top: none; margin-top: 0; padding: 0; float: <?php echo $right; ?>; }
        .post-share h3 { margin: 0; }
        .post-block h3, .post-share h3, article.post .comment-respond h3, article.portfolio .comment-respond h3, .related-posts .sub-title { color: #21293c; font-size: 19px; font-weight: 700; text-transform: uppercase; line-height: 1.5; margin-bottom: 15px; }
        article.post-woocommerce .share-links a { width: 22px; height: 22px; border-radius: 11px; background: #939393; color: #fff; font-size: 11px; font-weight: 400; margin: <?php echo $rtl ? '2px 0 2px 4px' : '2px 4px 2px 0'; ?>; }
        .post-meta { padding-<?php echo $left; ?>: 90px; }
        article.post .post-meta>span, article.post .post-meta>.post-views { padding-<?php echo $right; ?>: 20px; }
        .post-author { margin-top: 0; }
        .post-author .name a { color: #21293c; font-size: 18px; text-transform: uppercase; }
        .post-author p { margin-bottom: 10px; font-size: 1em; line-height: 1.8; }
        article.post .comment-respond { margin-top: 0; }
        .comment-form input[type="text"], .comment-form textarea { box-shadow: none; }
        .comment-form input[type="text"] { padding: 10px 12px; }
        input[type="submit"], .btn { background: #272723; border: none; text-transform: uppercase; }
        .related-posts h3 { font-size: 19px; color: #21293c; line-height: 26px; font-weight: 600; margin-top: 5px; margin-bottom: 15px; }
        .related-posts .meta-date { color: #7b858a; font-size: 13px; text-transform: uppercase; letter-spacing: 0; }
        .related-posts .meta-date i { font-size: 18px; margin-<?php echo $right; ?>: 5px; }
        .related-posts .read-more { text-transform: uppercase; }
    <?php endif;
endif;

/* horizontal shop filter */
if ( class_exists( 'Woocommerce' ) && ( is_product_taxonomy() || is_post_type_archive( 'product' ) || is_page( wc_get_page_id( 'shop' ) ) ) ) :
    global $porto_shop_filter_layout;
    $porto_shop_filter_layout = false;
    $term = get_queried_object();
    if ( $term && isset( $term->taxonomy ) && isset( $term->term_id ) ) {
        $porto_shop_filter_layout = get_metadata( $term->taxonomy, $term->term_id, 'filter_layout', true );
    }
    if ( !$porto_shop_filter_layout ) {
        $porto_shop_filter_layout = $porto_settings['product-archive-filter-layout'];
    }
    if ( 'horizontal' === $porto_shop_filter_layout || 'horizontal2' === $porto_shop_filter_layout ) {
?>
        .porto_widget_price_filter .widget-title { position: relative; }
        .porto_widget_price_filter .widget-title .toggle { display: inline-block; width: 1.8571em; height: 1.8571em; line-height: 1.7572em; position: absolute; <?php echo $right; ?>: -7px; top: 50%; margin-top: -0.9em; padding: 0; cursor: pointer; font-family: "porto"; text-align: center; -webkit-transition: all 0.25s ease 0s; -moz-transition: all 0.25s ease 0s; transition: all 0.25s ease 0s; color: #21293c; font-size: 17px; }
        .porto_widget_price_filter { font-weight: 500; }
        .porto_widget_price_filter label { font-size: 12px; margin-bottom: 0; }
        .porto_widget_price_filter .form-control { box-shadow: none; margin-bottom: 10px; }
        .porto_widget_price_filter .widget-title .toggle:before { content: "\e81c"; }
        .porto-product-filters .widget>div>ul, .porto-product-filters .widget>ul { font-size: 12px; font-weight: 600; border-bottom: none; text-transform: uppercase; padding: 0; }
        .porto_widget_price_filter .button { text-transform: uppercase; }
        .porto-product-filters .widget>div>ul li, .porto-product-filters .widget>ul li { border-top: none; }
        .porto-product-filters .widget_product_categories ul li>a,
        .porto-product-filters .widget_product_categories ol li>a,
        .porto-product-filters .porto_widget_price_filter ul li>a,
        .porto-product-filters .porto_widget_price_filter ol li>a,
        .porto-product-filters .widget_layered_nav ul li>a,
        .porto-product-filters .widget_layered_nav ol li>a, 
        .porto-product-filters .widget_layered_nav_filters ul li>a,
        .porto-product-filters .widget_layered_nav_filters ol li>a,
        .porto-product-filters .widget_rating_filter ul li>a,
        .porto-product-filters .widget_rating_filter ol li>a { padding: 7px 0; }
        .porto-product-filters .widget { margin-bottom: 0; }
        .porto-product-filters .widget_product_categories ul li .toggle { top: 3px; }
        .woocommerce-result-count { margin-bottom: 0; float: <?php echo $right; ?>; margin-top: 6px; font-size: 12px; color: #7a7d82; margin-<?php echo $left; ?>: 10px; line-height: 24px; }
        @media (max-width: 480px) {
            .shop-loop-before .gridlist-toggle { clear: both; }
        }
        .widget_product_categories ul li .toggle:before { content: '\f105' !important; font-weight: 400; font-family: FontAwesome !important; }
<?php
    }
    if ( 'horizontal' === $porto_shop_filter_layout ) {
?>
        .porto-product-filters-toggle { display: block; height: 34px; line-height: 34px; padding: 0 10px; width: 160px; border: 1px solid #e4e4e4; color: inherit; background: #fff url("<?php echo porto_uri; ?>/images/select-bg.svg") no-repeat; background-position: <?php echo $rtl ? '4' : '96'; ?>% -13px; background-size: 26px 60px; margin-<?php echo $right; ?>: 10px; position: relative; font-size: .9286em; }
        @media (max-width: 480px) {
            .porto-product-filters-toggle, .woocommerce-ordering select { width: 80px; }
        }
        .porto-product-filters-toggle:hover { color: inherit; text-decoration: none; }
        .porto-product-filters-toggle + .woocommerce-ordering label { display: none; }
        .porto-product-filters-toggle.opened:before { content: ''; position: absolute; top: 100%; border-bottom: 11px solid #e4e4e4; border-left: 11px solid transparent; border-right: 11px solid transparent; <?php echo $left; ?>: 20px; }
        .porto-product-filters-toggle.opened:after { content: ''; position: absolute; top: 100%; border-bottom: 10px solid #fff; border-left: 10px solid transparent; border-right: 10px solid transparent; <?php echo $left; ?>: 21px; margin-top: 1px; z-index: 999; }
        .shop-loop-before { position: relative; }
        .porto-product-filters { float: <?php echo $left; ?>; }
        .porto-product-filters .porto-product-filters-body { border: 1px solid #e4e4e4; padding: 20px 25px; margin-bottom: 30px; box-shadow: 0 5px 30px 0 #f4f4f4; background: #fff; display: none; position: absolute; top: 100%; <?php echo $left; ?>: 0; z-index: 9; margin-top: -6px; }
        .porto-product-filters .row { margin-left: -10px; margin-right: -10px; }
        .porto-product-filters .row > .widget { padding-left: 10px; padding-right: 10px; min-width: 170px; }
        .porto-product-filters .widget_sidebar_menu .widget-title,
        .porto-product-filters .widget_product_categories .widget-title,
        .porto-product-filters .widget_price_filter .widget-title,
        .porto-product-filters .widget_layered_nav .widget-title,
        .porto-product-filters .widget_layered_nav_filters .widget-title,
        .porto-product-filters .widget_rating_filter .widget-title { background: none; border-bottom: none; padding: 0; }
        .porto-product-filters .widget-title .toggle { pointer-events: none; display: none; }
        .porto_widget_price_filter { margin-top: 0; }
        .porto-product-filters .widget .widget-title { margin-bottom: 10px; }
<?php
    } else if ( 'horizontal2' === $porto_shop_filter_layout ) {
?>
        .gridlist-toggle { margin-<?php echo $left; ?>: 6px; }
        .shop-loop-before .woocommerce-ordering { margin-<?php echo $right; ?>: 0; }
        .woocommerce-ordering label { display: none; }
        .woocommerce-ordering select { margin-<?php echo $left; ?>: 0; }
        @media (max-width: 480px) {
            .woocommerce-ordering select { width: 80px; }
        }
        .porto-product-filters .widget-title .toggle { display: none; }
        .porto-product-filters .widget { display: block; float: <?php echo $left; ?>; max-width: none; width: auto; flex: none; padding: 0; background: #fff url("<?php echo porto_uri; ?>/images/select-bg.svg") no-repeat; background-position: <?php echo $rtl ? '4' : '96'; ?>% -13px; background-size: 26px 60px; margin-bottom: 15px; margin-top: 0; margin-<?php echo $right; ?>: 10px; position: relative; font-size: .9286em; }
        @media (max-width: 480px) {
            .porto-product-filters .widget, .woocommerce-ordering select { width: 80px; }
        }
        @media (min-width: 992px) {
            .porto-product-filters .widget-title { background: none; font-size: inherit !important; border-bottom: none; padding: 0; text-transform: none; color: inherit !important; font-weight: 400; cursor: pointer; height: 34px; line-height: 34px; padding: 0 10px; width: 160px; border: 1px solid #e4e4e4; color: inherit; margin-bottom: 0; -webkit-transition: none; -moz-transition: none; transition: none; }
            .porto-product-filters .widget>div>ul, .porto-product-filters .widget>ul, .porto-product-filters .widget > form { display: none; position: absolute; padding: 10px 15px 10px; top: 100%; margin-top: 9px; <?php echo $left; ?>: 0; min-width: 220px; background: #fff; z-index: 99; box-shadow: 0 1px 3px rgba(0,0,0,0.15); }
            .porto-product-filters .opened .widget-title:before { content: ''; position: absolute; top: 100%; border-bottom: 11px solid #e8e8e8; border-left: 11px solid transparent; border-right: 11px solid transparent; <?php echo $left; ?>: 20px; }
            .porto-product-filters .opened .widget-title:after { content: ''; position: absolute; top: 100%; border-bottom: 10px solid #fff; border-left: 10px solid transparent; border-right: 10px solid transparent; <?php echo $left; ?>: 21px; margin-top: 1px; z-index: 999; }
        }
        .porto-product-filters .widget-title { font-family: inherit; }
<?php
    }
    if ( 'horizontal' === $porto_shop_filter_layout || 'horizontal2' === $porto_shop_filter_layout ) {
?>      
        @media (max-width: 991px) {
            .porto-product-filters-toggle { display: none; }
            .porto-product-filters .sidebar-toggle { margin-top: 50px; }
            .porto-product-filters.mobile-sidebar { position: fixed; }
            .porto-product-filters .widget { float: none; margin-right: 0; background: none; margin-bottom: 20px; width: 100%; }
            .porto-product-filters .row > .widget { padding-left: 10px !important; padding-right: 10px !important; }
            .porto-product-filters .porto-product-filters-body { height: 100%; overflow-x: hidden; overflow-y: scroll; padding: 20px; display: block !important; top: 0; box-shadow: none; }
            .porto-product-filters .widget-title { padding: 0; background: none; border-bottom: none; background: none; pointer-events: none; margin-bottom: 15px; }
            .porto-product-filters .widget-title .toggle { display: block; pointer-events: none; }
            .porto-product-filters .widget>div>ul, .porto-product-filters .widget>ul, .porto-product-filters .widget > form { display: block !important; }
        }
        html.filter-sidebar-opened body > * { z-index: 0; }
        html.filter-sidebar-opened .porto-product-filters { z-index: 9000; transition: transform 0.3s ease-in-out; -webkit-transform: translate(0px); -moz-transform: translate(0px); -ms-transform: translate(0px); transform: translate(0px); }
        html.filter-sidebar-opened .sidebar-toggle i:before { content: '\f00d'; }
        html.filter-sidebar-opened #wpadminbar { z-index: 8000; }
<?php
    }
endif;

if ( class_exists( 'Woocommerce' ) ) :?>
    /* daily sale */
    .sale-product-daily-deal .daily-deal-title,
    .sale-product-daily-deal .porto_countdown { font-family: 'Oswald', <?php echo $b['h2-font']['font-family']; ?>, <?php echo $b['h3-font']['font-family']; ?>; text-transform: uppercase; }
    .entry-summary .sale-product-daily-deal { margin-top: 10px; }
    .entry-summary .sale-product-daily-deal .porto_countdown { margin-bottom: 5px; }
    .entry-summary .sale-product-daily-deal .porto_countdown-section { background-color: <?php echo $b['skin-color']; ?>; color: #fff; margin-left: 1px; margin-right: 1px; display: block; float: <?php echo $left; ?>; max-width: calc(25% - 2px); min-width: 64px; padding: 12px 10px; }
    .entry-summary .sale-product-daily-deal .porto_countdown .porto_countdown-amount { display: block; font-size: 18px; font-weight: 700; }
    .entry-summary .sale-product-daily-deal .porto_countdown-period { font-size: 10px; }
    .entry-summary .sale-product-daily-deal:after { content: ''; display: table; clear: both; }
    .entry-summary .sale-product-daily-deal .daily-deal-title { text-transform: uppercase; }

    .products .sale-product-daily-deal { position: absolute; left: 10px; right: 10px; bottom: 10px; color: #fff; padding: 5px 0; text-align: center; }
    .products .sale-product-daily-deal:before { content: ''; position: absolute; left: 0; width: 100%; top: 0; height: 100%; background: <?php echo $b['skin-color']; ?>; opacity: 0.7; }
    .products .sale-product-daily-deal > h5,
    .products .sale-product-daily-deal > div { position: relative; z-index: 1; }
    .products .sale-product-daily-deal .daily-deal-title { display: inline-block; color: #fff; font-size: 11px; font-weight: 400; margin-bottom: 0; margin-<?php  echo $right; ?>: 1px; }
    .products .sale-product-daily-deal .porto_countdown { float: none; display: inline-block; text-transform: uppercase; margin-bottom: 0; width: auto; }
    .products .sale-product-daily-deal .porto_countdown-section { padding: 0; margin-bottom: 0; }
    .products .sale-product-daily-deal .porto_countdown-section:first-child:after { content: ','; margin-<?php echo $right; ?>: 2px; }
    .products .sale-product-daily-deal .porto_countdown-amount,
    .products .sale-product-daily-deal .porto_countdown-period { font-size: 13px; font-weight: 500; padding: 0 1px; }
    .products .sale-product-daily-deal .porto_countdown-section:last-child .porto_countdown-period { padding: 0; }
    .products .sale-product-daily-deal:after { content: ''; display: table; clear: both; }
<?php endif;


/* custom css */
$theme_options_custom_css = $porto_settings['css-code'];
$custom_css = porto_get_meta_value('custom_css');
if ( $theme_options_custom_css ) {
    echo trim( preg_replace( '#<style[^>]*>(.*)</style>#is', '$1', $theme_options_custom_css ) );
}
if (! empty( $custom_css )) {
    echo trim( preg_replace( '#<style[^>]*>(.*)</style>#is', '$1', $custom_css ) );
}