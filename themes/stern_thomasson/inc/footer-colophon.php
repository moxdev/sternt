<?php
/**
 * Stern Thomasson LLP Footer Colophon
 *
 * @package Stern_Thomasson_LLP
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function stern_thomasson_footer_colophon() { ?>
    <div class="footer-wrapper">
        <div class="company-info"><?php
            $name = get_field( 'company_name', 'options' );
            $address = get_field( 'address', 'options' );
            $address_2 = get_field( 'address_2', 'options' );
            $phone = get_field( 'phone', 'options' );
            $fax = get_field( 'fax', 'options' );

            if( $name ):
                echo $name . "<br>";
            endif;
            if ( $address):
                echo $address . "<br>";
            endif;
            if ( $address_2):
                echo $address_2 . "<br>";
            endif;
            if ( $phone):
                echo "Phone: " . $phone . "<br>";
            endif;
            if ( $fax):
                echo "Fax: " . $fax . "<br>";
            endif;


            ?>
            <div class="associations">
                <img class="naca-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/imgs/naca-web-logo.png" alt="Stern Thomasson LLP logo">
                <img class="avvo-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/imgs/avvo-logo.png" alt="Stern Thomasson LLP logo">
            </div>

            <div class="disclaimer">
                <p>The information on this page and website do not constitute legal advice. A thorough evaluation of your facts and circumstances is necessary before any lawyer can provide you with a competent legal opinion.</p>
            </div>
        </div>
    </div>

<?php }
