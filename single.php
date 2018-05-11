<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
        <div class="col-md-8 col-md-offset-2">
          
		<?php while(have_posts()) : the_post(); ?>
          <article class="post-single">
            <div class="post-info text-center">
              <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
              <h6 class="upper"><span>By</span><a href="#"> <?php the_author(); ?></a><span class="dot"></span><span><?php the_time('d F Y'); ?></span><span class="dot"></span><?php the_tags(); ?></h6>
            </div>
            <div class="post-media">

              

              <?php the_post_thumbnail(); ?>
            </div>
            <div class="post-body">
              <?php the_content(); ?>
            </div>
          </article>
         <?php endwhile; ?>
		<hr>
		

		<?php comments_template(); ?>



          
        </div>
      </div>
    </section>


<?php get_footer(); ?>