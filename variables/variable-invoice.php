<?php

namespace AutomateWoo;

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * @class Variable_Invoice
 */
class Variable_Invoice extends Variable {

	protected $name = 'order.invoice';

	
	function load_admin_details() {
		$this->description = __( '...', 'automatewoo');
		parent::load_admin_details();
	}


	/**
	 * @param $order WC_Order
	 * @param $parameters array
	 * @return string|false
	 */
	function get_value( $order, $parameters ) {
		if( ! empty( $order ) ) {
			$debug_settings = get_option( 'wpo_wcpdf_settings_debug', array() );
			$text           = null;
			
			if( is_user_logged_in() ) {
				$pdf_url = wp_nonce_url( admin_url( 'admin-ajax.php?action=generate_wpo_wcpdf&template_type=invoice&order_ids=' . $order->get_id() . '&my-account'), 'generate_wpo_wcpdf' );
				$text    = '<p><a href="'.esc_attr($pdf_url).'" target="_blank">'.__( 'Download Invoice (PDF)', 'automatewoo' ).'</a></p>';
			} elseif( ! is_user_logged_in() && isset($debug_settings['guest_access']) ) {
				$pdf_url = admin_url( 'admin-ajax.php?action=generate_wpo_wcpdf&template_type=invoice&order_ids=' . $order->get_id() . '&order_key=' . $order->get_order_key() );
				$text    = '<p><a href="'.esc_attr($pdf_url).'" target="_blank">'.__( 'Download Invoice (PDF)', 'automatewoo' ).'</a></p>';
			}

			return $text;
		}
	}
}

return new Variable_Invoice();