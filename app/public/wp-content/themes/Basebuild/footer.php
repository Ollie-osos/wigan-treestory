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


$youtube_url = get_field('youtube', 'option');
$instagram_url = get_field('instagram', 'option');
$twitter_url = get_field('twitter', 'option');
$facebook_url = get_field('facebook', 'option');
$linkedin_url = get_field('linkedin', 'option');

?>

<footer class="footer">
	<div class="container tablet-text-center">
		<div class="row u-center">
			<div class="col-lg-3 col-md-12">
				<div id="footer-logo"><a href="https://www.heritagefund.org.uk/"><img src="<?php echo get_theme_file_uri() ?>/dist/img/p-logo1.png" alt="lottery heritage fund logo"></a></div>
				<!-- <div class="social-container">
					<a target="_blank" href="<?php // echo $facebook_url ?>"><span class="icon"><i class="fab fa-facebook"></i></span></a>
					<a target="_blank" href="<?php // echo $twitter_url ?>"><span class="icon"><i class="fab fa-twitter"></i></span></a>
					<a target="_blank" href="<?php // echo $linkedin_url ?>"><span class="icon"><i class="fab fa-linkedin"></i></span></a>
					<a target="_blank" href="<?php // echo $instagram_url ?>"><span class="icon"><i class="fab fa-instagram"></i></span></a>
					<a target="_blank" href="<?php // echo $youtube_url ?>"><span class="icon"><i class="fab fa-youtube"></i></span></a>
				</div> -->
			</div>
			<div class="col-lg-4 col-md-12">
				<?php foundationpress_footer_nav1(); ?>
			</div>
			<div class="col-lg-5 col-md-12">
				<div class="partners-logos">
					<a href="<?php echo get_home_url(); ?>"><img src="<?php echo get_theme_file_uri() ?>/dist/img/icon-footer.png" alt="logo" /></a>
					<a href="https://openeye.org.uk/"><img src="<?php echo get_theme_file_uri() ?>/dist/img/p-logo4.png" alt="open eye gallery logo"></a>
					<a href="https://www.merseyforest.org.uk/"><img src="<?php echo get_theme_file_uri() ?>/dist/img/p-logo3.png" alt="mersey forrest logo"></a>
					<a href="https://dot-art.co.uk/"><img src="<?php echo get_theme_file_uri() ?>/dist/img/p-logo2.png" alt="dot-art logo"></a>
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