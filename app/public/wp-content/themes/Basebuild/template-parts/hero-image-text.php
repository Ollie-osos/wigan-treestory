<?php

$hero_image_text = get_field('hero_image_text');
$hero_text = get_field('hero_text');
$hero_background_image = get_field('hero_background_image');
$hero_background_colour = get_field('hero_background_colour');
$hero_mobile_image = get_field('hero_mobile_image');

// $remove_class = $remove_image_on_mobile ? 'u-block-md u-none-sm' : '';

?>

<section class="hero-image-text <?php echo $hero_background_colour; ?> background-image" style="background-image:url('<?php echo $hero_background_image['sizes']['large']; ?>');" >
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 text mobile-text-center">
                <?php if ($hero_image_text['sizes']['medium']) {
                    echo '<img src="' . $hero_image_text['sizes']['medium'] . '" alt="' . $hero_image_text['alt'] . '">';
                } ?>
                <?php echo $hero_text; ?>
                
            </div>
            <div class="col-md-6 col-sm-12 image">
                <div class="u-none-md u-block-sm">
                    <?php if ($hero_mobile_image['sizes']['medium']) {
                        echo '<img src="' . $hero_mobile_image['sizes']['medium'] . '" alt="' . $hero_mobile_image['alt'] . '">';
                    } ?>
                </div>
            </div>
        </div>
    </div>
</section>