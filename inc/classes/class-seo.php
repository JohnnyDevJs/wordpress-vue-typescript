<?php
/**
 * Mimes Types
 *
 * @package cdr
 */

namespace CDR_THEME\Inc;

use CDR_THEME\Inc\Traits\Singleton;

class SEO {

    use Singleton;

    protected function __construct() {

        // load class

        $this->setup_hooks();
    }

    protected function setup_hooks() {

        /**
         * Actions.
         */
        add_filter( 'wp_head', [$this, 'hook_seo_google'] );
        add_filter( 'wp_head', [$this, 'hook_seo_facebook'] );
    }

    public function hook_seo_google() {

        $mods = get_theme_mods();
        $mods_google_id = $mods['CDR_field_seo_google_analytics'];

        $output = '';

        $output .= '<!-- Global site tag (gtag.js) - Google Analytics -->';
        $output .= '<script async src="https://www.googletagmanager.com/gtag/js?id=UA-217587104-1"></script>';
        $output .= '<script>';

        $output .= 'window.dataLayer = window.dataLayer || [];';
        $output .= 'function gtag() {dataLayer.push(arguments); }';
        $output .= " gtag('js', new Date());";
        $output .= " gtag('config', '$mods_google_id');";
        $output .= "</script>";

        echo $output;

    }

    public function hook_seo_facebook() {

        $mods = get_theme_mods();
        $mods_facebook_id = $mods['CDR_field_seo_pixel_facebook'];

        $output = '';

        $output .= '<meta name="facebook-domain-verification" content="' . $mods_facebook_id . '" />';

        $output .= "
          <!-- Meta Pixel Code -->
            <script>
              !function(f,b,e,v,n,t,s)

              {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
              n.callMethod.apply(n,arguments):n.queue.push(arguments)};

              if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
                n.queue=[];t=b.createElement(e);t.async=!0;
                t.src=v;s=b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t,s)}(window, document,'script',
                'https://connect.facebook.net/en_US/fbevents.js');
                fbq('init', '921165068602718');
                fbq('track', 'PageView');
            </script>
            <noscript><img height='1' width='1' style='display:none'

        src='https://www.facebook.com/tr?id=921165068602718&ev=PageView&noscript=1'

        /></noscript>

        <!-- End Meta Pixel Code -->";

        echo $output;
    }
}
