<?php
/**
* Template Name: Resources
*
*/

get_header(); ?>

<div class="page">
    <?php get_template_part( 'template-parts/hero-two-columns', get_post_type() ); ?>
    <?php get_template_part( 'template-parts/resources-repeater', get_post_type() ); ?>
    <?php get_template_part( 'template-parts/full-image-cta', null, array( 'page' => 'resources')); ?>
    <?php get_template_part( 'template-parts/cta-section' ); ?> 
</div>
<?php get_footer();


