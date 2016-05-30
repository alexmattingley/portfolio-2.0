<?php 

	$data = array(); // Placeholder for data

	/**
	 * Returns an array with data from a custom post type, category or tag
	 */
	function dynamicSlides() {

		$source           = get_sub_field('selected_source') ? get_sub_field('selected_source') : '';
		$post_type_source = get_sub_field('pt_source') && $source == 'Post Type' ? get_sub_field('pt_source') : '';
		$cat_source       = get_sub_field('cat_source') && $source == 'Categories' ? get_sub_field('cat_source')->slug : '';
		$tag_source       = get_sub_field('tag_source') && $source == 'Tags' ? get_sub_field('tag_source')->slug : '';
		$post_length      = get_sub_field('post_length');

		// the arguments for the wp_query, are driven by what the admin selects as the source
		// they can choose to select a post type, category or tag, as well as how many should return
		$args = array(
			'post_type' => $post_type_source,
			'category_name' => $cat_source,
			'tag' => $tag_source,
			'posts_per_page' => $post_length
		);

		$slide = new WP_Query($args);

		$i = 0;

		if ($slide->have_posts()): 
			while ($slide->have_posts()): $slide->the_post();

				// setting blank variables, these will be determined by the switch statement
				$large_url;
				$small_url;

				switch ($post_type_source) {

					case 'person': // if its a person cpt
						$large_url = get_field('person_bio_image')["url"];
						$small_url = get_field('person_alt_bio_image')["url"];

						break;

					case 'resource': // if its a resource cpt
						$large_url = get_field('resource_large_image')["url"];
						$small_url = get_field('resource_archive_thumbnail')["url"];

						break;

					case 'testimonial': // if its a testimonial cpt
						$large_url = get_field('testimonial_photo')["url"];
						$small_url = get_field('testimonial_photo')["sizes"]["large"];

						break;																		
					
					default: // if its a post cpt
						$thumb_id = get_post_thumbnail_id();
						$large = wp_get_attachment_image_src($thumb_id, 'full', true);
						$small = wp_get_attachment_image_src($thumb_id, 'large', true);
						$large_url = $large[0];
						$small_url = $small[0];

						break;
				}

				// for each post, we create an array, that has the following in it
				$data[$i]['content']   = get_the_title() . '<br><p>' . get_the_content() . '</p>';
				$data[$i]['large_img'] = $large_url;
				$data[$i]['small_img'] = $small_url;

				// skip to the bottom to see a sample of what this will produce

				$i++;

			endwhile;
		endif;

		return $data;
	}

	/**
	 * Returns an array with data from a acf repeater field
	 */
	function staticSlides() {

		$slide = get_sub_field('slide');

		$i = 0;

		foreach ($slide as $s) {
			$data[$i]['content']   = $s["content"];
			$data[$i]['large_img'] = $s["large_image"]["url"];
			$data[$i]['small_img'] = $s["small_image"];            

			// skip to the bottom to see a sample of what this will produce		

			$i++;
		}

		return $data;

	}	


	// based on if the content is dynamic or static, a function is called to retrieve the data, and put it in the $data array
	if ($ds == 'dynamic') {
		$data = dynamicSlides();
	} else {
		$data = staticSlides();
	}

	// we now have an array that contains either dynamic content, or static manual content
	// we can treat this data the same way, since its in the same format, an array, with the same properties

	/**
	 * This will produce an array like this:
	 *
	 * Array
	 * (
	 *     [0] => Array
	 *         (
	 *             [content] => I'm Old Gregg...
	 *             [large_img] => //localhost:3000/wp-content/uploads/0000/00/old-gregg.jpg
	 *             [small_img] => //localhost:3000/wp-content/uploads/0000/00/old-gregg.jpg
	 *         )
	 *
	 *     [1] => Array
	 *         (
	 *             [content] => Easy there fuzzly little man peach...
	 *             [large_img] => //localhost:3000/wp-content/uploads/0000/00/curley-jefferson.jpg
	 *             [small_img] => //localhost:3000/wp-content/uploads/0000/00/curley-jefferson.jpg
	 *         )				
	 * 
	 * )
	 */		