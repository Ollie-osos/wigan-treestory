<?php

$cta_button_1 = get_field('cta_button_1');
$cta_button_2 = get_field('cta_button_2');
$cta_bg_colour = get_field('cta_bg_colour');

if ($cta_button_1) {
    $link_url_1 = $cta_button_1['url'];
    $link_title_1 = $cta_button_1['title'];
    $link_target_1 = $cta_button_1['target'] ? $cta_button_1['target'] : '_self';
}

if ($cta_button_2) {
    $link_url_2 = $cta_button_2['url'];
    $link_title_2 = $cta_button_2['title'];
    $link_target_2 = $cta_button_2['target'] ? $cta_button_2['target'] : '_self';
}


if ($cta_button_1 && $cta_button_2) { ?>
    <section class="section <?php echo $cta_bg_colour; ?>" data-sal="slide-up" data-sal-duration="1000">
        <div class="container">
            <div class="row u-text-center u-flex u-center">
                <div class="col-sm-6 cta-btn-padding"><a href="<?php echo $link_url_1; ?>" target="<?php echo $link_target_1; ?>" class="btn"><?php echo $link_title_1; ?></a></div>
                <div class="col-sm-6"><a href="<?php echo $link_url_2; ?>" target="<?php echo $link_target_2; ?>" class="btn"><?php echo $link_title_2; ?></a></div>
            </div>
        </div>
    </section>

<?php } elseif($cta_button_1) { ?>
    <section class="section <?php echo $cta_bg_colour; ?>" data-sal="slide-up" data-sal-duration="1000">
        <div class="container">
            <div class="row u-text-center">
                <div class="col-sm-12"><a href="<?php echo $link_url_1; ?>" target="<?php echo $link_target_1; ?>" class="btn"><?php echo $link_title_1; ?></a></div>
            </div>
        </div>
    </section>

<?php }
