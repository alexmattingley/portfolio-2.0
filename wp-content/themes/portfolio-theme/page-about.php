<?php while (have_posts()) : the_post();

$featured_image = get_field('featured_image') ? get_field('featured_image') : 'http://lorempixel.com/400/400/';
get_template_part('templates/page', 'header'); 

?>
<div class="about-block clearfix container padding-top padding-bottom medium-padding">
	<div class="col-sm-5 col-lg-4 col-lg-offset-1">
		<img src="<?php echo $featured_image; ?>" class="alignnone size-full wp-image-122 img-circle" />
	</div>
	<div class="col-sm-6 col-sm-offset-1 text-block">
		<?php the_content(); ?>
	</div>
</div>

<?php endwhile; ?>