<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 * 
 * Template Name: Blog
 *
 * @package Bronte
 */

get_header(); ?>

<div class="eri_single">
<div class="container">
	
	<div class="content col-md-9">

	<?php
		$temp = $wp_query;
		$wp_query= null;
		$wp_query = new WP_Query();
		$wp_query->query('posts_per_page=5'.'&paged='.$paged);
		while ($wp_query->have_posts()) : $wp_query->the_post();
	?>
	
				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

	
	<?php endwhile; ?>
	
	<?php eri_bronte_paging_nav(); ?>
	
	</div><!-- content -->
	
	<?php get_sidebar(); ?>
	
</div><!-- container -->
</div><!-- header -->

<?php get_footer(); ?>