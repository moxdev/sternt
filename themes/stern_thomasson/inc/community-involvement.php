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
        $img = get_field('community_involvement_image');
        $text = get_field('community_involvement_text_area'); ?>

        <section class="community-involvement">
            <div class="header">
                <h1><?php echo $header; ?></h1>
            </div>
            <div class="wrapper">
                <div class="community-featured-img">
                    <img src="<?php echo $img['sizes']['community-involvement']; ?>" alt="<?php $img['alt']; ?>" title="<?php $img['title']; ?>">
                </div>
                <div class="wysiwyg">
                    <?php echo $text; ?>
                </div>
            </div>
        </section>
        <!-- .community-involvement-section -->
        <?php
    }
}