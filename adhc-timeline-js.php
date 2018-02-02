<?php
/*
Plugin Name: ADHC Timeline JS Plugin
Plugin URI:
Description: Custom Timeline Entry post type. Include shortcode to render timelines and single entries.
Author: Tyler Grace (ADHC)
Version: 2.5.2
Author URI:
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


// Register Timeline Entry Custom Post Type
function adhc_timeline_post_type() {
	$labels = array(
		"name" => __( 'Timeline Entries', '' ),
		"singular_name" => __( 'Timeline Entry', '' ),
	);
	$args = array(
		'label'                 => __( 'Timeline Entry', '' ),
		'description'           => "",
		'labels'                => $labels,
		'supports'              => array( ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 2,
		"menu_icon" 			=> "dashicons-clock",
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		"taxonomies" => array( "category", "post_tag" ),
	);
	register_post_type( 'timeline-entries', $args );
}
add_action( 'init', 'adhc_timeline_post_type', 0 );


function my_acf_add_local_field_groups() {

	acf_add_local_field_group(array (
		'key' => 'group_58a22f0a3f876',
		'title' => 'Timeline Entries',
		'fields' => array (
			array (
				'key' => 'field_569953563d759',
				'label' => 'Body',
				'name' => 'body',
				'type' => 'textarea',
				'instructions' => 'This is where you add your write-up of the event which you are adding to the timeline.',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'new_lines' => '',
			),
			array (
				'key' => 'field_5a67645ad6229',
				'label' => 'Entry JSON',
				'name' => 'entry_json',
				'type' => 'textarea',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				// 'conditional_logic' => array(
				//     array(
				//         array(
				//             'field' => '',
				//             'operator' => '==',
				//         ),
				//         array(
				//             'field' => '',
				//             'operator' => '==',
				//         ),
				//     ),
				// ),
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'new_lines' => '',
			),
			array (
				'key' => 'field_592310d4ac3bd',
				'label' => 'Full Post',
				'name' => 'full_post',
				'type' => 'post_object',
				'instructions' => 'Link to full post text if applicable',
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => '',
							'operator' => '==',
						),
						array(
							'field' => '',
							'operator' => '==',
						),
					),
				),
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'post_type' => array (
					0 => 'post',
				),
				'taxonomy' => array (
				),
				'allow_null' => 0,
				'multiple' => 0,
				'return_format' => 'object',
				'ui' => 1,
			),
			array (
				'key' => 'field_56995a32559f3',
				'label' => 'Dates',
				'name' => '',
				'type' => 'tab',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'placement' => 'top',
				'endpoint' => 0,
			),
			array (
				'key' => 'field_5699539f3d75a',
				'label' => 'Are you adding a one-time event, or one which lasted for a long span of time?',
				'name' => 'event_type',
				'type' => 'select',
				'instructions' => 'For example, a date of birth of an important person would be a one-time event as it occurs on just one day; a war lasting multiple days would be a long-running event. If you are dealing with a one-time event like a publication date which probably won\'t have a specific day on which it occurred, choose "one-time event" and just select a single year for your date.',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array (
					'Event' => 'One-time event',
					'Period' => 'Long-running event',
				),
				'default_value' => array (
				),
				'allow_null' => 1,
				'multiple' => 0,
				'ui' => 1,
				'ajax' => 0,
				'return_format' => 'value',
				'placeholder' => '',
			),
			array (
				'key' => 'field_58a5e7c0ae69e',
				'label' => 'COL 1',
				'name' => 'col_1',
				'type' => 'column',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'column-type' => '1_3',
			),
			array (
				'key' => 'field_569953d97720a',
				'label' => 'Event Year',
				'name' => 'event_year',
				'type' => 'number',
				'instructions' => '',
				'required' => 1,
				'conditional_logic' => array (
					array (
						array (
							'field' => 'field_5699539f3d75a',
							'operator' => '==',
							'value' => 'Event',
						),
					),
				),
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => 1,
			),
			array (
				'key' => 'field_58a5e7f5ae69f',
				'label' => 'COL 2',
				'name' => 'col_2',
				'type' => 'column',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'column-type' => '1_3',
			),
			array (
				'key' => 'field_569954da4486d',
				'label' => 'Event Month',
				'name' => 'event_month',
				'type' => 'number',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array (
					array (
						array (
							'field' => 'field_5699539f3d75a',
							'operator' => '==',
							'value' => 'Event',
						),
					),
				),
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => 1,
				'max' => 12,
				'step' => 1,
			),
			array (
				'key' => 'field_58a5e814ae6a0',
				'label' => 'COL 3',
				'name' => 'col_3',
				'type' => 'column',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'column-type' => '1_3',
			),
			array (
				'key' => 'field_569955134486e',
				'label' => 'Event Day',
				'name' => 'event_day',
				'type' => 'number',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array (
					array (
						array (
							'field' => 'field_5699539f3d75a',
							'operator' => '==',
							'value' => 'Event',
						),
					),
				),
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => 1,
				'max' => 31,
				'step' => 1,
			),
			array (
				'key' => 'field_58a5e825ae6a1',
				'label' => 'ROW END',
				'name' => '_copy',
				'type' => 'column',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'column-type' => '1_1',
			),
			array (
				'key' => 'field_58a5e8552008d',
				'label' => 'COL 1',
				'name' => '_copy',
				'type' => 'column',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'column-type' => '1_3',
			),
			array (
				'key' => 'field_569955ff23146',
				'label' => 'Start Year',
				'name' => 'event_start_year',
				'type' => 'number',
				'instructions' => '',
				'required' => 1,
				'conditional_logic' => array (
					array (
						array (
							'field' => 'field_5699539f3d75a',
							'operator' => '==',
							'value' => 'Period',
						),
					),
				),
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => 1,
			),
			array (
				'key' => 'field_58a5e8612008e',
				'label' => 'COL 2',
				'name' => '_copy',
				'type' => 'column',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'column-type' => '1_3',
			),
			array (
				'key' => 'field_569956b13b9a1',
				'label' => 'Start Month',
				'name' => 'event_start_month',
				'type' => 'number',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array (
					array (
						array (
							'field' => 'field_5699539f3d75a',
							'operator' => '==',
							'value' => 'Period',
						),
					),
				),
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => 1,
				'max' => 12,
				'step' => 1,
			),
			array (
				'key' => 'field_58a5e8682008f',
				'label' => 'COL 3',
				'name' => '_copy',
				'type' => 'column',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'column-type' => '1_3',
			),
			array (
				'key' => 'field_569956cd3b9a2',
				'label' => 'Start Day',
				'name' => 'event_start_day',
				'type' => 'number',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array (
					array (
						array (
							'field' => 'field_5699539f3d75a',
							'operator' => '==',
							'value' => 'Period',
						),
					),
				),
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => 1,
				'max' => 31,
				'step' => 1,
			),
			array (
				'key' => 'field_58a5e87120090',
				'label' => 'ROW END',
				'name' => '_copy',
				'type' => 'column',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'column-type' => '1_1',
			),
			array (
				'key' => 'field_58a5e890d7ad4',
				'label' => 'COL 1',
				'name' => '_copy',
				'type' => 'column',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'column-type' => '1_3',
			),
			array (
				'key' => 'field_569956e43b9a3',
				'label' => 'End Year',
				'name' => 'event_end_year',
				'type' => 'number',
				'instructions' => '',
				'required' => 1,
				'conditional_logic' => array (
					array (
						array (
							'field' => 'field_5699539f3d75a',
							'operator' => '==',
							'value' => 'Period',
						),
					),
				),
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => 1,
			),
			array (
				'key' => 'field_58a5e8a2d7ad6',
				'label' => 'COL 2',
				'name' => '_copy',
				'type' => 'column',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'column-type' => '1_3',
			),
			array (
				'key' => 'field_569956ff3b9a4',
				'label' => 'End Month',
				'name' => 'event_end_month',
				'type' => 'number',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array (
					array (
						array (
							'field' => 'field_5699539f3d75a',
							'operator' => '==',
							'value' => 'Period',
						),
					),
				),
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => 1,
				'max' => 12,
				'step' => 1,
			),
			array (
				'key' => 'field_58a5e8ad9b23c',
				'label' => 'COL 3',
				'name' => '_copy',
				'type' => 'column',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'column-type' => '1_3',
			),
			array (
				'key' => 'field_569957273b9a5',
				'label' => 'End Day',
				'name' => 'event_end_day',
				'type' => 'number',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array (
					array (
						array (
							'field' => 'field_5699539f3d75a',
							'operator' => '==',
							'value' => 'Period',
						),
					),
				),
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => 1,
				'max' => 31,
				'step' => 1,
			),
			array (
				'key' => 'field_58a5e898d7ad5',
				'label' => 'ROW END',
				'name' => '_copy',
				'type' => 'column',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'column-type' => '1_1',
			),
			array (
				'key' => 'field_56995a06559f2',
				'label' => 'Media',
				'name' => '',
				'type' => 'tab',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'placement' => 'top',
				'endpoint' => 0,
			),
			array (
				'key' => 'field_56cb2388c14d8',
				'label' => 'Media Source',
				'name' => 'media_source',
				'type' => 'select',
				'instructions' => 'Here you can insert material from online resources including YouTube, Twitter, Flickr, Google Maps, SoundCloud, and more.',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array (
					'None' => 'None',
					'DocumentCloud' => 'DocumentCloud',
					'DropBox' => 'DropBox',
					'Flickr' => 'Flickr',
					'Google Maps' => 'Google Maps',
					'Image' => 'Image',
					'Imgur' => 'Imgur',
					'Instagram' => 'Instagram',
					'SoundCloud' => 'SoundCloud',
					'Storify' => 'Storify',
					'Twitter' => 'Twitter',
					'Vimeo' => 'Vimeo',
					'Vine' => 'Vine',
					'Wikipedia' => 'Wikipedia',
					'YouTube' => 'YouTube',
				),
				'default_value' => array (
				),
				'allow_null' => 1,
				'multiple' => 0,
				'ui' => 1,
				'ajax' => 0,
				'return_format' => 'value',
				'placeholder' => '',
			),
			array (
				'key' => 'field_59230e29cdac8',
				'label' => 'Image Upload or Link?',
				'name' => 'image_upload_or_link',
				'type' => 'radio',
				'instructions' => 'Will you be uploading the image or using an image from elsewhere on the internet?',
				'required' => 1,
				'conditional_logic' => array (
					array (
						array (
							'field' => 'field_56cb2388c14d8',
							'operator' => '==',
							'value' => 'Image',
						),
					),
				),
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array (
					'image_upload' => 'Image Upload',
					'image_link' => 'Image Link',
				),
				'allow_null' => 0,
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'image_link',
				'layout' => 'horizontal',
				'return_format' => 'value',
			),
			array (
				'key' => 'field_59230f32d89ae',
				'label' => 'Image Upload',
				'name' => 'image_upload',
				'type' => 'image',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array (
					array (
						array (
							'field' => 'field_56cb2388c14d8',
							'operator' => '==',
							'value' => 'Image',
						),
						array (
							'field' => 'field_59230e29cdac8',
							'operator' => '==',
							'value' => 'image_upload',
						),
					),
				),
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
				'min_width' => '',
				'min_height' => '',
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => 10,
				'mime_types' => '',
			),
			array (
				'key' => 'field_56c79f45cacfe',
				'label' => 'Media Link',
				'name' => 'media_link',
				'type' => 'url',
				'instructions' => 'Valid URL link from the selected source above.',
				'required' => 0,
				'conditional_logic' => array (
					array (
						array (
							'field' => 'field_56cb2388c14d8',
							'operator' => '!=',
							'value' => 'None',
						),
						array (
							'field' => 'field_56cb2388c14d8',
							'operator' => '!=',
							'value' => '',
						),
						array (
							'field' => 'field_59230e29cdac8',
							'operator' => '!=',
							'value' => 'image_upload',
						),
					),
				),
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
			),
			array (
				'key' => 'field_569958b2c0e27',
				'label' => 'Media Caption',
				'name' => 'media_caption',
				'type' => 'text',
				'instructions' => 'Add a brief caption describing what your media portrays; this is to enable everyone to have access to this material.',
				'required' => 0,
				'conditional_logic' => array (
					array (
						array (
							'field' => 'field_56cb2388c14d8',
							'operator' => '!=',
							'value' => 'None',
						),
						array (
							'field' => 'field_56cb2388c14d8',
							'operator' => '!=',
							'value' => '',
						),
					),
				),
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array (
				'key' => 'field_569958202a283',
				'label' => 'Media Credit',
				'name' => 'media_credit',
				'type' => 'text',
				'instructions' => 'Here you add the citation details for the media which you are using.',
				'required' => 0,
				'conditional_logic' => array (
					array (
						array (
							'field' => 'field_56cb2388c14d8',
							'operator' => '!=',
							'value' => 'None',
						),
						array (
							'field' => 'field_56cb2388c14d8',
							'operator' => '!=',
							'value' => '',
						),
					),
				),
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'timeline-entries',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'acf_after_title',
		'style' => 'seamless',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => array (
			0 => 'permalink',
			// 1 => 'the_content',
			2 => 'excerpt',
			3 => 'custom_fields',
			4 => 'discussion',
			5 => 'comments',
			6 => 'format',
			7 => 'featured_image',
			8 => 'categories',
			9 => 'tags',
			10 => 'send-trackbacks',
		),
		'active' => 1,
		'description' => '',
	));

	acf_add_local_field_group(array(
		'key' => 'group_5a70cebf2432c',
		'title' => 'Timeline Page Template',
		'fields' => array(
			array(
				'key' => 'field_5a70f3355b935',
				'label' => 'The timeline will appear at the top of the page. All other content will appear below it.',
				'name' => '',
				'type' => 'message',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'message' => '',
				'new_lines' => 'wpautop',
				'esc_html' => 0,
			),
			array(
				'key' => 'field_5a70f41db2050',
				'label' => 'Selected Category(s)',
				'name' => 'selected_category',
				'type' => 'taxonomy',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_5a70f3565b936',
							'operator' => '==',
							'value' => 'category',
						),
					),
					array(
						array(
							'field' => 'field_5a70f394bcdfb',
							'operator' => '==',
							'value' => 'category',
						),
					),
				),
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'taxonomy' => 'category',
				'field_type' => 'multi_select',
				'allow_null' => 0,
				'add_term' => 0,
				'save_terms' => 1,
				'load_terms' => 1,
				'return_format' => 'id',
				'multiple' => 0,
			),
			array(
				'key' => 'field_5a70f9033904b',
				'label' => 'Timeline Entry Selection Type',
				'name' => 'timeline_entry_selection_type',
				'type' => 'button_group',
				'instructions' => '',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					'all' => 'All',
					'manual' => 'Manual',
					'category' => 'By Category(s)',
				),
				'allow_null' => 0,
				'default_value' => 'all',
				'layout' => 'horizontal',
				'return_format' => 'value',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-timeline-template.php',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'acf_after_title',
		'style' => 'seamless',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	));

}
add_action('acf/init', 'my_acf_add_local_field_groups');

function timeline_js_styles_scripts() {
	echo '<link title="timeline-styles" rel="stylesheet" href="https://cdn.knightlab.com/libs/timeline3/latest/css/timeline.css">';
	echo '<script src="https://cdn.knightlab.com/libs/timeline3/latest/js/timeline.js"></script>';
}
add_action('wp_head', 'timeline_js_styles_scripts');


class PageTemplater {
	private static $instance; /* A reference to an instance of this class. */
	protected $templates; /* The array of templates that this plugin tracks. */

	/* Returns an instance of this class.  */
	public static function get_instance() {
		if ( null == self::$instance ) {
			self::$instance = new PageTemplater();
		}
		return self::$instance;
	}

	/*  Initializes the plugin by setting filters and administration functions. */
	private function __construct() {
		$this->templates = array();

		// Add a filter to the attributes metabox to inject template into the cache.
		if ( version_compare( floatval( get_bloginfo( 'version' ) ), '4.7', '<' ) ) {
			// 4.6 and older
			add_filter(
				'page_attributes_dropdown_pages_args',
				array( $this, 'register_project_templates' )
			);
		} else {
			// Add a filter to the wp 4.7 version attributes metabox
			add_filter(
				'theme_page_templates', array( $this, 'add_new_template' )
			);
		}

		// Add a filter to the save post to inject out template into the page cache
		add_filter(
			'wp_insert_post_data',
			array( $this, 'register_project_templates' )
		);

		// Add a filter to the template include to determine if the page has our
		// template assigned and return it's path
		add_filter(
			'template_include',
			array( $this, 'view_project_template')
		);

		// Add your templates to this array.
		$this->templates = array(
			'page-timeline-template.php' => 'Timeline Page Template',
		);
	}

	/* Adds our template to the page dropdown for v4.7+ */
	public function add_new_template( $posts_templates ) {
		$posts_templates = array_merge( $posts_templates, $this->templates );
		return $posts_templates;
	}

	/* Adds our template to the pages cache in order to trick WordPress into thinking the template file exists where it doens't really exist.*/
	public function register_project_templates( $atts ) {

		// Create the key used for the themes cache
		$cache_key = 'page_templates-' . md5( get_theme_root() . '/' . get_stylesheet() );

		// Retrieve the cache list.
		// If it doesn't exist, or it's empty prepare an array
		$templates = wp_get_theme()->get_page_templates();
		if ( empty( $templates ) ) {
			$templates = array();
		}

		// New cache, therefore remove the old one
		wp_cache_delete( $cache_key , 'themes');

		// Now add our template to the list of templates by merging our templates
		// with the existing templates array from the cache.
		$templates = array_merge( $templates, $this->templates );

		// Add the modified cache to allow WordPress to pick it up for listing
		// available templates
		wp_cache_add( $cache_key, $templates, 'themes', 1800 );

		return $atts;
	}

	/* Checks if the template is assigned to the page */
	public function view_project_template( $template ) {
		global $post; // Get global post

		// Return template if post is empty
		if ( ! $post ) {
			return $template;
		}

		// Return default template if we don't have a custom one defined
		if ( ! isset( $this->templates[get_post_meta(
			$post->ID, '_wp_page_template', true
		)] ) ) {
			return $template;
		}

		$file = plugin_dir_path( __FILE__ ). get_post_meta(
			$post->ID, '_wp_page_template', true
		);

		// Just to be safe, we check if the file exist first
		// if ( file_exists( $file ) ) {
		// 	return $file;
		// } else {
		// 	echo $file;
		// }

		// Return template
		return $template;
	}
}
// add_action( 'plugins_loaded', array( 'PageTemplater', 'get_instance' ) );


