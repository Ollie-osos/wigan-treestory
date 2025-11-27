<?php

$timeline_text = get_field('timeline_text');
$timeline_image = get_field('timeline_image');
?>

<section class="timeline-gif mobile-text-center">
    <div class="container">
        <div class="row u-center">
        <div class="col-md-6 col-sm-12 image"> 
                <img src="<?php echo $timeline_image['url']; ?>" alt="<?php echo $timeline_image['alt']; ?>">
            </div>
            <div class="col-md-6 col-sm-12 text">
                <h3 class="pb-5"><?php echo $timeline_text; ?></h3>
                <a href="/timeline" class="btn">Explore our Timeline</a>
            </div>
        </div>
    </div>
</section>