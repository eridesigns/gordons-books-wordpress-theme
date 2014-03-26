<?php
/**
 * Register widget areas
 */
function eri_bronte_widgets() {

	// Page sidebar
	register_sidebar( array(
			'id' => 'eri_bronte_page_sidebar',
			'name' => __( 'Page Sidebar', 'eri_bronte' ),
			'description' => __( 'This sidebar is located on the right-hand side of each page.', 'eri_bronte' ),
			'before_widget' => '<div class="widget-single">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-head">',
			'after_title' => '</h2>',
		) );

	// Post sidebar
	register_sidebar( array(
			'id' => 'eri_bronte_post_sidebar',
			'name' => __( 'Post Sidebar', 'eri_bronte' ),
			'description' => __( 'This sidebar is located on the right-hand side of each page.', 'eri_bronte' ),
			'before_widget' => '<div class="widget-single">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-head">',
			'after_title' => '</h2>',
		) );

	}


add_action( 'widgets_init', 'eri_bronte_widgets' );
?>