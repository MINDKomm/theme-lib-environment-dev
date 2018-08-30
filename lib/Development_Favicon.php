<?php

namespace Theme\Environment\Development;

/**
 * Class Development_Favicon
 *
 * Replaces the theme’s favicon with a rocket favicon for development and staging environments
 */
class Development_Favicon {
	/**
	 * Inits hooks.
	 */
	public function init() {
		// Bailout if not in development environment
		if ( ! defined( 'ENVIRONMENT' ) && ENVIRONMENT !== 'DEV' ) {
			return;
		}

		// Remove default theme favicon
		add_action( 'init', function() {
			remove_action( 'wp_head', 'render_theme_favicon' );
		} );

		// Add custom favicon to frontend and backend screens
		add_action( 'wp_head', [ $this, 'render_favicon' ], 20 );
		add_action( 'login_head', [ $this, 'render_favicon' ], 20 );
		add_action( 'admin_head', [ $this, 'render_favicon' ], 20 );
	}

	/**
	 * Renders development favicon.
	 */
	public function render_favicon() {
		$url_base = get_theme_file_uri( 'vendor/mindkomm/theme-lib-environment-dev/favicons/' );

		$lines = [
			'<!-- Development Favicon Start -->',
			'<link rel="icon" type="image/png" sizes="32x32" href="' . $url_base . 'favicon-32x32.png">',
			'<link rel="icon" type="image/png" sizes="16x16" href="' . $url_base . 'favicon-16x16.png">',
			'<link rel="icon" type="image/x-icon" href="' . $url_base . 'favicon.ico">',
			'<link rel="shortcut icon" type="image/x-icon" href="' . $url_base . 'favicon.ico">',
			'<!-- Development Favicon End -->',
		];

		echo implode( PHP_EOL, $lines ) . PHP_EOL;
	}
}
