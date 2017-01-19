<?php
/**
 * Stern Thomasson LLP Community Involvement
 *
 * Displays the community involvement section on the Firm Page
 *
 * @package Stern_Thomasson_LLP
 */

function stern_thomasson_community_involvement() {
    if ( function_exists( 'get_field' ) ) {

        $header = get_field('community_involvement_header');
        $text = get_field('community_involvement_text_area'); ?>

            <section class="community-involvement">
                <div class="wrapper">
                    <?php if (!empty( $header )): ?>
                        <div class="header">
                            <h1><?php echo $header; ?></h1>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty( $text )): ?>
                        <div class="wysiwyg">
                            <?php echo $text; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
            <!-- .community-involvement-section -->
        <?php
    }
}