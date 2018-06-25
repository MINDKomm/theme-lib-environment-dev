<?php

namespace Theme\Environment\Development;

/**
 * Class WordPress
 *
 * @package Theme\Environment\Development
 */
class WordPress {
	/**
	 * Init hooks.
	 */
	public function init() {
		if ( is_admin() ) {
			add_action( 'init', [ $this, 'disable_heartbeat' ], 1 );
		}
	}

	/**
	 * Disable Heartbeat when in development mode
	 */
	public function disable_heartbeat() {
		wp_deregister_script( 'heartbeat' );
	}

	/**
	 * Redirects all emails sent through wp_mail to a certain email address.
	 *
	 * @param string|array $email The email to redirect all emails to. Uses admin email when no
	 *                            email is provided. Can also be a comma separated list or an array
	 *                            of emails. Default empty.
	 */
	public function redirect_emails( $email = '' ) {
		// Use admin email if no email is set
		if ( empty( $email ) ) {
			$email = get_option( 'admin_email' );
		}

		add_filter( 'wp_mail', function( $args ) use ( $email ) {
			$args['to'] = $email;

			return $args;
		} );
	}
}
