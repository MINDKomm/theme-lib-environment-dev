# Development Environment

Optimizations for a local WordPress theme development environment.

## Installation

You can install the package via Composer:

```bash
composer require mindkomm/theme-lib-environment-dev
```

## Usage

By default, the development environment:

- Disables heartbeat.
- Adds a custom 🚀 favicon for development enviroments.

To activate the feature, use the following code:

**functions.php**

```php
if ( is_dev() ) {
    $wpdev = new Theme\Environment\Development\WordPress();
    $wpdev->init();
}
```

### Development Favicon

For the development favicon feature to work well, you’ll need to render your favicons through a `render_theme_favicon()` function. The development favicon feature will unhook your `render_theme_favicon` function from `wp_head` and add its own code.

**functions.php**

```php
/**
 * Add the theme favicon into theme head
 */
add_action( 'wp_head', 'render_theme_favicon' );

/**
 * Render favicons.
 *
 * This needs to be a separate function so that it can be unhooked.
 */
function render_theme_favicon() {
    Timber\Timber::render( 'favicons.twig', Timber\Timber::get_context() );
}
```

### Redirect emails

Redirects all emails sent through wp_mail to a certain email address.

```php
if ( is_dev() ) {
    $wpdev = new Theme\Environment\Development\WordPress();
    $wpdev->redirect_emails( 'info@example.org' );
}
```

### WooCommerce

#### set_email_recipient

Filters the recipient email for WooCommerce emails.

**functions**

```php
if ( is_dev() ) {
    $woodev = Theme\Environment\Development\WooCommerce();
    $woodev->set_email_recipient( 'info@example.org' );
}
```

## Support

This is a library that we use at MIND to develop WordPress themes. You’re free to use it, but currently, we don’t provide any support. 
