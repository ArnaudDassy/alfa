<?php get_header(); ?>
  <section style="border-bottom:none;">
    <?php $url = sf_get_current_url('base');
          $category = get_category_by_path($url, false);
    ?>
    <h2><?php echo $category->name; ?></h2>
    <?php
      $query = new WP_query( 'post_type=faq'); //Looking for children articles

      while ( $query->have_posts() ):
    ?>
        <?php $query->the_post(); ?>
        <div class="question">
          <p class="question__title">
            <?php the_title(); ?>
          </p>
          <p class="question__answer" >
            <?php echo get_field('reponse') ?>
          </p>
        </div>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
  </section>
<?php get_footer(); ?>
