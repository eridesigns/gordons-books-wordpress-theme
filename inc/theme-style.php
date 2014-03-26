<?php
   function header_styles() {
   $bg_color =  of_get_option('bg_custom_color');
   $font_color =  of_get_option('font_custom_color');
   $link_color =  of_get_option('link_custom_color');
   $primary_btn =  of_get_option('primary_btn');
   $secondary_btn =  of_get_option('secondary_btn');
?>


<!-- style customizer -->
<style type="text/css">

	body, .top-nav, .footer, .navbar ul li  {
		background-color: <?php echo $bg_color; ?>;
	}
	
	.navbar ul li:hover, .navbar ul li:focus {
		background-color: <?php echo $bg_color; ?>;
		opacity: .8;
	}
	
	.details {
		border-color: <?php echo $bg_color; ?>;
		background-color: <?php echo $bg_color; ?>;
	}
	
	a, .nav li a, .footer-navbar li a, .social li i, .logo a, .details h3 a, .footer-nav, .details p, .headline, .error-404 {
		color: <?php echo $link_color; ?>;
	}
	
	a:hover, .nav li a:hover, .footer-navbar li a:hover, .social li i:hover, .logo a:hover, .details h3 a:hover {
		color: <?php echo $link_color; ?>;
		opacity: .8;
	}
	
	.navbar ul li:last-child {
		border-bottom-color: <?php echo $link_color; ?>;
	}
	
	.content article a, .widget-area ul li a {
		color: <?php echo $primary_btn; ?>;
	}
	
	.content article a, .widget-area ul li a:hover {
		color: <?php echo $primary_btn; ?>;
		opacity: .8;
	}
	
	.btn-primary {
		background-color: <?php echo $primary_btn; ?>;
		border-color: <?php echo $primary_btn; ?>;
		color: <?php echo $link_color; ?> !important;
	}
	
	.btn-primary:hover, .btn-primary:focus {
		background-color: <?php echo $primary_btn; ?>;
		border-color: <?php echo $primary_btn; ?>;
		color: <?php echo $link_color; ?>;
		opacity: .8;
	}
	
	.btn-warning {
		background-color: <?php echo $secondary_btn; ?>;
		border-color: <?php echo $secondary_btn; ?>;
		color: <?php echo $link_color; ?> !important;
	}
	
	.btn-warning:hover, .btn-warning:focus {
		background-color: <?php echo $secondary_btn; ?>;
		border-color: <?php echo $secondary_btn; ?>;
		color: <?php echo $link_color; ?>;
		opacity: .8;
	} 

 

/* custom CSS */
<?php echo of_get_option('custom_css', '' ); ?>

</style>
<!-- style customizer /-->



<?php }
add_action( 'wp_head', 'header_styles' );
?>