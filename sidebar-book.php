<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Bronte
 */
?>
<div id="sidebar" class="col-md-3 clearfix" role="complementary">
	
			
			<aside class="widget clearfix">
				
				<div class="product">
	
			
					<?php if (has_post_thumbnail( $post->ID ) ): ?>
			             
			             <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' ); ?>
			                    
			             <img src="<?php echo $image[0]; ?>"  class="img-responsive product-thumb" alt="<?php the_title(); ?>" />
			        
			        <?php endif; ?>
			        
					
				</div><!-- product -->
				
				
			</aside>
			
			<div class="clear"></div>
			
			<aside id="buy-btn" class="widget clearfix">
				
				<ul>
					
					<li>
						<a href="<?php echo rwmb_meta( 'eri_bronte_buy_link' ); ?>" class="btn btn-primary"><?php echo rwmb_meta( 'eri_bronte_book_price' ); ?> Buy Book</a>
					</li>
					
					<li>
						<a href="<?php echo rwmb_meta( 'eri_bronte_book_sample' ); ?>" class="btn btn-warning">Download Sample</a>
					</li>
					
				</ul>
				
			</aside>
			

</div>