function enqueue_timeline_page_template_styles() {
	if ( is_page_template( 'page-timeline-template.php' ) ) {
		wp_register_style( 'page-timeline-template-styles',  plugin_dir_url( __FILE__ ) . 'page-timeline-template-styles.css' );
		wp_enqueue_style( 'page-timeline-template-styles' );
	}
}
// add_action( 'wp_enqueue_scripts', 'enqueue_timeline_page_template_styles', 11 );


function save_timeline_entry( $post_id ) {
	if( empty($_POST['acf']) ) { return;}
	if ( get_post_type($post_id) != 'timeline-entries' ) { return; }

	$textArr = array(
		'headline' => str_replace('"', "'", str_replace('’', "'", get_the_title())),
		'text' => str_replace('"', "'", str_replace('’', "'", get_field('body')))
	);

	$eventType = get_field('event_type');
	if ($eventType == 'Event') {
		$startDateArr = array(
			'year' => get_field('event_year'),
			'month' => get_field('event_month'),
			'day' => get_field('event_day')
		);
	}

	else {
		$startDateArr = array(
			'year' => get_field('event_start_year'),
			'month' => get_field('event_start_month'),
			'day' => get_field('event_start_day')
		);

		$endDateArr = array(
			'year' => get_field('event_end_year'),
			'month' => get_field('event_end_month'),
			'day' => get_field('event_end_day')
		);
	}

	$media_source = get_field('media_source');
	if ($media_source && $media_source != 'None'){
		$media_url = "" . get_field('media_link');

		if ($media_source == 'Image') {
			$image_source = get_field('image_upload_or_link');
			if ($image_source == 'image_upload') {

				if( get_field('image_upload') ) {
					$media_url = get_field('image_upload');
				}
				else {
					$media_url = ""; //EMPTY UPLOAD
				}
			}
		}

		$mediaArr = array(
			'url' => $media_url,
			'caption' => str_replace('"', "'", str_replace('’', "'", get_field('media_caption'))),
			'credit' => str_replace('"', "'", str_replace('’', "'", get_field('media_credit'))),
		);
	}

	$entryArr = array(
		'text' => $textArr,
		'start_date' => $startDateArr
	);
	if($endDateArr) { $entryArr['end_date'] = $endDateArr; }
	if($mediaArr) { $entryArr['media'] = $mediaArr; }

	$timeline_entry_raw = $entryArr;
	// $timeline_entry_json = json_encode( array( 'events' => [$entryArr] ) );
	update_field('entry_json', $timeline_entry_raw, $post_id);

	$shortcode = '[timeline entries=' . $post_id . ']';
	$post = array('ID' => $post_id, 'post_content' => $shortcode);
	wp_update_post( $post );
}
add_action('acf/save_post', 'save_timeline_entry', 20);



