<?php
/**
* Template Name: About
*
*/

get_header(); ?>

<div class="page">
    <?php get_template_part( 'template-parts/hero-full-colour', null, array('colour' => 'bg-dark-green')); ?>   
    <?php get_template_part( 'template-parts/about-pages' ); ?> 
    <?php get_template_part( 'template-parts/cta-section' ); ?> 
<?php get_footer();


