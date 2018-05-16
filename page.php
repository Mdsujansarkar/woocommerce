<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package comet
 */

get_header(); ?>

		<a href="#">cart</a>
	<?php while(have_posts()) : the_post(); ?>
		
	
		
		<?php the_content(); ?>

	<?php endwhile; ?>


<?php get_footer();
