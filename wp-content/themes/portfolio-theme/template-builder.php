<?php
    /**
     * Template Name: Page Builder
     */
?>

<?php
    while (have_posts()) : the_post();


    // check if the flexible content field has rows of data
    if ( have_rows('building_blocks') ) :


        // loop through the rows of data
        while ( have_rows('building_blocks') ) : the_row();


            if ( get_row_layout() == 'bb_otc' ) :

                get_template_part('building-blocks/columns');

            endif; // bb_otc


            if ( get_row_layout() == 'bb_hero' ) :

                get_template_part('building-blocks/hero');

            endif; // bb_hero                      


            if ( get_row_layout() == 'bb_inline_form' ) :

                get_template_part('building-blocks/inline-form');

            endif; // bb_inline_form


            if ( get_row_layout() == 'bb_slider' ) :

                get_template_part('building-blocks/sliders/full-slider/view');

            endif; // bb_inline_form            


        endwhile; // building_blocks



    else :

    // no layouts found

    endif;



    endwhile;

