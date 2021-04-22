<?php
$theme = wp_get_theme();
if ($theme->parent_theme) {
    $template_dir =  basename(get_template_directory());
    $theme = wp_get_theme($template_dir);
}
$porto_url = 'http://www.portotheme.com/wordpress/porto/';
$demos = porto_demo_types();
$demo_filters = porto_demo_filters();

wp_register_script('porto-admin-isotope', porto_js.'/jquery.isotope.min.js', array('jquery'), porto_version, true);
wp_enqueue_script('porto-admin-isotope');

$required_plugins = porto_get_required_plugins_list();
$uninstalled_plugins = array();
$all_plugins = array();
foreach( $required_plugins as $plugin ) {
    if ( $plugin['required'] && is_plugin_inactive( $plugin['url'] ) ) {
        $uninstalled_plugins[$plugin['slug']] = $plugin;
    }
    $all_plugins[$plugin['slug']] = $plugin;
}

$memory_limit = wp_convert_hr_to_bytes( @ini_get( 'memory_limit' ) );
$time_limit = ini_get( 'max_execution_time' );
$server_status = $memory_limit >= 268435456 && ( $time_limit >= 600 || $time_limit == 0 );
?>
<div class="wrap about-wrap porto-wrap">
    <h1><?php _e( 'Welcome to Porto!', 'porto' ); ?></h1>
    <div class="about-text"><?php echo esc_html__( 'Porto is now installed and ready to use! Read below for additional information. We hope you enjoy it!', 'porto' ); ?></div>
    <div class="porto-logo"><span class="porto-version"><?php _e( 'Version', 'porto' ); ?> <?php echo porto_version; ?></span></div>
    <h2 class="nav-tab-wrapper">
        <?php
        printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=porto' ), __( "Theme License", 'porto' ) );
        printf( '<a href="#" class="nav-tab nav-tab-active">%s</a>', __( "Change log", 'porto' ) );
        printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=porto_settings' ), __( "Theme Options", 'porto' ) );
        printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=porto-setup-wizard' ), __( "Setup Wizard", 'porto' ) );
        ?>
    </h2>
    <div class="porto-section porto-changelog">
        <h6>Version 4.4.0 (5.14.2018)</h6>
        <pre><code>- Added theme setup wizard 1.0
- Added theme activation
- Added rtl version for shop demos
- Added "alt" tag for all images in the theme
- Added "Minify CSS" option in Theme options -> Speed Optimize
- Added "Select Visual Composer shortcodes to remove" option in theme options -> Speed Optimize to remove unused vc shortcodes
- Optimized theme js files to use seperate version for woocommerce sites
- Optimized admin theme options panel to use lazy loading images
- Replaced newsletter form to use contact form plugin in demo sites
- Updated porto functionality plugin
- Updated sticky sidebar function
- Updated demo importer engine to import clean demos
- Updated languages files
- Updated documentation
- Removed codemirror js in the backend pages
- Removed "Minfiy CSS" option in Skin and Skin -> Layout and in Theme options
- Removed unused minor styles to decrease file size
- Removed sticky sidebar options for individual pages
- Fixed revslider import issue of business consulting demo
- Fixed style issue of porto timeline shortcode
</code></pre><br>

        <h6>Version 4.3.1 (5.1.2018)</h6>
        <pre><code>- Fixed header contact style issue of coporate3 demo
- Fixed "Days" translation issue of daily deal product on shop pages
- Fixed woocommerce product attribute issue when adding color attribute
- Fixed widget style issue on sidebar of woocommerce pages
- Fixed an issue of product list mode of shop 8
- Fixed product_page shortcode
- Fixed an issue of row element which has divider icon and parallax image
- Updated backend demo import page to show message for alternative import mode
- Updated visual composer plugin to 5.4.7
</code></pre>
        <br>

        <h6>Version 4.3.0 (4.16.2018)</h6>
        <pre><code>- Added Real Estate demo
- Added "woocommerce post layout" in blog and single post of theme options to use updated blog page style for shop demo's blog pages
- Added "simple layout" in post->post carousel of theme options
- Added shop horiontal filters for shop archive pages
- Added infinite scroll for shop pages
- Added 'portfolio-thumbnail' image size
- Added phone number field in member
- Added excerpt and custom fields in portfolio
- Added a theme option to show content section of related portfolios
- Added image size in porto carousel item shortcode
- Added "lazyload images" option in Speed Optimize of theme options
- Added an admin function to display error message when there is file permission issues in theme css directories
- Added "image size" field for product images shortcodes
- Added new product style for sale products which have end time
- Added "shop product columns on mobile" option in theme options
- Updated loading icon in infinite scroll
- Updated mega menu style
- Updated importer engine
added standard importer engine to increase importing speed
fixed issues which occur when importing more than 1 demos
- Updated product ajax search to remove old products after ajax loading
- Updated: used same sidebar in both of mobile and display
- Updated loading overlay icon
- Updated a "variation selection mode" option in "Woocommerce->Single Product" to "select box" by default
- Fixed an issue which woocommerce related products count not working
- Fixed app landing home page which only center part was displayed at first
- Fixed breadcrumb style issue in tag pages
- Fixed col-half-section style issue on tablet
- Fixed: removed duplicated product id and sku in add to cart button in shop archive pages
- Fixed the issue that "show nav on hover" option was not working on post type carousels
- Fixed an error that parallax which has carousel in it was not working
- Fixed button style issue in ABOUT THE EVENT section of Event demo
- Fixed loading icon issue in add to wishlist button
- Fixed an issue which product name was not displaying well on woocommerce variable product button mode
- Fixed a style issue of shop products list view on mobile browsers
- Fixed an issue which shipping calculator not working on cart page
- Fixed rtl issue on shop archive page
- Fixed woocommerce ajax product attribute filter issue when it is dispayed as dropdown
- Fixed woocommerce product border issue on single product page
- Fixed sidebar position issue when updating from 3.x to 4.x version
- Removed "tabs type " option in single product
- Removed "tabs style " option in single product
- Removed "Page Sub Title" option in Portfolio->Portfolio Archives
</code></pre>
        <br>

      <h6>Version 4.2.0 (2.21.2018)</h6>
        <pre><code>- Updated shop demo 3, 9, 10, 11 and 12
- Updated woocommerce files to be compatible with 3.3.1
- Updated woocmmerce template files which were displayed in a line
- Fixed font subset issue in theme options
- Fixed bootstrap grid issue on Safari browser
+ Added search bar on mobile
- Fixed image size issue of related posts shortcode
- Fixed font weight issue of porto  counter shortcode
- Fixed breadcrumb container width issue on wide layout
- Fixed an issue in including visual composer css file
- Fixed mini cart scrollbar issue on Firefox
</code></pre>
        <br>
        <h6>Version 4.1.5 (2.2.2018)</h6>
        <pre><code>updated demo shop 1, 2, 4, 5, 6, 7, 8, 13, 14, 15 and 16
- Updated woocommerce files to latest version 3.3.0
- Updated porto functionality plugin to 1.0.4
- Updated container max width theme option to input any screen width
- Updated porto interactive banner shortcode
- Updated header 8 to add header contact information
- Added lazyload function in porto interactive banner shortcode
- Added theme options to select fonts for paragraph, footer and footer heading under Skin->Typography.
- Added product columns on mobile in theme options
- Added a theme option to check to display border on product images
- Added 'porto-standable-carousel' css class to display porto carousel to be displayed on page load
- Added variation display mode in theme options
wrap functions in function_exists condition in /inc/functions/post.php
product_sidebar_banner.jpg
- Fixed shop products style issue on mobile
- Fixed shop quick view on mobile
- Fixed search box issue 
- Fixed star rating style issue on several product styles
- Fixed quick view and wishlist icon issue on IE browser
- Fixed cross-sell style issue
</code></pre>
        <br>
        <h6>Version 4.1.4 (1.15.2018)</h6>
        <pre><code>- Fixed font url issue from 4.1 version
- Fixed Navigation Tabs shortcode style issue on mobile
- Fixed shop products columns issue on mobile</code></pre>
        <br>
        <h6>Version 4.1.3 (1.11.2018)</h6>
        <pre><code>- Fixed "display:flex" does not work in safari, IE 10 issue.</code></pre>
        <br>
        <h6>Version 4.1.2 (12.30.2017)</h6>
        <pre><code>- Fixed the issue which custom font was not working in porto functionality plugin
- Fixed visual composer row element which has container and didn't work well on mobile
- Fixed star rating style issue
- Updated theme option name of custom fonts so you should select custom fonts again in theme options if you used them
- Added border to product slider image in product single page</code></pre>
        <br>
        <h6>Version 4.1.1 (12.27.2017)</h6>
        <pre><code>- Fixed the issue which custom font was not working
- Fixed searchform style issue on large mobile
- Fixed member page column issue on mobile
- Fixed portfolios column issue on mobile
- Fixed products column issue on mobile
- Fixed the rtl version compile function
- Fixed an issue which mini cart didn't work on iPhone</code></pre>
        <br>
        <h6>Version 4.1 (12.22.2017)</h6>
        <pre><code>- Updated bootstrap to version 4
