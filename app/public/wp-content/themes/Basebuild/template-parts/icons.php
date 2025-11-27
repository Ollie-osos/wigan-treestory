<?php

// Check value exists.
if( have_rows('icons') ):
    $count = 0;
    // Loop through rows.
    while ( have_rows('icons') ) : the_row();

        $icon_text = get_sub_field('icon_text');
        $icon_image = get_sub_field('icon_image');
        $icon_cta = get_sub_field('icon_cta');
        $icon_bgc = get_sub_field('icon_bgc'); 
        if ($icon_cta) {
            $link_url_1 = $icon_cta['url'];
            $link_title_1 = $icon_cta['title'];
            $link_target_1 = $icon_cta['target'] ? $icon_cta['target'] : '_self';
        } 
        
        if($args['page'] == 'icons' && $count == 0) { ?>
            <section class="icons <?php echo $icon_bgc; ?> mobile-text-center" id="icon-<?php echo $count; ?>">
                <div class="container">
                    <div class="row u-center" data-sal="slide-up" data-sal-duration="1000">
                        <div class="col-sm-12 col-md-6 text">
                            <?php echo $icon_text; ?>
                            <?php if($icon_cta) { echo '<a href="'.$link_url_1.'" target="'.$link_target_1.'" class="btn">'.$link_title_1.'</a>';} ?>
                        </div>
                        <div class="col-sm-12 col-md-6 image u-block-md u-none-sm">
                            <img src="<?php echo $icon_image['sizes']['medium']; ?>" alt="<?php echo $icon_image['alt']; ?>">
                        </div>
                    </div>
                </div>
            </section>
            <?php get_template_part( 'template-parts/carousel-text', null, array( 'colour' => 'bg-white') ); ?>
        <?php } else { ?>

            <section class="icons <?php echo $icon_bgc; ?> mobile-text-center"  id="icon-<?php echo $count; ?>">
                <div class="container">
                    <div class="row u-center" data-sal="slide-up" data-sal-duration="1000">
                        <div class="col-sm-12 col-md-6 text">
                            <?php echo $icon_text; ?>
                            <?php if($icon_cta) { echo '<a href="'.$link_url_1.'" target="'.$link_target_1.'" class="btn">'.$link_title_1.'</a>';} ?>
                        </div>
                        <div class="col-sm-12 col-md-6 image u-block-md u-none-sm">
                            <img src="<?php echo $icon_image['sizes']['medium']; ?>" alt="<?php echo $icon_image['alt']; ?>">
                        </div>
                    </div>
                </div>
            </section>
        <?php } 
    // End loop.
    $count ++;
    endwhile;

endif;