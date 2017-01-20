<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Stern_Thomasson_LLP
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'stern_thomasson' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<a id="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 302.72 73.02"><defs><clipPath id="clip-path" transform="translate(0 0)"><rect width="302.72" height="73.02" style="fill:none"/></clipPath></defs><title>logo</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><g style="clip-path:url(#clip-path)"><path d="M47,9.34a6.85,6.85,0,0,1,2.8-6,11.06,11.06,0,0,1,6.57-2q8.27,0,9.83,6.17H63q-.85-3.67-6.67-3.67-4.11,0-5.74,2.44A3.92,3.92,0,0,0,50,8.61q0,2.6,2.84,4a31.56,31.56,0,0,0,5.67,1.83A20.08,20.08,0,0,1,64.81,17a6.23,6.23,0,0,1,2.72,5.4,7.23,7.23,0,0,1-3.39,6.47,12.56,12.56,0,0,1-7,1.85q-9.43,0-10.93-7.18h3.45Q50.46,28,57.13,28q4.76,0,6.65-2.65a4.72,4.72,0,0,0,.74-2.8,3.54,3.54,0,0,0-1.37-2.88q-2-1.6-7.48-2.93Q47,14.77,47,9.34" transform="translate(0 0)" style="fill:#082947"/></g><polygon points="68.65 1.71 75.53 1.71 78.45 1.71 85.34 1.71 85.34 4.42 78.45 4.42 78.45 30.08 75.53 30.08 75.53 4.42 68.65 4.42 68.65 1.71" style="fill:#082947"/><polygon points="88.51 30.17 88.51 1.79 105.37 1.79 105.37 4.51 91.43 4.51 91.43 14.6 104.95 14.6 104.95 17.36 91.43 17.36 91.43 27.45 105.37 27.45 105.37 30.17 88.51 30.17" style="fill:#082947"/><g style="clip-path:url(#clip-path)"><path d="M120.35,16.15a5.33,5.33,0,0,0,4-1.67,5.87,5.87,0,0,0,1.63-4.2,5.65,5.65,0,0,0-1.54-4.08,5.46,5.46,0,0,0-4.13-1.61h-6.59V16.15Zm5.95.4a8.83,8.83,0,0,1-5.63,2.38l8.74,11.25h-3.92l-8.32-11.22h-3.41V30.17h-2.92V1.79h9.1a9,9,0,0,1,6.36,2.4,8.06,8.06,0,0,1,2.65,6.15,8.11,8.11,0,0,1-2.65,6.2" transform="translate(0 0)" style="fill:#082947"/></g><polygon points="132.74 0 132.74 30.17 135.66 30.17 135.66 9.26 151.6 31.92 151.6 1.79 148.68 1.79 148.68 22.66 132.74 0" style="fill:#082947"/><polygon points="45.49 42.89 52.38 42.89 55.3 42.89 62.18 42.89 62.18 45.6 55.3 45.6 55.3 71.27 52.38 71.27 52.38 45.6 45.49 45.6 45.49 42.89" style="fill:#082947"/><polygon points="65.36 71.35 65.36 42.98 68.28 42.98 68.28 55.74 81.17 55.74 81.17 42.98 84.09 42.98 84.09 71.35 81.17 71.35 81.17 58.66 68.28 58.66 68.28 71.35 65.36 71.35" style="fill:#082947"/><g style="clip-path:url(#clip-path)"><path d="M111.13,48.86A11.65,11.65,0,1,0,94.65,65.34a11.66,11.66,0,0,0,19.9-8.26,11.21,11.21,0,0,0-3.42-8.22m5.2,13.89a14.6,14.6,0,0,1-7.78,7.78,14.22,14.22,0,0,1-5.67,1.15,14.07,14.07,0,0,1-5.65-1.15,14.66,14.66,0,0,1-7.76-7.78,14.61,14.61,0,0,1,0-11.35,14.49,14.49,0,0,1,3.13-4.63,15,15,0,0,1,4.63-3.11,14.07,14.07,0,0,1,5.65-1.15,14.22,14.22,0,0,1,5.67,1.15,14.91,14.91,0,0,1,4.65,3.11,14.49,14.49,0,0,1,3.13,4.63,14.6,14.6,0,0,1,0,11.35" transform="translate(0 0)" style="fill:#082947"/></g><polygon points="134.91 65.38 125.61 41.1 118.97 71.35 121.97 71.35 126.36 51.15 134.91 73.02 143.42 51.15 147.84 71.35 150.81 71.35 144.21 41.1 134.91 65.38" style="fill:#082947"/><path d="M168.47,60.92l-5.15-13.06-5.17,13.06Zm4.11,10.43-3-7.72H157.08L154,71.35h-3.17L163.32,41l12.43,30.33Z" transform="translate(0 0)" style="fill:#082947"/><g style="clip-path:url(#clip-path)"><path d="M176.46,50.52a6.85,6.85,0,0,1,2.8-6,11.07,11.07,0,0,1,6.57-2q8.27,0,9.83,6.17H192.5q-.85-3.67-6.67-3.67-4.11,0-5.74,2.44a3.92,3.92,0,0,0-.62,2.29q0,2.6,2.84,4A31.54,31.54,0,0,0,188,55.66a20.07,20.07,0,0,1,6.29,2.51,6.23,6.23,0,0,1,2.73,5.4A7.24,7.24,0,0,1,193.62,70a12.56,12.56,0,0,1-7,1.85q-9.43,0-10.93-7.18h3.45q.8,4.51,7.48,4.51,4.76,0,6.65-2.65a4.72,4.72,0,0,0,.74-2.8,3.54,3.54,0,0,0-1.37-2.88q-2-1.6-7.48-2.93-8.68-2-8.68-7.45" transform="translate(0 0)" style="fill:#082947"/><path d="M199.62,50.52a6.85,6.85,0,0,1,2.8-6,11.07,11.07,0,0,1,6.57-2q8.27,0,9.83,6.17h-3.16q-.85-3.67-6.67-3.67-4.11,0-5.74,2.44a3.92,3.92,0,0,0-.62,2.29q0,2.6,2.84,4a31.59,31.59,0,0,0,5.67,1.83,20.07,20.07,0,0,1,6.29,2.51,6.23,6.23,0,0,1,2.73,5.4A7.24,7.24,0,0,1,216.77,70a12.56,12.56,0,0,1-7,1.85q-9.43,0-10.93-7.18h3.45q.8,4.51,7.48,4.51,4.76,0,6.65-2.65a4.72,4.72,0,0,0,.74-2.8,3.54,3.54,0,0,0-1.37-2.88q-2-1.6-7.48-2.93-8.68-2-8.68-7.45" transform="translate(0 0)" style="fill:#082947"/><path d="M245.14,48.86a11.65,11.65,0,1,0-16.48,16.48,11.66,11.66,0,0,0,19.9-8.26,11.21,11.21,0,0,0-3.42-8.22m5.2,13.89a14.6,14.6,0,0,1-7.78,7.78,14.22,14.22,0,0,1-5.68,1.15,14.07,14.07,0,0,1-5.65-1.15,14.66,14.66,0,0,1-7.76-7.78,14.61,14.61,0,0,1,0-11.35,14.49,14.49,0,0,1,3.13-4.63,15,15,0,0,1,4.63-3.11,14.07,14.07,0,0,1,5.65-1.15,14.22,14.22,0,0,1,5.68,1.15,14.91,14.91,0,0,1,4.65,3.11,14.49,14.49,0,0,1,3.13,4.63,14.6,14.6,0,0,1,0,11.35" transform="translate(0 0)" style="fill:#082947"/></g><polygon points="258.62 71.35 255.7 71.35 255.7 42.67 271.64 63.05 271.64 42.98 274.56 42.98 274.56 71.68 258.62 51.48 258.62 71.35" style="fill:#082947"/><rect x="27.53" y="1.79" width="1.61" height="70.05" style="fill:#939597"/><g style="clip-path:url(#clip-path)"><path d="M5.81,32.34a5.81,5.81,0,1,0,5.81,5.81,5.81,5.81,0,0,0-5.81-5.81" transform="translate(0 0)" style="fill:#082947"/></g><polygon points="285.5 70.36 285.5 71.65 281.04 71.65 280.4 71.65 279.75 71.65 279.75 59.16 281.04 59.16 281.04 70.36 285.5 70.36" style="fill:#939597"/><polygon points="293 70.36 293 71.65 288.54 71.65 287.89 71.65 287.25 71.65 287.25 59.16 288.54 59.16 288.54 70.36 293 70.36" style="fill:#939597"/><g style="clip-path:url(#clip-path)"><path d="M298.93,65.46a2.38,2.38,0,0,0,1.78-.72,2.53,2.53,0,0,0,.72-1.84,2.48,2.48,0,0,0-.68-1.8,2.42,2.42,0,0,0-1.82-.7H296v5.07Zm2.62.19a4,4,0,0,1-2.8,1.06H296v4.94h-1.29V59.16h4a4,4,0,0,1,2.8,1,3.52,3.52,0,0,1,1.17,2.72,3.57,3.57,0,0,1-1.17,2.73" transform="translate(0 0)" style="fill:#939597"/></g></g></g>
				</svg>
			</a>

			<?php
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<div class="close">X</div>
			<div class="masthead-phone">
				<?php $phone = get_field( 'phone', 'option' );
				if ($phone): ?>
					<a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a>
				<?php endif; ?>
			</div>
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'stern_thomasson' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<?php  if ( has_post_thumbnail() ) {
		the_post_thumbnail('featured-post');
	} ?>

	<div id="content" class="site-content">
