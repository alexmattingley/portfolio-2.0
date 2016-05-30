<?php
    /**
    *
    * Template for Custom Post Type {resource}
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

	        echo '<div class="col-md-4">';

		        echo '<article class="' . $classes . '">';

		            echo '<h3 class="entry-title person-name">' .  $icon . get_the_title() . '</h3>';

		            if ($video_url) {
		                echo '<a href="' . $video_url . '" ' . $target . '">' . $thumbnail . '</a>';
		            } else {
		            	echo '<a href="' . get_permalink() . '">' . $thumbnail . '</a>';
		            }

		        echo '</article>';

	        echo '</div>';


	        $count++;


	    endwhile;

	?>

</div>