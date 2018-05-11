<?php 



add_action('cmb2_admin_init', 'metabox_for_comet');

function metabox_for_comet(){


	$section = new_cmb2_box(array(
		'title' 		=> 'Fields According to Post Format',
		'object_types' 	=> array('post'),
		'id' 			=> 'fields-for-posts'
	));


	$section->add_field(array(
		'name' 	=> 'Video URL',
		'id' 	=> '_video-url',
		'type'	=> 'oembed'
	));

	$section->add_field(array(
		'name' 	=> 'Audio URL',
		'id' 	=> '_audio-url',
		'type'	=> 'oembed'
	));

	$section->add_field(array(
		'name' 	=> 'Gallery Images',
		'id' 	=> '_gallery-images',
		'type'	=> 'file_list'
	));


	$sectionslider = new_cmb2_box(array(
		'title' => 'Slider Informations',
		'object_types' => array('home-slider'),
		'id' => 'home-slider-metaboxes'
	));

	$sectionslider->add_field(array(
		'name' 	=> 'Subtitle',
		'id' 	=> '_slider-subtitle',
		'type' 	=> 'text'
	));

	$sectionslider->add_field(array(
		'name' 	=> 'First Button Text',
		'id' 	=> '_first-button-text',
		'type' 	=> 'text'
	));

	$sectionslider->add_field(array(
		'name' 	=> 'First Button color',
		'id' 	=> '_first-button-color',
		'type' 	=> 'select',
		'options' => array(
				'btn-color btn-full' => 'red',
				'btn-light-out' => 'white'
			)
	));

	$sectionslider->add_field(array(
		'name' 	=> 'First Button URL',
		'id' 	=> '_first-button-url',
		'type' 	=> 'text_url'
	));

	$sectionslider->add_field(array(
		'name' 	=> 'Second Button Text',
		'id' 	=> '_second-button-text',
		'type' 	=> 'text'
	));

	$sectionslider->add_field(array(
		'name' 	=> 'Second Button color',
		'id' 	=> '_second-button-color',
		'type' 	=> 'select',
		'options' => array(
				'btn-color btn-full' => 'red',
				'btn-light-out' => 'white'
			)
	));

	$sectionslider->add_field(array(
		'name' 	=> 'Second Button URL',
		'id' 	=> '_second-button-url',
		'type' 	=> 'text_url'
	));







}	