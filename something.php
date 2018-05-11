<?php

/*
template name: a demo template
*/






global $wpdb;


?>



<?php if ( is_user_logged_in() && current_user_can('delete_others_pages') ) : ?>
<form action="" method="POST">
	
	<input type="text" name="naam" placeholder="please type your name">

	<input type="submit" value="submit" name="namesubmit">

</form>
<?php endif; ?>


<p></p>
<br>
<hr>

<?php 

	global $wpdb;

	$tablename = $wpdb->prefix . 'sujan';

	$infos = $wpdb->get_results("SELECT * FROM $tablename");

	foreach($infos as $info){
		$id = $info->id;
		$editlink = '?edit='.$id;
		$deletelink = '?delete='.$id;
		echo $id . ' ' . $info->name . '<a href="'.$editlink.'">edit</a>' . ' <a href="'.$deletelink.'">delete</a>' . "<br />";
 


	}



?>



<br>
<hr>

<?php if( isset( $_GET['edit'] ) ) : ?>


<?php 

	$id = $_GET['edit'];

	$value = $wpdb->get_var("SELECT name FROM $tablename WHERE id = $id");

?>

<form action="" method="POST">
	
	<input type="text" name="naam" placeholder="please type your name" value="<?php echo $value; ?>">

	<input type="submit" value="submit" name="nameupdate">

</form>
<?php endif; ?>




<?php 

	$deleteid = isset( $_GET['delete'] ) ? $_GET['delete'] : '';

	if(!empty($deleteid)){
		$wpdb->delete($tablename, array(
				'id' => $deleteid
			));

		global $post;
		$id = $post->ID;
		wp_redirect(get_page_link($id));
	}
	


?>