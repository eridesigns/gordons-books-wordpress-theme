<?php
function init_books(){

	register_post_type( 'books',

		array(
			'labels' => array(

				'name'			=> 'Books',
				'singular_name' => 'Book',
				'add_new'		=> 'Add new',
				'add_new_item'	=> 'Add new book',
				'edit_item'		=> 'Edit book info',
				'new_item'		=> 'New  book',
				'not_found'		=> 'No books found',
				'not_found_in_trash' => 'No books found in Trash',
				'menu_name'		=> 'Books',

			),

			'description' => __('Publishing Books'),
			'public' => true,
			'show_in_nav_menus' => true,

			'supports' => array(
				'title',
				'thumbnail',
				'editor',
				//'excerpt',
				//'page-attributes',
				//'comments',
				//'custom-fields',
			),

			'show_ui' => true,
			'hierarchical' => true,
			'show_in_menu' => true,
			'has_archive' => 'single-book',
			'query_var' => true,
			//'menu_icon' => get_template_directory_uri().'/images/books.png',
			'rewrite' => array('slug' => 'single-book'),
		)
	);

	flush_rewrite_rules(); // this one fixes the 404 error
}

add_action( 'init', 'init_books');
?>