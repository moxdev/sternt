<?php
/**
 * Stern Thomasson LLP FAQ Questions and Answers function
 *
 * Displays the question and answer section on the FAQ page.
 *
 * @package Stern_Thomasson_LLP
 */

function stern_thomasson_faq_questions() {
    if ( function_exists( 'get_field' ) ) {

        if( have_rows('faq_section') ): ?>

            <section class="faq-section">

            <?php while( have_rows('faq_section') ): the_row();

                $question = get_sub_field('question');
                $answer = get_sub_field('answer');

                ?>

                <div class="faq-wrapper">

                    <?php if( !empty($question) ) : ?>

                        <h3><?php echo $question; ?><span class="expand-btn"><button>+</button></span></h3>

                    <?php endif; ?>

                    <?php if( !empty($answer) ) : ?>

                        <div class="answer">

                            <?php echo $answer; ?>

                        </div>

                    <?php endif; ?>

                </div><!-- faq-wrapper -->

            <?php endwhile; ?>

            </section>

        <?php endif;

    }
}


