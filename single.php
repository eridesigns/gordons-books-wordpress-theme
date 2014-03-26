<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Bronte
 */

get_header(); ?>

<div class="eri_single">
<div class="container">

	<div class="content col-md-9">
		
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php eri_bronte_post_nav(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

	</div><!-- content -->
	
	<?php get_sidebar(); ?>
	
</div><!-- container -->
</div><!-- single -->

<?php get_footer(); ?>