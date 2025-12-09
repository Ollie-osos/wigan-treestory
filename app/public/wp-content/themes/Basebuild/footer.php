<?php

/**
 * The template for displaying the footer
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

// Get vars from options ACF
$email_form = get_field('email_form', 'option');
$footer_description = get_field('footer_description', 'option');
$phone = get_field('phone', 'option');
$phone_display = get_field('phone_display', 'option');
$email = get_field('email', 'option');
$address = get_field('address', 'option');
?>

<footer class="footer">
	<div class="container tablet-text-center">
		<div class="row u-center">
			<div class="col-sm-12">
				<?php foundationpress_footer_nav(); ?>
			</div>
		</div>
		<div class="row u-center">
			<div class="col-sm-12">
				<div class="partners-logos">
					<a href="https://www.heritagefund.org.uk/"><img src="<?php echo get_theme_file_uri() ?>/dist/img/p-logo1.png" alt="lottery heritage fund logo"></a>
					<a href="<?php echo get_home_url(); ?>"><img src="<?php echo get_theme_file_uri() ?>/dist/img/icon-footer.png" alt="logo" /></a>
					<a href="https://dot-art.co.uk/"><img src="<?php echo get_theme_file_uri() ?>/dist/img/p-logo2.png" alt="dot-art logo"></a>
					<a href="https://openeye.org.uk/"><img src="<?php echo get_theme_file_uri() ?>/dist/img/p-logo4.png" alt="open eye gallery logo"></a>
					<a href="https://www.wigan.gov.uk/"><img src="<?php echo get_theme_file_uri() ?>/dist/img/p-logo5.png" alt="Wigan council"></a>
					<div class="u-flex u-flex-row u-items-center">
						<a href="https://www.wigan.gov.uk/"><img src="<?php echo get_theme_file_uri() ?>/dist/img/p-logo6.png" alt="CC"></a>
						<a href="https://www.wigan.gov.uk/"><img src="<?php echo get_theme_file_uri() ?>/dist/img/p-logo7.png" alt="P"></a>
						
						<p class="small-text">
							TreeStory Wigan digital resources are licensed under a Creative Commons Attribution 4.0 International License (CC-BY 4.0)
							<a href="#">Learn more about this licence</a>
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="row baseline-content">
			<div class="col-sm-12">
				<p class="small-text">TreeStory. Copyright <?php echo date('Y'); ?></p>
			</div>
		</div>
	</div>
	
</footer>
<div id="back-top">
	<span class="icon"><i class="fa fa-arrow-up"></i></span>
</div>
<?php wp_footer(); ?>
</body>

</html>