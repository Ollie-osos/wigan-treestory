<?php

/**
 * Template Name: How to
 *
 */

get_header(); ?>

<div class="page how-to">
    <?php get_template_part('template-parts/hero-full-colour', null, array('colour' => 'bg-white')); ?>
    <?php get_template_part('template-parts/icons',  null, array('page' => 'icons')); ?>
    <section class="video-guide section bg-off-white">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 text">
                    <h2>Video guide</h2>
                    <p>Need a little extra help? Follow our video guide for uploading your TreeStory.</p>
                </div>
                <div class="col-sm-12 col-md-6 image u-block-md u-none-sm">
                    <div class="videoWrapper">
                        <!-- <iframe src="https://www.youtube.com/embed/y-EsNhGUJOE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                            <iframe src="https://www.youtube.com/embed/RJaXonAirHs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <h2 class="dark-green-text">What happens once I've submitted? </h2>
                </div>
                <div class="col-md-6 col-sm-12">
                    <p>We'll email your as soon as we've approved your upload and let you know once your TreeStory is live!</p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <h2 class="dark-green-text">Ready to go?</h2>
                </div>
                <div class="col-md-6 col-sm-12 bottom-custom-cta">
                    <a href="../share" class="btn">Upload your TreeStory</a>
                </div>
            </div>
        </div>
    </section>
</div>
<?php get_footer();
