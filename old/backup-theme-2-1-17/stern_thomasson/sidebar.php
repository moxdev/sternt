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

    <?php elseif ( is_page_template( 'page-contact.php' ) && function_exists( 'stern_thomasson_contact_directions_map' ) ) : ?>

        <?php stern_thomasson_contact_directions_map(); ?>

    <?php else : ?>

        <?php stern_thomasson_sidebar() ?>

    <?php endif; ?>

</aside><!-- #secondary -->
