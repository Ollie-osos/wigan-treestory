<?php

/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 */

// Get ACF vars from options

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<!-- <link rel='dns-prefetch' href='//polyfill.io' /> -->
	<link rel='dns-prefetch' href='//fonts.googleapis.com' />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


	<header class="header u-unselectable">
		<div class="container">
			<div class="header-top">
				<div class="header-brand">
					<div class="nav-item no-hover"><a href="<?php echo get_home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/logo.png" id="nav-logo" alt="Tree story logo" /></a></div>
					<div class="nav-item nav-btn" id="header-btn"><span></span><span></span><span></span></div>
				</div>
				<div class="header-nav" id="header-menu">
					<?php foundationpress_main_nav(); ?>
					<div class="u-flex u-flex-column">
						<div><a href="/share" class="btn small">Share your TreeStory</a></div>
						<div id="aa">
							<span onclick="increaseFontSize()" style="font-size: 20px; font-weight: bold">A+&nbsp;&nbsp;</span>
							<span onclick="decreaseFontSize()" style="font-size: 20px; font-weight: bold">A- </span>
							<span id="contrast-btn">&nbsp;&nbsp;<img src="<?php echo get_template_directory_uri(); ?>/dist/img/contrast.svg" id="contrast-icon" alt="Tree story hig contrast" /></span>
						</div>

					</div>

				</div>
			</div>
		</div>
		<div class="dropdown-background"></div>
	</header>

	<script>
		$(function() {
			var fontSize = $('p').css('font-size');
			console.log(parseInt(fontSize));
		});

		function increaseFontSize() {
			var currentFontSize = parseInt($('p').css('font-size'));
			var currentLineHeight = parseInt($('p').css('line-height'));
			$('p').css('font-size', (currentFontSize + 4) + "px");
			$('p').css('line-height', (currentLineHeight + 4) + "px");
			sessionStorage.setItem('fontSize', currentFontSize);
			sessionStorage.setItem('lineHeight', currentLineHeight);

			var myVariable = sessionStorage.getItem('lineHeight');
			console.log('Session variable:', myVariable);
		}

		function decreaseFontSize() {
			var currentFontSize = parseInt($('p').css('font-size'));
			var currentLineHeight = parseInt($('p').css('line-height'));
			$('p').css('font-size', (currentFontSize - 4) + "px");
			$('p').css('line-height', (currentLineHeight - 4) + "px");
			sessionStorage.setItem('fontSize', currentFontSize);
			sessionStorage.setItem('lineHeight', currentLineHeight);
		}
	</script>