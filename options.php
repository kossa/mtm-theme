<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 *
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = 'mtm';

	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);

	// echo $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 */

function optionsframework_options() {

	

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	$options[] = array(
		'name' => __('Header', 'options_check'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Logo', 'options_check'),
		'desc' => __('Please upload your logo', 'options_check'),
		'id' => 'logo_url',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Site tagline', 'options_check'),
		'id' => 'site_tagline',
		'std' => 'Historical, Culturally Diverse, Standards-Based Art Lessons to Inspire Young Artists',
		'type' => 'text');

	$options[] = array(
		'name' => __('Phone number', 'options_check'),
		'id' => 'phone_number',
		'std' => '(949) 215-1064',
		'type' => 'text');

	$options[] = array(
		'name' => __('Facebook', 'options_check'),
		'id' => 'facebook_url',
		'type' => 'text');

	$options[] = array(
		'name' => __('Twitter', 'options_check'),
		'id' => 'twitter_url',
		'type' => 'text');

	$options[] = array(
		'name' => __('Pinterest', 'options_check'),
		'id' => 'pinterest_url',
		'type' => 'text');

	$options[] = array(
		'name' => __('Sections', 'options_check'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Top 10 Title', 'options_check'),
		'id' => 'top_ten_title',
		'std' => 'Top 10 Reasons to Choose Meet the Masters Art Lessons',
		'type' => 'text');

	$options[] = array(
		'name' => __('Top 10 Button Text', 'options_check'),
		'id' => 'top_ten_text',
		'std' => 'Read more reasons',
		'type' => 'text');

	$options[] = array(
		'name' => __('Top 10 Button Link', 'options_check'),
		'id' => 'top_ten_link',
		'std' => '#',
		'type' => 'text');


	$options[] = array(
		'name' => __('Student Gallery Title', 'options_check'),
		'id' => 'student_gallery_title',
		'std' => 'Student Gallery',
		'type' => 'text');

	$options[] = array(
		'name' => __('Student Gallery Button Text', 'options_check'),
		'id' => 'student_gallery_button_text',
		'std' => 'see more',
		'type' => 'text');

	$options[] = array(
		'name' => __('Student Gallery Button Link', 'options_check'),
		'id' => 'student_gallery_button_link',
		'std' => '#',
		'type' => 'text');


	$options[] = array(
		'name' => __('The MTM Value Title', 'options_check'),
		'id' => 'mtm_value_title',
		'std' => 'The MTM Value',
		'type' => 'text');

	$options[] = array(
		'name' => __('The MTM Value SubTitle', 'options_check'),
		'id' => 'mtm_value_sub_title',
		'std' => 'Meet the Masters',
		'type' => 'text');


	$options[] = array(
		'name' => __('Other Art Programs Title', 'options_check'),
		'id' => 'other_art_programs_title',
		'std' => 'Other Art Programs',
		'type' => 'text');

	//require_once("options-example.php");
	
	return $options;
}