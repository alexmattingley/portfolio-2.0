<?php use Roots\Sage\Titles; ?>
<?php
            
$skill_type = array(
    'post_type' => 'skill'
);

$the_query = new WP_Query( $skill_type );

while ( $the_query->have_posts() ) { 
  $the_query->the_post();

  $font_awesome_class = get_field( 'font_awesome_class' ) ? get_field( 'font_awesome_class' ) : 'fa-wordpress';

  ?>

  <li class="col-xs-10 col-xs-offset-1 col-sm-offset-0 col-sm-4 col-lg-4 text-center">
      <i class="fa fa-5x <?php echo $font_awesome_class; ?> text-center"></i>
      <h4><?= Titles\title(); ?></h4>
      <?php the_content(); ?>
  </li>

<?php }; ?>
<?php wp_reset_query(); ?>