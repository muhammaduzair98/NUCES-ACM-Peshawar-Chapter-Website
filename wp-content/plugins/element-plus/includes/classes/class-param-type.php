<?php
/**
 * Class: Param Type
 */

if ( ! class_exists( 'EPLUS_Param_type' ) ) {
	/**
	 * Class EPLUS_Param_type
	 */
	class EPLUS_Param_type {


		/**
		 * Private var Param type
		 *
		 * @var null
		 */
		private $param_type = null;


		/**
		 * Private var Param Config
		 *
		 * @var array
		 */
		private $config = array();


		/**
		 * EPLUS_Param_type constructor.
		 *
		 * @param $param_type
		 */
		function __construct( $param_type ) {

			$this->set_param_type( $param_type );
			$this->register_param_type();

			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		}


		/**
		 * Enqueue Scripts or Styles for this element
		 */
		function enqueue_scripts() {

			if ( $this->enable_js() ) {

				foreach ( $this->get_assets_to_enqueue( 'js' ) as $handler => $url ) {
					wp_enqueue_script( 'eplus-' . $handler, $url, array(), EPLUS_VERSION );
				}
			}

			foreach ( $this->get_assets_to_enqueue( 'css' ) as $handler => $url ) {
				wp_enqueue_style( 'eplus-' . $handler, $url, array(), EPLUS_VERSION );
			}
		}


		/**
		 * Return assets url by giving type
		 *
		 * @param string $asset_type
		 *
		 * @return array
		 */
		function get_assets_to_enqueue( $asset_type = 'js' ) {

			$element_config = $this->get_config();
			$enqueue_assets = isset( $element_config['enqueue_assets'] ) ? (array) $element_config['enqueue_assets'] : array();
			$assets         = array();

			foreach ( $enqueue_assets as $asset ) {

				$_asset    = explode( '.', $asset );
				$type      = end( $_asset );
				$handler   = implode( '-', $_asset );
				$asset_url = sprintf( '%sparam-types/%s/%s/%s', EPLUS_PLUGIN_URL, eplus()->get_element_raw_id( $this->get_param_type() ), $asset_type, $asset );

				if ( $type == $asset_type && ! empty( $handler ) && ! empty( $asset_url ) ) {
					$assets[ $handler ] = $asset_url;
				}
			}

			return $assets;
		}


		/**
		 * Render param field output
		 *
		 * @param array $settings
		 * @param mixed $value
		 *
		 * @return mixed|void
		 */
		function render_output( $settings, $value ) {

			// Field HTML
		}


		/**
		 * Render param field output
		 *
		 * @param array $settings
		 * @param mixed $value
		 *
		 * @return mixed|void
		 */
		function return_field_output( $settings, $value ) {

			ob_start();

			call_user_func( array( $this, 'render_output' ), $settings, $value );

			$element_id  = eplus()->get_element_raw_id( $this->get_param_type() );
			$scripts_dir = sprintf( '%ssparam-types/%s/js/scripts.js', EPLUS_PLUGIN_DIR, $element_id );
			$scripts_url = sprintf( '%ssparam-types/%s/js/scripts.js', EPLUS_PLUGIN_URL, $element_id );

			if ( $this->enable_js() && file_exists( $scripts_dir ) ) {
				printf( '<script src="%s"></script>', $scripts_url );
			}

			return ob_get_clean();
		}


		/**
		 * Register custom param type to vc
		 */
		function register_param_type() {

			vc_add_shortcode_param( $this->get_param_type(), array( $this, 'return_field_output' ) );
		}


		/**
		 * Check whether this element needs js to be enabled or not
		 *
		 * @return bool
		 */
		function enable_js() {
			$element_config = $this->get_config();

			if ( isset( $element_config['enable_js'] ) ) {
				return (bool) $element_config['enable_js'];
			}

			return false;
		}


		/**
		 * Generate and return arguments from string
		 *
		 * @param $string
		 * @param $option
		 *
		 * @return array|mixed|void
		 */
		function generate_args_from_string( $string, $option ) {

			if ( strpos( $string, 'PAGES' ) !== false ) {
				return $this->get_pages_array();
			}

			if ( strpos( $string, 'USERS' ) !== false ) {
				return $this->get_users_array();
			}

			if ( strpos( $string, 'TAX_' ) !== false ) {
				$taxonomies = $this->get_taxonomies_array( $string, $option );

				return is_wp_error( $taxonomies ) ? array() : $taxonomies;
			}

			if ( strpos( $string, 'POSTS_' ) !== false ) {
				$posts = $this->get_posts_array( $string, $option );

				return is_wp_error( $posts ) ? array() : $posts;
			}

			if ( strpos( $string, 'TIME_ZONES' ) !== false ) {
				return $this->get_timezones_array( $string, $option );
			}

			return array();
		}

		/**
		 * Return WP Timezones as Array
		 *
		 * @param $string
		 * @param $option
		 *
		 * @return mixed
		 */
		function get_timezones_array( $string, $option ) {

			foreach ( timezone_identifiers_list() as $time_zone ) {
				$arr_items[ $time_zone ] = str_replace( '/', ' > ', $time_zone );
			}

			return $arr_items;
		}


		/**
		 * Return Posts as Array
		 *
		 * @param $string
		 * @param $option
		 *
		 * @return array | WP_Error
		 */
		function get_posts_array( $string, $option ) {

			$arr_posts = array();

			preg_match_all( "/\%([^\]]*)\%/", $string, $matches );

			if ( isset( $matches[1][0] ) ) {
				$post_type = $matches[1][0];
			} else {
				$post_type = 'post';
			}

			if ( ! post_type_exists( $post_type ) ) {
				return new WP_Error( 'not_found', sprintf( 'Post type <strong>%s</strong> does not exists !', $post_type ) );
			}

			$wp_query = isset( $option['wp_query'] ) ? $option['wp_query'] : array();
			$ppp      = isset( $wp_query['posts_per_page'] ) ? $option['posts_per_page'] : - 1;
			$wp_query = array_merge( $wp_query, array( 'post_type' => $post_type, 'posts_per_page' => $ppp ) );
			$posts    = get_posts( $wp_query );

			foreach ( $posts as $post ) {
				$arr_posts[ $post->ID ] = $post->post_title;
			}

			return $arr_posts;
		}


		/**
		 * Get taxonomies as Array
		 *
		 * @param $string
		 * @param $option
		 *
		 * @return array|WP_Error
		 */
		function get_taxonomies_array( $string, $option ) {

			$taxonomies = array();

			preg_match_all( "/\%([^\]]*)\%/", $string, $matches );

			if ( isset( $matches[1][0] ) ) {
				$taxonomy = $matches[1][0];
			} else {
				return new WP_Error( 'invalid_declaration', 'Invalid taxonomy declaration !' );
			}

			if ( ! taxonomy_exists( $taxonomy ) ) {
				return new WP_Error( 'not_found', sprintf( 'Taxonomy <strong>%s</strong> does not exists !', $taxonomy ) );
			}

			$option['taxonomy'] = $taxonomy;
			$terms              = get_terms( $option );

			foreach ( $terms as $term ) {
				if ( $term instanceof WP_Term ) {
					$taxonomies[ $term->term_id ] = sprintf( '%s (%s)', $term->name, $term->count );
				}
			}

			return $taxonomies;
		}


		/**
		 * Get pages as Array
		 *
		 * @return mixed|void
		 */
		function get_pages_array() {

			$pages_array = array();
			foreach ( get_pages() as $page ) {
				$pages_array[ $page->ID ] = $page->post_title;
			}

			return apply_filters( 'pb_settings_filter_pages', $pages_array );
		}


		/**
		 * Get users as Array
		 *
		 * @return mixed|void
		 */
		function get_users_array() {

			$user_array = array();
			foreach ( get_users() as $user ) {
				$user_array[ $user->ID ] = $user->display_name;
			}

			return apply_filters( 'pb_settings_filter_users', $user_array );
		}


		/**
		 * Return configurations for this element
		 *
		 * @return mixed|void
		 */
		function get_config() {
			return apply_filters( 'eplus_filters_param_config', $this->config );
		}


		/**
		 * Set settings fields
		 *
		 * @param array $args
		 */
		function set_config( $args = array() ) {
			$this->config = $args;
		}


		/**
		 * Return current param type
		 *
		 * @return mixed|void
		 */
		public function get_param_type() {
			return apply_filters( 'eplus_filters_get_param_type', $this->param_type );
		}


		/**
		 * Set param type to this context
		 *
		 * @param string $type
		 */
		private function set_param_type( $type = '' ) {

			$this->param_type = $type;
		}
	}
}