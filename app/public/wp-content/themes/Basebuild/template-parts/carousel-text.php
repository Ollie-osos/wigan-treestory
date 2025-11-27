<?php

$carousel_images = get_field('carousel_images');
$carousel_text = get_field('carousel_text');

if ($args['colour']) {
    $colour = $args['colour'];
}
?>
<section class="section carousel-text u-center row mobile-text-center <?php echo $colour; ?>">
    <div class="col-sm-12 col-md-6 text" data-sal="slide-up" data-sal-duration="1000">
        <?php echo $carousel_text; ?>
    </div>
    <div class="col-sm-12 col-md-6 carousel">
        <?php if ($carousel_images) : ?>
            <div class="swiffy-slider slider-nav-chevron slider-nav-visible slider-nav-autoplay" data-slider-nav-autoplay-interval="6000">
                <ul class="slider-container">
                    <?php foreach ($carousel_images as $image) : ?>
                        <li class="background-image" style="background-image:url('<?php echo $image['sizes']['medium']; ?>');"></li>
                    <?php endforeach; ?>
                </ul>
                <a class="slider-nav"></a>
                <a class="slider-nav slider-nav-next"></a>
            </div>
        <?php endif; ?>
    </div>
</section>