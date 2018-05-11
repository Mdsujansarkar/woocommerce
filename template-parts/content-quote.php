<?php
/**
 * Template part for displaying quoted posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package comet
 */

?>
<article class="post-single">
  <div class="post-info">
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <h6 class="upper"><span>By</span><a href="<?php echo site_url(); ?>/author/<?php the_author(); ?>"> <?php the_author(); ?></a><span class="dot"></span><span><?php the_time('d F Y'); ?></span><span class="dot"></span><?php the_tags(); ?></h6>
  </div>
  
  <div class="post-body">
    <blockquote class="italic">
      <p><?php the_content(); ?></p>
    </blockquote>
    
  </div>
</article>