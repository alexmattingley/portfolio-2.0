<?php use Roots\Sage\Extras; ?>

<div class="hero-banner">
  <nav>
    <div class="container-fluid">
      <div class="navbar-header">
        <div class="nav-trigger">
          <p>Menu</p>
          <div class="menu-icon">
            <span class="line" id="line-1"></span>
            <span class="line" id="line-2"></span>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <div class="header-nav">
    <?php
    if (has_nav_menu('primary_navigation')) :
      wp_nav_menu(['theme_location' => 'primary_navigation']);
    endif;
    ?>
  </div>