- Updated Porto functionality plugin to be compatible with bootstrap 4
- Removed Default css compilation section in theme options
- Added Theme Optimzation section in theme options which is to include optimized css/js files of used plugins such as bootstrap, visual composer, font awesome and revolution slider to increase page speed
- Added a theme option to remove revslider js in the page which hasn't it
- Updated backend porto panel
- Updated demo installation section to import revolution sliders too
- Added compatible plugin section in demo installation page
- Added a page option to check to display product hover image
- Added a page option to display sidebar in navigation on mobile
- Fixed an error which some visual composer elements were not searched.
- Fixed an issue of portfolio ajax popup and ajax modal
- Fixed minor style issues in digita agency work page
- Fixed an image loading issue in Portfolio->Full Images page
- Fixed tabs shortcode style issue
- Fixed portfolio ajax pagination
- Updated documentation
        </code></pre>
        <br>
        <h6>Version 4.0.5 (11.13.2017)</h6>
        <pre><code>- Fixed an issue of mobile toggle icon width
- Fixed fontawesome icon display issue on page loading
- Added mobile sidebar menu option in theme options page
- Updated documentation
        </code></pre>
        <br>
        <h6>Version 4.0.4 (11.7.2017)</h6>
        <pre><code>- Fixed importer issue
- Fixed shortcodespage import issue
- Fixed interactive banner shortcode to work with url link
- Fixed gym Home page >> "Our Facility" on "Porto carousel" button "LEARN MORE" doesn't have link
- Fixed photography3 sidebar menu 3rd level
- Fixed photography1 import issue
- Updated porto preview image shortcode
- Updated image lazy load to jQuery lazyload plugin
        </code></pre>
        <br>
        <h6>Version 4.0.3 (11.3.2017)</h6>
        <pre><code>- Fixed the position of newsletter submit button in rtl version
- Fixed minicart triangle icon position on sticky header in shop5
- Added mobile menu options in theme options
- Added mobile menu style option in theme options
- Added "columns on mobile" option to woocommerce products shortcodes
- Added fullscreen option to porto carousel shortcode
- Added products-slider-title css class to woo products slider shortcodes to fix the position of nav butons
- Added gmap api key option in theme options
- Added envato toolkit plugin
- Updated homepage revslider to owl carousel in shop1, shop5, shop6 demo
- Updated Visual Composer to latest version
- Updated Woocommerce to latest version
- Updated for Envato Toolkit plugin
- Removed mobile sidebar option in theme options
- Removed hover effect on language selector in shop5
        </code></pre>
        <br>
        <h6>Version 4.0.2 (10.11.2017)</h6>
        <pre><code>- Fixed: warning of porto functionality plugin
- Fixed: an issue which portfolio image thumbnail's resize icon was not working
- Fixed: an issue of category selection in Porto Product Category VC element
- Updated: Porto Recent Portfolio Widget 
- Updated: porto plugins page to display more plugins fully compatible with Porto in backend
- Added: error message if porto content types, porto shortcodes and porto widgets plugins are activated in backend
- Added: "override existing contents" options in demo importer.
If you check this options before importing, this will remove duplicated posts(posts, pages, attachments, etc) which has same IDs and import new posts so that your new demo import can show correct content.
        </code></pre>
        <br>
        <h6>Version 4.0.1 (10.6.2017)</h6>
        <pre><code>- Added: compatibility with woocommerce 3.2
- Fixed: warning issue appears on Porto Functionality plugin
- Fixed: page breaking issue on Demo 7
- Fixed: page breaking issue on Demo 13
        </code></pre>
        <br>
        <h6>Version 4.0 (10.1.2017)</h6>
        <pre><code>- Added:  necessary shortcodes to replace Visual Composer Ultimate AddOn feature
