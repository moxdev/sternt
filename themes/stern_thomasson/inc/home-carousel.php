<?php
/**
 * Stern Thomasson LLP Sidebar
 *
 * Displays the sidebar
 *
 * @package Stern_Thomasson_LLP
 */

function stern_thomasson_home_carousel() {
    if( is_page_template('frontpage.php') ) {
        if( function_exists('get_field') ) {

            if( have_rows('slides') ): ?>

                <div id="home-carousel">
                    <ul>
                    <?php while ( have_rows('slides') ) : the_row(); ?>
                        <li> <?php

                            $imageArr = get_sub_field('slide_image');
                            $image = wp_get_attachment_image_src($imageArr[id], 'home-carousel');
                            $caption = get_sub_field('slide_caption');?>

                            <img src="<?php echo $image[0] ?>" alt="<?php echo $imageArr[title]; ?>">
                            <div class="slide-caption"><?php echo $caption; ?></div>

                        </li>
                    <?php endwhile; ?>
                    </ul>

                    <?php $rows = get_field('slides');
                    $rowCount = count($rows); ?>
                    <ol class="carousel-nav">
                    <?php for ($i = 1; $i <= $rowCount; $i++) { ?>
                        <li><a href="#"><?php echo $i; ?></a></li>
                    <?php } ?>
                    </ol>
                </div>

            <?php endif;
        }
    }
}

