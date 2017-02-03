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
        $imgs = get_field('carousel_images');
        if( $imgs ): ?>
            <div class="home-carousel">
                <ul>
                    <?php foreach( $imgs as $img ): ?>
                        <li style="background-image:url(<?php echo $img['sizes']['home-carousel']; ?>)">
                            <div class="screen-reader-text">
                                <img src="<?php echo $img['sizes']['home-carousel']; ?>" alt="<?php echo $img['alt']; ?>">
                            </div>
                            <span><h1><?php echo $img['caption']; ?></h1></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <ol class="carousel-nav">
                    <?php foreach( $imgs as $img ):
                        $i++; ?>
                        <li><a href="#"><?php echo $i; ?></a></li>
                    <?php endforeach; ?>
                </ol>
            </div>
        <?php endif;
    }
}