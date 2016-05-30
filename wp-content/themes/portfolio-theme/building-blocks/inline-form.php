<?php
	/*===================================
	=            Inline Form            =
	===================================*/
	
	
	$form_id = get_sub_field('form_id') ? get_sub_field('form_id') : '';
?>

<section class="inline-form">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php
					if ($form_id) {
						echo do_shortcode('[gravityform id="' . $form_id . '" name="Inline Form" title="true" description="false" ajax="true"]');
					}
				?>
			</div>
		</div>
	</div>
</section>