<?php
/**
 * All Functions
 *
 * @author Pluginbazar
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}  // if direct access


if ( ! function_exists( 'eplus_get_element_dependencies' ) ) {
	/**
	 * Return array of dependencies of element
	 *
	 * @param string $element_id
	 *
	 * @return mixed|void
	 */
	function eplus_get_element_dependencies( $element_id = '' ) {

		$all_elements = eplus()->get_elements();
		$this_element = isset( $all_elements[ $element_id ] ) ? $all_elements[ $element_id ] : array();
		$dependencies = isset( $this_element['dependencies'] ) ? $this_element['dependencies'] : array();

		return apply_filters( 'eplus_filters_element_dependencies', $dependencies, $element_id );
	}
}


if ( ! function_exists( 'eplus_print_notice' ) ) {
	/**
	 * Print Notice
	 *
	 * @param string $message
	 * @param string $type
	 * @param string $tag
	 * @param string $wrapper
	 * @param bool $echo
	 *
	 * @return mixed|string|void
	 */
	function eplus_print_notice( $message = '', $type = 'success', $tag = 'div', $wrapper = '', $echo = true ) {

		if ( empty( $message ) ) {
			return false;
		}

		if ( ! in_array( $tag, array( 'div', 'p', 'span' ) ) ) {
			return false;
		}

		$notice = sprintf( '<%1$s class="eplus-notice eplus-%2$s">%3$s</%1$s>', $tag, $type, $message );
		$notice = empty( $wrapper ) ? $notice : str_replace( '%', $notice, $wrapper );

		if ( $echo ) {
			print $notice;
		} else {
			return $notice;
		}
	}
}


if ( ! function_exists( 'eplus_generate_qrcode' ) ) {
	/**
	 * Generate QR Code and return
	 *
	 * @param array $args
	 *
	 * @return bool|string|WP_Error
	 */
	function eplus_generate_qrcode( $args = array() ) {

		$primary_color    = eplus()->get_shortcode_atts( 'primary_color', '#4f4f4f', $args );
		$secondary_color  = eplus()->get_shortcode_atts( 'secondary_color', '', $args );
		$background_color = eplus()->get_shortcode_atts( 'background_color', '', $args );
		$qr_logo          = eplus()->get_shortcode_atts( 'qr_logo', '', $args );
		$posted_data      = array(
			'text'            => eplus()->get_shortcode_atts( 'qr_url', esc_url( 'www.pluginbazar.com' ), $args ),
			'qrData'          => eplus()->get_shortcode_atts( 'qr_pattern', 'pattern3', $args ),
			'eye_outer'       => eplus()->get_shortcode_atts( 'qr_eye_outer', 'eyeOuter0', $args ),
			'eye_inner'       => eplus()->get_shortcode_atts( 'qr_eye_inner', 'eyeInner8', $args ),
			'colorDark'       => ! empty( $primary_color ) ? $primary_color : '',
			'color01'         => ! empty( $primary_color ) ? $primary_color : '',
			'color02'         => ! empty( $secondary_color ) ? $secondary_color : '',
			'gradient'        => ! empty( $primary_color ) && ! empty( $secondary_color ) ? true : false,
			'backgroundColor' => ! empty( $background_color ) ? $background_color : '',
			'qrFormat'        => 'svg',
		);

		if ( ! empty( $qr_logo_url = wp_get_attachment_url( $qr_logo ) ) ) {
			$posted_data['logo'] = $qr_logo_url;
		}

		$curl = curl_init();
		curl_setopt_array( $curl, array(
			CURLOPT_URL            => esc_url_raw( "https://api.qrcode-zebra.com/qrcodes/qr2", array( 'https' ) ),
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST  => "POST",
			CURLOPT_POSTFIELDS     => json_encode( $posted_data ),
			CURLOPT_HTTPHEADER     => array(
				"accept: application/json",
				"content-type: application/json",
			),
		) );

		$response = curl_exec( $curl );
		$err      = curl_error( $curl );

		curl_close( $curl );

		if ( $err ) {
			return new WP_Error( 'curl_error', $err );
		} else if ( empty( $response ) || $response == '{}' ) {
			return new WP_Error( 'curl_error', esc_html__( 'Something went wrong !', 'element-plus' ) );
		}

		return $response;
	}
}


