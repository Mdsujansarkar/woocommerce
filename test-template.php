<?php 

/* template name: test template */

get_header(); ?>


<?php 

$currentpage = get_query_var('paged') ? get_query_var('paged') : 1;

$posts = new WP_Query(array(
	'post_type' => 'post',
	'posts_per_page' => 2,
	'paged' 		=> $currentpage
));

while($posts->have_posts()) : $posts->the_post(); ?>

<h3><?php the_title(); ?></h3>

<?php endwhile; ?>

<div class="pagination">
<?php 


echo $prottekpageapost;


echo paginate_links(array(
	'current' => $currentpage,
	'total' => $posts->max_num_pages,
	'type' => 'list',
)); ?>
</div>

<?php get_footer(); ?>