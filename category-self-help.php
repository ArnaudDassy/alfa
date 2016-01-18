<?php get_header(); ?>
  <section style="border-bottom:none;">
    <?php $url = sf_get_current_url('base');
          $category = get_category_by_path($url, false);
    ?>
    <h2><?php echo $category->name; ?></h2>
    <?php
      $query = new WP_query( 'post_type=self-help'); //Looking for children articles

      while ( $query->have_posts() ):
    ?>
        <?php $query->the_post(); ?>
        <div class="selfhelp">
          <p class="selfhelp__title">
            <?php the_title(); ?>
          </p>
          <div class="selfhelp__horaire selfhelp__container">
            <p class="selfhelp__header">Horaire</p>
            <?php $fields = get_field('horaire'); ?>
            <?php foreach($fields as $horaire) : ?>
              <p>
                <span><?php print($horaire['jour']); ?> : de <?php print($horaire['heure_start']); ?>H<?php print($horaire['minute_start']); ?> à <?php print($horaire['heure_end']); ?>H<?php print($horaire['minute_end']); ?></span>
              </p>
            <?php endforeach; ?>
          </div>
          <div class="selfhelp__contact selfhelp__container">
            <p class="selfhelp__header">Contact</p>
            <?php $fields = get_field('contact'); ?>
            <?php foreach($fields as $contact) : ?>
              <p>
                <span><?php print($contact['nom_du_contact']); ?> - <?php print($contact['phone']); ?></span>
              </p>
            <?php endforeach; ?>
          </div>
        </div>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
  </section>
<?php get_footer(); ?>
