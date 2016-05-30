<?php
	/*========================================
	=            One / Two Column(s)            =
	========================================*/
	
	
	

	// Includes Global Settings && Extras
	include('global.php');
	use Roots\Sage\Extras;

?>

<?php /*----------  Hero Block Fields  ----------*/

	// Left
	$content_left    = get_sub_field('content_left') ? get_sub_field('content_left') : '';
	$col_width_left  = get_sub_field('col_width_left') ? get_sub_field('col_width_left') : '';
	
	// Right
	$content_right   = get_sub_field('content_right') ? get_sub_field('content_right') : '';
	$col_width_right = get_sub_field('col_width_right') ? get_sub_field('col_width_right') : '';
	
	// Settings
	$bg_color        = get_sub_field('bg_color') ? get_sub_field('bg_color') : 'transparent';
	$text_color      = get_sub_field('text_color') ? get_sub_field('text_color') : '';
	$bg_image_lg     = get_sub_field('bg_image') ? get_sub_field('bg_image')['url'] : '';
	$bg_image_sm     = get_sub_field('bg_image') && get_sub_field('hom') != 1 ? get_sub_field('bg_image')['sizes']['large'] : '';
	$bg_repeat       = get_sub_field('bg_repeat') ? get_sub_field('bg_repeat') : '';
	$bg_position     = get_sub_field('bg_position') ? get_sub_field('bg_position') : '';
	$container_width = get_sub_field('container_width') ? get_sub_field('container_width') : '';
	$bg_size         = get_sub_field('bg_size') ? get_sub_field('bg_size') : '';
	$hom             = get_sub_field('hom') ? get_sub_field('hom') : '';
	$bgc_mobile      = get_sub_field('bgc_mobile') && get_sub_field('hom') == 1 ? get_sub_field('bgc_mobile') : 'transparent';
	$col_center_left = get_sub_field('col_center_left') ? get_sub_field('col_center_left') : '';
	$t_padding       = get_sub_field('t_padding') ? get_sub_field('t_padding') : '';
	$b_padding       = get_sub_field('b_padding') ? get_sub_field('b_padding') : '';
	
	// Video
	$bgv_mp4         = get_sub_field('bgv_mp4') ? get_sub_field('bgv_mp4') : '';
	$bgv_webm        = get_sub_field('bgv_webm') ? get_sub_field('bgv_webm') : '';
	$bgv_oggv        = get_sub_field('bgv_oggv') ? get_sub_field('bgv_oggv') : '';

	// overlay
	$overlay_color         = get_sub_field('overlay_color') ? get_sub_field('overlay_color') : '';
	$overlay_opacity         = get_sub_field('overlay_opacity') ? get_sub_field('overlay_opacity') / 100 : '';

	if ($overlay_color) {
		list($r, $g, $b) = sscanf($overlay_color, "#%02x%02x%02x");
		$overlay_color = "$r , $g , $b";
	}
	$overlay = $overlay_color && $overlay_opacity ? '<span class="section-overlay" style="background-color: rgba(' . $overlay_color . ', ' . $overlay_opacity . ');"></span>' : '';
	
	$global_id              = !empty($global_id) ? $global_id : 'one-two-column-' . rand() * rand();

	//Extras\prettyPrint($bg_image);
?>

<section class="one-two-columns <?php echo $t_padding . ' ' . $b_padding; ?> <?php if($bgv_mp4 || $bgv_webm || $bgv_oggv) { echo 'with-video'; } ?> <?php echo $global_class; ?>" id="<?php echo $global_id; ?>">

	<?php echo $overlay; ?>

	<div class="container <?php if($bgv_mp4 || $bgv_webm || $bgv_oggv) { echo 'over-video'; } ?>">

		<div class="row">

			<div class="<?php echo $container_width; ?> col-sm-12 col-sm-offset-0">


				<div class="row">

					<?php // if this column is empty, don't show it ?>
					<?php if (!empty($content_left)): ?>

						<div class="<?php echo $col_width_left; ?> col-xs-12 col-xs-offset-0 col-content"><?php echo $content_left; ?></div>
						
					<?php endif; ?>

					<?php // if this column is empty, don't show it ?>
					<?php if (!empty($content_right)): ?>

						<?php
							// This addresses the occassion when there is content, only on the right, nothing on the left
							// by default, this will put the content in the left slot, this will keep it on the right

							$push = '';

							if (empty($content_left)) {
								
								switch ($col_width_right) {
									case 'col-md-4':
										$push = 'col-md-offset-8';
										break;
									case 'col-md-6':
										$push = 'col-md-offset-6';
										break;
									case 'col-md-8':
										$push = 'col-md-offset-4';
										break;
									case 'col-md-12':
										$push = 'col-md-offset-0';
										break;																								
									
									default:
										$push = 'col-md-offset-0';
										break;
								}

							}
						?>

						<div class="<?php echo $col_width_right . ' ' . $push; ?> col-xs-12 col-xs-offset-0 col-content"><?php echo $content_right; ?></div>
						
					<?php endif; ?>			
				</div>


			</div>

		</div>

	</div>

	<?php if ($bgv_mp4 || $bgv_webm || $bgv_oggv): ?>
		
		<video loop id="intro-video" class="video-background" muted="true" autoplay="true" preload="true"> 
		  <source type="video/mp4" src="<?php echo $bgv_mp4; ?>">
		  <source type="video/webm" src="<?php echo $bgv_webm; ?>"> 
		  <source type="video/ogg" src="<?php echo $bgv_oggv; ?>"> 
		</video>			
		
	<?php endif; ?>

	<!-- This is here, so when ajaxing in, this style comes with it -->

	<style type="text/css">
		#<?php echo $global_id; ?> {
			background-image: url(<?php echo $bg_image_sm; ?>);
			background-position: center center;
			background-color: <?php echo $bgc_mobile; ?>;
			background-repeat: no-repeat;
			background-size: cover;
			color: <?php echo $text_color; ?>;
		}

		@media (min-width: 992px) {

			#<?php echo $global_id; ?> {
				background-image: url(<?php echo $bg_image_lg; ?>);
				background-position: <?php echo $bg_position; ?>;
				background-color: <?php echo $bg_color; ?>;
				background-repeat: <?php echo $bg_repeat; ?>;
				background-size: <?php echo $bg_size; ?>;
			}		

		}	
	</style>	

</section>