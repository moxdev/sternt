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
                        <?php $caption = get_sub_field( 'image_caption' );
                        $imageArr = get_sub_field( 'image' );
                        $image = wp_get_attachment_image_src($imageArr[id], 'home-carousel'); ?>

                        <img src="<?php echo $image[0] ?>" alt="<?php echo $imageArr[title]; ?>">

                        <?php if( $caption ): ?>
                            <div class="slide-caption">
                                <span class="caption-line"><?php echo $caption; ?></span>
                            </div>
                        <?php endif; ?>

                    </li>
                <?php endwhile; ?>
                </ul>

                <?php $rows = get_field('slides');
                $rowCount = count($rows); ?>

                <ol class="carousel-nav">
                    <?php for ($i = 1; $i <= $rowCount; $i++) { ?>
                        <li><a href="#"><?php echo $i; ?></a></li>
                    <?php } ?>
                </ol> ?>

            </div>
        <?php endif;
    }
}