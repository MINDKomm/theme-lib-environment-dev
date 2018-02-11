<?php

namespace Theme\Environment\Development;

/**
 * Class WooCommerce
 *
 * @package Theme\Environment\Development
 */
class WooCommerce {
	/**
	 * List of WooCommerce email IDs
	 *
	 * @var array
	 */
	public $email_ids = [
		// Default WooCommerce Emails
		'cancelled_order',
		'customer_completed_order',
		'customer_invoice',
		'customer_new_account',
		'customer_note',
		'customer_on_hold_order',
		'customer_processing_order',
		'customer_refunded_order',
		'customer_reset_password',
		'failed_order',
		'new_order',

		// Other emails
		'low_stock',
		'no_stock',
		'backorder',

		// Subscription emails
		'cancelled_subscription',
		'customer_completed_renewal_order',
		'customer_completed_switch_order',
		'customer_payment_retry',
		'customer_processing_renewal_order',
		'customer_renewal_invoice',
		'expired_subscription',
		'new_renewal_order',
		'new_switch_order',
		'suspended_subscription',
		'payment_retry',
	];

	/**
	 * Filters the recipient email for WooCommerce emails.
	 *
	 * @param string $email The email all WooCommerce emails should be sent to.
	 */
	public function set_email_recipient( $email = '' ) {
		if ( empty( $email ) ) {
			$email = get_option( 'admin_email' );
		}

		foreach ( $this->email_ids as $email_id ) {
			add_filter( "woocommerce_email_recipient_{$email_id}", function( $recipient, $object ) use ( $email ) {
				return $email;
			}, 10, 2 );
		}
	}
}
