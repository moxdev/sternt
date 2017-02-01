<?php
/**
 * Stern Thomasson LLP Contact Page content
 *
 * Displays the Contact Page contact form and directions map
 *
 * @package Stern_Thomasson_LLP
 */

function stern_thomasson_contact_directions_map() { ?>

    <div class="sidebar-wrapper">
        <div class="sidebar-info"> <?php
            $address = get_field( 'address', 'option' );
            $address_2 = get_field( 'address_2', 'option' );
            $phone = get_field( 'phone', 'option' );
            $fax = get_field( 'fax', 'option' ); ?>

            <div class="location">
                <h2>address/phone</h2>
                <span><?php echo $address ?></span><br>
                <span><?php echo $address_2 ?></span><br>
                <span>Phone: </span><span><?php echo $phone ?></span><br>
                <span>Fax: </span><span><?php echo $fax ?></span>
            </div>

        </div> <!-- sidebar-info -->

        <div class="map-wrapper">
            <h2>find us</h2>
            <div id="map-canvas"></div>
            <form id="get-directions">
                <label>Starting Address:
                    <input type="text" id="start">
                    <input type="hidden" id="end" value="38.800410,-76.987104">
                </label>
                <div id="response-panel"></div>
                <input type="submit" value="Get Directions">
            </form>
        </div> <!-- map-wrapper -->
        <div class="disclaimer">
            <p><span class="bold">Privacy Notice:</span> We will use your email only for the limited purpose of contacting you about your inquiry. We do not share this information with anyone.</p>
            <p><span class="bold">Disclaimer:</span> Submitting an inquiry, calling us, or sending an email does not create a lawyer-client relationship. We will not represent you unless we express to you in writing our willingness to take you on as a client, which will be in the form of a retainer letter or retainer agreement.</p>
        </div>
    </div> <!-- sidebar-wrapper -->

    <?php
}