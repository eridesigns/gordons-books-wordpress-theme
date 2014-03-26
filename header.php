<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  
  <meta charset="<?php bloginfo( 'charset' ); ?>" />

  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  
  <title><?php wp_title( '|', true, 'right' ); ?></title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">
   
  <!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->


  <?php wp_head(); ?>
  
   <?php
      $images = rwmb_meta( 'eri_bronte_bg_image', 'type=image&size=main-slider' );
      foreach ( $images as $image )
      {
      echo "
            
         <script type='text/javascript'>
	
		 jQuery(document).ready(function() {	
			jQuery('.bg, .bg_single ').backstretch('{$image['url']}');
			});
	
		</script>
		
           ";
       }
      ?>

 
    
  
  <link href='http://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>
  
  <link href='http://fonts.googleapis.com/css?family=Cantarell:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
  
</head>


<body <?php body_class(); ?>>

<div class="top-nav">
<div class="container">

	<div class="logo col-sm-3">
		<h3>
			<a href="<?php echo home_url(); ?>/">
				
				<?php if($logo = of_get_option('logo_uploader')){ ?>
				<img width="180" src="<?php echo $logo; ?>" alt="<?php bloginfo('name'); ?>"  />
				<?php }else{ bloginfo('name');}?>
				
			</a>
		</h3>
	</div><!-- logo -->
	
	<div class="nav col-sm-9">
		<?php wp_nav_menu( array( 'theme_location' => 'top-menu', 'container' => 'ul', 'menu_class' => 'navbar pull-right' ) ); ?>
	</div><!-- nav -->
	
</div><!-- container -->
</div><!-- top nav -->

<div class="bg">
<div class="overlay">