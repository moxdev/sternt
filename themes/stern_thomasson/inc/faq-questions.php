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

            <div class="faq-wrapper">

            <?php while( have_rows('faq_section') ): the_row();

                $question = get_sub_field('question');
                $answer = get_sub_field('answer');

                ?>

                <div class="question-wrapper">

                    <?php if( !empty($question) ) : ?>

                        <span class="expand-btn"><button>&#709;</button></span><h3><?php echo $question; ?></h3>

                    <?php endif; ?>

                    <?php if( !empty($answer) ) : ?>

                        <div class="answer">

                            <?php echo $answer; ?>

                        </div>

                    <?php endif; ?>

                </div><!-- question-wrapper -->

            <?php endwhile; ?>

            </div><!-- faq-wrapper -->

        <?php endif;

    }
}


