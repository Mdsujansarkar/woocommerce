<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package comet
 */

get_header(); ?>

	
    <section class="page-title parallax">
      <div data-parallax="scroll" data-image-src="<?php global $comet; echo $comet['blog-header-image']['url']; ?>" class="parallax-bg"></div>
      <div class="parallax-overlay">
        <div class="centrize">
          <div class="v-center">
            <div class="container">
              <div class="title center">
                <h1 class="upper"><?php echo $comet['blog-header-title']; ?><span class="red-dot"></span></h1>
                <h4><?php echo $comet['blog-header-subtitle']; ?></h4>
                <hr>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>




    <section>
      <div class="container">
        <div class="col-md-8">
          <div class="blog-posts">

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
get_footer();
