<?php 
    
    add_filter( 'rwmb_meta_boxes', 'eri_bronte_register_meta_boxes' );
    
    function eri_bronte_register_meta_boxes( $meta_boxes )
    
    {
    

    $prefix = 'eri_bronte_';

    //books meta
    $meta_boxes[] = array(
                
                'title' => 'Book Details',
                'pages' => array( 'eri_bronte_books' ),
                'fields' => array(
               
                array(
                'name' => 'Book Author',
                'id' => $prefix . 'book_author',
                'type' => 'text',
                ),
                
                array(
                'name' => 'Price',
                'id' => $prefix . 'book_price',
                'type' => 'text',
                'std'   => __( 'Free', 'rwmb' ),
                ),
                    
                array(
				'name' => __( 'Upload Book Sample', 'rwmb' ),
				'id'   => "{$prefix}book_sample",
				'type' => 'file_advanced',
				'max_file_uploads' => 1,
				'mime_type' => '', // Leave blank for all file types
				),
                    
                array(
                'name' => 'Buy Link',
                'id' => $prefix . 'buy_link',
                'type' => 'text',
                'std'   => __( '', 'rwmb' ),
                ),
                    
                
        )
    );
    
    $meta_boxes[] = array(
    
    			'title' => 'Settings',
                'pages' => array( 'eri_bronte_books','page' ),
                'fields' => array(
               
                array(
				'name' => __( 'Upload Background', 'rwmb' ),
				'id'   => "{$prefix}bg_image",
				'type' => 'file_advanced',
				'max_file_uploads' => 1,
				'mime_type' => '', // Leave blank for all file types
				),
                    
                array(
                'name' => 'Homepage Button Label',
                'id' => $prefix . 'home_call2action_label',
                'type' => 'text',
                'std'   => __( 'Contact the Author', 'rwmb' ),
                ),
                    
                array(
                'name' => 'Homepage Button Value (Link)',
                'id' => $prefix . 'home_call2action',
                'type' => 'text',
                'std'   => __( '#', 'rwmb' ),
                ),

    )
    
    );
    

    return $meta_boxes;
    }
?>