"porto_icon", "porto_ultimate_heading", "porto_info_box", "porto_stat_counter", "porto_buttons", "porto_ultimate_content_box", "porto_google_map", "porto_icons", "porto_single_icon", "porto_countdown", "porto_ultimate_carousel", "porto_fancytext", "porto_modal", "porto_carousel_logo", "porto_info_list", "porto_info_list_item", "porto_interactive_banner"
- Added: "portfolio show content" option in "portfolio -> portfolio archives" in theme admin option
It determines to show only picture or description as well.
- Added: "Show WPML Language Switcher HTML", "Show WPML Currency Switcher HTML" option in "Header -> View, Currency Switcher" in theme option
- Updated: Merged 3 Porto plugins "Porto Shortcodes", "Porto Widget", "Porto Content Types" into "Porto Functionality"
- Updated: Removed Visual Composer Ultimate AddOn
- Updated: Removed Theme license code activation feature
- Updated: Visual Composer plugin to latest version
- Updated: Revolution Slider Plugin to latesst version
- Updated: Included latest version of Visual Composer Ultimate AddOn plugin inside theme package for old version users
- Updated: Highly optimized Visual composer and Revolution Slider plugin's js and css files
- Updated: Improved theme installation engine - much faster and works fine on any level of hosting server even on shared hostings
- Updated: Improved all demo designs, much clean and beautiful than previous version
- Updated: documentation
- Fixed: issue on installation process, (blog pages were unable to be selected and category count was not refreshed"
- Fixed: Fixed and improved feature of post like
- Fixed: issue that occurs when try to update fields for portfolio grid item short code
        </code></pre>
        <br>
        <h6>Version 3.6.3 (6.2.2017)</h6>
        <pre><code>- Added: New demo: Shop 15 (Preview at http://www.newsmartwave.net/wordpress/porto/shop15/ )
- Added: New demo: Shop 16 (Preview at http://www.newsmartwave.net/wordpress/porto/shop16/ )            
- Update: Shop 6 (Preview at http://www.newsmartwave.net/wordpress/porto/demo-shop-6/ )
- Update: Shop 8 (Preview at http://www.newsmartwave.net/wordpress/porto/demo-shop-8/)
- Update: Shop 10 (Preview at http://www.newsmartwave.net/wordpress/porto/shop10/)
- Update: Porto Shortcodes 1.6.8;
- Update: Revolution slider plugin (5.4.3.1);
- Improvement: Documentation;
- Improvement: Theme Registration feature;
- Improvement: RTL Compatibility;
- Compatibility:  Woo commerce 3.0.7;
- Fixed: Porto Light box VC element bug;
- Fixed: Wish list icon bug;
- Fixed: multiple h1 tag issue;
- Fixed: Porto image frame VC element bug;
</code></pre>
        <br>
      <h6>Version 3.6.2 (5.10.2017)</h6>
        <p>- Fixed</p>
        <pre><code>- Fixed Cart version 1 proceed to checkout translation issue.
- Fixed Porto Event VC element Bug.
</code></pre>
        <p>- Updated</p>
        <pre><code>- Updated Ultimate Addons for Visual Composer
- Compatible with woo commerce 3.0.6
- Added Show Sub categories option for search 
- Added Compatibility with Gravity form plugin
- Added Float left/right option for page social share.
- Added option to set Header type Side position to left/ right.
- Updated Porto Shortcodes 1.6.7
- Updated Documentation         
</code></pre>
        <br>
        <h6>Version 3.6.1 (4.30.2017)</h6>
        <p>- Fixed</p>
        <pre><code>- Fixed RTL issues
- Fixed mini cart show/hide in sticky menu issue
</code></pre>
        <p>- Updated</p>
        <pre><code>- Added Shop13 Demo
- Added Shop14 Demo
- Added Purchase code activation Feature
- Compatible with woo commerce 3.0.5            
</code></pre>
        <br>
        <h6>Version 3.6.0 (4.16.2017)</h6>
        <p>- Fixed</p>
        <pre><code>- Fixed VC column gap bug
- Fixed Blog Archive link bug
</code></pre>
        <p>- Updated</p>
        <pre><code>- Added App Landing Demo
- Updated Shop5 Demo Skin and style
- Updated Shop6 Demo Skin and style
- Updated Shop7 Demo Skin and style
- Updated Shop8 Demo Skin and style
- Updated Shop9 Demo Skin and style
- Updated Ultimate Addons for Visual Composer           
</code></pre>
        <br>
        <h6>Version 3.5.5 (4.16.2017)</h6>
        <p>- Fixed</p>
        <pre><code>- Fixed minor issues
</code></pre>
        <p>- Updated</p>
        <pre><code>- Compatible with woo commerce 3.0.3
</code></pre>
        <br>
        <h6>Version 3.5.4 (4.12.2017)</h6>
        <p>- Fixed</p>
        <pre><code>- Fixed minor issues
</code></pre>
        <p>- Updated</p>
        <pre><code>- Compatible with woo commerce 3.0.1
- Updated Visual Composer plugin.
</code></pre>
        <br>
        <h6>Version 3.5.2 (4.5.2017)</h6>
        <p>- Fixed</p>
        <pre><code>- Fixed Porto Featured box VC element bug
- Fixed VC Separator color Settings bug
- Fixed Porto Product Attribute VC Element Bug
</code></pre>
        <p>- Updated</p>
        <pre><code>- Added One Page Agency Demo
- Added NEW Breadcrumb Style
- Added New Product Styles 
- Added Turkish language files
- Updated Shop2 Demo Skin and style
- Updated Shop4 Demo Skin and style
- Updated Shop6 Demo Skin and style
- Updated Ultimate Adds on for Visual composer
</code></pre>
        <br>
        <h6>Version 3.5.1 (3.14.2017)</h6>
        <p>- Fixed</p>
        <pre><code>- Fixed Breadcrumb bug 
- Fixed Large alt blog layout bug
</code></pre>
        <p>- Updated</p>
        <pre><code>- Updated Visual Composer plugin.
- Added Church Demo 
- Added Finance Demo 
- Added Porto Events VC element
- Added Events Custom Post Type 
- Added Like Feature for blog posts inner page
- Added large alt single post layout
- Added Display role of member option in Type3 style
</code></pre>
        <br>
        <h6>Version 3.5 (02.22.2017)</h6>
        <p>- Fixed</p>
        <pre><code>- Porto Product Category Element Bug. 
- Fixed Advanced carousal dots coloring bug 
- Fixed Bug in porto-shortcodes plugin 
- Fixed YITH Wishlist sharing Bug
</code></pre>
        <p>- Updated</p>
        <pre><code>- Updated Language files
- Updated embedded plugins' version to latest one. 
- Added Gym Demo 
- Added Business Consulting Demo
- Added WC Vendor Compatibility 
- Added Event Demo
- Added Resume Demo
- Added New VC element “Porto Schedule Timeline”
- Added Experience Timeline in “Porto Experience Timeline”
- Added new VC element “Floating Menu(Left)”
- Added Hover Effect (Zoom/No Zoom) for Member 
- Added New Testimonials Style
- Added Text editor Font size option
- Added new social icon layout for Member Page and Single Member
- Added new Blog and post layout option
- Added Like Feature for blog posts
</code></pre>
        <br>
        <h6>Version 3.4 (1.19.2017)</h6>
        <p>- Fixed</p>
        <pre><code>- Theme Options panel Import/export issue 
- Fixed Portfolio layout issue (Medium/Large) 
- Fixed Fixed Porto Product category 
- Fixed limited categories issue.
- Fixed Porto Lightbox VC Element issue
</code></pre>
        <p>- Updated</p>
        <pre><code>- Added 3 new Photography demos.
- Added new eCommerce demos: Shop11 and Shop12 
- Added New Header Type 18 
- Added Digital Agency Demo.
- Added Register form page style 2. 
- Added Shopping Cart page design 2
- Added Checkout page style 2 
- Add location field in Portfolio.
- Added new Social share style for Blog and Posts
- Added Portfolio Categories VC Element with Stripes and Parallax layout
- Added New Hover effects
- Added Option to select your own Category image for each Portfolio category
- Added Parallax banner Option for Single Portfolio page
- Added Image Counters Options for portfolios and Featured images
- Added Thumb slider option for Ajax on page
- Added Functionality of image light box with thumbs for portfolios
- Added Member page layout option control from Theme Options
</code></pre>
        <br>
        <h6>Version 3.3.3 (12.13.2016)</h6>
        <p>- Fixed</p>
        <pre><code>- Fixed sidebar generator security vulnerability issue.</code></pre>
        <p>- Updated</p>
        <pre><code>- Updated revolution slider plugin.</code></pre>

        <br>
        
        <h6>Version 3.3.2 (11.22.2016)</h6>
        <p>- Fixed</p>
        <pre><code>- Fixed minor theme options issue.</code></pre>
        <p>- Updated</p>
        <pre><code>- Updated visual composer plugin.</code></pre>

        <br>
        
        <h6>Version 3.3.1 (11.11.2016)</h6>
        <p>- Updated</p>
        <pre><code>- Updated visual composer plugin.</code></pre>

        <br>
        
        <h6>Version 3.3 (10.27.2016)</h6>
        <p>- Fixed</p>
        <pre><code>- Fixed port carousle navigation issue.
- Fixed block content type search engine issue.
- Fixed portfolio masony layout issue.
- Fixed vc row, column equal height issues.
- Fixed minor css, js issues.</code></pre>
        <p>- Updated</p>
        <pre><code>- Added wedding demo.
- Added main menu wrapper padding option in sticky header.
- Added logo type option in Theme Options > General > Logo, Icons.
- Added logo font option in Theme Options > Skin > Typography.
- Added footer background parallax options in Theme Options > Skin > Footer.
- Added back to blog option in Theme Options > Post > Single Post.
- Added new post carousel style in Theme Options > Post > Post Carousel.
- Updated revolution slider, porto shortcodes plugins.
- Updated dummy data.</code></pre>

        <br>
        
        <h6>Version 3.2 (10.10.2016)</h6>
        <p>- Fixed</p>
        <pre><code>- Fixed google font charsets issue.
- Fixed minor css, js issues.</code></pre>
        <p>- Updated</p>
        <pre><code>- Added hotel demo.
- Added medical demo.
- Added porto feature box shortcode.
- Added custom image icon option in shortcodes.
- Added custom css, javascript code options in content types, terms.
- Added new member archive view type.
- Added footer widgets area background options.
- Added sticky header effect.
- Added breadcrumbs parallax feature.
- Added breadcrumbs delimiter option.
- Added portfolio, member, faq archive page sub title options.
- Updated visual composer, porto shortcodes, porto widgets plugins.
- Updated simple line icons font.
- Updated porto section shortcode.
- Updated footer template files.
- Updated header side navigation template file.
- Updated page header template files.
- Updated member, portfolio template files.</code></pre>

        <br>
        
        <h6>Version 3.1 (8.30.2016)</h6>
        <p>- Fixed</p>
        <pre><code>- Fixed portfolio like issue.
- Fixed portfolio, member, faq filters issue.
- Fixed product custom tabs count issue.
- Fixed animation issue.
- Fixed progress bar tooltip animation issue.
- Fixed minor javascript, css issues.
- Fixed yith woocommerce ajax filter dropdown issue.</code></pre>
        <p>- Updated</p>
        <pre><code>- Added Construction Demo.
- Added Restaurant Demo.
- Added Law Firm Demo.
- Added Digital Agency Demo.
- Updated porto content types, porto shortcodes, ultimate addons plugins.
- Added new portfolio slideshow type with thumbnails.
- Added option to change featured image on archives in Portfolio options.
- Add location field in Portfolio.
- Added page sub title option in View Options.
- Added porto lightbox container shortcode.
- Added logo overlay options in Theme Options > General > Logo, Icons.
- Added show title option in Theme Options > Post > Single Post.
- Added portfolio slideshow type in Theme Options > Portfolio > Single Portfolio.
- Added portfolios page, members page, faqs page options in Theme Options.
- Added more options in Theme Options > Breadcrumbs.
- Added post style options in Theme Options > Post > Blog & Archive.
- Added post excerpt length option in Theme Options > Post > Single Post.
- Added portfolio sub title select option in Theme Options > Portfolio > Portfolio Archives.
- Added global banner block options in Theme Options > Post > Single Post, Theme Options > Portfolio > Single Portfolio, Theme Options > Member > Single
Member.
- Added page sub title skin options in Theme Options > Skin > Breadcrumbs.
- Added active color, background color in Theme Options > Skin > Main Menu > Top Level Menu Item.
- Added header margin options in Theme Options > Skin > Header > Header.
- Added footer columns options in Theme Options > Footer > Footer Type.</code></pre>

        <br>
        
        <h6>Version 3.0.3 (7.21.2016)</h6>
        <p>- Fixed</p>
        <pre><code>- Fixed minor javascript issues.
- Fixed minor css issues.</code></pre>
        <p>- Updated</p>
        <pre><code>- Compatible with woocommerce 2.6.3.</code></pre>

        <br>
        
        <h6>Version 3.0.2 (7.13.2016)</h6>
        <p>- Fixed</p>
        <pre><code>- Fixed woocommerce checkout issue.</code></pre>
        
        <br>
        
        <h6>Version 3.0.1 (7.12.2016)</h6>
        <p>- Fixed</p>
        <pre><code>- Fixed wpml language switcher issue.
- Fixed minor css, js issues.</code></pre>
        
        <br>
        
        <h6>Version 3.0 (7.11.2016)</h6>
        <p>- Fixed</p>
        <pre><code>- Fixed Yith woocommerce ajax filter in woo 2.6
- Fixed Layout issues </code></pre>
        <p>- Updated</p>
        <pre><code>- Added Slider Revolution wordpress plugin
- Added Gallery, Carousel, Medias, Full Width Video, Masonry Images, Full Images, Extended single portfolio templates
- Added Masonry portfolio archive template
- Added Ajax load portfolios on page
- Added Ajax load portfolios on modal
- Added Image Frame, Carousel, Image Gallery, Lightbox shortcodes
- Added Member columns option
- Added Portfolio info view type: Left Info, Centered Info, Bottom Info, Bottom Info Dark, Hide Info Hover
- Added Sticky Sidebar
- Added Side Navigation instead of sidebar on mobile
- Added Microdata disable option in Page options
- Added Fontawesome icon - version 4.6.3
- Added Magnific Popup jquery plugin
- updated Plugins Installation
- updated Demo Installation
- updated Porto content types, shortcodes, widgets plugins
- updated Ultimate addons plugin
- updated Theme options
- updated Portfolios, Members, Recent Portfolios, Recent Members, Recent Posts, Price Box shortcodes
- Removed Master slider wordpress plugin
- Removed Blueimp gallery javascript plugin </code></pre>

        <br>
        
        <h6>Version 2.8.5 (6.17.2016))</h6>
        <p>- Updated</p>
        <pre><code>- Compatible with woocommerce 2.6.1.</code></pre>

        <br>
        
        <h6>Version 2.8.4 (6.14.2016)</h6>
        <p>- Fixed</p>
        <pre><code>- Fixed minor style issues.</code></pre>
        <p>- Updated</p>
        <pre><code>- Compatible with woocommerce 2.6.
- Updated visual composer plugin(4.12), Ultimate Addons(3.16.4) plugins.
- Deprecated woocommerce 2.3 compatibility.</code></pre>

        <br>
        
        <h6>Version 2.8.3 (4.23.2016)</h6>
        <p>- Fixed</p>
        <pre><code>- Fixed minor javascript issue.
- Fixed minor style issue.</code></pre>
        <p>- Updated</p>
        <pre><code>- Updated visual composer plugin(4.11.2.1), Ultimate Addons(3.16.1), Master Slider(2.29.0), Porto Shortcodes(1.4.3) plugins.
- Added new switcher position options in Theme Options > Header > View, Currency Switcher.
- Added “Enable Image Zoom on Mobile” option in Theme Options > Woocommerce > Product Image & Zoom.</code></pre>

        <br>
        
        <h6>Version 2.8.2 (3.2.2016)</h6>
        <p>- Fixed</p>
        <pre><code>- Fixed product tabs accordion issue.
- Fixed product nav link issue.
- Fixed blog grid layout issue.
- Fixed minor style issues.</code></pre>
        <p>- Updated</p>
        <pre><code>- Updated product tabs template file.
- Compatible with Polylang, qTranlate plugin.
- Compatible with Woocommerce Currency Switcher plugin.
- Added footer payments image alt option in Theme Options > Footer.</code></pre>

        <br>
        
        <h6>Version 2.8.1 (2.24.2016)</h6>
        <p>- Fixed</p>
        <pre><code>- Fixed product image slider issue.
- Fixed accordion shortcode issue.</code></pre>

        <br>
        
        <h6>Version 2.8 (2.22.2016)</h6>
        <p>- Fixed</p>
        <pre><code>- Fixed custom font control issue in Theme Options.
- Fixed yith woocommerce wishlist view template issue.</code></pre>
        <p>- Updated</p>
        <pre><code>- Added global tab, custom tabs priority options in Theme Options, Product Options.
- Added "Use Read More Link in" option in Theme Options > Woocommerce > Catalog Mode.
- Added "Text Transform" option in Theme Options > Skin > Main Menu > Top Level Menu Item.
- Added new portfolio grid view type.
- Compatible with yith woocommerce badges management plugin.
- Updated visual composer(4.10), ultimate addons(3.15.2), porto shortcodes(1.4.2), porto widgets(1.2.1) plugins.
- Updated fontawesome font(4.5.0)
- Updated owl carousel version 2.0
- Improved header template files.
- Improved content top, content inner top, content inner bottom, content bottom options in Content Types, Archives options.</code></pre>

        <br>
        
        <h6>Version 2.7.4 (2.5.2016))</h6>
        <p>- Fixed</p>
        <pre><code>- Fixed read more link issue in related posts.
- Fixed mini cart scroll issue when activate smooth scroll.</code></pre>
      

        <br>
        
        <h6>Version 2.7.3 (2.3.2016)</h6>
        <p>- Fixed</p>
        <pre><code>- Fixed sidebar menu issue.
- Fixed quick view issue.</code></pre>
        <p>- Updated</p>
        <pre><code>- Add new demo version(law office).
- Compatible with woocommerce 2.5.2.</code></pre>

        <br>
        
        <h6>Version 2.7.2 (1.27.2016)</h6>
        <p>- Fixed</p>
        <pre><code>- Fixed ajax cart fragments issue in woocommerce 2.5.
- Fixed cart, checkout page issue.
- v</code></pre>
        <p>- Updated</p>
        <pre><code>- Compatible with woocommerce 2.5.1.</code></pre>

        <br>
        
            <h6>Version 2.7.1 (1.23.2016)</h6>
        <p>- Fixed</p>
        <pre><code>- Fixed porto product attribute shortcode issue.
- Fixed porto product attribute shortcode issue.
- Fixed product quick view issue.</code></pre>
        <p>- Updated</p>
        <pre><code>- Compatible with <a href="https://wordpress.org/plugins/woocommerce-multilingual/">WooCommerce Multilingual</a>.
- Updated ultimate addons(3.15.0), porto shortcodes(1.4) plugins.</code></pre>

        <br>
        
        <h6>Version 2.7 (1.20.2016)</h6>
        <p>- Fixed</p>
        <pre><code>- Fixed google font loading issue.
- Fixed page share links layout issue.
- Fixed product archives layout issue.
- Fixed ajax add to cart, remove from cart javascript issue.
- Fixed search toggle, mobile toggle button size issue.</code></pre>
        <p>- Updated</p>
        <pre><code>- Compatible with woocommerce 2.5.
- Compatible with GeoDirectoy plugin.
- Added post meta, portfolio meta options in Theme Options > Post, Portfolio.
- Added new add links position option in Theme Options > Woocommerce > Product Archives.
- Added catalog mode target option in Theme Options > Woocommerce > Catalog Mode.
- Added google font character set option in Theme Options > Skin > Typography.
- Added post ids option in Member options.
- Added "video-fixed" extra class for vc row shortcode for fixed video.
- Added a tag change option for add links in Theme Options > Woocommerce > Product Archives.
- Added show external link option in Theme Options > Portfolio > Portfolio Archives, Theme Options > Member > Member Archives.
- Added sticky header option in Content Type Options.
- Added product meta option in Theme Options > Woocommerce > Single Product.
- Added header, footer tooltip options in Theme Options > Header, Footer.
- Added actions: porto_before_wrapper, porto_after_wrapper, porto_before_header, porto_before_banner, porto_before_breadcrumbs, porto_before_main,
porto_after_main, porto_before_content_top, porto_after_content_top, porto_before_content_inner_top, porto_after_content_inner_top,
porto_before_content_inner_bottom, porto_after_content_inner_bottom, porto_before_content_bottom, porto_after_content_bottom, porto_before_sidebar,
porto_after_sidebar
- Added filters: porto_logo, porto_currency_switcher, porto_mobile_currency_switcher, porto_view_switcher, porto_mobile_view_switcher,
porto_top_navigation, porto_mobile_top_navigation, porto_main_menu, porto_main_toggle_menu, porto_header_side_menu, porto_sidebar_menu,
porto_mobile_menu, porto_search_form, porto_search_form_content, porto_header_socials, porto_minicart, porto_get_wrapper_type, porto_get_header_type,
porto_get_minicart_type, porto_get_blog_id, porto_is_dark_skin, porto_breadcrumbs
- Updated porto shortcodes(1.3.9), porto widgets(1.2), visual composer(4.9,2), master slider(2.26.0) plugins.</code></pre>

        <br>
        
        <h6>Version 2.6.2 (12.30.2015)</h6>
        <p>- Fixed</p>
        <pre><code>- Fixed the product images style issue when use the page template.
- Fixed the master slider product images slider loading issue.
- Fixed the category mobile filter panel issue in product tag page.</code></pre>
        <p>- Updated</p>
        <pre><code>- Added font control section in Theme Options.
- Added slider config section in Theme Options.
- Added member style options in Theme Options > Member > Member Archives.
- Added social color option in Theme Options > Skin.
- Added menu typography options in Theme Options > Skin > Typography.
- Added category view type option in Theme Options > Woocommerce > Product Archives.
- Improved porto testimonial shortcode.
- Improved member template files(content-member-item.php, content-archive-member.php) which show the member role instead of categories.
- Compatible with Post Views Counter plugin.
- Compatible with woocommerce product filter plugin.
- Updated porto shortcodes(1.3.8), visual composer(4.9,1), master slider(2.25.3), porto widgets(1.1.5), porto content types(1.2.2) plugins.
- Added french, italian translation files.s</code></pre>

        <br>
        
        <h6>Version 2.6.1 (12.9.2015)</h6>
        <p>- Fixed</p>
        <pre><code>- Fixed admin ajax url issue in wpml.
- Fixed facebook sharing issue.</code></pre>
        <p>- Updated</p>
        <pre><code>- Updated visual composer(4.9), master slider(2.25.0). porto shortcodes(1.3.7) plugins.</code></pre>

        <br>
        
        <h6>Version 2.6 (12.7.2015)</h6>
        <p>- Fixed</p>
        <pre><code>- Fixed product category shortcode issue
- Fixed isotope javascript issue in posts grid
- Fixed visual composer text separator shortcode icon issue
- Fixed woocommerce cart fragments issue
- Fixed breadcrumbs issue in product search by category
- Fixed yith woocommerce ajax search template issue
- Fixed porto options issue in vc single image shortcode
- Fixed visual composer, ultimate addons style loading issue in porto block shortcode
- Fixed portfolio grid view type issue in Porto Portfolio shortcode
- Fixed mini cart ajax loading issue
</code></pre>
        <p>- Updated</p>
        <pre><code>- Added preview field in mega menu
- Added mobile panel close button
- Added sticky header logo, mini cart, search form, menu custom content options in Theme Options > Header > Sticky Header
- Added filter, pagination options in Porto Portfolios, Porto Members, Porto FAQs shortcodes
- Added sticky options in visual composer row, row inner, column, column inner shortcodes
- Added product hot label, sale label, quick view label options in Theme Options > Woocommerce
- Added hot label option for sticky post in Theme Options > Post
- Added porto sticky, porto sticky nav shortcodes in Porto Shortcodes plugin
- Added telegram, yelp, flickr social links options in Theme Options > Header > Social Links
- Added nofollow option in Theme Options > Header > Social Links
- Added telegram, yelp, flickr follow links fields in Porto Follow Us widget
- Added nofollow field in Porto Follow Us widget
- Updated visual composer plugin(4.8.1), ultimate addons plugin(3.14.0), master slider plugin(2.22.1), porto shortcodes plugins(1.3.6), porto widgets
plugin(1.1.4)
- Updated header template files
- Updated documentation & dummy data
- improved changed the position of currency swither, view swither on mobile panel
- improved show variable options in woocommerce catalog mode</code></pre>


        <br>
        
        <h6>Version 2.5.9 (11.6.2015)</h6>
        <p>- Fixed</p>
        <pre><code>- Fixed breadcrumbs link issue.
- Fixed style issues on IE 9.</code></pre>
        <p>- Updated</p>
        <pre><code>- Updated header css transitions.</code></pre>

        <br>
        
        <h6>Version 2.5.8 (11.3.2015))</h6>
        <p>- Fixed</p>
        <pre><code>- Fixed breadcrumbs shop link issue in wpml plugin.
- Fixed blog banner block option issue in Theme options.
- Fixed minor woocommerce template issues.
- Fixed less compiler issues.
- Fixed yith wishlist popup message issue.</code></pre>
        <p>- Updated</p>
        <pre><code>- Updated visual composer plugin(4.8.0.1).
- Updated ultimate addons plugin(3.13.7).
- Updated master slider plugin(2.22.0).
- Updated porto shortcodes plugin(1.3.5).</code></pre>

        <br>
        
        <h6>Version 2.5.7 (10.8.2015)</h6>
        <p>- Fixed</p>
        <pre><code>- Fixed mega menu popup style issue in mobile.
- Fixed minor style issues.
</code></pre>
        <p>- Updated</p>
        <pre><code>- Regenerate css file automatically after update theme.</code></pre>

        <br>
        
        <h6>Version 2.5.6 (10.4.2015)</h6>
        <p>- Fixed</p>
        <pre><code>- Fixed whatsapp sharing issue.
- Fixed product title link issue in the product archive page.
- Fixed product link issue in quick view.
- Fixed minor style issues.
</code></pre>
        <p>- Updated</p>
        <pre><code>-Added arrow buttons in product thumbnail gallery.
- Updated master slider(2.20.4), visual composer(4.7.4), porto shortcodes(1.3.4) plugins.</code></pre>

        <br>
        
        <h6>Version 2.5.5 (9.30.2015)</h6>
        <p>- Fixed</p>
        <pre><code>- Fixed product navigation links issue.
- Fixed porto sort shortcodes issue in rtl.
- Fixed yith woocommerce wishlist translation issue.</code></pre>
        <p>- Updated</p>
        <pre><code>- Added ajax filtering in shop and product archive pages.
- Updated visual composer plugins(4.7.3).</code></pre>

        <br>
        
        <h6>Version 2.5.4 (9.25.2015)</h6>
        <p>- Fixed</p>
        <pre><code>- Fixed style minify issue.
- Fixed minor style issues.</code></pre>
        <p>- Updated</p>
        <pre><code>- Added sidebar menu option in content types, taxonomies.
- Added porto sort, preview image shortcodes in Porto Shortcodes plugin.
- Compatible with woocommerc 2.4.7
- Added WhatsApp sharing options.
- Added change logo size option in sticky header.
- Added 2 home versions, landing page.
- Updated porto shortcodes, widgets, visual composer plugins.
- Added header wrapper background color, sticky header background opacity options.
- Compatible with woocommerc 2.4.7
- Compatible with wp nav menu role plugin.
</code></pre>

        <br>
        
        <h6>Version 2.5.3 (9.14.2015))</h6>
        <p>- Fixed</p>
        <pre><code>- Fixed style issues in safari.</code></pre>
        <p>- Updated</p>
        <pre><code>- Improved porto block shortcode.
- Added more social links in header share links options and porto follow us widget.
- Added multiple custom tab feature.
- Added product more link for catalog mode.
- Added retina logo option in Theme Options > General > Logo, Icons.
</code></pre>

        <br>
        
        <h6>Version 2.5.2 (9.11.2015))</h6>
        <p>- Fixed</p>
        <pre><code>- Fixed catalog mode, single product options issues.</code></pre>
        <p>- Updated</p>
        <pre><code>- Added page loading overlay option
- Updated dummy data.</code></pre>

        <br>
        
        <h6>Version 2.5.1 (9.6.2015)</h6>
        <p>- Fixed</p>
        <pre><code>- Fixed theme options translation issue.
- Fixed minor issue in variation product.</code></pre>
        <p>- Updated</p>
        <pre><code>- Added category filter option for mobile category view with sidebar.
- Added menu selection option in content type, taxonomies.
- Added breadcrumbs type option in Theme Options > Breadcrumbs > Breadcrumbs Type.
- Added related products, upsell products columns options in Theme Options > Woocommerce > Single Product.
- Updated ultimate addons(3.13.4), master slider(2.20.1), porto widgets(1.1.1).
- Added hot, sale label color options in Theme Options > Skin > Shop.
- Updated font awesome icon to 4.4.0.
- Added vimeo link in Theme options > Header > Social Links and porto follow us widget.
- Added vimeo, instagram options in member content type.
</code></pre>

        <br>
        
        <h6>Version 2.5 (8.31.2015)</h6>
        <p>- Fixed</p>
        <pre><code>- Fixed ajax cart fragments issue
- fixed categories selection issue in search form</code></pre>
        <p>- Updated</p>
        <pre><code>- added 5 home page versions
- added 3 header types for coporate versions
- added menu popup effect in Theme Options > Menu
- added minicart popup effect options in Theme Options > Header > Mini Cart
- added view & currency switcher popup effect in Theme Options > Header > View, Currency Switcher
- added footer ribbon background color & text color options in Theme Options > Skin > Footer
- added main button style option in Theme Options > Skin
- added related posts image size, style options in Theme Options > Post > Single Post
- added sort categories order by, sort order for categories options in Theme Options > Portofolio > Portfolio Archive, Member > Member Archive, FAQ
- added share option in Post Options, Portfolio Options, Product Options, Page Options
- added simple line icons
- added remove border option in porto testimonial, vc row, column shortcodes
- updated ultimate addons plugin(3.13.3), master slider plugin(2.19.0), visual composer plugin(4.7), porto shortcodes plugins(1.3.1), porto widgets 
plugin(1.1)
- improved moved Theme Options menu in Appearance</code></pre>

        <br>
        
        <h6>Version 2.4.4 (8.18.2015)</h6>
        <p>- Fixed</p>
        <pre><code>- Fixed minor style issues.</code></pre>
        <p>- Updated</p>
        <pre><code>- Updated dummy data.</code></pre>

        <br>
        
        <h6>Version 2.4.3 (8.18.2015)</h6>
        <p>- Fixed</p>
        <pre><code>- Fixed breadcrumbs, page title issues.
- Fixed sidebar generator issue.
- Fixed minor style issues.</code></pre>
        <p>- Updated</p>
        <pre><code>- Improved breadcrumbs function.
- Added breadcrumbs prefix option in Theme Options > Breadcrumbs.
- Added microdata rich snippets option in Theme Options > General.
- Added "Breadcrumbs", "BBPress & BuddyPress" section in Theme Options.
- Compatible with yoast breadcrumbs.
- Added bbpress, buddypress styles.
- Separated theme.css file to theme.css and theme-shop.css.
</code></pre>

        <br>
        
        <h6>Version 2.4.2 (8.12.2015))</h6>
        <p>- Fixed</p>
        <pre><code>- Fixed minor issue in mini cart box in woocommerce 2.3 after update theme..</code></pre>
        <p>- Updated</p>
        <pre><code>- Compatible with woocommerce 2.4.1+
