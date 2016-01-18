<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
<div class="small_banner">
    <div class="small_banner__left">
        <img src="<?php bloginfo('template_directory'); ?>/img/logowhite.png" alt="logo Centre Alfa" />
        <p>
            Alfa
        </p>
    </div>
    <div class="small_banner__right">
        <p>
            Service de santé mentale spécialisé dans la prévention et le traitement de l’alcoolisme et des toxicomanies.
        </p>
    </div>
    <p style=''>

    </p>
</div>
