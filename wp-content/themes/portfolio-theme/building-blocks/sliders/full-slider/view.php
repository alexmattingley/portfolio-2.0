<?php
	use Roots\Sage\Extras;
	include('settings.php'); // Includes Pattern Specific Settings
	include('data.php'); // Includes Pattern Data Settings
	include(get_template_directory() . '/building-blocks/global.php'); // Includes Global Settings

	$global_id = !empty($global_id) ? $global_id : 'slider-' . rand() * rand(); // assigns an id if one isn't specified in the admin, helps with styling unique content

	//Extras\prettyPrint($data); // use this to debug, as it gives you a print out of the array you're working with

	// if there is 1 or less slides, disable the looping feature, as it can be buggy
	if (count($data) <= 1) {
		$looping = false;
	}
?>

<section id="<?php echo $global_id; ?>" class="slider-wrap <?php echo $global_class; ?>" data-speed="<?php echo $tran_speed; ?>" data-pause="<?php echo $pause_speed; ?>" data-loop="<?php echo $looping; ?>" data-start="<?php echo $a_start; ?>">
	
	<div class="slider owl-carousel <?php echo $dot_nav . ' ' . $arrow_nav; ?>">

		<?php foreach ($data as $d): ?>

			<?php $slide_id = 'slide-' . rand() * rand(); ?>

			<div class="slide" id="<?php echo $slide_id; ?>">
				
				<!-- we're inlining here, so we can control what image(s) are served on mobile, speeding up the site -->
				<style type="text/css">
					
					#<?php echo $slide_id; ?> {
						background-image: url(<?php echo $d['small_img'];?>);
					}

					@media (min-width: 769px) {

						#<?php echo $slide_id; ?> {
							background-image: url(<?php echo $d['large_img'];?>);
						}						

					}

				</style>

				<div class="container">

					<div class="row">
					
						<!-- this will be centered by default -->
						<div class="<?php echo $container_width; ?> col-sm-12 col-sm-offset-0">
							
							<div class="slide-content"><?php echo $d["content"]; ?></div>

						</div>

					</div>

				</div>

			</div>
			
		<?php endforeach; ?>

	</div>

	<style type="text/css">
		
		#<?php echo $global_id; ?> {
			color: <?php echo $text_color; ?>;
		}

	</style>	

</section>