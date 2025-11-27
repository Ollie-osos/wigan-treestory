<?php
if ($args['gallery']) {
    $photos = $args['gallery'];
} ?>

<div id="single-modal" class="modal-single">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div class="swiffy-slider slider-nav-chevron slider-nav-visible slider-nav-autoplay" data-slider-nav-autoplay-interval="6000">
            <ul class="slider-container u-text-center">
                <?php foreach ($photos as $photo) { ?>
                    <li><img class="image-modal" src="<?php echo $photo['sizes']['medium'] ?>" alt="<?php echo $photo['alt'] ?>"></li>
                <?php } ?>
            </ul>
            <button type="button" class="slider-nav"></button>
            <button type="button" class="slider-nav slider-nav-next"></button>
        </div>
    </div>
</div>

<script>
    $(function() {
        $('.treestories-images img').on('click', function(e) {
            $('#single-modal').addClass('show');
        });

        $('.close').on('click', function(e) {
            $('#single-modal').removeClass('show');
        });
        
        // // When the user clicks anywhere outside of the modal, close it
        // window.onclick = function(event) {
        //     $('#single-modal').removeClass('show');
        // }
    });
</script>