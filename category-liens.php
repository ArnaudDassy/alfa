<?php get_header(); ?>

  <section style="border-bottom:none;">
    <?php $url = sf_get_current_url('base');
          $category = get_category_by_path($url, false);
    ?>
    <h2><?php echo $category->name; ?></h2>
    <?php
      $query = new WP_query( 'post_type=lien'); //Looking for children articles

      while ( $query->have_posts() ):
    ?>
        <?php $query->the_post(); ?>
        <div class="lien" id='<?php echo the_slug(); ?>'>
          <p class="lien__title">
            <a href="http://<?php echo get_field('lien') ?>" target="_blank"><?php the_title(); ?></a>
          </p>
          <div class="lien__description" >
            <?php echo get_field('description') ?>
          </div>
          <p class="lien__link">
            <a href="http://<?php echo get_field('lien') ?>" target="_blank">Cliquez ici pour en apprendre d'avantage</a>
          </p>
        </div>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
  </section>

<?php get_footer(); ?>
