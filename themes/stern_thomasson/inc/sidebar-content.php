<?php
/**
 * Stern Thomasson LLP Sidebar
 *
 * Displays the sidebar
 *
 * @package Stern_Thomasson_LLP
 */

function stern_thomasson_sidebar() {
    if ( function_exists( 'get_field' ) ) {

        $header = get_field('sidebar_header');
        $icon = get_field('sidebar_icon');
        $text = get_field('sidebar_text');
        if (!empty( $header )): ?>

            <div class="sidebar-wrapper">

                <h3><?php echo $header ?></h3>

                <?php if (!empty( $icon )): ?>
                    <div class="sidebar-icon">
                        <img src="<?php echo $icon['url'] ?>" alt="<?php $icon['alt'] ?>" title="<?php $icon['title'] ?>">
                    </div>
                <?php endif ?>

                <div class="sidebar-wysiwyg">
                    <?php echo $text; ?>
                </div>

            </div>
    <?php endif;
    }
}