- Updated porto content types plugin(1.2.1).
- Added portfolio category slug name, skill slug name options, member category slug name, faq category slug name options.
- Added member social page link option.
</code></pre>

        <br>
        <h6>Version 2.4.1 (8.11.2015)</h6>
        <p>- Fixed</p>
        <pre><code>- Fixed minor theme options issue.</code></pre>
        <p>- Updated</p>
        <pre><code>- Updated visual composer plugin.</code></pre>

        <br>
        <br>
        <!--
        <h6>Version 3.3.2 (11.22.2016)</h6>
        <p>- Fixed</p>
        <pre><code>- Fixed minor theme options issue.</code></pre>
        <p>- Updated</p>
        <pre><code>- Updated visual composer plugin.</code></pre>

        <br>
        -->
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        <h6>Version 2.4.2.2 (11/17/2016)</h6>
        <p>- Fixed</p>
        <pre><code>- Revert one encrypted file which is /app/code/local/Smartwave/Porto/Helper/Data.php.</code></pre>

        <br>
        <h6>Version 2.4.2.1 (11/11/2016)</h6>
        <pre><code>No changes on this version.</code></pre>

        <br>
        <h6>Version 2.4.2 (11/10/2016)</h6>
        <p>- Fixed</p>
        <pre><code>- Import CMS was not working on WordPress 1.9.2.1 and below versions.
