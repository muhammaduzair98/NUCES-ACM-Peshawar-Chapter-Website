<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The page Settings.
 *
 * @since 1.0.0
 */
class WIS_SettingsPage extends WIS_Page {

	/**
	 * Тип страницы
	 * options - предназначена для создании страниц с набором опций и настроек.
	 * page - произвольный контент, любой html код
	 *
	 * @var string
	 */
	public $type = 'options';

	/**
	 * The id of the page in the admin menu.
	 *
	 * Mainly used to navigate between pages.
	 *
	 * @since 1.0.0
	 * @see   FactoryPages423_AdminPage
	 *
	 * @var string
	 */
	public $id;

	/**
	 * Menu icon (only if a page is placed as a main menu).
	 * For example: '~/assets/img/menu-icon.png'
	 * For example dashicons: '\f321'
	 * @var string
	 */
	public $menu_icon;

	/**
	 * @var string
	 */
	public $page_menu_dashicon = 'dashicons-performance';

	/**
	 * Menu position (only if a page is placed as a main menu).
	 * @link http://codex.wordpress.org/Function_Reference/add_menu_page
	 * @var string
	 */
	public $menu_position = 58;

	/**
	 * Menu type. Set it to add the page to the specified type menu.
	 * For example: 'post'
	 * @var string
	 */
	public $menu_post_type = null;

	/**
	 * Visible page title.
	 * For example: 'License Manager'
	 * @var string
	 */
	public $page_title;

	/**
	 * Visible title in menu.
	 * For example: 'License Manager'
	 * @var string
	 */
	public $menu_title;

	/**
	 * If set, an extra sub menu will be created with another title.
	 * @var string
	 */
	public $menu_sub_title;

	/**
	 *
	 * @var
	 */
	public $page_menu_short_description;

	/**
	 * Заголовок страницы, также использует в меню, как название закладки
	 *
	 * @var bool
	 */
	public $show_page_title = true;

	/**
	 * @var int
	 */
	public $page_menu_position = 20;


	/**
	 * @param WIS_Plugin $plugin
	 */
	public function __construct( $plugin ) {
		$this->id         = "settings";
		$this->page_title = __( 'Settings of Social Slider Widget', 'instagram-slider-widget' );
		$this->menu_title = __( 'Settings', 'instagram-slider-widget' );
		$this->menu_target= "widgets-".$plugin->getPluginName();
		$this->menu_icon = '~/admin/assets/img/wis.png';
		$this->capabilitiy = "manage_options";
		$this->template_name = "settings";

		parent::__construct( $plugin );

		$this->plugin = $plugin;
	}

	public function assets( $scripts, $styles ) {
		$this->scripts->request( 'jquery' );

		$this->scripts->request( [
			'control.checkbox',
			'control.dropdown'
		], 'bootstrap' );

		$this->styles->request( [
			'bootstrap.core',
			'bootstrap.form-group',
			'bootstrap.separator',
			'control.dropdown',
			'control.checkbox',
		], 'bootstrap' );
	}

	public function indexAction() {

		?>
		<script>
            jQuery(document).ready(function(){
                var hash = document.location.hash;
                var token = hash.substring(14);
                if(token.length > 40)
                {
                    jQuery.post ( ajaxurl, {
                        action:      'wis_add_account_by_token',
                        insttoken:       token,
                        _ajax_nonce: '<?php echo wp_create_nonce("addAccountByToken"); ?>',
                    }).done( function( html ) {
                        console.log(html);
                        console.log(token);
                        document.location.hash = "";
                        window.location.reload();
                    });

                    jQuery('#wis-spinner').addClass('is-active');
                }
            });
		</script>
		<?php
		parent::indexAction();
	}
}
