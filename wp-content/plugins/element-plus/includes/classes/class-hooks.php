<?php
/**
 * Class Hooks
 */


if ( ! class_exists( 'EPLUS_Hooks' ) ) {
	/**
	 * Class EPLUS_Hooks
	 */
	class EPLUS_Hooks {

		/**
		 * EPLUS_Hooks constructor.
		 */
		function __construct() {

			add_action( 'admin_notices', array( $this, 'check_dependencies' ), 99 );
			add_action( 'vc_edit_form_fields_after_render', array( $this, 'check_element_dependencies' ) );
			add_filter( 'eplus_filters_element_params', array( $this, 'filter_element_params' ), 10, 2 );

			add_action( 'init', array( $this, 'register_all_elements' ) );
			add_action( 'vc_after_init', array( $this, 'register_param_types' ) );
		}


		/**
		 * Register Param types
		 *
		 * @throws ReflectionException
		 */
		function register_param_types() {

			foreach ( eplus()->get_param_types() as $param_type => $param ) {

				$param_class     = isset( $param['class_name'] ) ? $param['class_name'] : '';
				$file_to_include = sprintf( '%1$sparam-types/%2$s/class-%2$s.php', EPLUS_PLUGIN_DIR, eplus()->get_element_raw_id( $param_type ) );

				if ( ! file_exists( $file_to_include ) || empty( $param_class ) ) {
					continue;
				}

				require $file_to_include;

				$reflection_class = new ReflectionClass( $param_class );
				$reflection_class->newInstanceArgs( array( $param_type ) );
			}
		}


		/**
		 * Register all Elements
		 *
		 * @throws ReflectionException
		 */
		function register_all_elements() {

			foreach ( eplus()->get_elements() as $element_id => $element ) {

				$element_name    = isset( $element['label'] ) ? $element['label'] : '';
				$element_class   = isset( $element['class_name'] ) ? $element['class_name'] : '';
				$file_to_include = sprintf( '%1$selements/%2$s/class-element-%2$s.php', EPLUS_PLUGIN_DIR, eplus()->get_element_raw_id( $element_id ) );

				if ( ! file_exists( $file_to_include ) || empty( $element_class ) ) {
					continue;
				}

				require $file_to_include;

				$reflection_class = new ReflectionClass( $element_class );
				$reflection_class->newInstanceArgs( array( $element_id, $element_name, $element ) );
			}

			add_image_size( 'gallery-thumb', 260, 260, true );
		}


		/**
		 * Check dependency for element and return param fields
		 *
		 * @param $params
		 * @param $element_id
		 *
		 * @return array
		 */
		function filter_element_params( $params, $element_id ) {

			$has_dependency = false;

			foreach ( eplus_get_element_dependencies( $element_id ) as $dependency ) {

				$class = isset( $dependency['class'] ) ? $dependency['class'] : '';

				if ( ! empty( $class ) && ! $has_dependency && ! class_exists( $class ) ) {
					$has_dependency = true;
				}
			}

			if ( $has_dependency ) {
				return array();
			}

			return $params;
		}


		/**
		 * Check for dependencies of Element
		 */
		function check_element_dependencies() {

			$element_id = isset( $_POST['tag'] ) ? sanitize_text_field( $_POST['tag'] ) : '';

			foreach ( eplus_get_element_dependencies( $element_id ) as $dependency ) {

				$class   = isset( $dependency['class'] ) ? $dependency['class'] : '';
				$message = isset( $dependency['message'] ) ? $dependency['message'] : '';

				if ( ! empty( $class ) && ! class_exists( $class ) ) {
					printf( '<p class="eplus-notice eplus-error">%s</p>', $message );
				}
			}
		}


		/**
		 * Check whether main plugin WP Poll is installed or not
		 */
		function check_dependencies() {

			if ( ! class_exists( 'Vc_Manager' ) ) {

				$message = sprintf( '<strong>%s</strong> %s. <a href="%s" target="_blank">%s</a>',
					esc_html( 'WPBakery Page Builder' ),
					esc_html__( 'plugin is required for Element Plus', 'element-plus' ),
					esc_url( '//codecanyon.net/item/visual-composer-page-builder-for-wordpress/242431' ),
					esc_html__( 'Get it Now', 'element-plus' )
				);

				printf( '<div class="notice notice-error is-dismissible"><p>%s</p></div>', $message );
				deactivate_plugins( EPLUS_PLUGIN_FILE );
			}
		}
	}

	new EPLUS_Hooks();
}