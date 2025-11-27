<?php

/**
 *
 */
$photos = get_field('your_photos');
get_header(); ?>

<?php get_template_part( 'template-parts/modal', null, array('gallery' => $photos)); ?>
<div class="page">
    <?php // get_template_part( 'template-parts/content', get_post_type() ); ?>
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-5">
                    <div class="treestories-images">
                        <?php foreach ($photos as $photo) { ?>
                            <img src="<?php echo $photo['sizes']['medium'] ?>" alt="<?php echo $photo['alt'] ?>">
                        <?php } ?>
                    </div>
                </div>

                

                <div class="col-sm-12 col-md-8 col-lg-7 treestories-text">
                    <h4><?php the_title(); ?></h4>
                    <h6>by <?php echo get_field('name') ?></h6>
                    <p><?php the_content(); ?></p>
                    <?php if (get_field('audio') != null) { $audio = get_field('audio')?>
                        <div>
                            <audio controls>
                                <source src="<?php echo $audio['url'] ?>" type="audio/mp3">
                            </audio>
                        </div>
                    <?php } ?>
                    <div class="single-like">
                        <?php if (function_exists('the_ratings')) {
                            the_ratings();
                        } ?>
                        <span class="small">Like</span>
                    </div> 
                    <br>
                    <div class="clearfix"></div>
                    <div class="single-share">
                        <?php echo do_shortcode('[Sassy_Social_Share]') ?>
                        <span class="small">Share this Story</span>
                    </div>

                    <h3 class="pb-3 pt-3">Got a Story about the same tree?</h3>
                    <a href="../../share" class="btn">Share your TreeStory</a>
                </div>
            </div>
        </div>
    </section>

    <div id="map" class="treestories-map"></div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAoJKf5e3EuQAlgxhH4Cqv4GIMsdWP2ux4&map_ids=e41ff799a7370a8e&callback=initMap&v=weekly" defer></script>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 cta-btn-padding">
                    <a href="/share" title="">
                        <div class="btn font-bold ">Share your TreeStory</div>
                    </a>
                </div>
                <div class="col-sm-6">
                    <a href="/how-to" title="">
                        <div class="btn font-bold">How to guide</div>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer();
