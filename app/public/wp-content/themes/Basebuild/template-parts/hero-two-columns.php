
<?php 

$hero_two_title = get_field('hero_two_title');
$hero_two_text = get_field('hero_two_text');

?>
<section class="section hero-two-columns bg-white">
    <div class="container">
        <div class="row" data-sal="slide-up" data-sal-duration="1000">
            <div class="col-sm-12 col-md-6">
                <h1><?php echo $hero_two_title; ?></h1>
            </div>
            <div class="col-sm-12 col-md-6">
                <?php echo $hero_two_text; ?>
            </div>
        </div>
    </div>
</section>