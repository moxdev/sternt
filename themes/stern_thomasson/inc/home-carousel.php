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
                <?php $on_page_title_1 = get_field('on_page_title_part_1');
                $on_page_title_2 = get_field('on_page_title_part_2');
                $on_page_title_3 = get_field('on_page_title_part_3');
                $i = 0;
                if($on_page_title_1 || $on_page_title_2 || $on_page_title_3) { ?>
                    <h1 class="wrapper">
                    <?php if($on_page_title_1): ?><span class="piece-1"><?php echo $on_page_title_1; ?></span><?php endif; if($on_page_title_2): ?> <span class="piece-2"><?php echo $on_page_title_2; ?></span><?php endif; if($on_page_title_3): ?> <span class="highlight piece-3"><?php echo $on_page_title_3; ?></span><?php endif; ?>
                    </h1>
                <?php } ?>
                <ul>
                    <?php foreach( $imgs as $img ): ?>
                        <li style="background-image:url(<?php echo $img['sizes']['home-carousel']; ?>)">
                            <div class="screen-reader-text">
                                <img src="<?php echo $img['sizes']['home-carousel']; ?>" alt="<?php echo $img['alt']; ?>">
                            </div>
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