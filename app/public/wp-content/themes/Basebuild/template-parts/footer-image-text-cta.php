<?php

$footer_text = get_field('footer_text');
$footer_cta = get_field('footer_cta');
$footer_background_image = get_field('footer_background_image');
$footer_background_colour = get_field('footer_background_colour');

if ($footer_cta) {
    $link_url_1 = $footer_cta['url'];
    $link_title_1 = $footer_cta['title'];
    $link_target_1 = $footer_cta['target'] ? $footer_cta['target'] : '_self';
}

?>


<section class="footer-image-text <?php echo $footer_background_colour; ?> background-image" style="background-image:url('<?php echo $footer_background_image['sizes']['large']; ?>');" >
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 text mobile-text-center off-white-text">
                <h3 class="pb-5"><?php echo $footer_text; ?></h3>
                <?php if ($footer_cta) {
                    echo '<div><a href="' . $link_url_1 . '" target="' . $link_target_1 . '" class="btn">' . $link_title_1 . '</a></div>';
                } ?>
            </div>
            <div class="col-md-6 col-sm-12 image">
                <div class="u-none-md u-block-sm">
                   
                </div>
            </div>
        </div>
    </div>
</section>