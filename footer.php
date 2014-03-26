</div><!-- overlay -->
</div><!-- bg -->

<div class="footer">

	<div class="footer-menu clearfix">
	
	<div class="container">
	
	<div class="footer-nav col-sm-9">
			<div class="col-sm-3">&copy; <?php echo date("Y"); ?> <span><?php bloginfo( 'name' ); ?></span> </div> 
			<?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'container' => 'ul', 'menu_class' => 'footer-navbar' ) ); ?>
	</div><!-- nav -->
	
	<div class="col-sm-3">		

			<ul class="social pull-right">
				<?php
					$tw_link = of_get_option('twitter_link');
					$fb_link = of_get_option('facebook_link');
					$lin_link = of_get_option('linkedin_link');
					$insta_link = of_get_option('instagram_link');
				?>

				<?php if($tw_link){ echo "<li><a target='_blank' href='".$tw_link."'><i class='icon-facebook'></i></a></li>"; } ?>
				<?php if($fb_link){ echo "<li><a target='_blank' href='".$fb_link."'><i class='icon-twitter'></i></a></li>"; } ?>
				<?php if($lin_link){ echo "<li><a target='_blank' href='".$lin_link."'><i class='icon-linkedin'></i></a></li>"; } ?>
				<?php if($insta_link){ echo "<li><a target='_blank' href='".$insta_link."'><i class='icon-instagram'></i></a></li>"; } ?>
			</ul>
		
	</div>
	
	</div><!-- container -->
	
	</div><!-- footer menu -->
	

</div><!-- footer -->
 
<?php wp_footer(); ?>

</body>
</html>