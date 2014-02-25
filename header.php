<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package _s_tn
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->

<!--[if lt IE 9]>
  <script src="<?php echo get_stylesheet_directory_uri() . '/js/html5shiv.js' ?>"></script>
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() . '/custom_ie.css' ?>">
<![endif]-->
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding clear">

			<div  class="tn_logo">
      
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="TeeehN.com">
	        <img src="<?php echo get_stylesheet_directory_uri() . '/images/tn-logo-160x104.png'; ?>" alt="TeeehN.com" >
	      </a>

      </div>

      <hgroup class="clear">

			  <h1 class="site-title">
					<?php do_action('s_tn_site_title'); ?>
        </h1>

			  <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>

      </hgroup>

		</div>
		<nav id="site-navigation" class="main-navigation gradient" role="navigation">
			<h1 class="menu-toggle"><?php _e( 'Menu', 's_tn' ); ?></h1>
			<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 's_tn' ); ?></a>

			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
