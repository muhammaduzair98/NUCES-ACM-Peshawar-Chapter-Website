<?php
/**
 * Element Name: Table
 *
 * @package elements/table/view/template-1
 * @copyright Pluginbazar 2019
 */

$unique_id         = uniqid( 'gradient-p' );
$style             = eplus()->get_shortcode_atts( 'style' );
$table_post_id     = eplus()->get_shortcode_atts( 'table_id' );
$tablepress_tables = eplus()->get_option( 'tablepress_tables' );
$tablepress_tables = json_decode( $tablepress_tables, true );
$tables            = isset( $tablepress_tables['table_post'] ) ? (array) $tablepress_tables['table_post'] : array();
$table_id          = array_search( $table_post_id, $tables );
$shortcode         = sprintf( '[table id="%s"/]', $table_id );


printf( '<div id="eplus-table" class="eplus-table eplus-table-%s">%s</div>', $style, do_shortcode( $shortcode ) );