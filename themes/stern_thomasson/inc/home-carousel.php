<?php
/**
 * Stern Thomasson LLP Sidebar
 *
 * Displays the sidebar
 *
 * @package Stern_Thomasson_LLP
 */

function stern_thomasson_home_carousel() {
    if(function_exists('get_field')) {
        if( have_rows( 'slides' ) ): ?>
            <div class="home-carousel">
                <ul>
                <?php while ( have_rows( 'slides' ) ) : the_row(); ?>
                    <li>
                        <?php $caption = get_sub_field( 'image_caption_line' );
                        $imageArr = get_sub_field( 'image' );
                        $image = wp_get_attachment_image_src($imageArr[id], 'home-carousel'); ?>

                        <img src="<?php echo $image[0] ?>" alt="<?php echo $imageArr[title]; ?>">

                        <?php if( $caption ): ?>
                            <span class="caption"><h1><?php echo $caption; ?></h1></span>
                        <?php endif; ?>
                    </li>
                <?php endwhile; ?>
                </ul>

                <ol class="carousel-nav">
                    <?php for ( $i = 0; $i <= 2; $i++ ) { ?>

                        <li>
                            <a href="#"><?php echo $i; ?></a>
                        </li> <?php

                    } ?>
                </ol>
            </div>
        <?php endif;
    }
}