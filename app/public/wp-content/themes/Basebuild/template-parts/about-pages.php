<?php


// Check value exists.
if (have_rows('page_builder')) : ?>
    <section class="bg-pattern bg-white">
        <div class="container about-pages">
            <?php

            // Loop through rows.
            while (have_rows('page_builder')) : the_row();

                // Case: Profile layout.
                if (get_row_layout() == 'profile_image') :
                    if (have_rows('profiles')) : ?>
                        <?php while (have_rows('profiles')) : the_row();
                            $about_profile_image = get_sub_field('about_profile_image');
                            $about_profile_text = get_sub_field('about_profile_text');
                            $about_profile_title = get_sub_field('about_profile_title'); ?>
                            <div class="row">
                                <div class="col-sm-12 col-md-4 col-lg-4 profile">
                                    <div class="image">
                                        <img src="<?php echo $about_profile_image['sizes']['medium']; ?>" alt="<?php echo $about_profile_image['alt']; ?>">         
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-8 col-lg-8 treestories-text">
                                    <h3><?php echo $about_profile_title; ?></h3>
                                    <p><?php echo $about_profile_text; ?></p>
                                </div>
                            </div>
                            <hr>
                        <?php endwhile; ?>
                    <?php endif; ?>
                
                <?php elseif (get_row_layout() == 'two_column_image_and_text') :
                    $about_images = get_sub_field('about_images');
                    $about_text = get_sub_field('about_text'); ?>
                    <div class="row">
                        <div class="col-sm-12 col-md-4 col-lg-5">
                            <div class="treestories-images">
                                <?php foreach ($about_images as $photo){?>
                                    <img class="image-modal" src="<?php echo $photo['sizes']['medium'] ?>" alt="<?php echo $photo['alt'] ?>">
                                <?php } ?>
                            </div>
                            <?php get_template_part( 'template-parts/modal', null, array('gallery' => $about_images)); ?>
                        </div>
                        <div class="col-sm-12 col-md-8 col-lg-7 treestories-text">
                            <?php echo $about_text; ?>
                        </div>
                    </div>

                <?php endif; // End loop.
            endwhile; ?>
        </div>
    </section>

<?php

// No value.
else :
// Do something...
endif;
