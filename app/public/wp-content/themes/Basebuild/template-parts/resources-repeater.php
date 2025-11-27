<?php

// Check value exists.
if (have_rows('resources')) :  ?>
    <div class="resources">
        <?php
        while (have_rows('resources')) : the_row();

            $resources_text = get_sub_field('resources_text');
            $file_download = get_sub_field('file_download');
            $resources_background_image = get_sub_field('resources_background_image');
            $resources_background_colour = get_sub_field('resources_background_colour');?>


            <section class="footer-image-text <?php echo $resources_background_colour; ?> background-image" style="background-image:url('<?php echo $resources_background_image['sizes']['large']; ?>');">
                <div class="container">
                    <div class="row">
                    <div class="col-md-6 col-sm-12 image">
                            <div class="u-none">
                                <?php if ($resources_mobile_image['sizes']['medium']) {
                                    echo '<img src="' . $resources_mobile_image['sizes']['medium'] . '" alt="' . $resources_mobile_image['alt'] . '">';
                                } ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 text mobile-text-center off-white-text">
                            <?php echo $resources_text; ?>
                            <?php if ($file_download) {
                                echo '<div><a href="' . $file_download . '" target="_blank" class="btn">Download Resource</a></div>';
                            } ?>
                        </div>
                    </div>
                </div>
            </section>

        <?php endwhile; ?>

    </div>
<?php endif;
