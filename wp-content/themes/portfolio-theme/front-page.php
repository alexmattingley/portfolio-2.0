<?php while (have_posts()) : the_post(); ?>
    <div class="loading-screen">
        <h1>hold tight <i class="fa fa-6 fa-spin fa-circle-o-notch" aria-hidden="true"></i></h1>
    </div>
    <div class="hero-text text-center home-page-hero container">
        <h1></h1>
        <p></p>
        <a class="btn secondary hollow" href="#work">Find Out More</a>
    </div>
</div> <!--End div hero banner-->
<div class="container padding-top padding-bottom medium-padding">
    <a name="work"></a>
    <div class="work-block">
        <h2 class="text-center">Recent Projects</h2>
        <ul class="list-unstyled clearfix">
            <?php get_template_part('templates/content', 'project'); ?>
        </ul>
        <h5 class="text-center more-projects"><a href="javascript:;">More Projects</a><i class="glyphicon glyphicon-menu-down text-center"></i></h5>
    </div>
</div>
<div class="work-cta">
    <div class="container padding-top padding-bottom medium-padding">
        <h2>Let's Work Together</h2>
        <a class="btn tertiary hollow" href="#contact">Get in Touch</a>
    </div>
</div>
<div class="skills-block padding-top padding-bottom medium-padding">
    <a name="skill"></a>
    <div class="container">
        <div class="skills-block-header">
            <h2 class="text-center">Skills & Languages</h2>
            <p class="text-center">I speak to the machines so you don't have to.</p>
        </div>
        <ul class="list-unstyled row even-col" id="skill-row-1">
            <?php get_template_part('templates/content', 'skill'); ?>
        </ul>
    </div>
    <!-- <h5 class="text-center more-skills"><a href="javascript:;">More Skills</a><i class="glyphicon glyphicon-menu-down text-center"></i></h5> -->
</div>
<div class="contact-block container padding-top padding-bottom medium-padding">
    <a name="contact"></a>
    <?php get_template_part('templates/content', 'contact'); ?>
</div> 
<?php endwhile; ?>

