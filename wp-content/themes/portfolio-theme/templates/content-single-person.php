<?php
    /**
    *
    * Template for Custom Post Type {people}
    *
    **/

    use Roots\Sage\Extras;
?>

<?php

    $count = 1;

    while (have_posts()) : the_post();

        /* Gets post classes for current post */        
        $classes_raw = get_post_class();
        $classes = '';

        foreach ($classes_raw as $class) {
            $classes .= $class . ' ';
        }


        /* Fields */
        $position      = get_field('person_position') ? '<p class="person-position">' . get_field('person_position') . '</p>' : '';
        $company       = get_field('person_company') ? '<p class="person-company">' . get_field('person_company') . '</p>' : '';
        $short_bio     = get_field('person_short_bio') ? get_field('person_short_bio') : '';
        $long_bio      = get_field('person_long_bio') ? get_field('person_long_bio') : '';
        $primary_image = get_field('person_bio_image') ? '<img src="' .  get_field('person_bio_image')["url"] . '" />' : '';
        $alt_image     = get_field('person_alt_bio_image') ? '<img src="' .  get_field('person_alt_bio_image')["url"] . '" />' : '';
        $social_links  = get_field('social_links') ? get_field('social_links') : '';

        /**
        *
        * Depending on the sizes used for large / small screens, we may inline some media queries using the ["sizes"] 
        * and switch to using a background image. If so, use the $count variable to add a unique ID to the div used for the 
        * background image.
        *
        *   '<div id="person-bio-' . $count . '"></div>';
        *
        *   echo '<style type="text/css">';
        *   
        *      echo '#person-bio-' . $count . ' { background-image: url(' . $small . '); }';
        *      
        *      echo '@media (min-width: 601px) {';
        *        
        *          echo '#person-bio-' . $count . ' { background-image: url(' . $medium . '); }';
        *            
        *      echo '}';
        *        
        *      echo '@media (min-width: 1200px) {';
        *        
        *          echo '#person-bio-' . $count . ' { background-image: url(' . $large . '); }';
        *            
        *      echo '}';
        *        
        *   echo '</style>'; 
        **/

        

        echo '<article class="' . $classes . '">';

            echo '<header>';

                echo '<h1 class="entry-title person-name">' . get_the_title() . '</h1>';

                echo get_template_part('templates/entry-meta');

            echo '</header>';

            echo '<div class="entry-content">';

                echo '<strong>Position:</strong> ' . $position;

                echo '<strong>Company:</strong> ' . $company;

                echo '<strong>Short Bio:</strong> ' . $short_bio;

                echo '<strong>Long Bio:</strong> ' . $long_bio;

                echo '<strong>Primary Image:</strong><br>' . $primary_image;

                echo '<br><strong>Alternate Image:</strong><br>' . $alt_image;

                if ($social_links) {
                    
                    foreach ($social_links as $social) {
                        
                        $name = $social["social_link_name"] ? $social["social_link_name"] : '';
                        $url = $social["social_link_url"] ? $social["social_link_url"] : '';

                        if ($name && $url) {
                            
                            echo '<a href="' . $url . '" target="_blank">' . $name . '</a>';

                        }

                    }

                }

            echo '</div>';

            echo '<footer>';

        echo '</article>';


        $count++;


    endwhile;