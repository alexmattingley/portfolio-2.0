<?php use Roots\Sage\Config; ?>
<?php use Roots\Sage\Wrapper; ?>
<?php use Roots\Sage\Titles; ?>

<?php while (have_posts()) : the_post(); ?>

<?php 
$project_url =         get_field( 'project_url' ) ? get_field( 'project_url' ) : 'http://alexmattingley.com';
$project_screenshots = get_field('project_screenshots') ? get_field('project_screenshots') : 'No screenshots to display';

?>

      <div class="hero-text text-center">
        <h1>project > <?= Titles\title(); ?></h1>
      </div>
    </div>
    <div class="container indiv-project-page" id="project-section">
      <div class="project_description col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2">
        <?php the_content(); ?>
        <p>Want to see the project live? Click <a target="_blank" href="<?php echo $project_url; ?>">here</a></p>
      </div>
      <div class="project_screenshots col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2">
        <?php echo $project_screenshots; ?>
      </div>
      <div class="project_links col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2">
        <a target="_blank" href="<?php echo $project_url; ?>">See the Project Live</a>
      </div>
    </div><!--end of indiv-project-page-->
<?php endwhile; ?>
