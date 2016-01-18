<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Centre Alfa</title>
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/reset.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/font/icon-font/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/owl.carousel.css">
  <link rel="stylesheet"
        href="<?php echo get_stylesheet_uri(); ?>"
        media="screen"
        title="no title"
        charset="utf-8">
  <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-1.11.3.min.js"></script>
</head>
<body>
<h1 class="toHide">Centre Alfa</h1>
<div class="menuServices">
  <ul>
    <li><a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/logo_blue.png" alt="png"></a></li>
    <?php
    $args = array(
        'type'                     => 'post',
        'child_of'                 => 0,
        'parent'                   => '',
        'orderby'                  => 'ID',
        'order'                    => 'ASC',
        'hide_empty'               => 0,
        'hierarchical'             => 1,
        'exclude'                  => '',
        'include'                  => '',
        'number'                   => '',
        'taxonomy'                 => 'category',
        'pad_counts'               => false

    );
    $categories = get_categories( $args );
    foreach ($categories as $category) :
      ?>
      <?php if($category->parent == '199'): ?>
      <li>
        <a href="<?php bloginfo('wpurl'); ?>/category/services/<?php echo $category->slug; ?>"><?php echo $category->name; ?></a>
        <ul>
          <?php
          $cat_id = $category->cat_ID; //Saving id of the cat
          $cat_slug_parent = $category->slug;

          $query = new WP_query( 'category__in='.$cat_id ); //Looking for children articles

          while ( $query->have_posts() ):
            ?>
            <li>
              <?php $query->the_post(); ?>
              <a href="<?php bloginfo('url') ?>/<?php echo the_slug(); ?>"><?php echo get_the_title(); ?></a>
            </li>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
          <?php foreach ($categories as $cat_child) : ?>
            <?php if($cat_child->parent == $cat_id): ?>
              <li>
                <a href="<?php bloginfo('wpurl'); ?>/category/services/<?php echo $cat_slug_parent ?>/<?php echo $cat_child->slug; ?>"><?php echo $cat_child->name ?></a>
                <ul>
                  <?php
                  $cat_id_child = $cat_child->cat_ID; //Saving id of the cat
                  $query = new WP_query( 'category__in='.$cat_id_child ); //Looking for children articles

                  while ( $query->have_posts() ):
                    ?>
                    <li>
                      <?php $query->the_post(); ?>
                      <a href="<?php bloginfo('url') ?>/<?php echo the_slug(); ?>"><?php echo get_the_title(); ?></a>
                    </li>
                  <?php endwhile; ?>
                  <?php wp_reset_postdata(); ?>
                </ul>
              </li>
            <?php endif; ?>
          <?php endforeach; ?>
        </ul>
      </li>
    <?php endif; ?>
    <?php endforeach; ?>
    <li class="menu__search">
      <!-- <form action="#" method="post"> -->
      <!-- <input type="search" name="search" id="search" placeholder="Rechercher ..."><label for="search">&#xe618</label> -->
      <?php get_search_form(true); ?>
      <!-- </form> -->
    </li>
    <li class="mq__menu">
      <a href="<?php bloginfo('wpurl'); ?>/category/services">Services</a>
      <ul>
        <?php foreach ($categories as $category) : ?>
          <?php if($category->parent == '199'): ?>
            <li>
              <a href="<?php bloginfo('wpurl'); ?>/category/services/<?php echo $category->slug; ?>"><?php echo $category->name; ?></a>
            </li>
          <?php endif; ?>
        <?php endforeach; ?>
      </ul>
    </li>
  </ul>
</div>
<div class="banniere">
  <img src="<?php bloginfo('template_directory'); ?>/img/banner.png" alt="image banner">
  <div>
    <img src="<?php bloginfo('template_directory'); ?>/img/logowhite.png" alt="logo Centre Alfa" />
    <p>Service de santé mentale spécialisé
      dans la prévention et le traitement
      de l’alcoolisme et des toxicomanies
    </p>
  </div>