- Minor CSS Style issues.</code></pre>
        <p>- Updated</p>
        <pre><code>- Lazyload for Full Screen OWL Slider.
- Updated Theme Activation.</code></pre>

        <br>
        <h6>Version 2.4.1 (11/6/2016)</h6>
        <p>- Fixed</p>
        <pre><code>- Minor CSS Style issues.
- Added Empty Stars into Product Detail Page, if it has no reviews.</code></pre>
        <p>- Updated</p>
        <pre><code>- Added Notification Message Feature.
- Added Theme Activation Feature.
- Updated Home 20 with parallax.
- Changed some of the Ajax Loader Icons.</code></pre>

        <br>
        <h6>Version 2.4.0.1 (10/26/2016)</h6>
        <p>- Fixed</p>
        <pre><code>- Import CMS Page was not working.</code></pre>

        <br>
        <h6>Version 2.4.0 (10/26/2016)</h6>
        <p>- Fixed</p>
        <pre><code>- Minor CSS Style issues.</code></pre>
        <p>- Updated</p>
        <pre><code>- Added New Header Type 16.
- Added New Demo Version 20.
- Compatible with WordPress 1.9.3.
- Changed Ajax Loader Icon.</code></pre>

        <br>
        <h6>Version 2.3.4.3 (9/21/2016)</h6>
        <pre><code>No changes on this version.</code></pre>

        <br>
        <h6>Version 2.3.4.2 (9/20/2016)</h6>
        <pre><code>No changes on this version.</code></pre>

        <br>
        <h6>Version 2.3.4.1 (9/15/2016)</h6>
        <pre><code>No changes on this version.</code></pre>

        <br>
        <h6>Version 2.3.4 (9/5/2016)</h6>
        <p>- Fixed</p>
        <pre><code>- Custom Product Tab was not working, when create a new root category for other stores.
