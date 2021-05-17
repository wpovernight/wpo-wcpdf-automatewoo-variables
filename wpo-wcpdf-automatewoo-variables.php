<?php
/**
 * Plugin Name: WCPDF variables extension for AutomateWoo
 * Plugin URI: http://www.wpovernight.com
 * Description: Adds custom variables from WooCommerce PDF Invoices & Packing Slips to AutomateWoo
 * Version: 1.0.0
 * Author: Alexandre Faustino
 * Author URI: http://www.wpovernight.com
 * License: GPLv2 or later
 * License URI: http://www.opensource.org/licenses/gpl-license.php
 */

add_filter( 'automatewoo/variables', 'variables' );

/**
 * @param $variables array
 * @return array
 */
function variables( $variables ) {
	$variables['order']['invoice'] = dirname(__FILE__) . '/variables/variable-invoice.php';
	return $variables;
}