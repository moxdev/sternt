<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Stern_Thomasson_LLP
 */

?>

	</div><!-- #content -->

    <?php  if ( is_page_template( 'page-firm.php' ) && function_exists( 'stern_thomasson_community_involvement' ) ) {
        stern_thomasson_community_involvement();
        // for displaying the community involvement section on the Firm Page
    } ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">

        <?php  if ( function_exists( 'stern_thomasson_footer_colophon' ) ) {
            stern_thomasson_footer_colophon();
        }?>

		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