- New Tab Style "Sticky Tab" was not showing in System &gt; Configuration &gt; Porto &gt; Porto - Settings Panel &gt; Product View.
- Import Sample CMS contents Module was not working.</code></pre>

        <br>
        <h6>Version 2.3.3 (8/29/2016)</h6>
        <p>- Fixed</p>
        <pre><code>- Header Type 15 responsive style issue.
- Minor CSS Style issues.</code></pre>
        <p>- Updated</p>
        <pre><code>- Updated Demo 19 Styles.
- You can import sample cms pages and static blocks for only one demo version.
- Added a new product tab style "Sticky Tab" in System &gt; Configuration &gt; Porto &gt; Porto - Settings Panel &gt; Product View.
- Fully Compatible with WordPress EE.</code></pre>

        <br>
        <h6>Version 2.3.2 (7/27/2016)</h6>
        <p>- Fixed</p>
        <pre><code>- Minor CSS Style issues.</code></pre>
        <p>- Updated</p>
        <pre><code>- Added Header Type 15.
- Added an Option "Show Category List on Left" in System &gt; Configuration &gt; Porto &gt; Porto - Settings Panel &gt; General.
- Added New Demo Version 19.</code></pre>

        <br>
        <h6>Version 2.3.1.2 (7/5/2016)</h6>
        <p>- Fixed</p>
        <pre><code>- Added "API Key" option for google map on contact us page.
- Added "width", "height" attribute into image elements for page speed.
- Optimized sample images for page speed.
- Minor CSS Style issues.</code></pre>
        <p>- Updated</p>
        <pre><code>- Added "aspect_ratio"(0 or 1), "image_width", "image_height" attributes(Filterproducts).
- Added "lazy_owl"(0 or 1) attribute for lazy load product images in owl carousel mode(Filterproducts). 
- Added "lazy_owl"(0 or 1) attribute for lazy load product images in owl carousel mode(Zeon Manufacturer).</code></pre>

        <br>
        <h6>Version 2.3.1.1 (6/29/2016)</h6>
        <pre><code>No changes on this version.</code></pre>

        <br>
        <h6>Version 2.3.1 (6/28/2016)</h6>
        <p>- Fixed</p>
        <pre><code>- Move Product tab was not working, if it's accordion.
- Minor CSS Style issues.</code></pre>
        <p>- Updated</p>
        <pre><code>- Added Ajax Megamenu Popup feature.(You can configure for this in System &gt; Configuration &gt; SW Extensions &gt; Megamenu &gt; Popup Settings)</code></pre>

        <br>
        <h6>Version 2.3.0 (6/14/2016)</h6>
        <p>- Fixed</p>
        <pre><code>- Category Page performance, when patch with "Porto Theme (patch for Configurable Swatches).zip".</code></pre>

        <br>
        <h6>Version 2.2.1 (5/23/2016)</h6>
        <p>- Fixed</p>
        <pre><code>- Facebook fanbox limit option was not working.
- Minor CSS Style issues.</code></pre>
        <p>- Updated</p>
        <pre><code>- Added an option for showing 1 column products on phone devices.
- Compatible with AW_Blog extension.</code></pre>

        <br>
        <h6>Version 2.2.0 (4/23/2016)</h6>
        <p>- Fixed</p>
        <pre><code>- Quickview Extension's security issue.</code></pre>

        <br>
        <h6>Version 2.1.0 (2/6/2016)</h6>
        <p>- Fixed</p>
        <pre><code>- Ajax Filter was not working with configurable swatches.
- Minor CSS Style issues.</code></pre>

        <br>
        <h6>Version 2.0.0.2 (1/13/2016)</h6>
        <p>- Fixed</p>
        <pre><code>- Import CMS sample datas issue.</code></pre>
        <p>- Updated</p>
        <pre><code>- Optimized products list for filterproducts block and category view page.
- Removed popular tags block from left sidebar.
- Added toolbar in dailydeal page.</code></pre>

        <br>
        <h6>Version 2.0.0.1 (12/25/2015)</h6>
        <p>- Fixed</p>
        <pre><code>- Removed Smartwave_Blog Extension on 1.x version.
- Minor CSS Style issues.</code></pre>

        <br>
        <h6>Version 2.0.0 (12/23/2015)</h6>
        <p>- Fixed</p>
        <pre><code>- 404 error in Add a Deal page on the admin.
- Price slider was not working on search result page.</code></pre>

        <br>
        <h6>Version 1.6.3 (11/27/2015)</h6>
        <p>- Fixed</p>
        <pre><code>- Blog admin page css file missing issue.
- Theme Design Settings were not affected for Header type 12.
- PHP errors from some template files.
- Social Icons on product review page.
- Swapped product image's size was different, when select swatches.
- Footer newsletter input box style issue.
- My wishslist table style issue on safari.
- View order page table style issue on mobile devices.</code></pre>
        <p>- Updated</p>
        <pre><code>- Fully Compatible with SUPEE-6788 security patch and WordPress 1.9.2.2.
- Thumbnail Images for grouped product items.
- Rating stars for Richsnippets.</code></pre>

        <br>
        <h6>Version 1.6.2.1 (11/1/2015)</h6>
        <p>- Fixed</p>
        <pre><code>- Add Deal Page on the admin panel.</code></pre>
        <p>- Updated</p>
        <pre><code>- Compatible with WordPress 1.9.2.2.</code></pre>

        <br>
        <h6>Version 1.6.2 (10/2/2015)</h6>
        <p>- Fixed</p>
        <pre><code>- Couldn't remove the scheduled deals.
