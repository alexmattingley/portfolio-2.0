<?php
	/*====================================
	=            Social Links            =
	====================================*/
	
	
	/**
		* 	Suggested usage is to wrap these in a div and style accordingly
		* 	This keeps this clean, and you can style based on where its placed, like header / footer / contact page, etc.
		* 	Example:
		*	<div class="footer-social-links">
		*		<?php get_template_part('templates/social'); ?>
		*	</div>
	**/


	$social_links = get_field('social_network', 'options') ? get_field('social_network', 'options') : '';	

	foreach ($social_links as $s) {
		$name = $s["social_network_name"];
		$url = $s["social_network_url"];

		echo '<a href="' . $url . '" target="_blank" class="ss-icon ss-social-regular social-icon">' . $name . '</a>';
	}