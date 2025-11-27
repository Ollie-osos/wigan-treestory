<?php

/**
 * Template Name: Timeline
 *
 */

get_header();
?>

<div class="page">
    <?php get_template_part( 'template-parts/hero-full-colour', null, array('colour' => 'bg-dark-green')); ?>   
    <section class="section bg-off-white" id="section-timeline">
        <div class="container timeline_events">
            <div class="timeline_events__rows">
                <?php
                if (have_rows('timeline_events')) :
                    $count = 0;
                    while (have_rows('timeline_events')) : the_row();

                        $image = get_sub_field('image');
                        $icon = get_sub_field('icon');
                        $title_year = get_sub_field('title_year');
                        $text = get_sub_field('text');
                        $link = get_sub_field('link');
                ?>

                        <div class="row u-center" id="timeline_event-<?php echo $count; ?>">
                            <a href="<?php echo $link; ?>">
                                <div class="col-sm-12 timeline_row" data-sal="slide-up" data-sal-duration="1000">

                                    <div class="image" style="background-image: url('<?php echo $image['sizes']['medium']; ?>')">&nbsp;</div>
                                    <div class="timeline_content">
                                        <div class="icon"><img src="<?php echo $icon['sizes']['medium'] ?>" alt="timeline icon"></div>
                                        <div class="text">
                                            <p class="title_year"><?php echo $title_year; ?></p>
                                            <p><?php echo $text; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <?php if ($count == 1) { ?>
                                <div class="col-sm-12 timeline_alt_row" data-sal="slide-up" data-sal-duration="1000">
                                    <div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/timeline-speke-hall.png" alt="timeline icon"></div>
                                    <div class="text"><span class="title_year">1530</span> Speke Hall Construction begins</div>
                                </div>
                            <?php }elseif($count == 2) {?>
                                <div class="col-sm-12 timeline_alt_row" data-sal="slide-up" data-sal-duration="1000">                                    
                                    <div class="text"><span class="title_year">1830</span> Gothic Revival</div>
                                    <div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/timeline-gothic.png" alt="timeline icon"></div>
                                </div>
                            <?php }elseif($count == 3) {?>
                                <div class="col-sm-12 timeline_alt_row" data-sal="slide-up" data-sal-duration="1000">
                                    <div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/timeline-crown.png" alt="timeline icon"></div>
                                    <div class="text"><span class="title_year">1887</span> Queen Victoria's Golden Jubilee</div>
                                </div>
                            <?php }elseif($count == 4) {?>
                                <div class="col-sm-12 timeline_alt_row" data-sal="slide-up" data-sal-duration="1000">                                    
                                    <div class="text"><span class="title_year">1948</span> HMT Empire Windrush arrives in Britain</div>
                                    <div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/timeline-windrush.png" alt="timeline icon"></div>
                                </div>
                                <?php }elseif($count == 5) {?>
                                <div class="col-sm-12 timeline_alt_row" data-sal="slide-up" data-sal-duration="1000">
                                    <div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/timeline-chinese-arch.png" alt="timeline icon"></div>
                                    <div class="text"><span class="title_year">2000</span> Chinese Arch built in Liverpool</div>
                                </div>
                            <?php } ?>
                        </div>
                       


                <?php $count++;
                    endwhile;
                endif;
                ?>
            </div>

            <svg version="1.1" id="timeline-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 279.6 3278.8" style="enable-background:new 0 0 279.6 3278.8;" xml:space="preserve">
                <style type="text/css">
                    .st0 {
                        fill: none;
                        stroke: #036B66;
                        stroke-width: 13;
                        stroke-miterlimit: 10;
                    }
                </style>
                <path class="st0" id="timeline" d="M223.8,3.2c0,0,48.5,211.3,16.7,304.8c-37.6,110.5-83.8,94.5-189.9,189.2c-110.5,98.6,213,384.4,215.8,546.1
        c1.9,107.7-244.6,195.7-239,361s57.7,202.8,167.9,320.2c99.7,106.1,23.9,233.6-102.6,364.1s-1.6,435.2,91.8,534.5
        c81.9,87.1,93.5,207.7-8.4,298.9s-250.8,140-81.2,353.9" />
            </svg>
        </div>
    </section>
</div>
<?php get_template_part('template-parts/cta-section'); ?>
<?php
add_action('wp_footer', 'footer_timeline');

function footer_timeline()
{ ?>

    <script>
        // Get the id of the <path> element and the length of <path>
        var timeline = document.getElementById("timeline");
        var length = timeline.getTotalLength();

        // The start position of the drawing
        timeline.style.strokeDasharray = length;

        // Hide the timeline by offsetting dash. Remove this line to show the timeline before scroll draw
        timeline.style.strokeDashoffset = length;

        // Find scroll percentage on scroll (using cross-browser properties), and offset dash same amount as percentage scrolled
        window.addEventListener("scroll", myFunction);

        function myFunction() {
            var scrollpercent = (document.body.scrollTop + document.documentElement.scrollTop) / (document.documentElement.scrollHeight - document.documentElement.clientHeight);

            var draw = length * scrollpercent;

            // Reverse the drawing (when scrolling upwards)
            timeline.style.strokeDashoffset = length - draw;
        }
    </script>

<?php }

get_footer();