//Shortcode that creates a timeline with a single entry.
//Useage: [timeline_entry headline="" text="" start_date="YYYY,MM,DD"]
//        [timeline_entry headline="" text="" start_date="YYYY,MM,DD" end_date="YYYY,MM,DD" media_url="" media_caption="" media_credit=""]
//Was used for displaying Timeline Entry previews. Now using [timeline]
function timeline_entry_shortcode($atts) {
	extract(shortcode_atts(array(
        "headline" => '',
		"text" => '',
		"start_date" => '',
		"end_date" => '',
		"media_url" => '',
		"media_caption" => '',
		"media_credit" => '',
    ), $atts));

	$entry = array(
		'text' 		 => array(
							'headline' => $headline,
							'text' => $text
				  		),
		'start_date' => array(
							'year' => explode(',', $start_date)[0],
							'month' => explode(',', $start_date)[1],
							'day' => explode(',', $start_date)[2]
						)
	);

	if($end_date){
		$entry['end_date'] = array(
			'year' => explode(',', $end_date)[0],
			'month' => explode(',', $end_date)[1],
			'day' => explode(',', $end_date)[2]
		);
	}

	if($media_url){
		$entry['media'] = array(
			'url' => $media_url,
			'caption' => $media_caption,
			'credit' => $media_credit,
		);
	}

	$timeline_entry_json = json_encode( array( 'events' => [$entry] ) );

	$timeline_container = '<div id="timeline-embed" style="width: 100%; height: 600px"></div>';
	$timeline_init_1 = '<script type="text/javascript">var additionalOptions = {initial_zoom: 2,timenav_position: "top",height: 800,hash_bookmark: true}; var timeline_json = ';
	$timeline_init_2 = '; window.timeline = new TL.Timeline("timeline-embed", timeline_json, additionalOptions);</script>';
	return $timeline_container . $timeline_init_1 . $timeline_entry_json . $timeline_init_2;
}
add_shortcode('timeline_entry', 'timeline_entry_shortcode');



