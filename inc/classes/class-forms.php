<?php
/**
 * Send Forms
 *
 * @package cdr
 */

namespace CDR_THEME\Inc;

use CDR_THEME\Inc\Traits\Singleton;

class Forms {

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

        add_action( 'wp_ajax_send_franchise_form', [$this, 'send_franchise_form'] );
        add_action( 'wp_ajax_nopriv_send_franchise_form', [$this, 'send_franchise_form'] );
    }

    public function send_contact_form() {

        // Data
        $name = wp_strip_all_tags( $_POST['name'] );
        $email = wp_strip_all_tags( $_POST['email'] );
        $phone = wp_strip_all_tags( $_POST['phone'] );
        $message = wp_strip_all_tags( $_POST['message'] );
        $body = '<strong>Nome:</strong> ' . $name . '<br/><strong>E-mail:</strong> ' . $email . '<br/><strong>Telefone:</strong> ' . $phone . '<br/><strong>Mensagem:</strong> ' . $message;

        // Body
        $to = 'iro@iro.com.br';
        $subject = 'Formulário de Contato - Site';

        $headers[] = 'From: ' . $name . '<' . $email . '>';
        $headers = ['Content-Type: text/html; charset=UTF-8'];

        wp_mail( $to, $subject, $body, $headers );

        die();
    }

    public function send_franchise_form() {

        // Data
        $name = wp_strip_all_tags( $_POST['name'] );
        $email = wp_strip_all_tags( $_POST['email'] );
        $phone = wp_strip_all_tags( $_POST['phone'] );
        $cro = wp_strip_all_tags( $_POST['cro'] );
        $specialty = wp_strip_all_tags( $_POST['specialty'] );
        $address = wp_strip_all_tags( $_POST['address'] );
        $idea = wp_strip_all_tags( $_POST['idea'] );

        $body = '
          <strong>Nome:</strong> ' . $name . '<br/>
          <strong>E-mail:</strong> ' . $email . '<br/>
          <strong>Telefone:</strong> ' . $phone . '<br/>
          <strong>CRO:</strong> ' . $cro . '<br/>
          <strong>Especialidade:</strong> ' . $specialty . '<br/>
          <strong>Endereço:</strong> ' . $address . '<br/>
          <strong>Qual sua idéia:</strong> ' . $idea;

        // Body
        $to = 'iro@iro.com.br';
        $subject = 'Formulário de Franquias - Site';

        $headers[] = 'From: ' . $name . '<' . $email . '>';
        $headers = ['Content-Type: text/html; charset=UTF-8'];

        wp_mail( $to, $subject, $body, $headers );

        die();
    }

}