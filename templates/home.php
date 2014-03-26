<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 * 
 * Template Name: Home
 *
 * @package Bronte
 */

get_header(); ?>

<div class="header">
<div class="container">
	
	<div class="content col-md-12">
		
		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
				<header class="headline">
                    
                    <?php the_content(); ?>
					
                    <br>
                    
					
                    <a href="<?php echo rwmb_meta( 'eri_bronte_home_call2action' ); ?>" class="btn btn-warning">
                        <?php echo rwmb_meta( 'eri_bronte_home_call2action_label' ); ?>
                        
                    </a>
                    
				</header><!-- headline -->
		
			</article><!-- #post-## -->


		<?php endwhile; // end of the loop. ?>
	
		
	</div>
	
</div><!-- container -->
</div><!-- header -->

<?php get_template_part('lib/catalog'); ?>

<?php get_footer(); ?>