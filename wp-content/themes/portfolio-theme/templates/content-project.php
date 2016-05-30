<?php use Roots\Sage\Titles;
            
$project_type = array(
    'post_type' => 'project'
);

$the_query = new WP_Query( $project_type );

$post_counter = 0;

while ( $the_query->have_posts() ) { 
	$the_query->the_post();
	$home_page_blurb = get_field( 'home_page_blurb' ) ? get_field( 'home_page_blurb' ) : 'An amazing project';
	$featured_image = get_field('featured_image') ? get_field('featured_image') : 'http://lorempixel.com/400/400/';

	?>

	<li class="col-md-4">
	    <div class="text-center indiv-project" style="background: url('<?php echo $featured_image; ?>')">
	        <a class="a_wrap" href="<?php the_permalink(); ?>">
	            <div class="text-cover">
	                <div class="text-container">
	                    <h3><?= Titles\title(); ?></h3>
	                    <p><?php echo $home_page_blurb; ?></p>
	                </div>
	            </div>
	        </a>
	    </div>
	</li>

<?php }; ?>
<?php wp_reset_query(); ?>