//Shortcode that created a timeline from selected timeline entries. Supports selecting indivdual post by ID and categories by ID
//Useage: [timeline entries=all]
//        [timeline entries=7,8,9]
//        [timeline cat=4,5]
function timeline_template_shortcode($atts) {
	extract(shortcode_atts(array(
		'entries' => '',
		'cat' => ''
    ), $atts));

	$timeline_entries_array = array();
	if($entries) {
		if($entries == 'all'){
			$timeline_entries_posts = get_posts( array( 'post_type' => 'timeline-entries', 'post_status'=> 'publish', 'posts_per_page' => -1 ) );
			foreach ( $timeline_entries_posts as $post ) {
				$json = get_field('entry_json', $post->ID);
				if($json) {
					array_push($timeline_entries_array, $json);
				}
			}
		}

		else {
			$timeline_entries_posts = explode(',', $entries);
			foreach ( $timeline_entries_posts as $post_id ) {
				$json = get_field('entry_json', $post_id);
				if($json) {
					array_push($timeline_entries_array, $json);
				}
			}
		}
	}

	if($cat) {
		$timeline_entries_posts = get_posts( array( 'post_type' => 'timeline-entries', 'post_status'=> 'publish', 'category' => $cat ,'posts_per_page' => -1 ) );
		foreach ( $timeline_entries_posts as $post ) {
			$json = get_field('entry_json', $post->ID);
			if($json) {
				array_push($timeline_entries_array, $json);
			}
		}
	}

	$timeline_entry_json = json_encode( array( 'events' => $timeline_entries_array ) );

	$timeline_container = '<div id="timeline-embed" style="width: 100%; height: 600px"></div>';
	$timeline_init_1 = '<script type="text/javascript">var additionalOptions = {initial_zoom: 2,timenav_position: "top",height: 800,hash_bookmark: true}; var timeline_json = ';
	$timeline_init_2 = '; window.timeline = new TL.Timeline("timeline-embed", timeline_json, additionalOptions);</script>';
	return $timeline_container . $timeline_init_1 . $timeline_entry_json . $timeline_init_2;
}
add_shortcode('timeline', 'timeline_template_shortcode');
<?php
/*
Plugin Name: ADHC Timeline JS Plugin
Plugin URI:
Description:
Author: Tyler Grace (ADHC)
Version: 2.1.10
Author URI:
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


// Register Timeline Custom Post Type
function adhc_timeline_post_type() {

	$labels = array(
		"name" => __( 'Timeline Entries', '' ),
		"singular_name" => __( 'Timeline Entry', '' ),
	);
	$args = array(
		'label'                 => __( 'Timeline Entry', '' ),
		'description'           => "",
		'labels'                => $labels,
		'supports'              => array( ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 2,
		"menu_icon" 			=> "dashicons-clock",
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'timeline-entries', $args );

}
add_action( 'init', 'adhc_timeline_post_type', 0 );


/* Filter the single_template with our custom function*/
// function my_custom_template($single) {
//     global $wp_query, $post;
//
//     /* Checks for single template by post type */
//     if ($post->post_type == "timeline-entries"){
//         if(file_exists(plugin_dir_path( __FILE__ ) . '/single-timeline-entries.php'))
//             return plugin_dir_path( __FILE__ ) . '/single-timeline-entries.php';
//     }
//     return $single;
// }
// add_filter('single_template', 'my_custom_template', 11);




