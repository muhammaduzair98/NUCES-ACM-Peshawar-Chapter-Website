<?php
/**
 * Class EPLUS_Element
 *
 * @author Pluginbazar
 * @package includes/classes/class-item-data
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}  // if direct access


if ( ! class_exists( 'EPLUS_Element' ) ) {
	/**
	 * Class EPLUS_Element
	 */
	class EPLUS_Element {


		/**
		 * Unique ID for this element
		 *
		 * @var string
		 */
		public $element_id = '';


		/**
		 * Meaningful Name for this element
		 *
		 * @var string
		 */
		public $element_name = '';


		/**
		 * Set configuration for this element
		 *
		 * @var array
		 */
		public $element_config = array();


		/**
		 * Set settings fields for this element
		 *
		 * @var array
		 */
		public $setting_fields = array();


		/**
		 * EPLUS_Element constructor.
		 *
		 * @param $id string
		 * @param $element_name string
		 * @param $element array
		 */
		function __construct( $id, $element_name = '', $element = array() ) {

			$this->set_element_id( $id );
			$this->set_element_name( $element_name );
			$this->set_setting_fields( $this->setting_fields() );
			$this->set_element_config( $element );

			add_action( 'vc_after_init', array( $this, 'vc_map' ) );

			add_shortcode( $this->get_element_id(), array( $this, 'display_element' ) );

			if ( $this->has_child() ) {
				add_shortcode( $this->get_child_id(), array( $this, 'display_child_element' ) );
			}

			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		}


		/**
		 * Display Element Output
		 *
		 * @param array $atts
		 * @param null $content
		 * @param string $shortcode
		 *
		 * @return mixed|void
		 */
		function display_element( $atts = array(), $content = null, $shortcode = '' ) {

			global $shrtocode_args, $element_id;

			$shrtocode_args            = $atts;
			$shrtocode_args['content'] = $content;
			$element_id                = $shortcode;
			$views                     = $this->get_views();
			$style                     = eplus()->get_shortcode_atts( 'style', 1 );

			ob_start();

			eplus_get_template( sprintf( 'views/%s.php', eplus()->get_shortcode_atts( $style, 'template-1', $views ) ) );

			return apply_filters( 'eplus_filters_display_element', ob_get_clean(), $atts, $content );
		}


		/**
		 * Display Child Element Output
		 *
		 * @param array $atts
		 * @param null $content
		 * @param string $shortcode
		 *
		 * @return mixed|void
		 */
		function display_child_element( $atts = array(), $content = null, $shortcode = '' ) {

			global $shrtocode_args, $element_id;

			$shrtocode_args = $atts;
			$element_id     = $shortcode;
			$views          = $this->get_views();
			$style          = eplus()->get_shortcode_atts( 'style', 1 );

			ob_start();

			eplus_get_template( sprintf( 'views/child/%s.php', eplus()->get_shortcode_atts( $style, 'template-1', $views ) ) );

			return apply_filters( 'eplus_filters_display_child_element', ob_get_clean(), $atts, $content );
		}


		/**
		 * VC_Map create settings for page builder
		 */
		function vc_map() {

			$fields             = $this->get_element_config();
			$fields['name']     = $this->get_element_name();
			$fields['base']     = $this->get_element_id();
			$fields['category'] = $this->get_element_category();
			$fields['icon']     = sprintf( '%sassets/images/elements-icon.svg', EPLUS_PLUGIN_URL );
			$style_variations   = array();
			$default_params     = array();
			$element_params     = array();

			for ( $index = 1; $index <= $this->get_style_variations(); $index ++ ) {
				$style_variations[ sprintf( esc_html__( 'Style %s', 'element-plus' ), $index ) ] = $index;
			}

			$default_params[] = array(
				'param_name'  => 'style',
				'type'        => 'dropdown',
				'admin_label' => true,
				'heading'     => esc_html__( 'Style', 'element-plus' ),
				'description' => esc_html__( 'Select style for this element', 'element-plus' ),
				'value'       => ! empty( $custom_styles = $this->get_custom_styles() ) ? $custom_styles : $style_variations,
			);

			foreach ( array_merge( $default_params, $this->get_setting_fields() ) as $element_param ) {
				if ( isset( $element_param['params'] ) && ! empty( $element_param['params'] ) ) {
					$_element_params = array();
					foreach ( $element_param['params'] as $_element_param ) {
						if ( isset( $_element_param['type'] ) && $_element_param['type'] == 'iconlibrary' ) {
							$_element_params = array_merge( $_element_params, eplus()->get_icon_library_params( $_element_param ) );
						} else {
							$_element_params[] = $_element_param;
						}
					}
					$element_param['params'] = $_element_params;
				}

				if ( isset( $element_param['type'] ) && $element_param['type'] == 'iconlibrary' ) {
					$element_params = array_merge( $element_params, eplus()->get_icon_library_params( $element_param ) );
				} else {
					$element_params[] = $element_param;
				}
			}

			$fields['params'] = apply_filters( 'eplus_filters_element_params', $element_params, $this->get_element_id() );

			if ( $this->has_child() ) {
				$fields['as_parent']    = array( 'only' => $this->get_child_id() );
				$fields['is_container'] = true;
				$fields['js_view']      = 'VcColumnView';
			}

			try {
				vc_map( $fields );
			} catch ( Exception $e ) {
			}

			// Check and Add child element
			if ( $this->has_child() ) {

				$child_fields = array(
					'name'            => $this->get_child_name(),
					'base'            => $this->get_child_id(),
					'content_element' => true,
					'category'        => $this->get_element_category(),
					'icon'            => sprintf( '%sassets/images/elements-icon.svg', EPLUS_PLUGIN_URL ),
					'as_child'        => array( 'only' => $this->get_element_id() ),
					'params'          => apply_filters( 'eplus_filters_child_element_params', $this->child_setting_fields() ),
				);

				try {
					vc_map( $child_fields );
				} catch ( Exception $e ) {
				}
			}
		}


		/**
		 * Enqueue Scripts or Styles for this element
		 */
		function enqueue_scripts() {

			if ( $this->enable_js() ) {

				foreach ( $this->get_assets_to_enqueue( 'js' ) as $handler => $url ) {
					wp_enqueue_script( 'eplus-' . $handler, $url, array(), EPLUS_VERSION, $this->in_footer() );
				}

				$script_dir = $this->get_things_dir( 'js/scripts.js' );

				if ( file_exists( $script_dir ) ) {
					wp_enqueue_script( 'eplus-' . $this->get_element_id(), $this->get_things_url( 'js/scripts.js' ), array(), EPLUS_VERSION, $this->in_footer() );
				}
			}

			foreach ( $this->get_assets_to_enqueue( 'css' ) as $handler => $url ) {
				wp_enqueue_style( 'eplus-' . $handler, $url, array(), EPLUS_VERSION );
			}

			wp_enqueue_style( $this->get_element_id(), $this->get_things_url( 'css/style.css' ), false, EPLUS_VERSION );
		}


		/**
		 * Return assets url by giving type
		 *
		 * @param string $asset_type
		 *
		 * @return array
		 */
		function get_assets_to_enqueue( $asset_type = 'js' ) {

			$element_config = $this->get_element_config();
			$enqueue_assets = isset( $element_config['enqueue_assets'] ) ? (array) $element_config['enqueue_assets'] : array();
			$assets         = array();

			foreach ( $enqueue_assets as $asset ) {

				$_asset    = explode( '.', $asset );
				$type      = end( $_asset );
				$handler   = implode( '-', $_asset );
				$asset_url = $this->get_things_url( sprintf( '%1$s/%2$s', $type, $asset ) );

				if ( $type == $asset_type && ! empty( $handler ) && ! empty( $asset_url ) ) {
					$assets[ $handler ] = $asset_url;
				}
			}

			return $assets;
		}


		/**
		 * Check whether this element needs js to be enabled or not
		 *
		 * @return array
		 */
		function get_views() {
			$element_config = $this->get_element_config();

			if ( isset( $element_config['views'] ) ) {
				return (array) $element_config['views'];
			}

			return array();
		}


		/**
		 * Get style variations for this template
		 *
		 * @return int
		 */
		function get_style_variations() {
			$element_config = $this->get_element_config();

			if ( isset( $element_config['style_variations'] ) ) {
				return (int) $element_config['style_variations'];
			}

			return (int) 1;
		}


		/**
		 * Check whether this element needs js to be enabled or not
		 *
		 * @return bool
		 */
		function in_footer() {
			$element_config = $this->get_element_config();

			if ( isset( $element_config['scripts_in_footer'] ) ) {
				return (bool) $element_config['scripts_in_footer'];
			}

			return true;
		}

		/**
		 * Check whether this element needs js to be enabled or not
		 *
		 * @return bool
		 */
		function enable_js() {
			$element_config = $this->get_element_config();

			if ( isset( $element_config['enable_js'] ) ) {
				return (bool) $element_config['enable_js'];
			}

			return false;
		}


		/**
		 * Check whether this element has child element
		 *
		 * @return bool
		 */
		function has_child() {

			$element_config = $this->get_element_config();

			if ( isset( $element_config['has_child'] ) ) {
				return (bool) $element_config['has_child'];
			}

			return false;
		}


		/**
		 * Check whether this element has child element
		 *
		 * @return bool
		 */
		function get_child_name() {

			$element_config = $this->get_element_config();

			if ( isset( $element_config['child_name'] ) && ! empty( $element_config['child_name'] ) ) {
				return $element_config['child_name'];
			}

			return sprintf( '%s - child', $this->get_element_name() );
		}


		/**
		 * Return settings fields
		 * Must be override on the extended class
		 *
		 * @return array
		 */
		function setting_fields() {
			return array();
		}


		/**
		 * Return child settings fields
		 * Must be override on the extended class
		 *
		 * @return array
		 */
		function child_setting_fields() {
			return array();
		}


		/**
		 * Return if there is any custom styles labels added
		 *
		 * @return array
		 */
		function get_custom_styles() {

			$element_config = $this->get_element_config();
			$all_styles     = isset( $element_config['styles'] ) ? (array) $element_config['styles'] : array();
			$custom_styles  = array();

			foreach ( $all_styles as $index => $label ) {
				$custom_styles[ $label ] = $index;
			}

			return $custom_styles;
		}


		/**
		 * Return anything's URL inside this element
		 *
		 * @param string $things
		 *
		 * @return mixed|void
		 */
		function get_things_url( $things = '' ) {

			return apply_filters( 'eplus_filters_return_things_url', sprintf( '%selements/%s/%s', EPLUS_PLUGIN_URL, eplus()->get_element_raw_id( $this->get_element_id() ), $things ) );
		}

		/**
		 * Return anything's Directory inside this element
		 *
		 * @param string $things
		 *
		 * @return mixed|void
		 */
		function get_things_dir( $things = '' ) {

			return apply_filters( 'eplus_filters_return_things_dir', sprintf( '%selements/%s/%s', EPLUS_PLUGIN_DIR, eplus()->get_element_raw_id( $this->get_element_id() ), $things ) );
		}


		/**
		 * Return settings fields for this element
		 *
		 * @return mixed|void
		 */
		function get_setting_fields() {
			return apply_filters( 'eplus_filters_element_setting_fields', $this->setting_fields );
		}


		/**
		 * Set settings fields for this element
		 *
		 * @param $fields
		 */
		function set_setting_fields( $fields ) {
			$this->setting_fields = $fields;
		}


		/**
		 * Return configurations for this element
		 *
		 * @return mixed|void
		 */
		function get_element_config() {
			return apply_filters( 'eplus_filters_element_config', $this->element_config );
		}


		/**
		 * Set settings fields
		 *
		 * @param array $args
		 */
		function set_element_config( $args = array() ) {
			$this->element_config = array_merge( $this->element_config, $args );
		}


		/**
		 * Return current element name
		 *
		 * @return mixed|void
		 */
		function get_element_name() {
			return apply_filters( 'eplus_filters_element_name', $this->element_name );
		}


		/**
		 * Set element name
		 *
		 * @param $element_name
		 */
		public function set_element_name( $element_name ) {
			$this->element_name = $element_name;
		}


		/**
		 * Return current element name
		 *
		 * @return mixed|void
		 */
		function get_element_id() {
			return apply_filters( 'eplus_filters_element_id', $this->element_id );
		}


		/**
		 * Return child id of current element name
		 *
		 * @return mixed|void
		 */
		function get_child_id() {
			return apply_filters( 'eplus_filters_child_id', sprintf( '%s_child', $this->element_id ) );
		}


		/**
		 * Return Element Category
		 *
		 * @return mixed|void
		 */
		function get_element_category() {
			return apply_filters( 'eplus_filters_element_category', esc_html__( 'Element Plus', 'element-plus' ) );
		}


		/**
		 * Set element name
		 *
		 * @param $id
		 */
		public function set_element_id( $id ) {

			global $element_id;

			$this->element_id = $id;
			$element_id       = $this->element_id;
		}
	}
}