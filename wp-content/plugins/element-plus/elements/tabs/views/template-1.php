<?php
/**
 * Element Name: Tabs
 *
 * @package elements/tabs/view/template-1
 * @copyright Pluginbazar 2019
 */

$unique_id = uniqid();
$style     = eplus()->get_shortcode_atts( 'style' );
$tabs      = (array) vc_param_group_parse_atts( eplus()->get_shortcode_atts( 'tabs' ) );

?>

<div id="eplus-tabs<?php echo esc_attr( $unique_id ); ?>"
     class="eplus-tabs eplus-tabs-<?php echo esc_attr( $style ); ?>">
    <div class="eplus-tab-panel">
        <div class="tab-nav">
			<?php foreach ( $tabs as $tab_id => $tab ) :
			    $active = $tab_id == 0 ? 'active' : '';
				$tab_id = sprintf( '%s%s', $unique_id, $tab_id );
				$label = isset( $tab['label'] ) ? $tab['label'] : '';
				$icon_type       = isset( $tab['icon_type'] ) ? $tab['icon_type'] : 'fontawesome';
				vc_icon_element_fonts_enqueue( $icon_type );

				?>
                <div class="tab-nav-item <?php echo esc_attr( $active ); ?>" data-target="tab-<?php echo esc_attr( $tab_id ); ?>">

                    <?php if( !empty( $icon_class = $tab['icon_' . $icon_type] ) ) : ?>
                    <span class="tab-icon"><i class="<?php echo esc_attr( $icon_class ); ?>"></i></span>
                    <?php endif; ?>

                    <span class="tab-label"><?php echo esc_html( $label ); ?></span>
                </div>
			<?php endforeach; ?>
        </div>

        <div class="tab-content">

			<?php foreach ( $tabs as $tab_id => $tab ) :
				$active = $tab_id == 0 ? 'active' : '';

				$tab_id = sprintf( '%s%s', $unique_id, $tab_id );
				$content = isset( $tab['content'] ) ? $tab['content'] : '';
				?>

                <div class="tab-item-content <?php echo esc_attr( $active ); ?> tab-<?php echo esc_attr( $tab_id ); ?>">
                    <?php echo wp_kses_post( wpautop( $content ) ); ?>
                </div>
			<?php endforeach; ?>

        </div>
    </div>
</div>