function my_acf_add_local_field_groups() {

	acf_add_local_field_group(array (
	'key' => 'group_58a22f0a3f876',
	'title' => 'Timeline Entries',
	'fields' => array (
		array (
			'key' => 'field_569953563d759',
			'label' => 'Body',
			'name' => 'body',
			'type' => 'textarea',
			'instructions' => 'This is where you add your write-up of the event which you are adding to the timeline.',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => '',
			'new_lines' => '',
		),
		array (
			'key' => 'field_5a67645ad6229',
			'label' => 'Entry JSON',
			'name' => 'entry_json',
			'type' => 'textarea',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
			    array(
			        array(
			            'field' => '',
			            'operator' => '==',
			        ),
			        array(
			            'field' => '',
			            'operator' => '==',
			        ),
			    ),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => '',
			'new_lines' => '',
		),
		array (
			'key' => 'field_592310d4ac3bd',
			'label' => 'Full Post',
			'name' => 'full_post',
			'type' => 'post_object',
			'instructions' => 'Link to full post text if applicable',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => '',
						'operator' => '==',
					),
					array(
						'field' => '',
						'operator' => '==',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'post_type' => array (
				0 => 'post',
			),
			'taxonomy' => array (
			),
			'allow_null' => 0,
			'multiple' => 0,
			'return_format' => 'object',
			'ui' => 1,
		),
		array (
			'key' => 'field_56995a32559f3',
			'label' => 'Dates',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array (
			'key' => 'field_5699539f3d75a',
			'label' => 'Are you adding a one-time event, or one which lasted for a long span of time?',
			'name' => 'event_type',
			'type' => 'select',
			'instructions' => 'For example, a date of birth of an important person would be a one-time event as it occurs on just one day; a war lasting multiple days would be a long-running event. If you are dealing with a one-time event like a publication date which probably won\'t have a specific day on which it occurred, choose "one-time event" and just select a single year for your date.',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				'Event' => 'One-time event',
				'Period' => 'Long-running event',
			),
			'default_value' => array (
			),
			'allow_null' => 1,
			'multiple' => 0,
			'ui' => 1,
			'ajax' => 0,
			'return_format' => 'value',
			'placeholder' => '',
		),
		array (
			'key' => 'field_58a5e7c0ae69e',
			'label' => 'COL 1',
			'name' => 'col_1',
			'type' => 'column',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'column-type' => '1_3',
		),
		array (
			'key' => 'field_569953d97720a',
			'label' => 'Event Year',
			'name' => 'event_year',
			'type' => 'number',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_5699539f3d75a',
						'operator' => '==',
						'value' => 'Event',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => 1,
		),
		array (
			'key' => 'field_58a5e7f5ae69f',
			'label' => 'COL 2',
			'name' => 'col_2',
			'type' => 'column',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'column-type' => '1_3',
		),
		array (
			'key' => 'field_569954da4486d',
			'label' => 'Event Month',
			'name' => 'event_month',
			'type' => 'number',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_5699539f3d75a',
						'operator' => '==',
						'value' => 'Event',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => 1,
			'max' => 12,
			'step' => 1,
		),
		array (
			'key' => 'field_58a5e814ae6a0',
			'label' => 'COL 3',
			'name' => 'col_3',
			'type' => 'column',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'column-type' => '1_3',
		),
		array (
			'key' => 'field_569955134486e',
			'label' => 'Event Day',
			'name' => 'event_day',
			'type' => 'number',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_5699539f3d75a',
						'operator' => '==',
						'value' => 'Event',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => 1,
			'max' => 31,
			'step' => 1,
		),
		array (
			'key' => 'field_58a5e825ae6a1',
			'label' => 'ROW END',
			'name' => '_copy',
			'type' => 'column',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'column-type' => '1_1',
		),
		array (
			'key' => 'field_58a5e8552008d',
			'label' => 'COL 1',
			'name' => '_copy',
			'type' => 'column',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'column-type' => '1_3',
		),
		array (
			'key' => 'field_569955ff23146',
			'label' => 'Start Year',
			'name' => 'event_start_year',
			'type' => 'number',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_5699539f3d75a',
						'operator' => '==',
						'value' => 'Period',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => 1,
		),
		array (
			'key' => 'field_58a5e8612008e',
			'label' => 'COL 2',
			'name' => '_copy',
			'type' => 'column',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'column-type' => '1_3',
		),
		array (
			'key' => 'field_569956b13b9a1',
			'label' => 'Start Month',
			'name' => 'event_start_month',
			'type' => 'number',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_5699539f3d75a',
						'operator' => '==',
						'value' => 'Period',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => 1,
			'max' => 12,
			'step' => 1,
		),
		array (
			'key' => 'field_58a5e8682008f',
			'label' => 'COL 3',
			'name' => '_copy',
			'type' => 'column',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'column-type' => '1_3',
		),
		array (
			'key' => 'field_569956cd3b9a2',
			'label' => 'Start Day',
			'name' => 'event_start_day',
			'type' => 'number',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_5699539f3d75a',
						'operator' => '==',
						'value' => 'Period',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => 1,
			'max' => 31,
			'step' => 1,
		),
		array (
			'key' => 'field_58a5e87120090',
			'label' => 'ROW END',
			'name' => '_copy',
			'type' => 'column',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'column-type' => '1_1',
		),
		array (
			'key' => 'field_58a5e890d7ad4',
			'label' => 'COL 1',
			'name' => '_copy',
			'type' => 'column',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'column-type' => '1_3',
		),
		array (
			'key' => 'field_569956e43b9a3',
			'label' => 'End Year',
			'name' => 'event_end_year',
			'type' => 'number',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_5699539f3d75a',
						'operator' => '==',
						'value' => 'Period',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => 1,
		),
		array (
			'key' => 'field_58a5e8a2d7ad6',
			'label' => 'COL 2',
			'name' => '_copy',
			'type' => 'column',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'column-type' => '1_3',
		),
		array (
			'key' => 'field_569956ff3b9a4',
			'label' => 'End Month',
			'name' => 'event_end_month',
			'type' => 'number',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_5699539f3d75a',
						'operator' => '==',
						'value' => 'Period',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => 1,
			'max' => 12,
			'step' => 1,
		),
		array (
			'key' => 'field_58a5e8ad9b23c',
			'label' => 'COL 3',
			'name' => '_copy',
			'type' => 'column',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'column-type' => '1_3',
		),
		array (
			'key' => 'field_569957273b9a5',
			'label' => 'End Day',
			'name' => 'event_end_day',
			'type' => 'number',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_5699539f3d75a',
						'operator' => '==',
						'value' => 'Period',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => 1,
			'max' => 31,
			'step' => 1,
		),
		array (
			'key' => 'field_58a5e898d7ad5',
			'label' => 'ROW END',
			'name' => '_copy',
			'type' => 'column',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'column-type' => '1_1',
		),
		array (
			'key' => 'field_56995a06559f2',
			'label' => 'Media',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array (
			'key' => 'field_56cb2388c14d8',
			'label' => 'Media Source',
			'name' => 'media_source',
			'type' => 'select',
			'instructions' => 'Here you can insert material from online resources including YouTube, Twitter, Flickr, Google Maps, SoundCloud, and more.',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				'None' => 'None',
				'DocumentCloud' => 'DocumentCloud',
				'DropBox' => 'DropBox',
				'Flickr' => 'Flickr',
				'Google Maps' => 'Google Maps',
				'Image' => 'Image',
				'Imgur' => 'Imgur',
				'Instagram' => 'Instagram',
				'SoundCloud' => 'SoundCloud',
				'Storify' => 'Storify',
				'Twitter' => 'Twitter',
				'Vimeo' => 'Vimeo',
				'Vine' => 'Vine',
				'Wikipedia' => 'Wikipedia',
				'YouTube' => 'YouTube',
			),
			'default_value' => array (
			),
			'allow_null' => 1,
			'multiple' => 0,
			'ui' => 1,
			'ajax' => 0,
			'return_format' => 'value',
			'placeholder' => '',
		),
		array (
			'key' => 'field_59230e29cdac8',
			'label' => 'Image Upload or Link?',
			'name' => 'image_upload_or_link',
			'type' => 'radio',
			'instructions' => 'Will you be uploading the image or using an image from elsewhere on the internet?',
			'required' => 1,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_56cb2388c14d8',
						'operator' => '==',
						'value' => 'Image',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				'image_upload' => 'Image Upload',
				'image_link' => 'Image Link',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'save_other_choice' => 0,
			'default_value' => 'image_link',
			'layout' => 'horizontal',
			'return_format' => 'value',
		),
		array (
			'key' => 'field_59230f32d89ae',
			'label' => 'Image Upload',
			'name' => 'image_upload',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_56cb2388c14d8',
						'operator' => '==',
						'value' => 'Image',
					),
					array (
						'field' => 'field_59230e29cdac8',
						'operator' => '==',
						'value' => 'image_upload',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => 10,
			'mime_types' => '',
		),
		array (
			'key' => 'field_56c79f45cacfe',
			'label' => 'Media Link',
			'name' => 'media_link',
			'type' => 'url',
			'instructions' => 'Valid URL link from the selected source above.',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_56cb2388c14d8',
						'operator' => '!=',
						'value' => 'None',
					),
					array (
						'field' => 'field_56cb2388c14d8',
						'operator' => '!=',
						'value' => '',
					),
					array (
						'field' => 'field_59230e29cdac8',
						'operator' => '!=',
						'value' => 'image_upload',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
		array (
			'key' => 'field_569958b2c0e27',
			'label' => 'Media Caption',
			'name' => 'media_caption',
			'type' => 'text',
			'instructions' => 'Add a brief caption describing what your media portrays; this is to enable everyone to have access to this material.',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_56cb2388c14d8',
						'operator' => '!=',
						'value' => 'None',
					),
					array (
						'field' => 'field_56cb2388c14d8',
						'operator' => '!=',
						'value' => '',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array (
			'key' => 'field_569958202a283',
			'label' => 'Media Credit',
			'name' => 'media_credit',
			'type' => 'text',
			'instructions' => 'Here you add the citation details for the media which you are using.',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_56cb2388c14d8',
						'operator' => '!=',
						'value' => 'None',
					),
					array (
						'field' => 'field_56cb2388c14d8',
						'operator' => '!=',
						'value' => '',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'timeline-entries',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'acf_after_title',
	'style' => 'seamless',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array (
		0 => 'permalink',
		1 => 'the_content',
		2 => 'excerpt',
		3 => 'custom_fields',
		4 => 'discussion',
		5 => 'comments',
		6 => 'format',
		7 => 'featured_image',
		8 => 'categories',
		9 => 'tags',
		10 => 'send-trackbacks',
	),
	'active' => 1,
	'description' => '',
));

	acf_add_local_field_group(array (
	'key' => 'group_58a2308370568',
	'title' => 'Timeline Page Template',
	'fields' => array (
		array (
			'key' => 'field_58a23338e2b28',
			'label' => 'The timeline will appear at the top of the page. All other content will appear below it.',
			'name' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		),
		array (
			'key' => 'field_58a230924d7b6',
			'label' => 'Timeline Entry Selection Type',
			'name' => 'entry_selection_type',
			'type' => 'radio',
			'instructions' => 'Manually: Individually select each timeline entry that will appear on the timeline of this page. <br>
By Semester: Select an entire semester of timeline entries to add to the timeline of this page. <br>
Posts must be published to be added.',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				'manually' => 'Manually',
				'semester' => 'By Categorie(s)',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'save_other_choice' => 0,
			'default_value' => '',
			'layout' => 'horizontal',
			'return_format' => 'value',
		),
		// array (
		// 	'key' => 'field_58a230df70194',
		// 	'label' => 'Semester(s)',
		// 	'name' => 'selected_semesters',
		// 	'type' => 'taxonomy',
		// 	'instructions' => '',
		// 	'required' => 0,
		// 	'conditional_logic' => array (
		// 		array (
		// 			array (
		// 				'field' => 'field_58a230924d7b6',
		// 				'operator' => '==',
		// 				'value' => 'semester',
		// 			),
		// 		),
		// 	),
		// 	'wrapper' => array (
		// 		'width' => '',
		// 		'class' => '',
		// 		'id' => '',
		// 	),
		// 	'taxonomy' => 'semester',
		// 	'field_type' => 'multi_select',
		// 	'allow_null' => 0,
		// 	'add_term' => 0,
		// 	'save_terms' => 1,
		// 	'load_terms' => 1,
		// 	'return_format' => 'object',
		// 	'multiple' => 0,
		// ),
		array (
			'key' => 'field_58a2323971b25',
			'label' => 'Timeline Entries',
			'name' => 'selected_timeline_entries',
			'type' => 'post_object',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_58a230924d7b6',
						'operator' => '==',
						'value' => 'manually',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'post_type' => array (
				0 => 'timeline-entries',
			),
			'taxonomy' => array (
			),
			'allow_null' => 0,
			'multiple' => 1,
			'return_format' => 'id',
			'ui' => 1,
		),
		array (
			'key' => 'field_58a233b6806d3',
			'label' => '',
			'name' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'templates/template-timeline-template.php',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'acf_after_title',
	'style' => 'seamless',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));
}

add_action('acf/init', 'my_acf_add_local_field_groups');

function timeline_js_styles_scripts() {
    echo '<link title="timeline-styles" rel="stylesheet" href="https://cdn.knightlab.com/libs/timeline3/latest/css/timeline.css">';
	echo '<script src="https://cdn.knightlab.com/libs/timeline3/latest/js/timeline.js"></script>';
}
add_action('wp_head', 'timeline_js_styles_scripts');


class PageTemplater {
	private static $instance; /* A reference to an instance of this class. */
	protected $templates; /* The array of templates that this plugin tracks. */

	/* Returns an instance of this class.  */
	public static function get_instance() {
		if ( null == self::$instance ) {
			self::$instance = new PageTemplater();
		}
		return self::$instance;
	}

	/*  Initializes the plugin by setting filters and administration functions. */
	private function __construct() {
		$this->templates = array();

		// Add a filter to the attributes metabox to inject template into the cache.
		if ( version_compare( floatval( get_bloginfo( 'version' ) ), '4.7', '<' ) ) {
			// 4.6 and older
			add_filter(
				'page_attributes_dropdown_pages_args',
				array( $this, 'register_project_templates' )
			);
		} else {
			// Add a filter to the wp 4.7 version attributes metabox
			add_filter(
				'theme_page_templates', array( $this, 'add_new_template' )
			);
		}

		// Add a filter to the save post to inject out template into the page cache
		add_filter(
			'wp_insert_post_data',
			array( $this, 'register_project_templates' )
		);

		// Add a filter to the template include to determine if the page has our
		// template assigned and return it's path
		add_filter(
			'template_include',
			array( $this, 'view_project_template')
		);

		// Add your templates to this array.
		$this->templates = array(
			'page-timeline-template.php' => 'Timeline Page',
		);
	}

	/* Adds our template to the page dropdown for v4.7+ */
	public function add_new_template( $posts_templates ) {
		$posts_templates = array_merge( $posts_templates, $this->templates );
		return $posts_templates;
	}

	/* Adds our template to the pages cache in order to trick WordPress into thinking the template file exists where it doens't really exist.*/
	public function register_project_templates( $atts ) {

		// Create the key used for the themes cache
		$cache_key = 'page_templates-' . md5( get_theme_root() . '/' . get_stylesheet() );

		// Retrieve the cache list.
		// If it doesn't exist, or it's empty prepare an array
		$templates = wp_get_theme()->get_page_templates();
		if ( empty( $templates ) ) {
			$templates = array();
		}

		// New cache, therefore remove the old one
		wp_cache_delete( $cache_key , 'themes');

		// Now add our template to the list of templates by merging our templates
		// with the existing templates array from the cache.
		$templates = array_merge( $templates, $this->templates );

		// Add the modified cache to allow WordPress to pick it up for listing
		// available templates
		wp_cache_add( $cache_key, $templates, 'themes', 1800 );

		return $atts;
	}

	/* Checks if the template is assigned to the page */
	public function view_project_template( $template ) {
		global $post; // Get global post

		// Return template if post is empty
		if ( ! $post ) {
			return $template;
		}

		// Return default template if we don't have a custom one defined
		if ( ! isset( $this->templates[get_post_meta(
			$post->ID, '_wp_page_template', true
		)] ) ) {
			return $template;
		}

		$file = plugin_dir_path( __FILE__ ). get_post_meta(
			$post->ID, '_wp_page_template', true
		);

		// Just to be safe, we check if the file exist first
		// if ( file_exists( $file ) ) {
		// 	return $file;
		// } else {
		// 	echo $file;
		// }

		// Return template
		return $template;
	}
}
add_action( 'plugins_loaded', array( 'PageTemplater', 'get_instance' ) );


function enqueue_timeline_page_template_styles() {
    if ( is_page_template( 'page-timeline-template.php' ) ) {
		wp_register_style( 'page-timeline-template-styles',  plugin_dir_url( __FILE__ ) . 'page-timeline-template-styles.css' );
    	wp_enqueue_style( 'page-timeline-template-styles' );
    }
}
add_action( 'wp_enqueue_scripts', 'enqueue_timeline_page_template_styles', 11 );


function add_unfiltered_html_caps() {
    // gets the author role
    $contributor = get_role( 'contributor' );
    $contributor->add_cap( 'unfiltered_html' );

	$administrator = get_role( 'administrator' );
    $administrator->add_cap( 'unfiltered_html' );
}
add_action( 'admin_init', 'add_unfiltered_html_caps');


function save_timeline_entry( $post_id ) {
	if( empty($_POST['acf']) ) { return;}
	if ( get_post_type($post_id) != 'timeline-entries' ) { return; }

	$textArr = array(
		'headline' => get_the_title(),
		'text' => get_field('body')
	);

	$eventType = get_field('event_type');
	if ($eventType == 'Event') {
		$startDateArr = array(
			'year' => get_field('event_year'),
			'month' => get_field('event_month'),
			'day' => get_field('event_day')
		);
	}

	else {
		$startDateArr = array(
			'year' => get_field('event_start_year'),
			'month' => get_field('event_start_month'),
			'day' => get_field('event_start_day')
		);

		$endDateArr = array(
			'year' => get_field('event_end_year'),
			'month' => get_field('event_end_month'),
			'day' => get_field('event_end_day')
		);
	}

	$media_url = "" . get_field('media_link');
	$mediaArr = array(
		'url' => $media_url,
		'caption' => get_field('media_caption'),
		'credit' => get_field('media_credit')
	);

	if ($eventType == 'Event') {
		$entryArr = array(
			'text' => $textArr,
			'start_date' => $startDateArr,
			'media' => $mediaArr
		);
	}

	else {
		$entryArr = array(
			'text' => $textArr,
			'start_date' => $startDateArr,
			'end_date' => $endDateArr,
			'media' => $mediaArr
		);
	}

	$timeline_entry_raw = json_encode($entryArr);
	$timeline_entry_json = json_encode(array( 'events' => [$entryArr] ));
	update_field('field_5a67645ad6229', $timeline_entry_raw, $post_id);

	$timeline_container = '<div id="timeline-embed" style="width: 100%; height: 600px"></div>';
	$timeline_init_1 = '<script type="text/javascript">var additionalOptions = {initial_zoom: 2,timenav_position: "top",height: 800,hash_bookmark: true}; var timeline_json = ';
	$timeline_init_2 = '; window.timeline = new TL.Timeline("timeline-embed", timeline_json, additionalOptions);</script>';

	$post = array(
		'ID'           => $post_id,
		'post_content' => $timeline_container . $timeline_init_1
						  . $timeline_entry_json . $timeline_init_2,
	);
	wp_update_post( $post );
}
add_action('acf/save_post', 'save_timeline_entry', 20);


function save_timeline_template( $post_id ) {
	if( empty($_POST['acf']) ) { return;}
	if ( get_page_template_slug($post_id) != 'page-timeline-template.php' ) { return; }


	$page_content = get_field('page_content');

	$timeline_entry_json = array();

	$selection_type = get_field('entry_selection_type');
	if( $selection_type == 'manual' ){
		$selected = get_field('selected_timeline_entries');
		for ($i = 0; $i < count($selected); $i++) {
			$timeline_entry_json[$i] = json_decode( get_field('field_5a67645ad6229', $selected[$i]) );
		}
	}

	if( $selection_type == 'category' ){
		$selected = get_field('selected_category');


	}

	$timeline_container = '<!--raw--><div id="timeline-embed" style="width: 100%; height: 600px"></div>';
	$timeline_init_1 = '<script type="text/javascript">var additionalOptions = {initial_zoom: 2,timenav_position: "top",height: 800,hash_bookmark: true}; var timeline_json = ';
	$timeline_init_2 = '; window.timeline = new TL.Timeline("timeline-embed", timeline_json, additionalOptions);</script><!--/raw-->';

	$post = array(
		'ID'           => $post_id,
		'post_content' => $timeline_container . $timeline_init_1
						  . json_encode(array('events' => $timeline_entry_json))  . $timeline_init_2 . $page_content,
	);
	wp_update_post( $post );

}
add_action('acf/save_post', 'save_timeline_template', 20);


// function save_timeline_entries_content($post_id, $post, $update) {
//     if ( "timeline-entries" != get_post_type($post_id) ) return;
//
// 	$timeline_entry_json = get_field('field_5a67645ad6229', $post_id);
// 	$post = array(
// 		'post_content' => 'POST_ID: '. $post_id . '<br>' . $timeline_header
// 						  . $timeline_container . $timeline_init_1
// 						  . $timeline_entry_json . $timeline_init_2,
//   	);
//
//     remove_action( 'save_post', 'save_timeline_entries_content' );
//     wp_update_post( $post );
//     add_action( 'save_post', 'save_timeline_entries_content', 10, 3 );
// }

// add_action( 'save_post', 'save_timeline_entries_content', 10, 3 );
