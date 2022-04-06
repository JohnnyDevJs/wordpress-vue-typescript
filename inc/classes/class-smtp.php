<?php
/**
 * SMTP Types
 *
 * @package cdr
 */

namespace CDR_THEME\Inc;

use CDR_THEME\Inc\Traits\Singleton;

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

    }

    public function setup_smtp_mail( $phpmailer ) {
        $phpmailer->isSMTP();
        $phpmailer->Host = 'email-ssl.com.br';
        $phpmailer->SMTPAuth = true;
        $phpmailer->Port = 465;
        $phpmailer->SMTPSecure = 'ssl';
        $phpmailer->Username = 'iro@iro.com.br';
        $phpmailer->Password = 'Clinica@IRO3512';
        $phpmailer->From = 'iro@iro.com.br';
        $phpmailer->FromName = 'IRO Campinas';
    }
}