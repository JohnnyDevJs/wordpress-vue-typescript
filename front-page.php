<?php
/**
 * Front Page Template.
 *
 * @package sjp
 */
get_header();

get_template_part( 'template-parts/front-page/content', 'banner' );
get_template_part( 'template-parts/front-page/content', 'about' );
get_template_part( 'template-parts/front-page/content', 'portfolio' );
get_template_part( 'template-parts/front-page/content', 'contact' );

get_footer();