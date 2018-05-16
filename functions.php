<?php
/**
 * comet functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package comet
 */

if ( ! function_exists( 'comet_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function comet_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on comet, use a find and replace
	 * to change 'comet' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'comet', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	
	add_theme_support( 'woocommerce' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Main Menu', 'comet' ),
		'footer-menu' => esc_html__( 'Footer Menu', 'comet' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'video',
		'quote',
		'gallery',
		'audio'
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'comet_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );


	// menu register 
	if( current_user_can('manage_options') ) :

		register_post_type('home-slider', array(
			'labels' => array(
				'name' => 'Sliders',
				'add_new' => 'Add New Slider',
				'add_new_item' => 'Add New Slider'
			),
			'public' => true,
			'supports' => array('title', 'thumbnail')
		));

	endif; 



}
endif;
add_action( 'after_setup_theme', 'comet_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function comet_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'comet_content_width', 640 );
}
add_action( 'after_setup_theme', 'comet_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function comet_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'comet' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'comet_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function comet_scripts() {
	wp_enqueue_style( 'comet-bundle', get_template_directory_uri().'/css/bundle.css' );

	wp_enqueue_style( 'comet-stylesheet', get_template_directory_uri().'/css/style.css' );

	wp_enqueue_style( 'comet-style', get_stylesheet_uri() );

	wp_enqueue_style( 'comet-fonts', comet_fonts_url() );



	wp_enqueue_script('html5shim', 'http://html5shim.googlecode.com/svn/trunk/html5.js');
	wp_script_add_data('html5shim', 'conditional', 'lt IE 9');

	wp_enqueue_script('respond', 'https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js');
	wp_script_add_data('respond', 'conditional', 'lt IE 9');





	wp_enqueue_script( 'comet-bundle', get_template_directory_uri() . '/js/bundle.js', array('jquery'), '', true );

	
	wp_enqueue_script( 'comet-googlemap', 'https://maps.googleapis.com/maps/api/js?v=3.exp', array('jquery'), '', true );

	wp_enqueue_script( 'comet-main-js', get_template_directory_uri() . '/js/main.js', array('jquery'), '', true );


	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'comet_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';



/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Load cmb2 metabox
 */
require get_template_directory() . '/inc/metabox/init.php';

/**
 * Load cmb2 config file
 */
require get_template_directory() . '/inc/metabox/config.php';


/** 
* redux framework 
*/

require get_template_directory() . '/inc/options/ReduxCore/framework.php';
require get_template_directory() . '/inc/options/sample/config.php';


// navwalker 



function comet_fonts_url(){


	$fonts = array(
		'Montserrat:400,700',
		'Raleway:300,400,500',
		'Halant:300,400'
	);


	$fonts_url = add_query_arg(array(
		'family' => urlencode( implode('|', $fonts) ),
		'subset' => urlencode( 'latin' )
	), 'https://fonts.googleapis.com/css');

	return $fonts_url;

}






add_action('admin_print_scripts', 'extra_scripts_for_admin_panel', 1000);

function extra_scripts_for_admin_panel(){
	if( get_post_type() == 'post' ) :
	?>
		<script>

			jQuery(document).ready(function(){

					var tanveer = jQuery("input[name='post_format']:checked").attr('id');

					if(tanveer == 'post-format-video'){
						jQuery('.cmb2-id--video-url').show();
					}else{
						jQuery('.cmb2-id--video-url').hide();
					}

					if(tanveer == 'post-format-audio'){
						jQuery('.cmb2-id--audio-url').show();
					}else{
						jQuery('.cmb2-id--audio-url').hide();
					}

					if(tanveer == 'post-format-gallery'){
						jQuery('.cmb2-id--gallery-images').show();
					}else{
						jQuery('.cmb2-id--gallery-images').hide();
					}


				
				
				jQuery('input[name="post_format"]').change(function(){

					var tanveer = jQuery("input[name='post_format']:checked").attr('id');

					if(tanveer == 'post-format-video'){
						jQuery('.cmb2-id--video-url').show();
					}else{
						jQuery('.cmb2-id--video-url').hide();
					}

					if(tanveer == 'post-format-audio'){
						jQuery('.cmb2-id--audio-url').show();
					}else{
						jQuery('.cmb2-id--audio-url').hide();
					}

					if(tanveer == 'post-format-gallery'){
						jQuery('.cmb2-id--gallery-images').show();
					}else{
						jQuery('.cmb2-id--gallery-images').hide();
					}



				});



			})
			

		</script>

	<?php endif;

}




require_once('class_admin_panel_walker.php');
require_once('custom-nav-walker.php');



add_filter('wp_edit_nav_menu_walker', 'admin_panel_er_nav_menu');

function admin_panel_er_nav_menu(){
	return 'Replaced_Menu_Class';
}




add_action('wp_update_nav_menu_item', 'menu_update_korbo', 10, 2);

function menu_update_korbo($menuid, $database_id){

	update_post_meta($database_id, '_each_nav_menu_key', $_REQUEST['submenu-type'][$database_id]);

}



global $wpdb;


if( isset( $_POST['namesubmit'] ) ){

	$tablename = $wpdb->prefix . 'sujan';
	$name = $_POST['naam'];

	$wpdb->insert($tablename, array(
		'name' => $name
	));

}

$id = $_GET['edit'];
$tablename = $wpdb->prefix . 'sujan';
$data = $_POST['naam'];

if( isset( $_POST['nameupdate'] ) ){

	$wpdb->update($tablename, array(
		'name' => $data
	),
	array(
		'id' => $id
	));

}




add_filter('comment_form_default_fields', 'comet_comment_form');

function comet_comment_form( $default ){
	
	$default['author'] = '<div class="form-double">
                  <div class="form-group">
                    <input name="author" type="text" placeholder="Name" class="form-control">
                  </div>';

    $default['email'] = '<div class="form-group last">
                    <input name="email" type="text" placeholder="Email" class="form-control">
                  </div>
                </div>';

    $default['sujan'] = '<div class="form-group">
                  <textarea placeholder="Comment" class="form-control" name="comment"></textarea>
                </div>';

    $default['url'] = '';

    $default['address'] = '<div class="form-group">
                  <textarea placeholder="Address" class="form-control" name="address"></textarea>
                </div>';

	return $default;

}


add_filter('comment_form_defaults', 'comet_default_comment_form');

function comet_default_comment_form( $default_info ){


	if( !is_user_logged_in() ){
		$default_info['comment_field'] = '';
	}else {
		$default_info['comment_field'] = '<div class="form-group">
                  <textarea placeholder="Comment" class="form-control" name="comment"></textarea>
                </div>';
	}
	

	$default_info['submit_button'] = '<button type="submit" class="btn btn-color-out">Post Comment</button>';

	$default_info['submit_field'] = '<div class="form-submit text-right">%1$s %2$s</div>';

	$default_info['comment_notes_before'] = '';

	$default_info['title_reply'] = 'leave a comment';

	$default_info['title_reply_before'] = '<h5 class="upper">';
	$default_info['title_reply_after'] = '</h5>';

	return $default_info;
}




add_action('comment_post', 'address_save_korbo');

function address_save_korbo( $id ){

	add_comment_meta($id, 'address_field', $_POST['address']);

}


add_action('add_meta_boxes_comment', 'address_field_add');

function address_field_add(){
	add_meta_box('address', 'Address', 'address_callback', 'comment', 'normal', 'high');
}


function address_callback( $comment ){
	?>
	<table class="form-table editcomment">
		<tbody>
			<tr>
				<td class="first"><label for="name">Address:</label></td>
				<td><input name="newcomment_address" size="30" value="<?php echo get_comment_meta($comment->comment_ID, 'address_field', true); ?>" id="name" type="text"></td>
			</tr>
		</tbody>
	</table>
	<?php 
}





function test_something_show_korabo($comment, $arg, $depth){

	$GLOBALS['comment'] = $comment;


	?>

	<li id="comment-<?php comment_ID(); ?>">
        <div <?php comment_class('comment'); ?>>
          <div class="comment-pic">

          	<?php 

          		echo get_avatar( $comment, 80, '', '', array(
          			'class' => 'img-circle'
          		) ); 

          	?>

          </div>
          <div class="comment-text">
            <h5 class="upper"><?php echo get_comment_author(); ?></h5><span class="comment-date">Posted on <?php comment_date('d F'); ?> at <?php comment_time('g:i a'); ?></span>
            <p><?php comment_text(); ?></p>
			<div class="reply">
				<?php 
					comment_reply_link(
						array_merge($arg, array(
							'depth' => $depth, 
							'max_depth' => $arg['max_depth']
						))
					);
				?>
			</div>

          </div>
        </div>
    </li>

	<?php 
}



//remove_action('woocommerce_before_checkout_form','woocommerce_checkout_login_form',10);
//remove_action('woocommerce_before_checkout_form','woocommerce_checkout_coupon_form',10);



// Our hooked in function - $fields is passed via the filter!
add_filter( 'woocommerce_checkout_fields' , 'set_input_attrs' );

// Our hooked in function - $fields is passed via the filter!
function set_input_attrs( $fields ) {
       $fields['billing']['billing_email']['type'] = 'email';
       $fields['billing']['billing_phone']['type'] = 'tel';
       $fields['billing']['billing_postcode']['type'] = 'tel';
       $fields['shipping']['shipping_postcode']['type'] = 'tel';

       return $fields;
  }
// for shortcodes 

require_once('inc/shortcodes.php');
// before header
add_action('woocommerce_archive_description','header_before',10);
function header_before(){ ?>
   <section class="page-title parallax">
      <div data-parallax="scroll" data-image-src="<?php echo get_template_directory_uri(); ?>/images/bg/19.jpg" class="parallax-bg"></div>
      <div class="parallax-overlay">
        <div class="centrize">
          <div class="v-center">
            <div class="container">
              <div class="title center">
                <h1 class="upper"><?php woocommerce_page_title(); ?></h1>
                <h4>Free Delivery Worldwide.</h4>
                <hr>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<?php }

add_action('add_meta_boxes', function(){
add_meta_box('page-info','page information','all_page_information','page','normal');
});


function all_page_information(){ ?>
	<p>
		 <label for="page-title">page title</label><br />
         <input type="text" id="page-title" name="pa_title" class="widefat" value="<?php echo get_post_meta(get_the_id(),'_post_title_', true); ?>">
	</p>
	<p>
		 <label for="page-title">page sub title</label><br />
         <input type="text" id="page-title" name="pa_sub_title" class="widefat" value="<?php echo get_post_meta(get_the_id(),'_post_sub_title_', true); ?>">
	</p>
	<p> 
     <label for="onff">Show the sub header</label>
     <input type="checkbox"  name="onff" value="show" <?php $subHeaderCon = get_post_meta(get_the_id(),'_chck_title_', true);
        if($subHeaderCon == 'show'){ echo "checked"; }

      ?>>
	</p>

<?php }

add_action('save_post', function(){
 $pageTitle = $_REQUEST['pa_title'];
 $subPageTi = $_REQUEST['pa_sub_title'];
 $checkBox =$_REQUEST['onoff'];

 update_post_meta(get_the_id(),'_post_title_',$pageTitle);

 update_post_meta(get_the_id(),'_post_sub_title_',$subPageTi);

 update_post_meta(get_the_id(),'_chck_title_',$checkBox);
});

add_action('woocommerce_before_shop_loop','before_loop_markup');

function before_loop_markup(){
	?>
    <section>
      <div class="container">
<?php }

add_action('woocommerce_after_shop_loop','affter_shop_loop');
function affter_shop_loop(){
	?>
</div>
</section>>
	<?php
}
// woocommerce before shop loop

add_action('woocommerce_before_shop_loop','woo_before',10);
function woo_before(){ ?>
  <section>
  	<div class="contaier">
  	<div class="shop-menu">

  		<?php }

  	add_action('woocommerce_before_shop_loop','catalog_ordering_before',29);
function catalog_ordering_before(){ ?>
	
  	<div class="col-md-4 col-sm-4">
            <div class="row">
              <div class="form-select">

  		<?php }
  		  	add_action('woocommerce_before_shop_loop','catalog_ordering_after',31);
function catalog_ordering_after(){ ?>
	
  	</div>
            </div>
              </div>
              </div>

  		<?php }  


// woocommerc before shop 


//woocommerce after markup 
add_action('woocommerce_after_shop_loop','woo_after',10);
function woo_after(){ ?>
	</div>
  </section>
  	

  		<?php } 		







