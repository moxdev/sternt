<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Stern_Thomasson_LLP
 */


?>

<aside id="secondary" class="widget-area" role="complementary">
    <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	   <?php dynamic_sidebar( 'sidebar-1' ); ?>
    <?php else : ?>
        <?php if ( function_exists( 'stern_thomasson_sidebar' ) ) {
            stern_thomasson_sidebar();
        } ?>
    <?php endif; ?>
</aside><!-- #secondary -->
