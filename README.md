# Development Environment

Optimizations for a local WordPress theme development environment.

## Installation

You can install the package via Composer:

```bash
composer require mindkomm/theme-lib-environment-dev
```

## Usage

By default, the development environment:

- Disables heartbeat

**functions.php**

```php
if ( is_dev() ) {
    $wpdev = new Theme\Environment\Development\WordPress();
    $wpdev->init();
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
