<?php
    /**
    *
    * Template for Custom Post Type {people}
    *
    **/

    use Roots\Sage\Extras;
?>

<div class="row">
	<div class="col-md-12">
		<h1><?php post_type_archive_title(); ?> Archive...</h1>
	</div>

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
	        $position      = get_field('person_position') ? get_field('person_position') : '';
	        $company       = get_field('person_company') ? get_field('person_company') : '';
	        $short_bio     = get_field('person_short_bio') ? get_field('person_short_bio') : '';
	        $alt_image     = get_field('person_alt_bio_image') ? '<img src="' .  get_field('person_alt_bio_image')["url"] . '" />' : '';

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

	        
	        echo '<div class="col-md-4">';

		        echo '<article class="' . $classes . '">';

		            echo '<header>';

		            echo '</header>';

		            echo '<div class="entry-content">';

		                echo '<a href="' . get_permalink() . '">' . $alt_image . '</a>';

		                echo get_the_title() . ' // ' . $position . ', ' . $company;

		                echo $short_bio;

		            echo '</div>';

		            echo '<footer>';

		        echo '</article>';

	        echo '</div>';


	        $count++;


	    endwhile;

	?>

</div>