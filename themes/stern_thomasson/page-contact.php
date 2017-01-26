<?php
/**
 * Template Name: Contact Page
 *
 * This is the template for displaying the Contact Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Stern_Thomasson_LLP
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php
            while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content', 'page' );

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;

            endwhile; // End of the loop.
            ?>
            <?php if(function_exists('mm4_you_contact_form')) {
                mm4_you_contact_form();
            } ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();

/*<?php if ( function_exists( 'stern_thomasson_contact_directions_map' ) ) {
    stern_thomasson_contact_directions_map();
} ?>
*/