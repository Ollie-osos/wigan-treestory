<?php

$full_cta = get_field('full_cta');
$full_background_image = get_field('full_background_image');

if ($args['page']) {
    $page = $args['page'];
}

if ($full_cta) {
    $link_url_1 = $full_cta['url'];
    $link_title_1 = $full_cta['title'];
    $link_target_1 = $full_cta['target'] ? $full_cta['target'] : '_self'; ?>
    <section class="full-image-cta <?php echo $page; ?> full background-image u-text-center u-center" style="background-image:url('<?php echo $full_background_image['sizes']['large']; ?>');">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <a href="<?php echo $link_url_1; ?>" target="<?php echo $link_target_1; ?>" class="btn large"><?php echo $link_title_1; ?></a>
                </div>
            </div>
        </div>
    </section>
<?php }
