<?php
    /**
    *
    * Template for Custom Post Type {resource}
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
        $icon         = get_field('resource_icon') ? '<img src="' . get_field('resource_icon') . '" />' : '';
        $thumbnail    = get_field('resource_archive_thumbnail') ? '<img src="' . get_field('resource_archive_thumbnail')["url"] . '" />' : '';
        $hero         = get_field('resource_large_image') ? '<img src="' . get_field('resource_large_image')["url"] . '" />' : '';
        $video_url    = get_field('resource_video_url') ? get_field('resource_video_url') : '';

        $link_options = get_field('resource_link_open_options') ? get_field('resource_link_open_options') : '';
        $target;

        if ($video_url) {

            if ($link_options == 'Open in Same Window') {
                $target = 'class="resource-link" target="_self"';
            } elseif ($link_options == 'Open in New Window') {
                $target = 'class="resource-link" target="_blank"';
            } else {
                $target = 'class="video-modal-trigger" data-effect="mfp-zoom-in"';
            }

        }

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

                echo '<div class="row">';

                    echo '<div class="col-md-6">';

                        echo '<h3>Icon</h3><br>' . $icon;

                    echo '</div>';

                    echo '<div class="col-md-6">';

                        echo '<h3>Thumbnail</h3><br>' . $thumbnail;

                    echo '</div>';                    

                echo '</div>';   

                echo '<div class="row">';

                    echo '<div class="col-md-12">';

                        echo '<h3>Hero</h3><br>' . $hero;

                    echo '</div>';                   

                echo '</div>';

                echo '<div class="row">';

                    echo '<div class="col-md-12">';

                        echo '<h3>Resource Link</h3><br>';

                        if ($video_url) {
                            echo '<a href="' . $video_url . '" ' . $target . '">Resource Link</a>';
                        }

                    echo '</div>';                   

                echo '</div>';                                           

            echo '</div>';

            echo '<footer>';

        echo '</article>';


        $count++;


    endwhile;