<?php
	/*==================================
	=            Hero Block            =
	==================================*/

	// Includes Global Settings
	include('global.php');
?>

<?php /*----------  Hero Block Fields  ----------*/

	// Large Screens
	$bg_large        = get_sub_field('bg_large') ? get_sub_field('bg_large') : '';
	$bg_position_lg  = get_sub_field('bg_position_lg') ? get_sub_field('bg_position_lg') : '';
	$bg_color_lg     = get_sub_field('bg_color_lg') ? get_sub_field('bg_color_lg') : '';
	$bg_repeat_lg    = get_sub_field('bg_repeat_lg') ? get_sub_field('bg_repeat_lg') : '';
	$bg_cover_lg     = get_sub_field('bg_cover_lg') ? get_sub_field('bg_cover_lg') : '';
	
	// Small Screens
	$bg_small        = get_sub_field('bg_small') ? get_sub_field('bg_small') : '';
	$bg_position_sm  = get_sub_field('bg_position_sm') ? get_sub_field('bg_position_sm') : '';
	$bg_color_sm     = get_sub_field('bg_color_sm') ? get_sub_field('bg_color_sm') : '';
	$bg_repeat_sm    = get_sub_field('bg_repeat_sm') ? get_sub_field('bg_repeat_sm') : '';
	$bg_cover_sm     = get_sub_field('bg_cover_sm') ? get_sub_field('bg_cover_sm') : '';	
	
	// Hero Content
	$content         = get_sub_field('content') ? '<div class="hero-text">' . get_sub_field('content') . '</div>' : '';	
	$content_width = get_sub_field('content_width') ? get_sub_field('content_width') : 'col-md-8 col-md-offset-2';
	
	// Block Settings
	$text_color      = get_sub_field('text_color') ? get_sub_field('text_color') : '';	
	$arrow_color     = get_sub_field('arrow_color') ? '<a href="" class="down-arrow ' . get_sub_field('arrow_color') . '">See Content Below</a>' : '';	

	$global_id = !empty($global_id) ? $global_id : 'hero-' . rand() * rand();
?>

<section id="<?php echo $global_id; ?>" class="hero <?php echo $global_class; ?>">
	<div class="hero-content">
		<div class="container">
			<div class="row">
				<div class="<?php echo $content_width; ?> col-sm-12 col-sm-offset-0">
					<?php
							echo $content;
							echo $arrow_color;
					?>		
				</div>
			</div>
		</div>
	</div>
	
	<!-- This is here, so when ajaxing in, this style comes with it -->

	<style type="text/css">
		#<?php echo $global_id; ?> {
			background-image: url(<?php echo $bg_small; ?>);
			background-position: <?php echo $bg_position_sm; ?>;
			background-color: <?php echo $bg_color_sm; ?>;
			background-repeat: <?php echo $bg_repeat_sm; ?>;
			background-size: <?php echo $bg_cover_sm; ?>;
			color: <?php echo $text_color; ?>;
		}

		@media (min-width: 768px) {

			#<?php echo $global_id; ?> {
				background-image: url(<?php echo $bg_large; ?>);
				background-position: <?php echo $bg_position_lg; ?>;
				background-color: <?php echo $bg_color_lg; ?>;
				background-repeat: <?php echo $bg_repeat_lg; ?>;
				background-size: <?php echo $bg_cover_lg; ?>;
			}		

		}

		@media (max-height: 768px) {

			#<?php echo $global_id; ?> {
				background-image: url(<?php echo $bg_small; ?>);
				background-position: <?php echo $bg_position_sm; ?>;
				background-color: <?php echo $bg_color_sm; ?>;
				background-repeat: <?php echo $bg_repeat_sm; ?>;
				background-size: <?php echo $bg_cover_sm; ?>;
			}		

		}	
	</style>

</section>