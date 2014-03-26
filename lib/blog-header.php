<div class="header pos">
<div class="overlay">
<div class="container">
	
	<div class="index-content">
		
		<?php get_search_form(); ?>
		
		<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'eri_bronte' ) ); ?></div>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'eri_bronte' ) ); ?></div>
		<?php endif; ?>
		
			
	</div>
	
</div><!-- container -->
</div><!-- overlay -->
</div><!-- header -->