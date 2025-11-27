<?php

/**
 * Template Name: FAQs
 *
 */

get_header(); ?>

<div class="page bg-off-white">
    <?php get_template_part( 'template-parts/hero-full-colour', null, array('colour' => 'bg-dark-green')); ?>   
    <?php get_template_part( 'template-parts/faqs' ); ?> 
    <?php get_template_part( 'template-parts/cta-section' ); ?> 
</div>

<?php get_footer();