- Masonry grid worked incorrectly on home version 18.
- Catalog Search Result page with full width layout.
- PHP fatal error in the right side of the product detail page without zeon manufacturer extension.
- Configurable Swatche selection image overrided with vertical image gallery in the product detail page on mozilla.
- Track Shipment page styles.
- Minor CSS Style issues.</code></pre>
        <p>- Updated</p>
        <pre><code>- Demo 4 - Removed parallax background newsletter
- Demo 4 - Improved some image blocks
- Added an option for hide menu item in the manage categories page for megamenu.
- Updated google richsnippet with rating star.</code></pre>

        <br>
        <h6>Version 1.6.1 (9/5/2015)</h6>
        <p>- Fixed</p>
        <pre><code>- Addtocart button was not working, when disable the ajaxcart on the category view pages.
- The page was broken, when remove the products from the compare popup.
- My downloadable products page was broken.
- PHP error in the daily deal sidebar block.
- Sticky header was moved, when fancybox was opened.
- Duplicated logo image in the sticky header, when enable the full page ajax.
- Product image zoom was not working, when select the configurable swatches.
- Sticky breadcrumb was broken with header type 12, when scrolling page.
- Megamenu links with SSL.
- Minor CSS Style issues.</code></pre>
        <p>- Updated</p>
        <pre><code>- Added Demo Version 18.
- Added Header Type 14.
- Added brand logo in the right side of the product page, it will need to install the Zeon Shop by Manufacturer extension.
- Added custom block above of the contacts form.
- It's able to show only the categories in the side menu.
- Updated ajax loader for ajax cart and quickview.</code></pre>

        <br>
        <h6>Version 1.6.0 (8/22/2015)</h6>
        <p>- Fixed</p>
        <pre><code>- Removed /app/code/local/Mage/Catalog/Model/Product/Type/Configurable.php
- Megamenu items with float was not working wich has no subcategories.
- Product prices were showing incorrectly in the filterproducts blocks.
- Rating stars were showing incorrectly in the filterproducts blocks.
- Changed Contacts form's title.
- Minor CSS Style issues.</code></pre>
        <p>- Updated</p>
        <pre><code>- Added Demo Version 17.
- Updated Header Type 13.
- Added Ajax Infinite Scroll for Category Page.
- Added an option for showing empty categories in the Megamenu settings.
- Added an option for show/hide rating stars in the category page.
- Added an option for show/hide price in the category page.
- Added an option for show/hide add to buttons in the category page.
- Added an option for show/hide qty field for simple products in the category page.
- Added FlexGrid mode for category page and filterproducts blocks.
- Added an option for change the product image size in the product detail page.
- Added an option for vertical product thumbnail image gallery in the product detail page.
- Added an option for change the product tabs type(vertical tabs, accordion) in the product detail page.
- Added main categories navigation into the left side in the product detail page.
- Updated Megamenu for showing category icons.
- Updated Blog Extension for Security.
- Updated jQuery, jQuery UI, Bootstrap, Fancybox versions with the latest versions.</code></pre>

        <br>
        <h6>Version 1.5.2 (8/2/2015)</h6>
        <p>- Fixed</p>
        <pre><code>- Couldn't open the product detail page, when the parent categories were not assigned.
- Qty changer was not working on quickview for grouped products.
- IWD onepagecheckout extension's Login popup was not working with version 4.0.9.
- Php error from bestseller block.
- No Products was showing, while change the price filter slider.
- Php fatal error, when remove/disable dailydeal extension.
- Multiple Product Images were showing, when select the swatches then resize the window.
- Minor CSS Style issues.</code></pre>
        <p>- Updated</p>
        <pre><code>- Added Header Type 13.
- Removed Smartwave_SharingTool Extension.
- Added AddThis_SharingTool Extension.
- Added an option "Float" in Menu Tab on Manage Categories Page.
- Added an option for adding logo image into the sticky header.
- It's possible to set the product image's natural width, when "Keep Image Aspect Ratio" to "Yes".
- Added patch files in the theme package for WordPress 1.9.2.</code></pre>

        <br>
        <h6>Version 1.5.1.2 (6/26/2015)</h6>
        <p>- Fixed</p>
        <pre><code>- Catalog Search Result Page shows blank page.</code></pre>

        <br>
        <h6>Version 1.5.1.1 (6/24/2015)</h6>
        <p>- Fixed</p>
        <pre><code>- Catalog Search with multiwebsite issue.
- Home version 2(new) Content was not showing.
- Facebook widget was not working.
- A href link was not working in the product tabs.
- IWD onepagecheckout extension's style issue.
- Minor CSS Style issues.</code></pre>
        <p>- Updated</p>
        <pre><code>- Added an option for change the product page layout.
- Added an option for show/hide store switcher.</code></pre>

        <br>
        <h6>Version 1.5.1 (6/21/2015)</h6>
        <p>- Fixed</p>
        <pre><code>- Daily Deal timer started immediately whenever.
- Blog pages were redirected to the blog index page on every blog pages and post pages.
- Bestseller block was not working with configurable products.
- Optimized Megamenu extension.
- Product custom tabs were showing, when open the products from homepage, if set it to hidden in the categories.
- Quickview url was not working, sometimes.
- Couldn't change the product price on add to cart sticky, when select the product options.
- Add to links icons were broken on wishlist update page.
- Minor CSS Style issues.</code></pre>
        <p>- Updated</p>
        <pre><code>- Updated Home version 2.
- Added Dark version.
- Added an option for newsletter popup with delay.
- Added an option for showing newsletter popup on every pages.
- Added an option for hide small thumbnail image, when the product has one image.
- Added compare product list popup.
- Added an option for disable responsive mode.</code></pre>

        <br>
        <h6>Version 1.5.0 (6/6/2015)</h6>
        <p>- Fixed</p>
        <pre><code>- Auto Expire for Daily Deal Products.
- Invalid Blog Link in the Top Links.
- Daily Deal Products page Layout.
- Removed Category Navigation on the Category Page for "Is Anchor" is "No".
- Invalid Continue Shopping url, when clear cart on the shopping cart page.
- Right Side Zoom was not working on WordPress 1.9.1
- Minor CSS Style issues.</code></pre>
        <p>- Updated</p>
        <pre><code>- Updated Home version 3.
- Updated Classic Menu Styles.
- Updated Mobile Menu Styles.
- Optimized Category page.
- Added Notice custom block above the header.
- Added an Option for enable Sticky Header on Mobile.
- Added Product Sale Label with Discount Percentage.
- Added more CMS Block Tab for product custom tabs.
- Added one more custom style field in the theme settings panel.
- Added translate.csv file in theme's locale directory for translating.</code></pre>

        <br>
        <h6>Version 1.4.3 (5/12/2015)</h6>
        <p>- Fixed</p>
        <pre><code>- Price Slider was not working, after select slider range of no products.
- Minor Daily Deal Styles.
- Aspect Ratio option was not working on filterproducts blocks.
- "scrollToMe" function was not working, when no elements.</code></pre>
        <p>- Updated</p>
        <pre><code>- Added an option for showing category description at the default position.
- Added menu icon title on mobile resolution.
- Updated showing 2 columns products on mobile resolution.
- Upgraded WordPress version to 1.9.1.1 in the quickstart package.</code></pre>

        <br>
        <h6>Version 1.4.2 (5/5/2015)</h6>
        <p>- Fixed</p>
        <pre><code>- Fatal error is showing in category page, when the site is run in document root or subdirectory.
- Product custom tab issue.
- PHP issue in Product media template.
- Bootstrap Components issue.
- Improved menu position style.
- Fixed minor style issues.</code></pre>
        <p>- Updated</p>
        <pre><code>- Added Daily Deals Extension.
- Fully compatible with WordPress 1.7.</code></pre>

        <br>
        <h6>Version 1.4.1 (4/9/2015)</h6>
        <p>- Fixed</p>
        <pre><code>- When set "Show Custom Tabs" option to YES the custom tabs were not shown.
- Broken product tabs, when set to does not show description tab.
- Mobile nav and Side nav conflicts.
- Broken header type 10 on mobile browsers.
- CAPTCHA forms were not showing, when it's enabled.
- Minor megamenu style issues.</code></pre>
        <p>- Updated</p>
        <pre><code>- Added product image right side zoom type on the Product View Page.
- Added an option for moving product tabs above of the product price on the Product View Page.
- Added product add to cart sticky on the Product View Page.
- Added an option for changing category page layout.
- Added thumbnail image title on the Product View Page.
- Added options for changing product label texts - Sale &amp; New.</code></pre>

        <br>
        <h6>Version 1.4.0 (3/23/2015)</h6>
        <p>- Fixed</p>
        <pre><code>- Broken product tabs, when set to does not show description tab.
- Wrong quickview url, when add the store code into the url.
- Catalog Search Form Action Url with SSL.
- Multishipping Page Styles.
- Refreshed the page, when input blank into the review form.
- Minor CSS style issues.</code></pre>
        <p>- Updated</p>
        <pre><code>- Added Home Version 15.
