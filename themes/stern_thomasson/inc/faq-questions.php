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
                    <div class="question-content">

                        <?php if( !empty($question) ) : ?>

                            <div class="question-title">
                                <a href="#" class="toggle-info btn">
                                    <span class="left"></span>
                                    <span class="right"></span>
                                </a>
                                <h3><?php echo $question; ?></h3>
                            </div>

                        <?php endif; ?>

                        <?php if( !empty($answer) ) : ?>

                            <div class="answer-container reveal">
                                <div class="answer-content">

                                    <?php echo $answer; ?>

                                </div>
                            </div>

                        <?php endif; ?>

                    </div><!-- question-content -->
                </div><!-- question-wrapper -->

            <?php endwhile; ?>

            </div><!-- faq-wrapper -->

        <?php endif;

    }
}