</div>
<div class="main">
  <div class="contain">

    <!-- Section Qui sommes nous ? -->
    <section class="quiSommesNous">
      <?php
      $query = new WP_query( 'name=qui-sommes-nous' ); //Looking for children articles

      while ( $query->have_posts() ):
        ?>
        <?php $query->the_post(); ?>
        <h2><?php echo get_the_title(); ?></h2>
        <p><?php echo get_the_content(); ?></p>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    </section>

    <!-- Section CALL -->
    <?php
    $query = new WP_query( 'name=contact' ); //Looking for children articles

    while ( $query->have_posts() ):
      ?>
      <?php $query->the_post(); ?>
      <section class="call">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="32" height="32" viewBox="0 0 32 32">
          <g id="icomoon-ignore">
          </g>
          <path d="M23.407 30.394c-2.431 0-8.341-3.109-13.303-9.783-4.641-6.242-6.898-10.751-6.898-13.785 0-2.389 1.65-3.529 2.536-4.142l0.219-0.153c0.979-0.7 2.502-0.927 3.086-0.927 1.024 0 1.455 0.599 1.716 1.121 0.222 0.442 2.061 4.39 2.247 4.881 0.286 0.755 0.192 1.855-0.692 2.488l-0.155 0.108c-0.439 0.304-1.255 0.869-1.368 1.557-0.055 0.334 0.057 0.684 0.342 1.068 1.423 1.918 5.968 7.55 6.787 8.314 0.642 0.6 1.455 0.685 2.009 0.218 0.573-0.483 0.828-0.768 0.83-0.772l0.059-0.057c0.048-0.041 0.496-0.396 1.228-0.396 0.528 0 1.065 0.182 1.596 0.541 1.378 0.931 4.487 3.011 4.487 3.011l0.050 0.038c0.398 0.341 0.973 1.323 0.302 2.601-0.695 1.327-2.85 4.066-5.079 4.066zM9.046 2.672c-0.505 0-1.746 0.213-2.466 0.728l-0.232 0.162c-0.827 0.572-2.076 1.435-2.076 3.265 0 2.797 2.188 7.098 6.687 13.149 4.914 6.609 10.532 9.353 12.447 9.353 1.629 0 3.497-2.276 4.135-3.494 0.392-0.748 0.071-1.17-0.040-1.284-0.36-0.241-3.164-2.117-4.453-2.988-0.351-0.238-0.688-0.358-0.999-0.358-0.283 0-0.469 0.1-0.532 0.14-0.104 0.111-0.39 0.405-0.899 0.833-0.951 0.801-2.398 0.704-3.424-0.254-0.923-0.862-5.585-6.666-6.916-8.459-0.46-0.62-0.641-1.252-0.538-1.877 0.187-1.133 1.245-1.866 1.813-2.26l0.142-0.099c0.508-0.363 0.4-1.020 0.316-1.242-0.157-0.414-1.973-4.322-2.203-4.781-0.188-0.376-0.336-0.533-0.764-0.533z" fill="#dfc330"></path>
        </svg>
        <p class="bold"><?php echo get_the_content(); ?></p>
      </section>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>

    <!-- Section services -->

    <section class="services">

      <h2>Nos services</h2>

      <?php
      $args = array(
          'type'                     => 'post',
          'child_of'                 => 0,
          'parent'                   => '',
          'orderby'                  => 'ID',
          'order'                    => 'ASC',
          'hide_empty'               => 0,
          'hierarchical'             => 1,
          'exclude'                  => '',
          'include'                  => '',
          'number'                   => '',
          'taxonomy'                 => 'category',
          'pad_counts'               => false

      );
      $categories = get_categories( $args );
      foreach ($categories as $category) :
        ?>
        <?php if($category->parent == '199'): ?>
        <div class="window">
          <a href="<?php bloginfo('wpurl'); ?>/category/services/<?php echo $category->slug; ?>" class="svgContainer">
            <p class="header"><?php echo $category->name ?></p>
            <div class="svg svg__<?php echo $category->slug  ?>"></div>
            <p>
              <?php echo $category->description; ?>
            </p>
          </a>
        </div>
      <?php endif; ?>
      <?php endforeach; ?>

    </section>

    <!-- Section News -->

    <section class="news">

      <h2>News</h2>
      <div class="owl-carousel">

        <?php
        $query = new WP_query( 'post_type=news' );

        while ( $query->have_posts() ):
          ?>
          <?php $query->the_post(); ?>
          <div class="item">
            <p class="header"><?php echo get_the_title(); ?></p>
            <p>
              <?php echo get_field('content'); ?>
            </p>
          </div>

        <?php endwhile; ?>

        <?php wp_reset_postdata(); ?>

    </section>

    <?php get_footer(); ?>
