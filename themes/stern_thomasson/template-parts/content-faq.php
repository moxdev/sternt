<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Stern_Thomasson_LLP
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="page-wrapper">
        <header class="entry-header">
            <?php if ( get_field( 'on_page_title' )){
                    echo '<h1 class="entry-title">' . get_field( 'on_page_title' ) . '</h1>';
                } else {
                    the_title( '<h1 class="entry-title">', '</h1>' );
                } ?>
        </header><!-- .entry-header -->

        <div class="entry-content">
            <?php
                the_content();

                if ( function_exists( 'stern_thomasson_disclaimer' ) ) {
                    stern_thomasson_disclaimer();
                }

                if ( is_page_template('page-faq.php') && function_exists( 'stern_thomasson_faq_questions' ) ) {
                    stern_thomasson_faq_questions();
                }

                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'stern_thomasson' ),
                    'after'  => '</div>',
                ) );
            ?>
        </div><!-- .entry-content -->

        <?php if ( get_edit_post_link() ) : ?>
            <footer class="entry-footer">
                <?php
                    edit_post_link(
                        sprintf(
                            /* translators: %s: Name of current post */
                            esc_html__( 'Edit %s', 'stern_thomasson' ),
                            the_title( '<span class="screen-reader-text">"', '"</span>', false )
                        ),
                        '<span class="edit-link">',
                        '</span>'
                    );
                ?>
            </footer><!-- .entry-footer -->
        <?php endif; ?>
    </div> <!-- page-wrapper -->
</article><!-- #post-## -->