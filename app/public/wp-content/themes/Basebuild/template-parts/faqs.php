<?php if (have_rows('faqs')) : ?>
<section class="section faqs bg-pattern">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <dl class="accordion">
                    <?php while (have_rows('faqs')) : the_row();
                        $faq_title = get_sub_field('faq_title');
                        $faq_text = get_sub_field('faq_text'); ?>
                    
                        <dt><a href=""><?php echo $faq_title ?></a></dt>
                        <dd><?php echo $faq_text ?></dd>
                    <?php endwhile; ?>
                </dl>
            </div>
        </div>
    </div>
</section>

<script>
    (function($) {

        var allPanels = $('.accordion > dd').hide();

        $('.accordion > dt > a').click(function() {
            $('.accordion > dt > a').removeClass('open');
            allPanels.slideUp();
            $(this).parent().next().slideDown();    
            $(this).addClass('open');
            return false;

        });

    })(jQuery);
</script>

<?php endif; 