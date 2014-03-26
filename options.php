<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	$options = array();

	
	$options[] = array(
		'name' => __('Social Media', 'options_framework_theme'),
 		'type' => 'heading');
 
 	$options[] = array(
		'name' => __('Facebook Link', 'options_framework_theme'),
		'desc' => __('Paste the URL.', 'options_framework_theme'),
		'id' => 'facebook_link',
		'std' => 'http://www.facebook.com/',
 		'type' => 'text');
 
 	$options[] = array(
		'name' => __('Twitter Link', 'options_framework_theme'),
		'desc' => __('Paste the URL.', 'options_framework_theme'),
		'id' => 'twitter_link',
		'std' => 'http://www.twitter.com/',
 		'type' => 'text');
 
 	$options[] = array(
		'name' => __('LinkedIn Link', 'options_framework_theme'),
		'desc' => __('Paste the URL.', 'options_framework_theme'),
		'id' => 'linkedin_link',
		'std' => 'http://www.linkedin.com/',
		'type' => 'text');

 
 	$options[] = array(
		'name' => __('Instagram Link', 'options_framework_theme'),
		'desc' => __('Paste the URL.', 'options_framework_theme'),
		'id' => 'instagram_link',
		'std' => 'http://www.instagram.com/',
		'type' => 'text');
		
		
	$options[] = array(
		'name' => __('Branding', 'options_framework_theme'),
 		'type' => 'heading');
 		
 	$options[] = array(
		'name' => __('Upload Logo', 'options_framework_theme'),
		'desc' => __('Upload your logo.', 'options_framework_theme'),
		'id' => 'logo_uploader',
		'type' => 'upload');	

	$options[] = array(
		'name' => __('Background Color', 'options_framework_theme'),
		'desc' => __('It can replace the red background color with your choosen color.', 'options_framework_theme'),
		'id' => 'bg_custom_color',
		'std' => '',
		'type' => 'color' );
	
	$options[] = array(
		'name' => __('Font Color', 'options_framework_theme'),
		'desc' => __('When you change the background color, you might need to change the font color.', 'options_framework_theme'),
		'id' => 'font_custom_color',
		'std' => '',
		'type' => 'color' );
		
	$options[] = array(
		'name' => __('Link Color', 'options_framework_theme'),
		'desc' => __('When you change the background color, you might need to change the font color.', 'options_framework_theme'),
		'id' => 'link_custom_color',
		'std' => '',
		'type' => 'color' );
		
	$options[] = array(
		'name' => __('Primary Button', 'options_framework_theme'),
		'desc' => __('Change the color of the primary button.', 'options_framework_theme'),
		'id' => 'primary_btn',
		'std' => '',
		'type' => 'color' );
	
	$options[] = array(
		'name' => __('Secondary Button', 'options_framework_theme'),
		'desc' => __('Change the color of the secondary button.', 'options_framework_theme'),
		'id' => 'secondary_btn',
		'std' => '',
		'type' => 'color' );
    
    /* $options[] = array(
		'name' => __('Settings', 'options_framework_theme'),
 		'type' => 'heading');
    */
    
	return $options;
}