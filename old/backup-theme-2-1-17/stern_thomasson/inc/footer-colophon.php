<?php
/**
 * Stern Thomasson LLP Footer Colophon
 *
 * Displays the footer information
 *
 * @package Stern_Thomasson_LLP
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
                ?><span class="bold-name"><?php echo $name . "<br>"; ?></span><?php
            endif;
            if ( $address):
                echo $address . "<br>";
            endif;
            if ( $address_2):
                echo $address_2 . "<br>";
            endif;
            if ( $phone):
                echo "Phone: "?><a href="tel:<?php echo $phone ?>"><?php echo $phone . "<br>"; ?></a><?php
            endif;
            if ( $fax):
                echo "Fax: " . $fax . "<br>";
            endif;
            ?>
        </div>
        <div class="footer-right">
            <div class="associations">
                <figure>
                    <img class="naca-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/imgs/naca-web-logo.png" alt="national association of consumer advocates logo">
                    <img class="avvo-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/imgs/avvo-logo.png" alt="avvo logo">
                </figure>
            </div>
            <div class="disclaimer">
                <p>The information on this page and website do not constitute legal advice. A thorough evaluation of your facts and circumstances is necessary before any lawyer can provide you with a competent legal opinion.</p>
            </div>
            <a class="mm4" href="https://www.mm4solutions.com/" target="_blank" id="mms">Website by Millennium Marketing Solutions</a>
        </div>
    </div>

<?php }