- Added Home Version 16.
- Added Header Type 12.
- Added Google Richsnippets.
- Added Thumbnail Image and Product name for Prev/Next Products.
- Added the config for show/hide flag image in language selector.</code></pre>

        <br>
        <h6>Version 1.3.2 (3/9/2015)</h6>
        <p>- Fixed</p>
        <pre><code>- Price was showing like "$120,000,000.00" instead of "$120.00" with some locales.
- Unable to set the megamenu columns with 9 - 12.
- Some broken RTL styles.
- Minor CSS style issues.</code></pre>
        <p>- Updated</p>
        <pre><code>- Added Custom Tab on Product page. You can add global tab or custom tab for each category.
- Upgraded Sticky Header. (Removed duplicated menu block for sticky header.) Theme speed is much higher than before, some styles for sticky header are updated.
- Moved compare page link in the header.
- Updated breadcrumbs styles.
- Updated prev / next product icons in product page.</code></pre>

        <br>
        <h6>Version 1.3.1.1 (2/28/2015)</h6>
        <p>- Fixed</p>
        <pre><code>- Change the deprecated php functions for filterproducts extension, eg: split().
- Some of the products are not showing, when filter with price slider.
- Social pages are loading in current tab, when click footer social icons.
- Faux font bolding on Mozilla, IE, Opera, when change the primary font with google fonts.
- Minor CSS style issues.</code></pre>

        <br>
        <h6>Version 1.3.1 (2/26/2015)</h6>
        <p>- Fixed</p>
        <pre><code>- Some products are not showing when change the price slider on the category page.
- Sub categories list are not showing in the category list dropdown of the searchbox.
- WordPress variables doesn't work in the static block for mobile custom menu.
- The rating stars of some of the products are not showing.
- Change the deprecated php functions, eg: split().
- The pages are loaded in quickview popup.
- swatches-product.js file loading issue when disable configurable swatches on WordPress 1.9.1.
- Product image is not loading when the product has one image on WordPress 1.9.1.
- Duplicated product images when switch the color swatches on WordPress 1.9.1.
- Minor CSS style issues.</code></pre>
        <p>- Updated</p>
        <pre><code>- Added Quick Start Package.
- Added new Theme Pacage without some extensions which be able to conflict with other extensions.
- Added the product image and product name on the ajax add to cart success popup.
- Updated featured products list with random featured products list.
- Added product rating stars into the related products block.</code></pre>

        <br>
        <h6>Version 1.3.0 (2/11/2015)</h6>
        <p>- Fixed</p>
        <pre><code>- Price Slider URL issue with other ports.
- Initialize php variables for Prev / Next Products Helper.
- Showing Shopping Cart Page in Quickview Popup when click "Go To Cartpage" button after added products to the cart on Quickview Popup.
- Division zero issue in minicart.
- Move Actions is not working after ajax filter.
- Quickview popup background issue for boxed version.
- Colorswatches change product image is not woring on ie 9 on WordPress 1.9.1.
- Minor css style issues.</code></pre>
        <p>- Updated</p>
        <pre><code>- Added Meta Title for Blog.
- Added 1280px page maximum width layout.
- Added Full width page maximum width layout.
- Added 2nd footer middle area.
- Added Header Type 11(Full Width).
- Added Home Version 13.
- Added Home Version 14.
- Added Image banner on all pages for full width page layout.
- Added Footer newsletter block title configuration.
- Added Popular Tags block for footer.
- Upgraded Homepage Slider 11.</code></pre>

        <br>
        <h6>Version 1.2.2 (1/30/2015)</h6>
        <p>- Fixed</p>
        <pre><code>- Blank month number at the blog date ribbon.
- Doesn't get the correct Latest/Featured/New Products collections.
- Default value of the except elements and except form ids for Fullpage Ajax.
- Get the php error message for megamenu if catalog flat category is enabled.
- Doesn't work additional price for configurable options on Quickview.
- Broken upsell product block action area styles(add to cart, add to wishlist, add to compare buttons set) if maximum page width is 1024px.
- Ajax cart url isn't correct when product has custom options.
- Footer Top doesn't work if sets it with the custom block.
- Page scroll is in the bottom of the page after filter by attributes or pagination on Category Page.
- Configurable swatches doesn't work, after filter by attributes with ajax on WordPress 1.9.1.
- Minor css style issues.</code></pre>
        <p>- Updated</p>
        <pre><code>- Added Easy Demo Install Module.
- Added Header Type 10.
- Added Home 12.
- Added more Product View Page Config options.
- Added custom char sub set option.
- Upgraded Home 2 Slider.
- Upgraded Home 7 Slider and Color Skin.
- Upgraded Home 9 Slider and Color Skin
- Upgraded Home 11 Slider.</code></pre>

        <br>
        <h6>Version 1.2.1.1 (1/15/2015)</h6>
        <p>- Fixed</p>
        <pre><code>- Product Image issue, when product has one image.
- Qty changer issue on cart page.
- Shipping Cost Calculator issue on cart page.
- Minor css style issues.</code></pre>

        <br>
        <h6>Version 1.2.0 (1/14/2015)</h6>
        <p>- Fixed</p>
        <pre><code>- Qty changer issue for bundle product, when disabled update qty.
- "No Products" issue, when change the price slider
- Login and Forgot Password submit button issue for IWD Onepagecheckout extension.
- Catalog Search Autocomplete style issue.
- Color Swatche issue on WordPress 1.9.1.
- Minor css style issues.</code></pre>
        <p>- Updated</p>
        <pre><code>- Added Header Type 9.
- Added Homepage 11.
- Enable/Disable Catalog Category Search.
- Added Compare link in header top links area.
- Shipping calculator tab will be opened, after submitted on shopping cart page.</code></pre>

        <br>
        <h6>Version 1.1.2 (1/6/2015)</h6>
        <p>- Fixed</p>
        <pre><code>- Boxed version style issue.
- Update cart issue on edit cart page.
- Continue Shopping issue on cart page, after removed items.
- Page top and bottom white area style issue.
- Prev/Next Products issue, when enabled flat category.
- Add to Cart Button issue, if the product is out of stock.
- Footer Ribbon text setting issue on the Theme Setting page.</code></pre>
        <p>- Updated</p>
        <pre><code>- Footer Ribbon text setting issue on the Theme Setting page.
- Newsletter Popup close button style.
- One Static Block(id:porto_fashion_category_banner)</code></pre>

        <br>
        <h6>Version 1.1.1 (12/22/2014)</h6>
        <p>- Fixed</p>
        <pre><code>- Ajaxcart option popup background issue on boxed version with the background.
- Right corner menu style issue on Sticky Header.
- Removed '&lt; br /&gt;' from error message on ajax cart.
- Quickview issue, when product has no product image.
- Quickview script error, when disabled configurable swatches on WordPress 1.9.1.
- Display Out of Stock Products, when set the config "Display Out of Stock Products" in Filterproducts extension.
- Pager Next/Prev button issue on RTL Version.</code></pre>
        <p>- Updated</p>
        <pre><code>- Added Previous/Next Product Links on Product View Page.
- Added Newsletter Popup.
- Updated Homepage 5 Slider.
- Updated Homepage 6 Slider.
- Updated Homepage 6 Content.
- Compitable with IWD_Onepagecheckout Extension.
- Compitable with Zeon_Manufacturer Extension.</code></pre>

        <br>
        <h6>Version 1.1.0 (12/17/2014)</h6>
        <p>- Fixed</p>
        <pre><code>- Blank page issue, when there is no product image on the product page.
- Search box style issue in the header on safari.
- Full Page Ajax extension issue, after run ajax catalog on the category page.
- Latest Products list issue on WordPress 1.9.1.</code></pre>
        <p>- Updated</p>
        <pre><code>- Default value of the except elements for Full Page Ajax extension.
- Transition effect in the homepage sliders.
- Minor styles of the Homepage Sliders and Contents.
- It's possible to change the "To Top" icon colors on the admin.
- It's possible to add custom menu at the right corner of the menu.
- Added Homepage version 9.</code></pre>

        <br>
        <h6>Version 1.0.1 (12/12/2014)</h6>
        <p>- Fixed</p>
        <pre><code>- Product image zoom style issue in the product view page on IE9, IE10.
- Multiple zoom icon shown issue, while loading page.
- Mini Search form style issue on mobile browsers.
- Vertical Menu style issue on Home version 4 and 6, when screen resolution is between 992px and 1200px.
- The buttons style issue of the Login/Register form in Checkout page on mobile resolution.
- Category label style issues.</code></pre>
        <p>- Updated</p>
        <pre><code>- It's possible to show the add to cart button and add to links in the product image area in the catalog grid mode, when mouse over the products.
- Added jquery parallax js file with stellar js file, you can use other parallax style.
- Enhanced documentation for installation.</code></pre>

        <br>
        <h6>Version 1.0.0 (10/12/2014)</h6>
        <pre><code>Initialized</code></pre>
    </div>
    <div class="porto-thanks">
        <p class="description"><?php _e( 'Thank you, we hope you to enjoy using Porto!', 'porto' ); ?></p>
    </div>
</div>