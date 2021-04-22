<?php
function porto_check_theme_options() {
    // check default options
    global $porto_settings;
    ob_start();
    include(porto_admin . '/theme_options/default_options.php');
    $options = ob_get_clean();
    $porto_default_settings = json_decode($options, true);
    foreach ($porto_default_settings as $key => $value) {
        if (is_array($value)) {
            foreach ($value as $key1 => $value1) {
                if ($key1 != 'google' && (!isset($porto_settings[$key][$key1]) || !$porto_settings[$key][$key1])) {
                    $porto_settings[$key][$key1] = $porto_default_settings[$key][$key1];
                }
            }
        } else {
            if (!isset($porto_settings[$key])) {
                $porto_settings[$key] = $porto_default_settings[$key];
            }
        }
    }
    return $porto_settings;
}
function porto_options_sidebars() {
    return array(
        'wide-left-sidebar',
        'wide-right-sidebar',
        'left-sidebar',
        'right-sidebar'
    );
}
function porto_options_body_wrapper() {
    return array(
        'wide' => array('alt' => 'Wide', 'img' => porto_options_uri.'/layouts/body_wide.jpg'),
        'full' => array('alt' => 'Full', 'img' => porto_options_uri.'/layouts/body_full.jpg'),
        'boxed' => array('alt' => 'Boxed', 'img' => porto_options_uri.'/layouts/body_boxed.jpg'),
    );
}
function porto_options_layouts() {
    return array(
        "widewidth" => array('alt' => 'Wide Width', 'img' => porto_options_uri.'/layouts/page_wide.jpg'),
        "wide-left-sidebar" => array('alt' => 'Wide Left Sidebar', 'img' => porto_options_uri.'/layouts/page_wide_left.jpg'),
        "wide-right-sidebar" => array('alt' => 'Wide Right Sidebar', 'img' => porto_options_uri.'/layouts/page_wide_right.jpg'),
        "fullwidth" => array('alt' => 'Without Sidebar', 'img' => porto_options_uri.'/layouts/page_full.jpg'),
        "left-sidebar" => array('alt' => "Left Sidebar", 'img' => porto_options_uri.'/layouts/page_full_left.jpg'),
        "right-sidebar" => array('alt' => "Right Sidebar", 'img' => porto_options_uri.'/layouts/page_full_right.jpg')
    );
}
function porto_options_wrapper() {
    return array(
        'wide' => array('alt' => 'Wide', 'img' => porto_options_uri.'/layouts/content_wide.jpg'),
        'full' => array('alt' => 'Full', 'img' => porto_options_uri.'/layouts/content_full.jpg'),
        'boxed' => array('alt' => 'Boxed', 'img' => porto_options_uri.'/layouts/content_boxed.jpg'),
    );
}
function porto_options_banner_wrapper() {
    return array(
        'wide' => array('alt' => 'Wide', 'img' => porto_options_uri.'/layouts/content_wide.jpg'),
        'boxed' => array('alt' => 'Boxed', 'img' => porto_options_uri.'/layouts/content_boxed.jpg'),
    );
}
function porto_options_header_types() {
    return array(
        '10' => array('alt' => 'Header Type 10', 'title' => '10', 'img' => porto_options_uri.'/headers/header_10.jpg'),
        '11' => array('alt' => 'Header Type 11', 'title' => '11', 'img' => porto_options_uri.'/headers/header_11.jpg'),
        '12' => array('alt' => 'Header Type 12', 'title' => '12', 'img' => porto_options_uri.'/headers/header_12.jpg'),
        '13' => array('alt' => 'Header Type 13', 'title' => '13', 'img' => porto_options_uri.'/headers/header_13.jpg'),
        '14' => array('alt' => 'Header Type 14', 'title' => '14', 'img' => porto_options_uri.'/headers/header_14.jpg'),
        '15' => array('alt' => 'Header Type 15', 'title' => '15', 'img' => porto_options_uri.'/headers/header_15.jpg'),
        '16' => array('alt' => 'Header Type 16', 'title' => '16', 'img' => porto_options_uri.'/headers/header_16.jpg'),
        '17' => array('alt' => 'Header Type 17', 'title' => '17', 'img' => porto_options_uri.'/headers/header_17.jpg'),

        '1' => array('alt' => 'Header Type 1', 'title' => '1', 'img' => porto_options_uri.'/headers/header_01.png'),
        '2' => array('alt' => 'Header Type 2', 'title' => '2', 'img' => porto_options_uri.'/headers/header_02.jpg'),
        '3' => array('alt' => 'Header Type 3', 'title' => '3', 'img' => porto_options_uri.'/headers/header_03.jpg'),
        '4' => array('alt' => 'Header Type 4', 'title' => '4', 'img' => porto_options_uri.'/headers/header_04.jpg'),
        '5' => array('alt' => 'Header Type 5', 'title' => '5', 'img' => porto_options_uri.'/headers/header_05.jpg'),
        '6' => array('alt' => 'Header Type 6', 'title' => '6', 'img' => porto_options_uri.'/headers/header_06.jpg'),
        '7' => array('alt' => 'Header Type 7', 'title' => '7', 'img' => porto_options_uri.'/headers/header_07.jpg'),
        '8' => array('alt' => 'Header Type 8', 'title' => '8', 'img' => porto_options_uri.'/headers/header_08.jpg'),
        '9' => array('alt' => 'Header Type 9', 'title' => '9', 'img' => porto_options_uri.'/headers/header_09.jpg'),
        
        '18' => array('alt' => 'Header Type 18', 'title' => '18', 'img' => porto_options_uri.'/headers/header_18.jpg'),
        'side' => array('alt' => 'Header Type(Side Navigation)', 'title' => 'Side', 'img' => porto_options_uri.'/headers/header_side.jpg'),
    );
}
function porto_options_footer_types() {
    return array(
        '1' => array('alt' => 'Footer Type 1', 'img' => porto_options_uri.'/footers/footer_01.jpg'),
        '2' => array('alt' => 'Footer Type 2', 'img' => porto_options_uri.'/footers/footer_02.jpg'),
        '3' => array('alt' => 'Footer Type 3', 'img' => porto_options_uri.'/footers/footer_03.jpg')
    );
}
function porto_demo_filters() {
    /*return array(
        '*' => 'Show All',
        'demos' => 'Demos',
        'classic' => 'Classic',
        'corporate' => 'Corporate',
        'shop' => 'Shop',
        'dark' => 'Dark',
        'rtl' => 'RTL',
    );*/
    return array(
        'all' => 'Show All',
        'onepage' => 'One Page',
        'business' => 'Business',
        'portfolio' => 'Portfolio',
        'shop' => 'Shop',
        'classic' => 'Classic',
    );
}
function porto_demo_types() {
    return array(
        'classic' => array(
            'alt' => 'Main Demo <small>(18 VARIATIONS)</small>',
            'slider_cat' => 'classic',
            'img' => porto_options_uri.'/demos/classic_original.jpg',
            'filter' => 'all open-classic',
            'grouped' => true,
        ),
        'shop' => array(
            'alt' => 'Shop Demo <small>(16 VARIATIONS)</small>',
            'slider_cat' => 'shop',
            'img' => porto_options_uri.'/demos/shop1.jpg',
            'filter' => 'all open-shop',
            'grouped' => true,
        ),
        'classic-original' => array(
            'alt' => 'Main Demo',
            'img' => porto_options_uri.'/demos/classic_original.jpg',
            'filter' => 'classic',
            'revslider' => array( 'full-width-slider.zip', 'full-width-video.zip', 'home-classic-original.zip', 'home-one-page.zip', 'media-gallery.zip' ),
        ),
        'construction' => array(
            'alt' => 'Construction',
            'img' => porto_options_uri.'/demos/demo_construction.jpg',
            'filter' => 'business all',
            'revslider' => array( 'demo-construction.zip' ),
        ),
        'hotel' => array(
            'alt' => 'Hotel',
            'img' => porto_options_uri.'/demos/demo_hotel.jpg',
            'filter' => 'business all',
            'revslider' => array( 'demo-hotel.zip' ),
        ),
        'restaurant' => array(
            'alt' => 'Restaurant',
            'img' => porto_options_uri.'/demos/demo_restaurant.jpg',
            'filter' => 'business all',
            'revslider' => array( 'demo-restaurant.zip' ),
        ),
        'law-firm' => array(
            'alt' => 'Law Firm',
            'img' => porto_options_uri.'/demos/demo_law_firm.jpg',
            'filter' => 'business all',
            'revslider' => array( 'demo-law-firm.zip' ),
        ),
        'digital-agency' => array(
            'alt' => 'Digital Agency',
            'img' => porto_options_uri.'/demos/demo_digital_agency.jpg',
            'filter' => 'business all',
            'revslider' => array( 'demo-digital-agency.zip' ),
        ),
        'medical' => array(
            'alt' => 'Medical',
            'img' => porto_options_uri.'/demos/demo_medical.jpg',
            'filter' => 'business all',
            'revslider' => array( 'demo-medical.zip' ),
        ),
        'wedding' => array(
            'alt' => 'Wedding',
            'img' => porto_options_uri.'/demos/demo_wedding.jpg',
            'filter' => 'business onepage all',
            'revslider' => array( 'demo-wedding.zip' ),
        ),
        'photography1' => array(
            'alt' => 'Photography 1',
            'img' => porto_options_uri.'/demos/demo_photography_1.jpg',
            'filter' => 'business portfolio all',
            'revslider' => array( 'Photography1-About-us.zip', 'Photography1-Fullscreen.zip', 'Photography1-Home.zip', 'Photography1-Kenburns.zip' ),
        ),
        'photography2' => array(
            'alt' => 'Photography 2',
            'img' => porto_options_uri.'/demos/demo_photography_2.jpg',
            'filter' => 'business portfolio all',
            'revslider' => array( 'Photography2-aboutus.zip', 'Photography2-Fullscreen.zip', 'Photography2-Home.zip', 'Photography2-Kenburns.zip' ),
        ),
        'photography3' => array(
            'alt' => 'Photography 3',
            'img' => porto_options_uri.'/demos/demo_photography_3.jpg',
            'filter' => 'business portfolio all',
            'revslider' => array( 'Photography3-AboutUs.zip', 'Photography3-Fullscreen.zip', 'Photography3-Home.zip', 'Photography3-Home_2.zip', 'Photography3-Kenburns.zip' ),
        ),
        'business-consulting' => array(
            'alt' => 'Business Consulting',
            'img' => porto_options_uri.'/demos/demo_busi_cons.jpg',
            'filter' => 'business all',
            'revslider' => array( 'home-BC.zip' ),
        ),
        'gym' => array(
            'alt' => 'Gym',
            'img' => porto_options_uri.'/demos/demo_gym.jpg',
            'filter' => 'business all',
            'revslider' => array( 'home-gym.zip' ),
        ),
        'event' => array(
            'alt' => 'Event',
            'img' => porto_options_uri.'/demos/demo_event.jpg',
            'filter' => 'business all',
            'revslider' => array( 'home-event.zip' ),
        ),
        'resume' => array(
            'alt' => 'Resume',
            'img' => porto_options_uri.'/demos/demo_resume.jpg',
            'filter' => 'business onepage portfolio all'
        ),
        'church' => array(
            'alt' => 'Church',
            'img' => porto_options_uri.'/demos/demo_church.jpg',
            'filter' => 'business all',
            'revslider' => array( 'demo-church.zip' ),
        ),
        'finance' => array(
            'alt' => 'Finance',
            'img' => porto_options_uri.'/demos/demo_finance.jpg',
            'filter' => 'business all',
            'revslider' => array( 'home-finance.zip' ),
        ),
        'agency-onepage' => array(
            'alt' => 'Agency Onepage',
            'img' => porto_options_uri.'/demos/agency_onepage.jpg',
            'filter' => 'business onepage portfolio all',
            'revslider' => array( 'agency-onepage.zip' ),
        ),
        'app-landing' => array(
            'alt' => 'App Landing',
            'img' => porto_options_uri.'/demos/demo_applanding.jpg',
            'filter' => 'business onepage all'
        ),
		'real-estate' => array(
            'alt' => 'Real Estate',
            'img' => porto_options_uri.'/demos/demo_real_estate.jpg',
            'filter' => 'business all',
			'revslider' => array( 'real-estate-home.zip' ),
        ),
        'classic-color' => array(
            'alt' => 'Classic Color',
            'img' => porto_options_uri.'/demos/classic_color.jpg',
            'filter' => 'classic',
            'revslider' => array( 'full-width-slider.zip', 'full-width-video.zip', 'home-classic-color.zip', 'home-one-page.zip', 'media-gallery.zip' ),
        ),
        'classic-light' => array(
            'alt' => 'Classic Light',
            'img' => porto_options_uri.'/demos/classic_light.jpg',
            'filter' => 'classic',
            'revslider' => array( 'full-width-slider.zip', 'full-width-video.zip', 'home-classic-light.zip', 'home-one-page.zip', 'media-gallery.zip' ),
        ),
        'classic-video' => array(
            'alt' => 'Classic Video',
            'img' => porto_options_uri.'/demos/classic_video.jpg',
            'filter' => 'classic',
            'revslider' => array( 'full-width-slider.zip', 'full-width-video.zip', 'home-classic-video.zip', 'home-one-page.zip', 'media-gallery.zip' ),
        ),
        'classic-video-light' => array(
            'alt' => 'Classic Video Light',
            'img' => porto_options_uri.'/demos/classic_video_light.jpg',
            'filter' => 'classic',
            'revslider' => array( 'full-width-slider.zip', 'full-width-video.zip', 'home-classic-video-light', 'home-one-page.zip', 'media-gallery.zip' ),
        ),
        'corporate1' => array(
            'alt' => 'Corporate 1',
            'img' => porto_options_uri.'/demos/corporate_1.jpg',
            'filter' => 'classic',
            'revslider' => array( 'full-width-slider.zip', 'full-width-video.zip', 'home-corporate-1.zip', 'home-one-page.zip', 'media-gallery.zip' ),
        ),
        'corporate2' => array(
            'alt' => 'Corporate 2',
            'img' => porto_options_uri.'/demos/corporate_2.jpg',
            'filter' => 'classic',
            'revslider' => array( 'full-width-slider.zip', 'full-width-video.zip', 'home-corporate-2.zip', 'home-one-page.zip', 'media-gallery.zip' ),
        ),
        'corporate3' => array(
            'alt' => 'Corporate 3',
            'img' => porto_options_uri.'/demos/corporate_3.jpg',
            'filter' => 'classic',
            'revslider' => array( 'full-width-slider.zip', 'full-width-video.zip', 'home-corporate-3.zip', 'home-one-page.zip', 'media-gallery.zip' ),
        ),
        'corporate4' => array(
            'alt' => 'Corporate 4',
            'img' => porto_options_uri.'/demos/corporate_4.jpg',
            'filter' => 'classic',
            'revslider' => array( 'full-width-slider.zip', 'full-width-video.zip', 'home-corporate-4.zip', 'home-one-page.zip', 'media-gallery.zip' ),
        ),
        'corporate5' => array(
            'alt' => 'Corporate 5',
            'img' => porto_options_uri.'/demos/corporate_5.jpg',
            'filter' => 'classic',
            'revslider' => array( 'full-width-slider.zip', 'full-width-video.zip', 'home-corporate-5.zip', 'home-one-page.zip', 'media-gallery.zip' ),
        ),
        'corporate6' => array(
            'alt' => 'Corporate 6',
            'img' => porto_options_uri.'/demos/corporate_6.jpg',
            'filter' => 'classic',
            'revslider' => array( 'full-width-slider.zip', 'full-width-video.zip', 'home-corporate-6.zip', 'home-one-page.zip', 'media-gallery.zip' ),
        ),
        'corporate7' => array(
            'alt' => 'Corporate 7',
            'img' => porto_options_uri.'/demos/corporate_7.jpg',
            'filter' => 'classic',
            'revslider' => array( 'full-width-slider.zip', 'full-width-video.zip', 'home-corporate-7.zip', 'home-one-page.zip', 'media-gallery.zip' ),
        ),
        'corporate8' => array(
            'alt' => 'Corporate 8',
            'img' => porto_options_uri.'/demos/corporate_8.jpg',
            'filter' => 'classic',
            'revslider' => array( 'full-width-slider.zip', 'full-width-video.zip', 'hhome-corporate-8.zip', 'home-one-page.zip', 'media-gallery.zip' ),
        ),
        'corporate-hosting' => array(
            'alt' => 'Corporate Hosting',
            'img' => porto_options_uri.'/demos/corporate_hosting.jpg',
            'filter' => 'classic',
            'revslider' => array( 'full-width-slider.zip', 'full-width-video.zip', 'home-corporate-hosting.zip', 'home-one-page.zip', 'media-gallery.zip' ),
        ),
        'shop1' => array(
            'alt' => 'Shop 1',
            'img' => porto_options_uri.'/demos/shop1.jpg',
            'filter' => 'shop',
            'plugins' => array( 'woocommerce' ),
        ),
        'shop2' => array(
            'alt' => 'Shop 2',
            'img' => porto_options_uri.'/demos/shop2.jpg',
            'filter' => 'shop',
            'plugins' => array( 'woocommerce' ),
        ),
        'shop3' => array(
            'alt' => 'Shop 3',
            'img' => porto_options_uri.'/demos/shop3.jpg',
            'filter' => 'shop',
            'plugins' => array( 'woocommerce' ),
        ),
        'shop4' => array(
            'alt' => 'Shop 4',
            'img' => porto_options_uri.'/demos/shop4.jpg',
            'filter' => 'shop',
            'plugins' => array( 'woocommerce' ),
        ),
        'shop5' => array(
            'alt' => 'Shop 5',
            'img' => porto_options_uri.'/demos/shop5.jpg',
            'filter' => 'shop',
            'plugins' => array( 'woocommerce' ),
        ),
        'shop6' => array(
            'alt' => 'Shop 6',
            'img' => porto_options_uri.'/demos/shop6.jpg',
            'filter' => 'shop',
            'plugins' => array( 'woocommerce' ),
        ),
        'shop7' => array(
            'alt' => 'Shop 7',
            'img' => porto_options_uri.'/demos/shop7.jpg',
            'filter' => 'shop',
            'plugins' => array( 'woocommerce' ),
        ),
        'shop8' => array(
            'alt' => 'Shop 8',
            'img' => porto_options_uri.'/demos/shop8.jpg',
            'filter' => 'shop',
            'plugins' => array( 'woocommerce' ),
        ),
        'shop9' => array(
            'alt' => 'Shop 9',
            'img' => porto_options_uri.'/demos/shop9.jpg',
            'filter' => 'shop',
            'plugins' => array( 'woocommerce' ),
        ),
        'shop10' => array(
            'alt' => 'Shop 10',
            'img' => porto_options_uri.'/demos/shop10.jpg',
            'filter' => 'shop',
            'plugins' => array( 'woocommerce' ),
        ),
        'shop11' => array(
            'alt' => 'Shop 11',
            'img' => porto_options_uri.'/demos/shop11.jpg',
            'filter' => 'shop',
            'plugins' => array( 'woocommerce' ),
        ),
        'shop12' => array(
            'alt' => 'Shop 12',
            'img' => porto_options_uri.'/demos/shop12.jpg',
            'filter' => 'shop',
            'plugins' => array( 'woocommerce' ),
        ),
        'shop13' => array(
            'alt' => 'Shop 13',
            'img' => porto_options_uri.'/demos/shop13.jpg',
            'filter' => 'shop',
            'plugins' => array( 'woocommerce' ),
        ),
        'shop14' => array(
            'alt' => 'Shop 14',
            'img' => porto_options_uri.'/demos/shop14.jpg',
            'filter' => 'shop',
            'plugins' => array( 'woocommerce' ),
        ),
        'shop15' => array(
            'alt' => 'Shop 15',
            'img' => porto_options_uri.'/demos/shop15.jpg',
            'filter' => 'shop',
            'plugins' => array( 'woocommerce' ),
        ),
        'shop16' => array(
            'alt' => 'Shop 16',
            'img' => porto_options_uri.'/demos/shop16.jpg',
            'filter' => 'shop',
            'plugins' => array( 'woocommerce' ),
        ),
        'dark' => array(
            'alt' => 'Dark Original',
            'img' => porto_options_uri.'/demos/dark_original.jpg',
            'filter' => 'classic',
            'revslider' => array( 'full-width-slider.zip', 'full-width-video.zip', 'home-dark.zip', 'home-one-page.zip', 'media-gallery.zip' ),
        ),
        'rtl' => array(
            'alt' => 'RTL Original',
            'img' => porto_options_uri.'/demos/rtl_original.jpg',
            'filter' => 'classic',
            'revslider' => array( 'full-width-slider.zip', 'full-width-video.zip', 'home-rtl.zip', 'home-one-page.zip', 'media-gallery.zip' ),
        ),
    );
}
function porto_options_breadcrumbs_types() {
    return array(
        '1' => array('alt' => 'Breadcrumbs Type 1', 'img' => porto_options_uri.'/breadcrumbs/breadcrumbs_01.jpg'),
        '2' => array('alt' => 'Breadcrumbs Type 2', 'img' => porto_options_uri.'/breadcrumbs/breadcrumbs_02.jpg'),
        '3' => array('alt' => 'Breadcrumbs Type 3', 'img' => porto_options_uri.'/breadcrumbs/breadcrumbs_03.jpg'),
        '4' => array('alt' => 'Breadcrumbs Type 4', 'img' => porto_options_uri.'/breadcrumbs/breadcrumbs_04.jpg'),
        '5' => array('alt' => 'Breadcrumbs Type 5', 'img' => porto_options_uri.'/breadcrumbs/breadcrumbs_05.jpg'),
        '6' => array('alt' => 'Breadcrumbs Type 6', 'img' => porto_options_uri.'/breadcrumbs/breadcrumbs_06.jpg'),
    );
}
function porto_options_footer_columns() {
    return array(
        '1' => __('1 column - 1/12', 'porto'),
        '2' => __('2 columns - 1/6', 'porto'),
        '3' => __('3 columns - 1/4', 'porto'),
        '4' => __('4 columns - 1/3', 'porto'),
        '5' => __('5 columns - 5/12', 'porto'),
        '6' => __('6 columns - 1/2', 'porto'),
        '7' => __('7 columns - 7/12', 'porto'),
        '8' => __('8 columns - 2/3', 'porto'),
        '9' => __('9 columns - 3/4', 'porto'),
        '10' => __('10 columns - 5/6', 'porto'),
        '11' => __('11 columns - 11/12)', 'porto'),
        '12' => __('12 columns - 1/1', 'porto')
    );
}
