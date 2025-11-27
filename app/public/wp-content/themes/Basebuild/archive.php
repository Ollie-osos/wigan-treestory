<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<div class="page">
	<?php if ( have_posts() ) : ?>
		<div class="container"><div class="row">
			<div class="col u-text-center">
				<h1>Page not found...</h1>
			</div>
		</div></div>
		

	<?php endif; // End have_posts() check. ?>
	
</div>

<?php get_footer();