if ( ! function_exists( 'eplus_get_template_part' ) ) {
	/**
	 * Get Template Part
	 *
	 * @param $slug
	 * @param string $name
	 * @param array $args
	 */
	function eplus_get_template_part( $slug, $name = '', $args = array() ) {

		$template   = '';
		$plugin_dir = EPLUS_PLUGIN_DIR;

		/**
		 * Locate template
		 */
		if ( $name ) {
			$template = locate_template( array(
				"{$slug}-{$name}.php",
				"eplus/{$slug}-{$name}.php"
			) );
		}

		/**
		 * Search for Template in Plugin
		 *
		 * @in Plugin
		 */
		if ( ! $template && $name && file_exists( untrailingslashit( $plugin_dir ) . "/templates/{$slug}-{$name}.php" ) ) {
			$template = untrailingslashit( $plugin_dir ) . "/templates/{$slug}-{$name}.php";
		}

		/**
		 * Search for Template in Theme
		 *
		 * @in Theme
		 */
		if ( ! $template ) {
			$template = locate_template( array( "{$slug}.php", "eplus/{$slug}.php" ) );
		}


		/**
		 * Allow 3rd party plugins to filter template file from their plugin.
		 *
		 * @filter eplus_filters_get_template_part
		 */
		$template = apply_filters( 'eplus_filters_get_template_part', $template, $slug, $name );


		if ( $template ) {
			load_template( $template, false );
		}

	}
}


if ( ! function_exists( 'eplus_get_template' ) ) {
	/**
	 * Get Template
	 *
	 * @param $template_name
	 * @param array $args
	 * @param string $template_path
	 * @param string $default_path
	 *
	 * @return WP_Error
	 */
	function eplus_get_template( $template_name, $args = array(), $template_path = '', $default_path = '' ) {

		$located = eplus_locate_template( $template_name, $template_path, $default_path );

		if ( ! file_exists( $located ) ) {
			return new WP_Error( 'invalid_data', __( '%s does not exist.', 'element-plus' ), '<code>' . $located . '</code>' );
		}

		$located = apply_filters( 'eplus_filters_get_template', $located, $template_name, $args, $template_path, $default_path );

		do_action( 'eplus_before_template_part', $template_name, $template_path, $located, $args );

		include $located;

		do_action( 'eplus_after_template_part', $template_name, $template_path, $located, $args );
	}
}


if ( ! function_exists( 'eplus_locate_template' ) ) {
	/**
	 *  Locate template
	 *
	 * @param $template_name
	 * @param string $template_path
	 * @param string $default_path
	 *
	 * @return mixed|void
	 */
	function eplus_locate_template( $template_name, $template_path = '', $default_path = '' ) {

		global $element_id;

		$plugin_dir     = EPLUS_PLUGIN_DIR;
		$element_raw_id = eplus()->get_element_raw_id( $element_id );

		/**
		 * Template path in Theme
		 */
		if ( ! $template_path ) {
			$template_path = 'eplus/';
		}


		/**
		 * Template default path from Plugin
		 */
		if ( ! $default_path ) {
			// Check for child element template
			if ( strpos( $element_raw_id, '-child' ) !== false ) {
				$this_element_id = str_replace( '-child', '', $element_raw_id );
				$default_path    = untrailingslashit( $plugin_dir ) . '/elements/' . $this_element_id . '/';
			} else {
				$default_path = untrailingslashit( $plugin_dir ) . '/elements/' . $element_raw_id . '/';
			}
		}

		/**
		 * Look within passed path within the theme - this is priority.
		 */
		$template = locate_template(
			array(
				trailingslashit( $template_path ) . $template_name,
				$template_name,
			)
		);

		/**
		 * Get default template
		 */
		if ( ! $template ) {
			$template = $default_path . $template_name;
		}

		/**
		 * Return what we found with allowing 3rd party to override
		 *
		 * @filter eplus_filters_locate_template
		 */
		return apply_filters( 'eplus_filters_locate_template', $template, $template_name, $template_path );
	}
}


if ( ! function_exists( 'eplus' ) ) {
	function eplus() {

		global $eplus;

		if ( ! $eplus instanceof EPLUS_Functions ) {
			$eplus = new EPLUS_Functions();
		}

		return $eplus;
	}
}