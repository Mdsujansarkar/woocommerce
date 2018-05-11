<?php 



add_shortcode('home-slider', 'commet_home_slider');

function commet_home_slider($attr, $content){

	ob_start(); ?>

	<section id="home">
      <div id="home-slider" class="flexslider">
        <ul class="slides">
          

		<?php 

		$attributes = shortcode_atts(array(
			'count' => 3
		), $attr);

		extract($attributes);

		$sliders = new WP_Query(array(
			'post_type' => 'home-slider',
			'posts_per_page' => $count
		));
		while($sliders->have_posts()) : $sliders->the_post(); ?>

          <li><?php the_post_thumbnail(); ?>
            <div class="slide-wrap">
              <div class="slide-content">
                <div class="container">
                  <h1><?php the_title(); ?><span class="red-dot"></span></h1>
                  <h6><?php echo get_post_meta(get_the_ID(), '_slider-subtitle', true); ?></h6>
                  <p>
                  	<a href="<?php echo get_post_meta(get_the_ID(), '_first-button-url', true); ?>" class="btn <?php echo get_post_meta(get_the_ID(), '_first-button-color', true); ?>"><?php echo get_post_meta(get_the_ID(), '_first-button-text', true); ?></a>
                  	<a href="<?php echo get_post_meta(get_the_ID(), '_second-button-url', true); ?>" class="btn <?php echo get_post_meta(get_the_ID(), '_second-button-color', true); ?>"><?php echo get_post_meta(get_the_ID(), '_second-button-text', true); ?></a>
                  </p>
                </div>
              </div>
            </div>
          </li>

        <?php endwhile; ?>



        </ul>
      </div>
    </section>

	<?php 

	$value = ob_get_clean();

	return $value;

}