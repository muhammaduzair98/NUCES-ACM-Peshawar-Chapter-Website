<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Основной класс плагина Social Slider Widget
 *
 * @author        Artem Prihodko <webtemyk@yandex.ru>
 * @copyright (c) 2019 Webraftic Ltd
 * @version       1.0
 */

class WIS_Plugin extends Wbcr_Factory423_Plugin {

	/**
	 * @see self::app()
	 * @var Wbcr_Factory423_Plugin
	 */
	private static $app;

	/**
	 * @var array Список слайдеров
	 */
	public $sliders = array();

	/**
	 * Статический метод для быстрого доступа к интерфейсу плагина.
	 *
	 * Позволяет разработчику глобально получить доступ к экземпляру класса плагина в любом месте
	 * плагина, но при этом разработчик не может вносить изменения в основной класс плагина.
	 *
	 * Используется для получения настроек плагина, информации о плагине, для доступа к вспомогательным
	 * классам.
	 *
	 * @return Wbcr_Factory423_Plugin
	 */
	public static function app() {
		return self::$app;
	}

	/**
	 * Конструктор
	 *
	 * Применяет конструктор родительского класса и записывает экземпляр текущего класса в свойство $app.
	 * Подробнее о свойстве $app см. self::app()
	 *
	 * @param string $plugin_path
	 * @param array  $data
	 *
	 * @throws Exception
	 */
	public function __construct( $plugin_path, $data ) {
		parent::__construct( $plugin_path, $data );

		self::$app = $this;

		if ( is_admin() ) {
			// Регистрации класса активации/деактивации плагина
			$this->init_activation();

			// Инициализация скриптов для бэкенда
			$this->admin_scripts();

			//Подключение файла проверки лицензии
			require( WIS_PLUGIN_DIR . '/admin/ajax/check-license.php' );
		}
		else
		{
			$this->front_scripts();
		}

		$this->global_scripts();


	}

	protected function init_activation() {
		include_once( WIS_PLUGIN_DIR . '/admin/class-wis-activation.php' );
		$this->registerActivation( 'WIS_Activation' );
	}

	/**
	 * Регистрирует классы страниц в плагине
	 */
	private function register_pages() {
		require_once WIS_PLUGIN_DIR . '/admin/class-wis-page.php';
		self::app()->registerPage( 'WIS_WidgetsPage', WIS_PLUGIN_DIR . '/admin/pages/widgets.php' );
		self::app()->registerPage( 'WIS_SettingsPage', WIS_PLUGIN_DIR . '/admin/pages/settings.php' );
		self::app()->registerPage( 'WIS_LicensePage', WIS_PLUGIN_DIR . '/admin/pages/license.php' );
		self::app()->registerPage( 'WIS_AboutPage', WIS_PLUGIN_DIR . '/admin/pages/about.php' );
	}

	/**
	 * Код для админки
	 */
	private function admin_scripts()
	{
		// Регистрация страниц
		$this->register_pages();

		add_action( 'admin_enqueue_scripts', [$this, 'admin_enqueue_assets'] );
	}

	/**
	 * Код для админки и фронтенда
	 */
	private function global_scripts() {

	}

	/**
	 * Код для фронтенда
	 */
	private function front_scripts() {
		add_action( 'wp_enqueue_scripts', [$this, 'enqueue_assets'] );
	}

	public function admin_enqueue_assets()
	{
		wp_enqueue_style( 'jr-insta-admin-styles', WIS_PLUGIN_URL.'/admin/assets/css/jr-insta-admin.css', array(), WIS_PLUGIN_VERSION );
		wp_enqueue_script( 'jr-insta-admin-script', WIS_PLUGIN_URL.'/admin/assets/js/jr-insta-admin.js',  array( 'jquery' ), WIS_PLUGIN_VERSION, true );
		wp_localize_script('jr-insta-admin-script', 'wis', array(
			'nonce' => wp_create_nonce('wis_nonce'),
			'remove_account' => __('Are you sure want to delete this account?', 'instagram-slider-widget'),
		));
		wp_enqueue_script( 'jr-tinymce-button', WIS_PLUGIN_URL.'/admin/assets/js/tinymce_button.js',  array( 'jquery' ), WIS_PLUGIN_VERSION, false );
		$wis_shortcodes = $this->get_isw_widgets();
		wp_localize_script('jr-insta-admin-script', 'wis_shortcodes', $wis_shortcodes);
		wp_localize_script('jr-insta-admin-script', 'add_account_nonce', array(
			'nonce' => wp_create_nonce("addAccountByToken"),
		));

	}

	public function enqueue_assets()
	{
	}

	/**
	 * Метод проверяет активацию премиум плагина и наличие действующего лицензионнного ключа
	 *
	 * @return bool
	 */
	public function is_premium()
	{
		if(
			$this->premium->is_active() &&
			$this->premium->is_activate()
			//&& is_plugin_active( "{$this->premium->get_setting('slug')}/{$this->premium->get_setting('slug')}.php" )
		)
			return true;
		else
			return false;
	}

	/**
	 * Получает все виджеты этого плагина
	 *
	 * @return array
	 */
	public function get_isw_widgets()
	{
		$settings = WIS_InstagramSlider::app()->get_settings();
		$result = array();
		foreach ($settings as $key => $widget)
		{
			$result[] = array(
				'title' => $widget['title'],
				'id' => $key,
			);
		}
		return $result;
	}

}
