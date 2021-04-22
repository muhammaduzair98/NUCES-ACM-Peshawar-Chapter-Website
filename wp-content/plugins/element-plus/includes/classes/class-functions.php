<?php
/**
 * Class Functions
 *
 * @author Pluginbazar
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}  // if direct access

if ( ! class_exists( 'EPLUS_Functions' ) ) {
	/**
	 * Class EPLUS_Functions
	 */
	class EPLUS_Functions {


		/**
		 * Do display output of child element here
		 *
		 * @param string $content
		 */
		function do_child_element( $content = '' ) {

			if ( empty( $content ) ) {
				$content = eplus()->get_shortcode_atts( 'content' );
			}

			if ( function_exists( 'wpb_js_remove_wpautop' ) ) {
				$content = wpb_js_remove_wpautop( $content );
			}

			printf( '%s', do_shortcode( $content ) );
		}


		/**
		 * Return params of icon library set
		 *
		 * @param $args
		 *
		 * @return mixed|void
		 */
		function get_icon_library_params( $args = array() ) {

			$params = array(
				array(
					'param_name'  => 'icon_type',
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Icon library', 'element-plus' ),
					'value'       => array(
						esc_html__( 'Font Awesome', 'element-plus' ) => 'fontawesome',
						esc_html__( 'Open Iconic', 'element-plus' )  => 'openiconic',
						esc_html__( 'Typicons', 'element-plus' )     => 'typicons',
						esc_html__( 'Entypo', 'element-plus' )       => 'entypo',
						esc_html__( 'Linecons', 'element-plus' )     => 'linecons',
						esc_html__( 'Mono Social', 'element-plus' )  => 'monosocial',
					),
					'description' => esc_html__( 'Select icon library.', 'element-plus' ),
				),
				array(
					'type'        => 'iconpicker',
					'heading'     => esc_html__( 'Icon', 'element-plus' ),
					'param_name'  => 'icon_fontawesome',
					'settings'    => array(
						'emptyIcon'    => $this->get_shortcode_atts( 'emptyIcon', false, $args ),
						'iconsPerPage' => 4000,
					),
					'dependency'  => array(
						'element' => 'icon_type',
						'value'   => 'fontawesome',
					),
					'description' => esc_html__( 'Select icon for this element', 'element-plus' ),
				),
				array(
					'type'        => 'iconpicker',
					'heading'     => esc_html__( 'Icon', 'element-plus' ),
					'param_name'  => 'icon_openiconic',
					'settings'    => array(
						'emptyIcon'    => $this->get_shortcode_atts( 'emptyIcon', false, $args ),
						// default true, display an "EMPTY" icon?
						'type'         => 'openiconic',
						'iconsPerPage' => 4000,
						// default 100, how many icons per/page to display
					),
					'dependency'  => array(
						'element' => 'icon_type',
						'value'   => 'openiconic',
					),
					'description' => esc_html__( 'Select icon for this element.', 'element-plus' ),
				),
				array(
					'type'        => 'iconpicker',
					'heading'     => esc_html__( 'Icon', 'element-plus' ),
					'param_name'  => 'icon_typicons',
					'settings'    => array(
						'emptyIcon'    => $this->get_shortcode_atts( 'emptyIcon', false, $args ),
						// default true, display an "EMPTY" icon?
						'type'         => 'typicons',
						'iconsPerPage' => 4000,
						// default 100, how many icons per/page to display
					),
					'dependency'  => array(
						'element' => 'icon_type',
						'value'   => 'typicons',
					),
					'description' => esc_html__( 'Select icon for this element.', 'element-plus' ),
				),
				array(
					'type'       => 'iconpicker',
					'heading'    => esc_html__( 'Icon', 'element-plus' ),
					'param_name' => 'icon_entypo',
					'settings'   => array(
						'emptyIcon'    => $this->get_shortcode_atts( 'emptyIcon', false, $args ),
						// default true, display an "EMPTY" icon?
						'type'         => 'entypo',
						'iconsPerPage' => 4000,
						// default 100, how many icons per/page to display
					),
					'dependency' => array(
						'element' => 'icon_type',
						'value'   => 'entypo',
					),
				),
				array(
					'type'        => 'iconpicker',
					'heading'     => esc_html__( 'Icon', 'element-plus' ),
					'param_name'  => 'icon_linecons',
					'settings'    => array(
						'emptyIcon'    => $this->get_shortcode_atts( 'emptyIcon', false, $args ),
						// default true, display an "EMPTY" icon?
						'type'         => 'linecons',
						'iconsPerPage' => 4000,
						// default 100, how many icons per/page to display
					),
					'dependency'  => array(
						'element' => 'icon_type',
						'value'   => 'linecons',
					),
					'description' => esc_html__( 'Select icon for this element.', 'element-plus' ),
				),
				array(
					'type'        => 'iconpicker',
					'heading'     => esc_html__( 'Icon', 'element-plus' ),
					'param_name'  => 'icon_monosocial',
					'settings'    => array(
						'emptyIcon'    => $this->get_shortcode_atts( 'emptyIcon', false, $args ),
						// default true, display an "EMPTY" icon?
						'type'         => 'monosocial',
						'iconsPerPage' => 4000,
						// default 100, how many icons per/page to display
					),
					'dependency'  => array(
						'element' => 'icon_type',
						'value'   => 'monosocial',
					),
					'description' => esc_html__( 'Select icon for this element.', 'element-plus' ),
				),
			);

			return apply_filters( 'eplus_filters_icon_library_params', $params );
		}


		/**
		 * Return post params
		 *
		 * @return mixed|void
		 */
		function get_posts_params() {

			$params = array(
				array(
					'type'          => 'dropdown',
					'heading'       => esc_html__( 'Content Type', 'element-plus' ),
					'param_name'    => 'content_type',
					'multiple'      => true,
					'value'         => array(
						esc_html__( 'By Posts', 'element-plus' )        => 'by_posts',
						esc_html__( 'By Latest Posts', 'element-plus' ) => 'by_latest_posts',
						esc_html__( 'By Category', 'element-plus' )     => 'by_category',
						esc_html__( 'By Tags', 'element-plus' )         => 'by_tags',
						esc_html__( 'Custom', 'element-plus' )          => 'by_custom',
					),
					'hide_empty'    => false,
					'field_options' => array(
						'placeholder' => esc_html__( 'Please select posts that will appear', 'element-plus' ),
					),
				),
				array(
					'type'          => 'select2',
					'heading'       => esc_html__( 'Select Posts', 'element-plus' ),
					'param_name'    => 'post_ids',
					'multiple'      => true,
					'value'         => 'POSTS_%post%',
					'field_options' => array(
						'placeholder' => esc_html__( 'Please select posts that will appear', 'element-plus' ),
					),
					'dependency'    => array(
						'element' => 'content_type',
						'value'   => 'by_posts',
					),
				),
				array(
					'type'          => 'select2',
					'heading'       => esc_html__( 'Select Categories', 'element-plus' ),
					'param_name'    => 'category_ids',
					'multiple'      => true,
					'value'         => 'TAX_%category%',
					'hide_empty'    => false,
					'field_options' => array(
						'placeholder' => esc_html__( 'Select categories of posts', 'element-plus' ),
					),
					'dependency'    => array(
						'element' => 'content_type',
						'value'   => 'by_category',
					),
				),
				array(
					'type'          => 'select2',
					'heading'       => esc_html__( 'Select Tags', 'element-plus' ),
					'param_name'    => 'tag_ids',
					'multiple'      => true,
					'value'         => 'TAX_%post_tag%',
					'hide_empty'    => false,
					'field_options' => array(
						'placeholder' => esc_html__( 'Select tags of posts', 'element-plus' ),
					),
					'dependency'    => array(
						'element' => 'content_type',
						'value'   => 'by_tags',
					),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Post IDs', 'element-plus' ),
					'description' => esc_html__( 'Add any post ids of any post types. If multiple use comma to separate them. Example: 1023,201,239', 'element-plus' ),
					'param_name'  => 'custom_post_ids',
					'dependency'  => array(
						'element' => 'content_type',
						'value'   => 'by_custom',
					),
				),
			);

			return apply_filters( 'eplus_filters_posts_params', $params );
		}


		/**
		 * Return products params
		 *
		 * @return mixed|void
		 */
		function get_products_params() {

			$params = array(
				array(
					'type'          => 'dropdown',
					'heading'       => esc_html__( 'Content Type', 'element-plus' ),
					'param_name'    => 'content_type',
					'multiple'      => true,
					'value'         => array(
						esc_html__( 'By Products', 'element-plus' )          => 'by_products',
						esc_html__( 'By Latest Products', 'element-plus' )   => 'by_latest_products',
						esc_html__( 'By Products Category', 'element-plus' ) => 'by_products_category',
						esc_html__( 'By Products Tags', 'element-plus' )     => 'by_products_tags',
						esc_html__( 'Custom', 'element-plus' )               => 'by_custom',
					),
					'hide_empty'    => false,
					'field_options' => array(
						'placeholder' => esc_html__( 'Please select products that will appear', 'element-plus' ),
					),
				),
				array(
					'type'          => 'select2',
					'heading'       => esc_html__( 'Select Products', 'element-plus' ),
					'param_name'    => 'product_ids',
					'multiple'      => true,
					'value'         => 'POSTS_%product%',
					'field_options' => array(
						'placeholder' => esc_html__( 'Please select products that will appear', 'element-plus' ),
					),
					'dependency'    => array(
						'element' => 'content_type',
						'value'   => 'by_products',
					),
				),
				array(
					'type'          => 'select2',
					'heading'       => esc_html__( 'Select Categories', 'element-plus' ),
					'param_name'    => 'category_ids',
					'multiple'      => true,
					'value'         => 'TAX_%product_cat%',
					'hide_empty'    => false,
					'field_options' => array(
						'placeholder' => esc_html__( 'Select categories of products', 'element-plus' ),
					),
					'dependency'    => array(
						'element' => 'content_type',
						'value'   => 'by_products_category',
					),
				),
				array(
					'type'          => 'select2',
					'heading'       => esc_html__( 'Select Tags', 'element-plus' ),
					'param_name'    => 'tag_ids',
					'multiple'      => true,
					'value'         => 'TAX_%product_tag%',
					'hide_empty'    => false,
					'field_options' => array(
						'placeholder' => esc_html__( 'Select tags of products', 'element-plus' ),
					),
					'dependency'    => array(
						'element' => 'content_type',
						'value'   => 'by_products_tags',
					),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Product IDs', 'element-plus' ),
					'description' => esc_html__( 'Add any product ids of any product types. If multiple use comma to separate them. Example: 1023,201,239', 'element-plus' ),
					'param_name'  => 'custom_product_ids',
					'dependency'  => array(
						'element' => 'content_type',
						'value'   => 'by_custom',
					),
				),
			);

			return apply_filters( 'eplus_filters_products_params', $params );
		}


		/**
		 * Return edd products params
		 *
		 * @return mixed|void
		 */
		function get_edd_products_params() {

			$params = array(
				array(
					'type'          => 'dropdown',
					'heading'       => esc_html__( 'Content Type', 'element-plus' ),
					'param_name'    => 'content_type',
					'multiple'      => true,
					'value'         => array(
						esc_html__( 'By Products', 'element-plus' )          => 'by_products',
						esc_html__( 'By Latest Products', 'element-plus' )   => 'by_latest_products',
						esc_html__( 'By Products Category', 'element-plus' ) => 'by_products_category',
						esc_html__( 'By Products Tags', 'element-plus' )     => 'by_products_tags',
						esc_html__( 'Custom', 'element-plus' )               => 'by_custom',
					),
					'hide_empty'    => false,
					'field_options' => array(
						'placeholder' => esc_html__( 'Please select products that will appear', 'element-plus' ),
					),
				),
				array(
					'type'          => 'select2',
					'heading'       => esc_html__( 'Select Products', 'element-plus' ),
					'param_name'    => 'product_ids',
					'multiple'      => true,
					'value'         => 'POSTS_%download%',
					'field_options' => array(
						'placeholder' => esc_html__( 'Please select products that will appear', 'element-plus' ),
					),
					'dependency'    => array(
						'element' => 'content_type',
						'value'   => 'by_products',
					),
				),
				array(
					'type'          => 'select2',
					'heading'       => esc_html__( 'Select Categories', 'element-plus' ),
					'param_name'    => 'category_ids',
					'multiple'      => true,
					'value'         => 'TAX_%download_category%',
					'hide_empty'    => false,
					'field_options' => array(
						'placeholder' => esc_html__( 'Select categories of products', 'element-plus' ),
					),
					'dependency'    => array(
						'element' => 'content_type',
						'value'   => 'by_products_category',
					),
				),
				array(
					'type'          => 'select2',
					'heading'       => esc_html__( 'Select Tags', 'element-plus' ),
					'param_name'    => 'tag_ids',
					'multiple'      => true,
					'value'         => 'TAX_%download_tag%',
					'hide_empty'    => false,
					'field_options' => array(
						'placeholder' => esc_html__( 'Select tags of products', 'element-plus' ),
					),
					'dependency'    => array(
						'element' => 'content_type',
						'value'   => 'by_products_tags',
					),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Product IDs', 'element-plus' ),
					'description' => esc_html__( 'Add any product ids of any product types. If multiple use comma to separate them. Example: 1023,201,239', 'element-plus' ),
					'param_name'  => 'custom_product_ids',
					'dependency'  => array(
						'element' => 'content_type',
						'value'   => 'by_custom',
					),
				),
			);

			return apply_filters( 'eplus_filters_edd_products_params', $params );
		}


		/**
		 * Return owl carousel options params
		 *
		 * @param string $group
		 *
		 * @return mixed|void
		 */
		function get_carousel_options_params( $group = '' ) {

			$params = array(
				array(
					'type'       => 'checkbox',
					"param_name" => "arrows",
					'heading'    => esc_html__( 'Prev/Next Arrows?', 'element-plus' ),
					"value"      => array( esc_html__( "Yes", "element-plus" ) => 'true' ),
					'group'      => $group,
				),
				array(
					'type'       => 'checkbox',
					"param_name" => "dots",
					'heading'    => esc_html__( 'Show dot indicators for navigation?', 'element-plus' ),
					"value"      => array( esc_html__( "Yes", "element-plus" ) => 'true' ),
					'group'      => $group,
				),
				array(
					'type'        => 'checkbox',
					'param_name'  => 'autoplay',
					'heading'     => esc_html__( 'Autoplay?', 'element-plus' ),
					'description' => esc_html__( 'Should the carousel autoplay as in a slideshow.', 'element-plus' ),
					"value"       => array( esc_html__( "Yes", "element-plus" ) => 'true' ),
					'group'       => $group,
				),
				array(
					'type'       => 'number_field',
					"param_name" => "autoplay_speed",
					'heading'    => esc_html__( 'Autoplay speed', 'element-plus' ),
					'value'      => 3000,
					'group'      => $group,
				),
				array(
					'type'       => 'number_field',
					"param_name" => "animation_speed",
					'heading'    => esc_html__( 'Slide Animation Speed', 'element-plus' ),
					'value'      => 600,
					'group'      => $group,
				),
				array(
					'type'        => 'checkbox',
					"param_name"  => "pause_on_hover",
					'heading'     => esc_html__( 'Pause on Hover', 'element-plus' ),
					'description' => esc_html__( 'Should the slider pause on mouse hover over the slider.', 'element-plus' ),
					"value"       => array( __( "Yes", "element-plus" ) => 'true' ),
					'group'       => $group,
				),
				array(
					'type'       => 'number_field',
					'param_name' => 'gutter',
					'heading'    => esc_html__( 'Gutter', 'element-plus' ),
					'value'      => 20,
					'group'      => $group,
				),
				array(
					'type'       => 'range_slider',
					'param_name' => 'display_columns',
					'heading'    => esc_html__( 'Desktop View', 'element-plus' ),
					'min'        => 1,
					'max'        => 6,
					'step'       => 1,
					'value'      => 4,
					'group'      => esc_html__( 'Responsive', 'element-plus' ),
				),
				array(
					'type'       => 'range_slider',
					'param_name' => 'tablet_display_columns',
					'heading'    => esc_html__( 'Tablet View', 'element-plus' ),
					'min'        => 1,
					'max'        => 3,
					'step'       => 1,
					'value'      => 2,
					'group'      => esc_html__( 'Responsive', 'element-plus' ),
				),
				array(
					'type'       => 'range_slider',
					'param_name' => 'mobile_display_columns',
					'heading'    => esc_html__( 'Mobile View', 'element-plus' ),
					'min'        => 1,
					'max'        => 2,
					'step'       => 1,
					'value'      => 1,
					'group'      => esc_html__( 'Responsive', 'element-plus' ),
				),
			);

			return apply_filters( 'eplus_filters_carousel_options_params', $params );
		}


		/**
		 * Return Shortcode Arguments
		 *
		 * @param string $key
		 * @param string $default
		 * @param array $args
		 *
		 * @return mixed|string
		 */
		function get_shortcode_atts( $key = '', $default = '', $args = array() ) {

			global $shrtocode_args;

			$args    = empty( $args ) ? $shrtocode_args : $args;
			$default = empty( $default ) ? '' : $default;
			$key     = empty( $key ) ? '' : $key;

			if ( isset( $args[ $key ] ) && ! empty( $args[ $key ] ) ) {
				return $args[ $key ];
			}

			return $default;
		}


		/**
		 * Return raw id without prefix of given element
		 *
		 * @param $element_id
		 *
		 * @return mixed|void
		 */
		function get_element_raw_id( $element_id ) {

			$element_id = str_replace( 'eplus_', '', $element_id );
			$element_id = str_replace( '_', '-', $element_id );

			return apply_filters( 'eplus_filters_element_raw_id', $element_id );
		}


		/**
		 * Return Param types
		 *
		 * @return mixed|void
		 */
		function get_param_types() {

			$param_types = array(
				'image_select' => array(
					'class_name' => 'EPLUS_Param_type_image_select',
				),
				'select2'      => array(
					'class_name' => 'EPLUS_Param_type_select2',
				),
				'timepicker'   => array(
					'class_name' => 'EPLUS_Param_type_timepicker',
				),
				'range_slider' => array(
					'class_name' => 'EPLUS_Param_type_range_slider',
				),
				'number_field' => array(
					'class_name' => 'EPLUS_Param_type_number_field',
				),

			);

			return apply_filters( 'eplus_filters_param_types', $param_types );
		}


		/**
		 * Return all elements information as array
		 *
		 * @return mixed|void
		 */
		function get_elements() {

			$elements = array(
				'eplus_accordion'           => array(
					'label'      => esc_html__( 'Accordion', 'element-plus' ),
					'class_name' => 'EPLUS_Element_accordion',
				),
				'eplus_heading'             => array(
					'label'      => esc_html__( 'Advanced Heading', 'element-plus' ),
					'class_name' => 'EPLUS_Element_heading',
				),
				'eplus_banner'              => array(
					'label'      => esc_html__( 'Banner', 'element-plus' ),
					'class_name' => 'EPLUS_Element_banner',
				),
				'eplus_schedules'           => array(
					'label'      => esc_html__( 'Business Schedules', 'element-plus' ),
					'class_name' => 'EPLUS_Element_schedules',
				),
				'eplus_button'              => array(
					'label'      => esc_html__( 'Button', 'element-plus' ),
					'class_name' => 'EPLUS_Element_button',
				),
				'eplus_charts'              => array(
					'label'      => esc_html__( 'Charts', 'element-plus' ),
					'class_name' => 'EPLUS_Element_charts',
				),
				'eplus_countdown'           => array(
					'label'      => esc_html__( 'Countdown Timer', 'element-plus' ),
					'class_name' => 'EPLUS_Element_countdown',
				),
				'eplus_counter'             => array(
					'label'      => esc_html__( 'Counter', 'element-plus' ),
					'class_name' => 'EPLUS_Element_counter',
				),
				'eplus_edd_products'        => array(
					'label'      => esc_html__( 'EDD Products', 'element-plus' ),
					'class_name' => 'EPLUS_Element_EDD_Products',
					'dependencies' => array(
						array(
							'class'   => 'Easy_Digital_Downloads',
							'message' => sprintf( '<a href="%s" target="_blank"><strong>%s</strong></a> %s',
								esc_url( '//wordpress.org/plugins/easy-digital-downloads/' ),
								esc_html( 'Easy Digital Downloads' ),
								esc_html__( 'plugin is required to make this element working.', 'element-plus' )
							),
						),
					),
				),
				'eplus_gradient-heading'    => array(
					'label'      => esc_html__( 'Gradient Heading', 'element-plus' ),
					'class_name' => 'EPLUS_Element_gradient_heading',
				),
				'eplus_image-compare'       => array(
					'label'      => esc_html__( 'Image Compare', 'element-plus' ),
					'class_name' => 'EPLUS_Element_image_compare',
				),
				'eplus_info-box'            => array(
					'label'      => esc_html__( 'Info Box', 'element-plus' ),
					'class_name' => 'EPLUS_Element_info_box',
				),
				'eplus_logo_carousel'       => array(
					'label'      => esc_html__( 'Logo Carousel', 'element-plus' ),
					'class_name' => 'EPLUS_Element_logo_carousel',
					'has_child'  => true,
					'child_name' => esc_html__( 'Logo item', 'element-plus' ),
				),
				'eplus_marquee'             => array(
					'label'      => esc_html__( 'Marquee', 'element-plus' ),
					'class_name' => 'EPLUS_Element_marquee',
				),
				'eplus_modal'               => array(
					'label'      => esc_html__( 'Modal Box', 'element-plus' ),
					'class_name' => 'EPLUS_Element_modal',
				),
				'eplus_newsticker'          => array(
					'label'      => esc_html__( 'Newsticker', 'element-plus' ),
					'class_name' => 'EPLUS_Element_newsticker',
				),
				'eplus_portfolio'           => array(
					'label'      => esc_html__( 'Portfolio', 'element-plus' ),
					'class_name' => 'EPLUS_Element_portfolio',
				),
				'eplus_post-grid'           => array(
					'label'      => esc_html__( 'Post Grid', 'element-plus' ),
					'class_name' => 'EPLUS_Element_post_grid',
				),
				'eplus_pricing'             => array(
					'label'      => esc_html__( 'Pricing Plan', 'element-plus' ),
					'class_name' => 'EPLUS_Element_pricing',
				),
				'eplus_progressbar'         => array(
					'label'      => esc_html__( 'Progressbar', 'element-plus' ),
					'class_name' => 'EPLUS_Element_progressbar',
				),
				'eplus_progresspie'         => array(
					'label'      => esc_html__( 'Progress Pie', 'element-plus' ),
					'class_name' => 'EPLUS_Element_progresspie',
				),
				'eplus_promotion'           => array(
					'label'      => esc_html__( 'Promotion Banner', 'element-plus' ),
					'class_name' => 'EPLUS_Element_promotion',
				),
				'eplus_products_grid'       => array(
					'label'        => esc_html__( 'Products Grid', 'element-plus' ),
					'class_name'   => 'EPLUS_Element_products_grid',
					'dependencies' => array(
						array(
							'class'   => 'WooCommerce',
							'message' => sprintf( '<a href="%s" target="_blank"><strong>%s</strong></a> %s',
								esc_url( '//wordpress.org/plugins/woocommerce/' ),
								esc_html( 'WooCommerce' ),
								esc_html__( 'plugin is required to make this element working.', 'element-plus' )
							),
						),
					),
				),
				'eplus_products_carousel'   => array(
					'label'        => esc_html__( 'Products Carousel', 'element-plus' ),
					'class_name'   => 'EPLUS_Element_products_carousel',
					'dependencies' => array(
						array(
							'class'   => 'WooCommerce',
							'message' => sprintf( '<a href="%s" target="_blank"><strong>%s</strong></a> %s',
								esc_url( '//wordpress.org/plugins/woocommerce/' ),
								esc_html( 'WooCommerce' ),
								esc_html__( 'plugin is required to make this element working.', 'element-plus' )
							),
						),
					),
				),
				'eplus_qr-code'             => array(
					'label'      => esc_html__( 'QR Code', 'element-plus' ),
					'class_name' => 'EPLUS_Element_qrcode',
				),
				'eplus_social-profile'      => array(
					'label'      => esc_html__( 'Social Profile', 'element-plus' ),
					'class_name' => 'EPLUS_Element_social_profile',
				),
				'eplus_table'               => array(
					'label'        => esc_html__( 'Table', 'element-plus' ),
					'class_name'   => 'EPLUS_Element_table',
					'dependencies' => array(
						array(
							'class'   => 'TablePress',
							'message' => sprintf( '<a href="%s" target="_blank"><strong>%s</strong></a> %s',
								esc_url( '//wordpress.org/plugins/tablepress/' ),
								esc_html( 'TablePress' ),
								esc_html__( 'plugin is required to make this element working.', 'element-plus' )
							),
						),
					),
				),
				'eplus_tabs'                => array(
					'label'      => esc_html__( 'Tabs', 'element-plus' ),
					'class_name' => 'EPLUS_Element_tabs',
				),
				'eplus_team'                => array(
					'label'      => esc_html__( 'Teams', 'element-plus' ),
					'class_name' => 'EPLUS_Element_team',
				),
				'eplus_testimonial'         => array(
					'label'      => esc_html__( 'Testimonial', 'element-plus' ),
					'class_name' => 'EPLUS_Element_testimonial',
				),
				'eplus_timeline'            => array(
					'label'      => esc_html__( 'Timeline', 'element-plus' ),
					'class_name' => 'EPLUS_Element_timeline',
				),
				'eplus_timeline_horizontal' => array(
					'label'      => esc_html__( 'Timeline - Horizontal', 'element-plus' ),
					'class_name' => 'EPLUS_Element_timeline_horizontal',
				),
				'eplus_thumb_gallery'       => array(
					'label'      => esc_html__( 'Thumb Gallery', 'element-plus' ),
					'class_name' => 'EPLUS_Element_thumb_gallery',
					'has_child'  => true,
					'child_name' => esc_html__( 'Thumb Gallery Item', 'element-plus' ),
				),
			);

			return apply_filters( 'eplus_filters_elements', $elements );
		}


		/**
		 * Return Post Meta Value
		 *
		 * @param bool $meta_key
		 * @param bool $post_id
		 * @param string $default
		 *
		 * @return mixed|string|void
		 */
		function get_meta( $meta_key = false, $post_id = false, $default = '' ) {

			if ( ! $meta_key ) {
				return '';
			}

			$post_id    = ! $post_id ? get_the_ID() : $post_id;
			$meta_value = get_post_meta( $post_id, $meta_key, true );
			$meta_value = empty( $meta_value ) ? $default : $meta_value;

			return apply_filters( 'eplus_filters_get_meta', $meta_value, $meta_key, $post_id, $default );
		}


		/**
		 * Return option value
		 *
		 * @param string $option_key
		 * @param string $default_val
		 *
		 * @return mixed|string|void
		 */
		function get_option( $option_key = '', $default_val = '' ) {

			if ( empty( $option_key ) ) {
				return '';
			}

			$option_val = get_option( $option_key, $default_val );
			$option_val = empty( $option_val ) ? $default_val : $option_val;

			return apply_filters( 'eplus_filters_option_' . $option_key, $option_val );
		}
	}
}

global $eplus;

$eplus = new EPLUS_Functions();