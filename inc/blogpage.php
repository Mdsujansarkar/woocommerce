<?php
/**
* Template Name: Blog Page
*/

get_header(); ?>

<div class="page_content_wrap page_paddings_yes">

<div class="blog-container">

 <div class="big-posts">
        <?php 
            // prevent implode error
            if (empty($cleaning_services_options['cleaning_services_featured_post_cat']) || !is_array($cleaning_services_options['cleaning_services_featured_post_cat'])) {
                $cleaning_services_options['cleaning_services_featured_post_cat'] = array('0');
            }
            $i = 1;
            $post_cat = implode(",", $cleaning_services_options['cleaning_services_featured_post_cat']);
            $my_query = new WP_Query('cat='.$post_cat.'&posts_per_page=4&ignore_sticky_posts=1');
            while ($my_query->have_posts()) : $my_query->the_post();

            $featured_class = isset($i) ? ' class="latestPost excerpt big-'.$i.'"' : 'latestPost excerpt';
        ?>
        <?php $featured_image = array('');?>
        <?php if( $i == 1 ) { ?>
            <?php if ( has_post_thumbnail() ) { $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'featured-post-1' ); } ?>
            <article<?php echo $featured_class; ?> style="background-image: url('<?php echo $featured_image[0]; ?>');" itemscope itemtype="http://schema.org/BlogPosting">
                <meta itemprop="image" content="<?php echo esc_attr( $featured_image[0] ); ?>">
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                    <header>
                       <div class="post-info">
                           <span class="thecategory"><?php $category = get_the_category(); echo $category[0]->cat_name; ?></span>
                           <meta itemprop="datePublished" content="<?php the_time( get_option( 'date_format' ) ); ?>">
                        </div>
                       <h2 class="title front-view-title" itemprop="headline"><?php the_title(); ?></h2>
                        <div class="front-view-content">
                          <?php echo the_excerpt(18); ?>
                        </div> 
                    </header>
                </a>
            </article>
        <?php } ?>
        <?php if( $i == 2 ) { ?>
            <?php if ( has_post_thumbnail() ) { $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'featured-post-2' ); } ?>
            <article<?php echo $featured_class; ?> style="background-image: url('<?php echo $featured_image[0]; ?>');" itemscope itemtype="http://schema.org/BlogPosting">
                <meta itemprop="image" content="<?php echo esc_attr( $featured_image[0] ); ?>">
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                    <header>
                       <div class="post-info">
                           <span class="thecategory"><?php $category = get_the_category(); echo $category[0]->cat_name; ?></span>
                           <meta itemprop="datePublished" content="<?php the_time( get_option( 'date_format' ) ); ?>">
                        </div>
                       <h2 class="title front-view-title" itemprop="headline"><?php the_title(); ?></h2>
                        <div class="front-view-content">
                          <?php echo the_excerpt(11); ?>
                        </div> 
                    </header>
                </a>
            </article>
        <?php } ?>
        <?php if( $i == 3 || $i == 4 ) { ?>
            <?php if ( has_post_thumbnail() ) { $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'featured-post-3' ); } ?>
            <article<?php echo $featured_class; ?> style="background-image: url('<?php echo $featured_image[0]; ?>');" itemscope itemtype="http://schema.org/BlogPosting">
                <meta itemprop="image" content="<?php echo esc_attr( $featured_image[0] ); ?>">
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                    <header>
                       <div class="post-info">
                           <span class="thecategory"><?php $category = get_the_category(); echo $category[0]->cat_name; ?></span>
                           <meta itemprop="datePublished" content="<?php the_time( get_option( 'date_format' ) ); ?>">
                        </div>
                       <h2 class="title front-view-title" itemprop="headline"><?php the_title(); ?></h2>
                    </header>
                </a>
            </article>
        <?php } ?>
        <?php $i++; endwhile; wp_reset_query(); ?>
    </div>
</div>
</div>
<!-- END #big-posts -->
<div class="motopress-wrapper content-holder clearfix">
	<div class="container">
		<div class="row">

   
        <?php query_posts('post_type=post&post_status=publish&posts_per_page=10&paged='. get_query_var('paged')); ?>

	<?php if( have_posts() ): ?>

        <?php while( have_posts() ): the_post(); ?>

	    <div id="post-<?php get_the_ID(); ?>" <?php post_class(); ?>>

        	<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( array(200,220) ); ?></a>

                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>


		<?php the_excerpt(__('Continue reading »','example')); ?>

            </div><!-- /#post-<?php get_the_ID(); ?> -->

        <?php endwhile; ?>

		<div class="navigation">
			<span class="newer"><?php previous_posts_link(__('« Newer','example')) ?></span> <span class="older"><?php next_posts_link(__('Older »','example')) ?></span>
		</div><!-- /.navigation -->

	<?php else: ?>

		<div id="post-404" class="noposts">

		    <p><?php _e('None found.','example'); ?></p>

	    </div><!-- /#post-404 -->

	<?php endif; wp_reset_query(); ?>

	</div><!-- /#content -->
</div>
<?php get_template_part('blog');?>
<?php get_sidebar( 'show_sidebar_main' ); ?> 


<?php get_footer(); ?>

