<?php
/**
* Template Name: Homepage
*
*/

get_header(); ?>

<div class="page">
<?php get_template_part( 'template-parts/hero-image-text', get_post_type() ); ?>
<?php get_template_part( 'template-parts/full-image-cta', null, array( 'page' => 'home') ); ?>
<?php get_template_part( 'template-parts/carousel-text', null, array( 'colour' => 'bg-off-white') ); ?>
<?php get_template_part( 'template-parts/timeline-gif', get_post_type() ); ?>
<?php get_template_part( 'template-parts/icons',  null, array('page' => 'home') ); ?>
<?php get_template_part( 'template-parts/footer-image-text-cta', get_post_type() ); ?>
<?php get_footer();


