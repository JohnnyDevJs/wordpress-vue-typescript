<?php
/**
 * Send Form
 *
 * @package iro
 */

namespace SJP_THEME\Inc;

use SJP_THEME\Inc\Traits\Singleton;

class Form {

    use Singleton;

    protected function __construct() {

        // load class
        $this->setup_hooks();

    }

    protected function setup_hooks() {

        /**
         * Actions.
         */
        add_action( 'wp_ajax_send_contact_form', [$this, 'send_contact_form'] );
        add_action( 'wp_ajax_nopriv_send_contact_form', [$this, 'send_contact_form'] );
        add_action( 'wp_mail_failed', [$this, 'onMailError'], 10, 1 );
        add_filter( 'wp_mail_from', [$this, 'changeFromEmail'] );

    }

    public function send_contact_form() {

        // Data
        $fullname = wp_strip_all_tags( $_GET['name'] );
        $email = wp_strip_all_tags( $_GET['email'] );
        $pw = wp_strip_all_tags( $_GET['pw'] );
        $message = wp_strip_all_tags( $_GET['message'] );

        $url = home_url();

        echo $fullname;

        $body = '
          <p><strong>Você Recebeu um novo registro de formulário:</p></strong><br/>
          <strong>Nome completo:</strong> ' . $fullname . '<br/>
          <strong>E-mail:</strong> ' . $email . '<br/>
          <strong>WhatsApp:</strong> ' . $pw . '<br/>
          <strong>O que deseja:</strong> ' . $message . '<br/><br/>
          <p>--- Formulário enviado do site: <a href="' . $url . '">' . $url . '</a> ---</p>
          ';

        // Body
        $to = 'test@test.com';
        $subject = 'Formulário de Contato - Site';

        $headers[] = 'From: ' . $fullname . '<' . $to . '>';
        $headers = ['Content-Type: text/html; charset=UTF-8'];

        if ( wp_mail( $to, $subject, $body, $headers ) ) {
            echo json_encode( ["result" => "complete"] );
        }

        die();
    }

    public function onMailError( $wp_error ) {
        echo "<pre>";
        print_r( $wp_error );
        echo "</pre>";
    }

    public function changeFromEmail( $from ) {
        return "test@test.com";
    }

}