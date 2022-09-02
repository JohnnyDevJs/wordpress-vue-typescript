<?php
/**
 * SMTP Types
 *
 * @package cm
 */

namespace CM_THEME\Inc;

use CM_THEME\Inc\Traits\Singleton;

class SMTP {

    use Singleton;

    protected function __construct() {

        // load class

        $this->setup_hooks();
    }

    protected function setup_hooks() {

        /**
         * Actions.
         */
        add_filter( 'phpmailer_init', [$this, 'setup_smtp_mail'] );
        add_action( 'wp_mail_failed', [$this, 'action_wp_mail_failed', 10, 1] );
    }

    public function setup_smtp_mail( $phpmailer ) {
        $phpmailer->isSMTP();
        $phpmailer->Host = 'smtp.mailtrap.io';
        $phpmailer->SMTPAuth = true;
        $phpmailer->Port = 2525;
        $phpmailer->Username = 'cf84de4c0f8c37';
        $phpmailer->Password = 'c9a8099cb19eba';
    }

    public function action_wp_mail_failed( $error ) {
        wp_die( "<pre>" . print_r( $error, true ) . "</pre>" );
    }
}