<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package comet
 */

get_header(); ?>

	<section>
      <div class="container">
        <div class="col-md-8">
          <div class="blog-posts">

          	<h1>Search Results For: <?php _e(get_search_query(), 'comet'); ?></h1>

          <?php if( have_posts() ) : ?>


            <?php while( have_posts() ) : the_post(); ?>

              <?php get_template_part('template-parts/content', get_post_format()); ?>



            <?php endwhile; ?>

          <?php else : ?>

            <h2>No Post Found</h2>

          <?php endif; ?>




          </div>

          

          <?php the_posts_pagination(array(
            'next_text' => '<span aria-hidden="true"><i class="ti-arrow-right"></i></span>',
            'prev_text' => '<span aria-hidden="true"><i class="ti-arrow-left"></i></span>',
            'screen_reader_text' => ' ',
            'type'                => 'list'
          )); ?>

         
        </div>
        <?php get_sidebar(); ?>
    </section>

<?php
get_sidebar();
get_footer();
