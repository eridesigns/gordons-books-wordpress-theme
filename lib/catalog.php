<div class="catalog">
	<div class="container">

		<?php
		$loop = new WP_Query( array(
	          'showposts' => 999, // shows the number of posts showing
              'post_type' => array('books')
		));
		while ( $loop->have_posts() ) : $loop->the_post(); ?>

		<div class="col-md-4 product">
		
		<a href="<?php the_permalink(); ?>" class="book-holder">

		<?php if (has_post_thumbnail( $post->ID ) ): ?>
             
             <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' ); ?>
                    
             <img src="<?php echo $image[0]; ?>"  class="img-responsive product-thumb" alt="<?php the_title(); ?>" />
        
        <?php endif; ?>
        
        <div class="product-hover btn btn-primary">
	        <h4><?php echo rwmb_meta( 'eri_bronte_book_price' ); ?></h4>
        </div><!-- product hover -->

    	</a>
	
		<div class="details">
			
			<h3>
				<a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
			</h3>

			<p><?php echo rwmb_meta( 'eri_bronte_book_author' ); ?></p>
		
		</div><!-- details -->
		
		</div><!-- product -->

		<?php endwhile; ?>

	</div><!-- container -->
</div><!-- catalog -->
