<?php

/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

$featured_news = get_field('featured_news', 'option');
get_header(); ?>

<div class="page">
    <section class="featured-news bg-off-white">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 u-text-center">
                    <a href="<?php echo get_permalink($featured_news); ?> ">

                        <div class="image">
                            <?php echo get_the_post_thumbnail($featured_news, 'large'); ?>
                        </div>
                        <div class="text">
                            <h1><?php echo esc_html($featured_news->post_title); ?></h1>
                            <p><?php the_excerpt($featured_news); ?></p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <?php if (have_posts()) : ?>
        <section class="news">
            <div class="container">
                <div class="row">
                    <?php while (have_posts()) : the_post(); ?>

                        <div class="col-sm-12 col-md-4 news-item">
                            <a href="<?php echo get_permalink(); ?> ">
                                <?php echo get_the_post_thumbnail(null, 'medium'); ?>
                                <h3><?php the_title(); ?></h3>
                            </a>
                        </div>

                    <?php endwhile; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <section class="section bg-dark-green" data-sal="slide-up" data-sal-duration="1000">
        <div class="container">
            <div class="row u-text-center">
                <div class="col-sm-6 cta-btn-padding"><a href="../share" class="btn">Share your TreeStory</a></div>
                <div class="col-sm-6"><a href="../how-to" class="btn">How to guide</a></div>
            </div>
        </div>
    </section>

</div>

<?php get_footer();
