<?php
    /**
    *
    * Template for Custom Post Type {testimonial}
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
	        $name         = '<span class="testimonial-author">' . get_the_title() . '</span>';
	        $quote        = get_field('testimonial_quote') ? get_field('testimonial_quote') : '';
	        $position     = get_field('testimonial_position') ? '<span class="testimonial-position">' . get_field('testimonial_position') . '</span>' : '';
	        $company      = get_field('testimonial_company') ? '<span class="testimonial-company">' . get_field('testimonial_company') . '</span>' : '';
	        $img          = get_field('testimonial_photo') ? '<img src="' . get_field('testimonial_photo') . '" />' : '';
	        $quote_credit = '<p class="testimonial-credit">' . $name . ' // ' . $position . ', ' . $company . '</p>';

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

		                echo '<h3 class="entry-title person-name">' . get_the_title() . '</h3>';

		            echo '</header>';

		            echo '<div class="entry-content">';

		                echo '<a href="' . get_permalink() . '">' . $img . '</a>';

		                echo $quote;

		                echo $quote_credit;


		            echo '</div>';

		            echo '<footer>';

		        echo '</article>';

	        echo '</div>';


	        $count++;


	    endwhile;

	?>

</div>